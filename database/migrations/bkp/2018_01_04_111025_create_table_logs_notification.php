<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLogsNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',50)->nullable();
            $table->string('title',100)->nullable();
            $table->string('description',250)->nullable();
            $table->string('link',100)->nullable();
            $table->string('follower_user_id',50);
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
        //
    }
}
