<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserOrganizationSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('user_organizations')->insert([
                'id_user' =>$i,
                'id_organization' =>$i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
