<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->text('title')->nullable();
    // $table->text('content')->nullable();
    // $table->integer('number_bad_reports')->nullable();
    // $table->bigInteger('id_title_type')->nullable();
    // $table->bigInteger('id_organizations')->nullable();
    // $table->bigInteger('id_user')->nullable();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('posts')->insert([
                'title' => 'title posts '.$i,
                'content' => 'content posts '.$i,
                'number_bad_reports' => $i,
                'id_title_type' =>$i,
                'id_organizations' =>$i,
                'feature_image' =>'Hinh'.$i.'.png',
                'id_user' =>$i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
