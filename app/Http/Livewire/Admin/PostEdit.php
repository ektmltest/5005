<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\File;
use App\Helpers\Template;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Models\Newspaper;
use App\Repositories\NewspaperRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

use function Termwind\render;

class PostEdit extends Component
{
    use WithFileUploads, File;

    public Newspaper|null $newspaper;
    public Template $new;
    public $image;
    public $complex_data = array();

    public $listeners = [
        'dataChanged',
    ];

    private $newspaperRepository;

    public function __construct() {
        $this->newspaperRepository = (new NewspaperRepository);
        $this->new = new Template;
    }

    public function mount($id) {
        $this->newspaper = $this->newspaperRepository->findById($id);
        if (!$this->newspaper) {
            return abort(404);
        }

        $this->new->title_ar = $this->newspaper->titleLocale('ar');
        $this->new->title_en = $this->newspaper->titleLocale('en');
        $this->new->slug = $this->newspaper->slug;
        $this->complex_data['desc_ar'] = $this->newspaper->bodyLocale('ar');
        $this->complex_data['desc_en'] = $this->newspaper->bodyLocale('en');
    }

    public function rules() {
        return (new PostUpdateRequest())->rules();
    }

    public function updated($property) {
        $this->validateOnly($property);
    }

    public function submit()
    {
        $this->validate();

        if ($this->validateDesc())
            return;

        DB::beginTransaction();
        try {

            if ($this->updatePost())
                session()->flash('error', __('messages.error'));
            else
                session()->flash('message', __('messages.done'));

            DB::commit();

            // session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw new \Exception($th->getMessage());

        }
    }

    public function dataChanged($var_name, $data) {
        $this->complex_data[$var_name] = $data;
    }

    public function updatePost() {
        $dataToUpdate = [
            'title' => [
                'en' => $this->new->title_en,
                'ar' => $this->new->title_ar
            ],
            'body' => [
                'en' => $this->complex_data['desc_en'],
                'ar' => $this->complex_data['desc_ar']
            ],
            'slug' => $this->new->slug,
        ];
        if ($this->image) {
            if ($this->deletePostImage())
                return 1;
                // throw new \Exception('updating failed - project image file is not exists to be deleted');
            $dataToUpdate['image'] = $this->prepareFilePath($this->image, 'admin/posts', true);
        }

        $this->newspaper = $this->newspaperRepository->update($dataToUpdate, $this->newspaper);
        return 0;
    }

    public function deletePostImage() {
        $file = public_path($this->newspaper->image_uri);
        if (file_exists($file)) {
            unlink($file);
            return 0;
        }
        return 1;
    }

    public function validateDesc() {
        $err = false;
        if (!isset($this->complex_data['desc_ar']) || $this->complex_data['desc_ar'] == '') {
            $this->addError('desc_ar', __('validation.required'));
            $err = true;
        }

        if (!isset($this->complex_data['desc_en']) || $this->complex_data['desc_en'] == '') {
            $this->addError('desc_en', __('validation.required'));
            $err = true;
        }

        return $err;
    }

    public function render($found = true)
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.post-edit');
    }
}
