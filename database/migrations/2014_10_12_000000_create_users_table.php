<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('id_permission')->nullable();
            $table->string('identity_card', 20)->nullable();
            $table->date('birthday')->nullable();
            $table->string('avatar', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->bigInteger('id_organization')->nullable();
            $table->string('location', 255)->nullable();
            $table->text('bio')->nullable();
            $table->string('currently_learning', 255)->nullable();
            $table->string('skills', 255)->nullable();
            $table->string('work', 255)->nullable();
            $table->string('education', 255)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
