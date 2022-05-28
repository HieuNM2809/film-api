<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIconRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icon_ranks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_rule')->nullable();
            $table->string('rule', 255)->nullable();
            $table->string('icon', 255)->nullable();
            $table->string('title', 255)->nullable();
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
        Schema::dropIfExists('icon_ranks');
    }
}
