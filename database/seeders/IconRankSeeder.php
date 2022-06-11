<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class IconRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->bigInteger('id_rule')->nullable();
    // $table->string('icon', 255)->nullable();
    // $table->string('title', 255)->nullable();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
        $max = 20;
        for ($i = 0; $i < $max; $i++) {
            DB::table('users')->insert([
                'name' => 'Nguyen ' . Str::random(10),
                'user' => 'User' . Str::random(10),
                'password' => Hash::make('password'),
                'image' => $i.'.png',
                'birthday' => now(),
                'position' => 4,
                'email' => Str::random(10) . '@gmail.com',
                'phone' => Str::random(10)
            ]);
        }

    }
}
