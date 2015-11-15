<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_content', function (Blueprint $table) {
            $table->integer('category_id', false, true);
            $table->integer('content_id', false, true);
            $table->primary(['category_id', 'content_id']);
            $table->foreign('category_id')->references('id')->on('contents')->onDelete('no action')->onUpdate('no action');
            $table->foreign('content_id')->references('id')->on('categories')->onDelete('no action')->onUpdate('no action');
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
        Schema::drop('category_content');
    }
}
