<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DonateSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->string('link', 255)->nullable();
    // $table->bigInteger('id_user')->nullable();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('donates')->insert([
                'link' => 'https://unghotoi.com/DoMiXi_'.$i,
                'id_user' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
