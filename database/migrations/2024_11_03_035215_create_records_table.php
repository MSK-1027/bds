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
            $table->string('user_id');
            $table->string('echoimage')->nullable();//エコー写真
            $table->string('weekday');//週数
            $table->string('babyheight');//身長
            $table->string('babybodyweight');//体重
            $table->string('motherbodyweight')->nullable();//母体重
            $table->string('image')->nullable();//お腹の写真
            $table->string('comment')->nullable();
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
//             $table->id();
//             $table->string('user_id');プロテクトかける！！！
//             $table->string('weekday');//週数プロテクト！！
//             $table->string('babyheight');//身長
//             $table->string('babybodyweight');//体重
//             $table->string('motherbodyweight')->nullable();//まま体重
//             $table->string('comment')->nullable();
//             $table->string('image_path')->nullable();お腹の写真・エコー写真
//             $table->timestamps();

//     }
// };
