<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_path'); // プロフィールの画像を保存するカラム
            $table->string('name'); // プロフィールの名前を保存するカラム
            $table->string('gender'); // プロフィールの性別を保存するカラム
            $table->string('hobby')->nullable(); // プロフィールの趣味を保存するカラム
            $table->string('introduce')->nullable();// プロフィールの自己紹介を保存するカラム
            $table->string('job')->nullable();// プロフィールの仕事を保存するカラム
            $table->string('area')->nullable(); // プロフィールの居住区を保存するカラム
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
        Schema::dropIfExists('profile');
    }
}
