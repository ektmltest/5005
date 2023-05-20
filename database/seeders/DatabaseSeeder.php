<?php
namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use App\Models\Rank;
use App\Models\RankType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        RankType::factory()->count(5)->create();

        $permissions = Permission::factory()->count(5)->create();

        Rank::factory()->count(5)->hasAttached($permissions)->create();

        $users = User::factory()->count(5)->create();

    }
}
