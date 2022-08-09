<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserIconRankSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->bigInteger('id_user')->nullable();
    // $table->bigInteger('id_icon')->nullable();

    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('user_icon_ranks')->insert([
                'id_user' =>$i,
                'id_icon' =>$i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
