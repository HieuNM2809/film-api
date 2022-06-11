<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ReactSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->string('text_feel', 255)->nullable();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
        $textFeel = [
            'Like',
            'Love',
            'Care',
            'Haha',
            'Wow',
            'Sad',
            'Angry'
        ];
        for ($i = 0; $i < count($textFeel); $i++) {
            DB::table('reacts')->insert([
                'text_feel' => $textFeel[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
