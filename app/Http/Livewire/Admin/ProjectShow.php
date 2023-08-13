<?php

namespace App\Http\Livewire\Admin;

use App\Http\Requests\ProjectReplyStoreRequest;
use App\Repositories\ProjectAttachmentRepository;
use App\Repositories\ProjectReplyAttachmentRepository;
use App\Repositories\ProjectReplyRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ProjectStateRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProjectShow extends Component
{
    use WithFileUploads;

    public $project;
    public $message;
    public $noFiles = 1;
    public $files = array();
    public $replies;
    public $max_count;
    public $states;
    public $settings = array();

    protected $projectRepository;
    protected $projectReplyRepository;
    protected $projectStateRepository;

    public function __construct() {
        $this->projectReplyRepository = new ProjectReplyRepository(
            new ProjectReplyAttachmentRepository
        );

        $this->projectRepository = new ProjectRepository(
            new ProjectAttachmentRepository,
            $this->projectReplyRepository
        );

        $this->projectStateRepository = new ProjectStateRepository;

        $this->states = $this->projectStateRepository->getAllProjectStates();
    }

    public function mount($id) {
        if (!session()->has('loaded'))
            session()->put('loaded', config('globals.max_replies'));

        $this->initVariables($id);
    }

    public function reply(Request $request) {
        $this->validate((new ProjectReplyStoreRequest)->rules());

        DB::beginTransaction();
        try {

            $request->merge(['message' => $this->message]);
            $this->projectReplyRepository->store($request, $this->project->id, $this->files);

            DB::commit();

            $this->reset(['message', 'files']);
            $this->resetValidation();

            $this->initVariables($this->project->id);

            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    public function addBtn()
    {
        $this->noFiles++;
    }

    public function loadMore() {
        session()->put('loaded', session('loaded') + config('globals.max_replies'));
        $this->replies = $this->project->replies(limit: session('loaded'), ordered: 'desc')->get();
    }

    public function changeSettings() {

        DB::beginTransaction();
        try {

            $this->project->update([
                'price' => $this->settings['price'],
                'project_state_id' => $this->settings['state_id'],
                'progress' => $this->settings['progress'],
            ]);

            $this->initVariables($this->project->id);

            DB::commit();

            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;

        }
    }

    protected function initVariables($id) {
        $this->project = $this->projectRepository->getProjectById($id);
        $this->replies = $this->project->replies(limit: session('loaded'), ordered: 'desc')->get();
        $this->max_count = $this->project->replies()->count();
        $this->settings['state_id'] = $this->project->state->id;
        $this->settings['progress'] = $this->project->progress;
        $this->settings['price'] = $this->project->price;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.admin.project-show');
    }
}
