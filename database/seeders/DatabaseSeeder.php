<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Addon;
use App\Models\AddonType;
use App\Models\Facility;
use App\Models\GalleryProject;
use App\Models\GalleryProjectType;
use App\Models\MarketingLevel;
use App\Models\Newspaper;
use App\Models\Permission;
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
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
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
            GalleryProject::factory()->count(5)->create();

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

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
