<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Helpers\File;
use App\Models\Addon;
use App\Models\AddonType;
use App\Models\BankCard;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Facility;
use App\Models\GalleryProject;
use App\Models\GalleryProjectType;
use App\Models\MarketingCoupon;
use App\Models\MarketingLevel;
use App\Models\Newspaper;
use App\Models\Opinion;
use App\Models\Payment;
use App\Models\Permission;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectDepartment;
use App\Models\ProjectReply;
use App\Models\ProjectReplyAttachment;
use App\Models\ProjectState;
use App\Models\Rank;
use App\Models\RankType;
use App\Models\ReadyProject;
use App\Models\ReadyProjectDepartment;
use App\Models\Tag;
use App\Models\Ticket;
use App\Models\TicketAttachment;
use App\Models\TicketReply;
use App\Models\TicketReplyAttachment;
use App\Models\TicketType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use File;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $this->deleteFilesInFolder('projects');
            $this->deleteFilesInFolder('tickets');

            RankType::factory()->count(5)->create();

            $permissions = Permission::factory()->count(5)->create();

            Rank::factory()->count(5)->hasAttached($permissions)->create();

            $marketLevels = MarketingLevel::factory()
                ->count(5)
                ->create();

            $users = User::factory()
                ->count(5)
                ->create()
                ->each(function ($user) use ($marketLevels) {
                    $user->marketingLevels()->attach($marketLevels->random(1)->first()->id);
                });

            GalleryProjectType::factory()->count(5)->create();
            GalleryProject::factory()->count(50)->create();

            Newspaper::factory()->count(5)->create();

            TicketType::factory()->count(5)->create();
            Ticket::factory()
                ->has(TicketAttachment::factory()->count(2), 'attachments')
                ->count(5)
                ->create();
            TicketReply::factory()
                ->has(TicketReplyAttachment::factory()->count(2), 'attachments')
                ->count(5)
                ->create();

            AddonType::factory()->count(5)->create();
            $addons = Addon::factory()->count(5)->create();

            ReadyProjectDepartment::factory()->count(5)->create();
            $readyProjects = ReadyProject::factory()
                ->count(5)
                ->create()
                ->each(function ($readyProject) use ($addons) {
                    $readyProject->addons()->attach($addons->random(1)->first()->id);
                })
                ->each(function ($readyProject) use ($users) {
                    $readyProject
                    ->userRatings()
                    ->attach(
                        $users->random(1)->first()->id,
                        [
                            'rating' => fake()->randomFloat(min: 0, max: 1),
                            'message' => fake()->paragraph(),
                        ]
                    );
                });

            Cart::factory()
                ->count(5)
                ->create()
                ->each(function ($cart) use ($readyProjects) {
                    $cart->projects()->attach($readyProjects->random(1)->first()->id);
                });

            Tag::factory()
                ->count(5)
                ->create()
                ->each(function ($tag) use ($readyProjects) {
                    $tag->readyProjects()->attach($readyProjects->random(1)->first()->id);
                });

            Facility::factory()
                ->count(5)
                ->create()
                ->each(function ($facility) use ($readyProjects) {
                    $facility->readyProjects()->attach($readyProjects->random(1)->first()->id);
                });

            BankCard::factory()->count(3)->create();
            Payment::factory()
                ->count(5)
                ->create()
                ->each(function ($payment) use ($addons) {
                    $payment->addons()->attach($addons->random(1)->first()->id);
                });

            MarketingCoupon::factory()->count(10)->create();

            Opinion::factory()->count(10)->create();

            ProjectDepartment::factory()->count(5)->create();
            $categories = ProjectCategory::factory()->count(5)->create();
            ProjectState::factory()->count(2)->create();
            Project::factory()
                ->count(10)
                ->create()
                ->each(function ($project) use ($categories) {
                    $project->categories()->attach($categories->random(1)->first()->id);
                });
            ProjectReply::factory()->count(10)->create();
            ProjectReplyAttachment::factory()->count(20)->create();

            Contact::factory()->count(5)->create();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
