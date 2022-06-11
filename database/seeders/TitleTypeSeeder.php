<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TitleTypeSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->string('type', 255)->nullable();
    // $table->text('description')->nullable();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
        for ($i = 0; $i < $this->amountRecord; $i++) {
            DB::table('title_types')->insert([
                'type' => 'title_types type' . Str::random(10),
                'description' => 'title_types type déscription' . Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
