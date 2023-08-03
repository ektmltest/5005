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
use App\Models\Platform;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectDepartment;
use App\Models\ProjectReply;
use App\Models\ProjectReplyAttachment;
use App\Models\ProjectState;
use App\Models\Qas;
use App\Models\QasType;
use App\Models\Rank;
use App\Models\RankType;
use App\Models\ReadyProject;
use App\Models\ReadyProjectDepartment;
use App\Models\Settings\SocialMedia;
use App\Models\Tag;
use App\Models\Ticket;
use App\Models\TicketAttachment;
use App\Models\TicketReply;
use App\Models\TicketReplyAttachment;
use App\Models\TicketType;
use App\Models\User;
use App\Models\UserBankCard;
use App\Models\Withdrawal;
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
            if (auth()->check())    auth()->logout();

            $this->deleteFilesInFolder('projects');
            $this->deleteFilesInFolder('projects/replies');
            $this->deleteFilesInFolder('tickets');
            $this->deleteFilesInFolder('tickets/replies');
            $this->deleteFilesInFolder('users');
            $this->deleteFilesInFolder('transactions/charges');
            $this->deleteFilesInFolder('admin/store/projects');
            $this->deleteFilesInFolder('admin/gallery');

            RankType::factory()->count(4)->create();

            $permissions = Permission::factory()->count(150)->create();

            Rank::factory()->count(1)->hasAttached($permissions)->create([
                'name' => ['ar' => 'المؤسس', 'en' => 'founder'],
                'priority' => 9999,
            ]);
            Rank::factory()->count(18)->hasAttached($permissions->except([1]))->create();

            $marketLevels = MarketingLevel::factory()
                ->count(50)
                ->create();

            $users = User::factory()
                ->count(99)
                ->create()
                ->each(function ($user) use ($marketLevels) {
                    $user->marketingLevels()->attach($marketLevels->random(1)->first()->id);
                });

            $users->push(User::factory()->create([
                'rank_id' => Rank::where('priority', 9999)->first()->id
            ]));

            GalleryProjectType::factory()->count(15)->create();
            GalleryProject::factory()->count(100)->create();

            Newspaper::factory()->count(100)->create();

            TicketType::factory()->count(15)->create();
            Ticket::factory()
                ->has(TicketAttachment::factory()->count(2), 'attachments')
                ->count(100)
                ->create();
            TicketReply::factory()
                ->has(TicketReplyAttachment::factory()->count(2), 'attachments')
                ->count(150)
                ->create();

            AddonType::factory()->count(15)->create();
            $addons = Addon::factory()->count(100)->create();

            ReadyProjectDepartment::factory()->count(20)->create();
            $readyProjects = ReadyProject::factory()
                ->count(200)
                ->create()
                ->each(function ($readyProject) use ($addons) {
                    $readyProject->addons()->attach($addons->random(1)->first()->id);
                })
                ->each(function ($readyProject) use ($users) {
                    $average_rating = round(fake()->randomFloat(min: 0, max: 1), 2);
                    $readyProject
                    ->userRatings()
                    ->attach(
                        $users->random(1)->first()->id,
                        [
                            'rating' => $average_rating,
                            'message' => fake()->paragraph(),
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );
                    $readyProject->average_rating = $average_rating;
                    $readyProject->save();
                });

            Cart::factory()
                ->count(50)
                ->create()
                ->each(function ($cart) use ($readyProjects) {
                    $cart->projects()->attach($readyProjects->random(1)->first()->id);
                });

            Tag::factory()
                ->count(250)
                ->create()
                ->each(function ($tag) use ($readyProjects) {
                    $tag->readyProjects()->attach($readyProjects->random(1)->first()->id);
                });

            Facility::factory()
                ->count(50)
                ->create()
                ->each(function ($facility) use ($readyProjects) {
                    $facility->readyProjects()->attach($readyProjects->random(1)->first()->id);
                });

            BankCard::factory()->count(10)->create();
            Payment::factory()
                ->count(150)
                ->create();

            UserBankCard::factory()->count(150)->create();
            Withdrawal::factory()->count(150)->create();

            MarketingCoupon::factory()->count(50)->create();

            Opinion::factory()->count(300)->create();

            ProjectDepartment::factory()->count(10)->create();
            $categories = ProjectCategory::factory()->count(30)->create();
            ProjectState::factory()->count(10)->create();
            Project::factory()
                ->count(150)
                ->create()
                ->each(function ($project) use ($categories) {
                    $project->categories()->attach($categories->random(1)->first()->id);
                });
            ProjectReply::factory()->count(200)->create();
            ProjectReplyAttachment::factory()->count(200)->create();

            Contact::factory()->count(100)->create();

            QasType::factory()->count(10)->create();
            Qas::factory()->count(100)->create();

            Platform::factory()->count(10)->create();

            $this->call([
                SettingsSeeder::class
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
