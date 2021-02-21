<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskCondition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_condition', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('origin_task_id')->unsigned()->index()->nullable();
            $table->foreign('origin_task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->bigInteger('condition_task_id')->unsigned()->index()->nullable();
            $table->foreign('condition_task_id')->references('id')->on('tasks')->onDelete('cascade');
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
        Schema::dropIfExists('task_condition');
    }
}
