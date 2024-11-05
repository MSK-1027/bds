<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('firsttitle');//題名
            $table->string('mothername');//母ニックネーム
            $table->string('babyname');//子ニックネーム
            $table->string('duedate');//出産予定日
            $table->string('backcolor');//背景の色
            $table->string('fontcolor');//文字の色
            $table->string('comment');
            $table->string('image');
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
        Schema::dropIfExists('settings');
    }
};
