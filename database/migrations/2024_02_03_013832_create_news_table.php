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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            //ニュースタイトルを保存するカラム（カラム＝垂直方向うの並び）
            $table->string('body');
            //ニュースの本文を保存するカラム
            $table->string('image_path')->nullable(); 
            //画像のパスを保存するカラム。->nullable()は「画像のパスは空でも保存できる」、という意味
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    //down「Migrationの取り消しをおこなう関数」
    {
        Schema::dropIfExists('news');
    }
};
