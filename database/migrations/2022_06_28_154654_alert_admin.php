<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlertAdmin extends Migration
{
    public function up()
    {
        Schema::create('alert_admin', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->text('content')->nullable();
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
        Schema::dropIfExists('alert_admin');
    }
}
