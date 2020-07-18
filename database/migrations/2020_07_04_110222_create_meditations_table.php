<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meditations', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable()->comment('瞑想した日');
            $table->string('meditation_time')->nullable()->comment('何分瞑想したか');
            $table->integer('week_meditate')->nullable()->comment('月の何周目の瞑想か');
            $table->bigInteger('user_id')->unsigned();
            $table->string('music_url', 100)->nullable()->comment('瞑想用音楽のURL');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('meditations');
    }
}
