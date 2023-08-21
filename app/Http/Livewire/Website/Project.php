<?php
namespace App\Http\Livewire\Website;

use App\Models\Addon;
use App\Models\Purchase;
use App\Models\ReadyProject;
use App\Repositories\GallaryProjectRepository;
use App\Repositories\ReadyProjectRepository;
use App\Repositories\Settings\SocialMediaRepository;
use App\Repositories\TicketAttachmentRepository;
use App\Repositories\TicketRepository;
use App\Repositories\UserRepository;
use App\Repositories\VerifyEmailRepository;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Project extends Component
{
    public $project;
    public $next;
    public $previous;
    public $galleries;
    public $socials;
    public $price;
    public $addons_ids = array();

    protected $readyProjectRepository;
    protected $galleryProjectRepository;
    protected $socialMediaRepository;
    protected $userRepository;
    protected $ticketRepository;

    public function __construct() {
        $this->readyProjectRepository = new ReadyProjectRepository;
        $this->galleryProjectRepository = new GallaryProjectRepository;
        $this->socialMediaRepository = new SocialMediaRepository;
        $this->userRepository = new UserRepository(
            new VerifyEmailRepository
        );
        $this->ticketRepository = new TicketRepository(
            new TicketAttachmentRepository
        );

        $this->galleries = $this->galleryProjectRepository->getAllProjects(paginate: false, limit: 9);
        $this->socials = $this->socialMediaRepository->getAll();
    }

    public function mount($id) {
        $this->project = $this->readyProjectRepository->findById($id, with: ['facilities', 'addons']);
        $this->next = $this->readyProjectRepository->getNextId($id);
        $this->previous = $this->readyProjectRepository->getPreviousId($id);
        $this->price = $this->project->price;
    }

    public function toggleLike($ready_project)
    {
        if (!$this->authCheckOrRedirect()) return;

        $ready_project = $this->readyProjectRepository->findById($ready_project['id']);
        $isAdded = $this->readyProjectRepository->toggleLike($ready_project);

        if ($isAdded)
            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);
        else
            $this->dispatchBrowserEvent('my:message.success', ['message' => __('messages.done')]);

        $this->emit('likedEvent');
    }

    public function checkAddon($addon_id) {
        $addon = $this->project->addons->where('id', $addon_id)->first();
        $isAddedBefore = isset($this->addons_ids[$addon_id]);

        if ($isAddedBefore)
            $this->subAddonPrice($addon);
        else
            $this->addAddonPrice($addon);

        $this->price = round($this->price, 2);
    }

    public function buy() {

        DB::beginTransaction();
        try {

            if (!$this->authCheckOrRedirect()) return;

            $user = auth()->user();
            $validUserBalance = $user->balance >= $this->price;
            if ($validUserBalance) {
                $this->userRepository->removeFromBalance($user->id, $this->price);
                $purchase = Purchase::create([
                    'ready_project_id' => $this->project->id,
                    'user_id' => $user->id,
                ]);
                $purchase->addons()->attach($this->addons_ids);

                DB::commit();

                return redirect()->route('purchases.show', $purchase->id);
            } else {
                $this->dispatchBrowserEvent('my:message.error', ['message' => __('messages.account balance error')]);
            }

        } catch (\Throwable $th) {

            DB::rollBack();
            $this->dispatchBrowserEvent('my:message.error', ['message' => __('messages.error')]);

        }
    }

    private function addAddonPrice(Addon $addon) {
        $this->addons_ids[$addon->id] = $addon->price;
        $this->price += $addon->price;
    }

    private function subAddonPrice(Addon $addon) {
        unset($this->addons_ids[$addon->id]);
        $this->price -= $addon->price;
    }

    private function authCheckOrRedirect() {
        if (!auth()->check()) {
            redirect()->route('login');
            return false;
        }
        return true;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.project');
    }
}
