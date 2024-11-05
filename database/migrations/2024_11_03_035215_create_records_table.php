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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('echoimage');//エコー写真
            $table->string('weekday');//週数
            $table->string('babyheight');//身長
            $table->string('babybodyweight');//体重
            $table->string('motherbodyweight');//母体重
            $table->string('image');//お腹の写真
            $table->string('comment');
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
        Schema::dropIfExists('records');
    }
};
