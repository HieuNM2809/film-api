<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_carts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('cart_number', 255)->nullable();
            $table->dateTime('date_expired')->nullable();
            $table->string('avatar')->nullable();
            $table->bigInteger('id_user')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_carts');
    }
}
