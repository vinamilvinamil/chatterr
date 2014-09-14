<?php

use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table) {
            $table->increments('id');
            $table->string('username', 50)->unique();
            $table->string('name', 50);
            $table->string('email', 250);
            $table->string('password', 64);
            $table->enum('role', array("admin", "moderator", "user"))->default("user");
            $table->string('about', 500)->nullable();
            $table->string('location', 50)->nullable();
            $table->string('website', 50)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('avatars', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('gravatar')->nullable();
            $table->string('custom')->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function($table) {
            $table->increments('id');
            $table->string('name', 30)->default("General");
            $table->timestamps();
        });

        Schema::create('topics', function($table) {
            $table->increments('id');
            $table->string('title', 64);
            $table->text('content', 16000);
            $table->integer('likes')->default(0)->unsigned();
            $table->integer('views')->default(0)->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::create('posts', function($table) {
            $table->increments('id');
            $table->string('content');
            $table->integer('likes')->default(0)->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->timestamps();
        });

        Schema::create('likes', function($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::drop('users');
        Schema::drop('avatars');
        Schema::drop('categories');
        Schema::drop('topics');
        Schema::drop('posts');
        Schema::drop('likes');
    }

}