<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->string('name');
    // $table->string('email')->unique();
    // $table->timestamp('email_verified_at')->nullable();
    // $table->string('password');
    // $table->bigInteger('id_permission')->nullable();
    // $table->string('identity_card', 20)->nullable();
    // $table->date('birthday')->nullable();
    // $table->string('avatar', 255)->nullable();
    // $table->string('url', 255)->nullable();
    // $table->string('location', 255)->nullable();
    // $table->text('bio')->nullable();
    // $table->string('currently_learning', 255)->nullable();
    // $table->string('skills', 255)->nullable();
    // $table->string('work', 255)->nullable();
    // $table->string('education', 255)->nullable();
    // $table->rememberToken();
    // $table->timestamps();
    // $table->softDeletes();

    public function run()
    {
         // add 3 days to date
         $NewDate[0]=Date('y:m:d', strtotime('+3 days'));

         // subtract 3 days from date
         $NewDate[1]=Date('y:m:d', strtotime('-3 days'));

         // PHP returns last sunday's date
         $NewDate[2]=Date('y:m:d', strtotime('Last Sunday'));

         // One week from last sunday
         $NewDate[3]=Date('y:m:d', strtotime('+7 days Last Sunday'));

        for ($i = 1; $i <= $this->amountRecord; $i++) {
            DB::table('users')->insert([
                'name' => 'name user'. $i,
                'email' =>'user'.$i.'@gmail.com',
                'password' =>Hash::make('123456'),
                'id_permission' =>2,
                'identity_card' => rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
                'birthday' => $NewDate[rand(0,3)],
                'avatar' =>'avatarUser'.$i.'.png',
                'url' =>'http://me.about/user'.$i.'@gmail.com',
                'location' =>'HCM '.$i,
                'bio' =>'HCM '.$i,
                'currently_learning' =>'CKC',
                'skills' =>'PHP, C++',
                'work' =>'CKC ',
                'education' =>'CKC',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
