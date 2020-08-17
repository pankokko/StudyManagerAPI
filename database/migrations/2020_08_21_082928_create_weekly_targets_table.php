<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_targets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('started_day')->comment('目標初めの日');
            $table->date('end_day')->comment('目標終了日');
            $table->integer('target_hour')->comment('目標時間 hour');
            $table->integer('target_minutes')->comment('目標時間 minutes');
            $table->timestamps();
            $table->foreign('user_id')->on('users')->references('id')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_targets');
    }
}
