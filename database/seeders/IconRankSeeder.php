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
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('icon_ranks')->insert([
                'id_rule' => $i,
                'icon' => 'icon' . Str::random(10).'.png',
                'title' => 'title '. $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
