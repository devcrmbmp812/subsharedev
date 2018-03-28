<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubshareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subshare', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('track_id');
            $table->string('roles');   // Producer , Director, Vocalist
            $table->string('percentage');
            $table->string('custom_agreement');
            $table->string('status')->default('null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subshare');
    }
}
