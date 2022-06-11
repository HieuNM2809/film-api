<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CommentSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->text('content')->nullable();
    // $table->bigInteger('parent')->nullable();
    // $table->bigInteger('id_post')->nullable();
    // $table->string('image', 255)->nullable();
    // $table->bigInteger('id_user')->nullable();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('comments')->insert([
                'content' => 'content comments '.$i,
                'parent' => NULL,
                'id_post' => $i,
                'image' => 'imageComment'. Str::random(40).',png',
                'id_user' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('comments')->insert([
                'content' => 'content comments '.$i,
                'parent' => 1,
                'id_post' => $i,
                'image' => 'imageComment'. Str::random(40).',png',
                'id_user' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('comments')->insert([
                'content' => 'content comments '.$i,
                'parent' => 2,
                'id_post' => $i,
                'image' => 'imageComment'. Str::random(40).',png',
                'id_user' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('comments')->insert([
                'content' => 'content comments '.$i,
                'parent' => 3,
                'id_post' => $i,
                'image' => 'imageComment'. Str::random(40).',png',
                'id_user' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('comments')->insert([
                'content' => 'content comments '.$i,
                'parent' => 4,
                'id_post' => $i,
                'image' => 'imageComment'. Str::random(40).',png',
                'id_user' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('comments')->insert([
                'content' => 'content comments '.$i,
                'parent' =>5,
                'id_post' => $i,
                'image' => 'imageComment'. Str::random(40).',png',
                'id_user' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
