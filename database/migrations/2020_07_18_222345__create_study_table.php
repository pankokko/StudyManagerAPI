<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->integer('study_hour')->nullable()->comment('勉強hours');
            $table->integer('study_minutes' )->nullable()->coment('勉強minutes');
            $table->date('study_dt')->nullable()->comment('勉強日');
            $table->string('study_title')->nullable()->comment('勉強タイトル');
            $table->text('study_content', 500)->nullable()->comment('勉強の詳細');
            $table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('studies');
    }
}
