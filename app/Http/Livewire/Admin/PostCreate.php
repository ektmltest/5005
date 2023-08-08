<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\Template;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Repositories\NewspaperRepository;
use App\Repositories\SubscriberRepository;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;

    public Template $new;
    public $image;
    public $complex_data = array();

    public $listeners = [
        'dataChanged',
    ];

    private $newspaperRepository;
    private $subscriberRepository;

    public function __construct() {
        $this->newspaperRepository = (new NewspaperRepository);
        $this->subscriberRepository = (new SubscriberRepository);
        $this->new = new Template();
    }

    // * to define rules for all post requests comming to this component
    public function rules(): array
    {
        return (new PostStoreRequest())->rules();
    }

    // * to handle realtime validation on single properity at a time
    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit()
    {
        $this->validate();

        if ($this->validateDesc())
            return;

        DB::beginTransaction();
        try {

            $new = $this->newspaperRepository->store($this->new, $this->complex_data, $this->image);

            if (!$this->subscriberRepository->sendNewPostMails($new))
                throw new \Exception('Something went wrong while sending mails');

            DB::commit();

            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            // throw new \Exception($th->getMessage());
            throw $th;

        }
    }

    public function dataChanged($var_name, $data) {
        $this->complex_data[$var_name] = $data;
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

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.post-create');
    }
}
