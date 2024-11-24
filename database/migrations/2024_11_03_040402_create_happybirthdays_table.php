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
        Schema::create('happybirthdays', function (Blueprint $table) {
            $table->id();
            $table->string('userid');
            $table->string('birthdaytitle');//誕生題名
            $table->string('birthday');//誕生日
            $table->string('gender');//性別
            $table->string('babyname');//命名
            $table->string('birthdaytime');//誕生時間
            $table->string('babyheight');//身長
            $table->string('baby body weight');//体重
            $table->string('image');//
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
        Schema::dropIfExists('happybirthdays');
    }
};
//             $table->id();
//             $table->string('user_id');プロテクト
//             $table->string('birthday');//誕生日
//             $table->string('birthdaytime');//時間
//             $table->string('babyname')->nullable();//命名
//             $table->string('gender');//性別
//             $table->string('babyheight');//身長
//             $table->string('babybodyweight');//体重
//             $table->string('comment')->nullable();
//             $table->string('image_path')->nullable();
//             $table->timestamps();
        
//     }
// };
