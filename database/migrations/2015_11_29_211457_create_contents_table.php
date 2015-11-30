<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_type_id', false, true);
            $table->integer('language_id', false, true);
            $table->integer('parent_id', false, true)->nullable();
            $table->integer('user_id', false, true);
            $table->string('alias', 255)->nullable();
            $table->string('display_date')->default('0000-00-00 00:00:00');
            $table->tinyInteger('is_draft', false, false)->default('1');
            $table->tinyInteger('is_public', false, false)->default('0');
            $table->tinyInteger('is_stackable', false, false)->default('0');
            $table->mediumInteger('left', false, false)->default('1');
            $table->text('options');
            $table->string('publish_date')->default('0000-00-00 00:00:00');
            $table->mediumInteger('right', false, false)->default('2');
            $table->text('values');
            $table->softDeletes('deleted_at')->nullable();
            $table->unique(['alias', 'language_id']);
            $table->foreign('content_type_id')->references('id')->on('content_types')->onDelete('no action')->onUpdate('no action');
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
        Schema::drop('contents');
    }
}
