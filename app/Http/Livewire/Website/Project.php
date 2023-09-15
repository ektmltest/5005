<?php
namespace App\Http\Livewire\Website;

use App\Models\Addon;
use App\Models\MarketingCoupon;
use App\Models\Purchase;
use App\Models\ReadyProject;
use App\Repositories\GallaryProjectRepository;
use App\Repositories\Purchases\PurchaseRepository;
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
    public $token;

    protected $coupon;
    protected $readyProjectRepository;
    protected $galleryProjectRepository;
    protected $socialMediaRepository;
    protected $ticketRepository;
    protected $purchaseRepository;

    public function __construct() {
        $this->readyProjectRepository = new ReadyProjectRepository;
        $this->galleryProjectRepository = new GallaryProjectRepository;
        $this->socialMediaRepository = new SocialMediaRepository;
        $this->ticketRepository = new TicketRepository(
            new TicketAttachmentRepository
        );
        $this->purchaseRepository = PurchaseRepository::instance();


        $this->galleries = $this->galleryProjectRepository->getAllProjects(paginate: false, limit: 9);
        $this->socials = $this->socialMediaRepository->getAll();
    }

    public function mount($id, $token) {
        $this->project = $this->readyProjectRepository->findById($id, with: ['facilities', 'addons']);
        $this->next = $this->readyProjectRepository->getNextId($id);
        $this->previous = $this->readyProjectRepository->getPreviousId($id);
        $this->price = $token ? $this->project->price_after_commission : $this->project->price;

        // ? affiliate
        $this->token = $token;
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
        if (!$this->validateNumOfTransactions())
            return redirect()->route('home')->with('error', __('errors.this coupon has exceed the maximum number of transactions'));

        DB::beginTransaction();
        try {

            if (!$this->authCheckOrRedirect()) return;

            $user = auth()->user();
            if ($user->removeFromBalance($this->price)) {

                $user->save();
                $purchase = $this->setupPurchaseProcess();
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

    public function createPromotionToken() {
        $this->redirect(route('project', $this->project->id));
        return auth()->user()->promotion_token;
    }

    private function setupPurchaseProcess(): Purchase {
        $purchase = $this->purchaseRepository->storeAndAttachAddons(
            $this->project->id,
            $this->price,
            array_keys($this->addons_ids)
        );

        $this->project = $this->readyProjectRepository->incrementNumOfPurchasesAndSave($this->project);

        if ($this->token) {
            MarketingCoupon::where('token', $this->token)
                ->first()
                ->incrementNumOfTransactionsAndSave();
        }

        return $purchase;
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

    private function validateNumOfTransactions() {
        $coupon = MarketingCoupon::where('token', $this->token)->first();
        if ($coupon)
            return $coupon->verifyNumOfTransactions();
        else
            return true;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('my:loaded');
        return view('livewire.website.project');
    }
}
