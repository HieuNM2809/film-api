<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserPostSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->bigInteger('id_user')->nullable();
    // $table->bigInteger('id_post')->nullable();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('user_post')->insert([
                'id_user' =>$i,
                'id_post' =>$i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
