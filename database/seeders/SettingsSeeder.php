<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SettingsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->string('key', 255)->nullable();
    // $table->string('value', 255)->nullable();
    // $table->bigInteger('id_user')->nullable();
    // $table->timestamps();
    // $table->softDeletes();
    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('settings')->insert([
                'key' => 'key '.$i,
                'value' => 'value ' . Str::random(10),
                'id_user' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
