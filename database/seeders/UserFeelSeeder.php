<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFeelSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->bigInteger('id_user')->nullable();
    // $table->bigInteger('id_post')->nullable();
    // $table->bigInteger('id_comment')->nullable();
    // $table->bigInteger('id_react')->nullable();
    // $table->timestamps();

    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('user_feels')->insert([
                'id_user' => $i,
                'id_post' => NULL,
                'id_comment' => NULL,
                'id_react' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('user_feels')->insert([
                'id_user' => NULL,
                'id_post' => $i,
                'id_comment' => NULL,
                'id_react' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('user_feels')->insert([
                'id_user' => NULL,
                'id_post' => NULL,
                'id_comment' => $i,
                'id_react' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
