<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_tag', function (Blueprint $table) {
            $table->integer('content_id', false, true);
            $table->integer('tag_id', false, true);
            $table->primary(['content_id', 'tag_id']);
            $table->foreign('content_id')->references('id')->on('tags')->onDelete('no action')->onUpdate('no action');
            $table->foreign('tag_id')->references('id')->on('contents')->onDelete('no action')->onUpdate('no action');
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
        Schema::drop('content_tag');
    }
}
