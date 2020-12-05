<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // imagesテーブル：店の情報を入力→foreachで回す
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name');
            // pathカラムに画像のパスを入れて画像表示
            $table->string('path');
            // 都道府県を入力→後でラジオボックスで都道府県を選択・店を絞る
            $table->string('spot');
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
        Schema::dropIfExists('images');
    }
}
