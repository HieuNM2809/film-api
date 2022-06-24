<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends BaseSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Gọi class khởi tại dữ liệu
        $this->call([
            TitleTypeSeeder::class,
            IconRankSeeder::class,
            RuleRankSeeder::class,
            SettingsSeeder::class,
            OrganizationSeeder::class,
            DonateSeeder::class,
            CreditCartSeeder::class,
            PermissionSeeder::class,
            HashTagSeeder::class,
            ReactSeeder::class,
            UserIconRankSeeder::class,
            UserSeeder::class,
            PostSeeder::class,
            GroupPermissionSeeder::class,
            UserFeelSeeder::class,
            CommentSeeder::class,
            UserPostSeeder::class,
            UserOrganizationSeeder::class
        ]);
    }
}
