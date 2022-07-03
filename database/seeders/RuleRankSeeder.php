<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RuleRankSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->string('name')->nullable();
    // $table->integer('value')->nullable();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('rule_ranks')->insert([
                'name' => 'name icon_ranks '.$i,
                'value' =>  rand(1,50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
