<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id', false, true);
            $table->integer('user_id', false, true);
            $table->string('alias', 255)->nullable();
            $table->mediumInteger('left', false, false)->default('1');
            $table->text('select');
            $table->mediumInteger('right', false, false)->default('2');
            $table->string('title', 255)->nullable();
            $table->softDeletes('deleted_at')->nullable();
            $table->unique(['language_id', 'alias']);
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('no action')->onUpdate('no action');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
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
        Schema::drop('categories');
    }
}
