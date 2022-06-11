<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CreditCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // $table->id();
    // $table->string('name', 255)->nullable();
    // $table->string('cart_number', 255)->nullable();
    // $table->dateTime('date_expired')->nullable();
    // $table->string('avatar')->nullable();
    // $table->bigInteger('id_user')->nullable();
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
            DB::table('credit_carts')->insert([
                'name' => 'credit_carts name '.$i,
                'cart_number' => rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9),
                'date_expired' => $NewDate[rand(0,3)],
                'avatar' => 'avatar_credit_carts.'.$i.'.png',
                'id_user' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
