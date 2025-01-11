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
            $table->string('user_id');
            $table->string('firsttitle')->nullable();//題名
            $table->string('mothername');//母ニックネーム
            $table->string('babyname');//子ニックネーム
            $table->string('duedate');//出産予定日
            $table->string('comment')->nullable();
            $table->string('image_path')->nullable();
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
            // $table->id();
            // $table->string('user_id');プロテクト1こしか登録できないようにしたい！！！
            // $table->string('firsttitle')->nullable();//題名
            // $table->string('mothername');//母ニックネーム
            // $table->string('babyname');//子ニックネーム
            // $table->string('duedate');//出産予定日
            // $table->string('comment')->nullable();
            // $table->string('image_path')->nullable();
            // $table->timestamps();
