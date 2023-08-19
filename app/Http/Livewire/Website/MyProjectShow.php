<?php

namespace App\Http\Livewire\Website;

use App\Http\Requests\ProjectReplyStoreRequest;
use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectCategoryRepository;
use App\Repositories\ProjectReplyAttachmentRepository;
use App\Repositories\ProjectReplyRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyProjectShow extends Component
{
    use WithFileUploads;
    public $project;
    public $noFiles = 1;
    public $files = array();
    public $message;
    protected $projectRepository;
    protected $projectReplyRepository;

    public function __construct() {
        $this->projectRepository = new ProjectRepository(
            new ProjectAttachmentRepository,
            new ProjectReplyRepository(new ProjectReplyAttachmentRepository)
        );
        $this->projectReplyRepository = new ProjectReplyRepository(
            new ProjectReplyAttachmentRepository
        );
    }

    public function mount($id) {
        $this->project = $this->projectRepository->getProjectById($id, auth: true);
        if (!$this->project)
            return abort(401);
    }

    public function delete() {
        DB::beginTransaction();
        try {
            $this->projectRepository->delete($this->project);

            DB::commit();

            return redirect()->route('myProjects')->with('message', __('messages.done'));
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function rules() {
        return (new ProjectReplyStoreRequest())->rules();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function addBtn() {
        $this->noFiles++;
    }

    public function submit(Request $request) {
        $this->validate();

        DB::beginTransaction();
        try {

            $request->merge(['message' => $this->message]);
            $this->projectReplyRepository->store($request, $this->project->id, $this->files);

            DB::commit();

            $this->reset(['message', 'files']);
            $this->resetValidation();
            $this->project = $this->projectRepository->getProjectById($this->project->id);
            session()->flash('message', __('messages.done'));

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.my-project-show');
    }
}
