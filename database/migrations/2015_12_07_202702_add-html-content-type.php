<?php

use Avatar\ContentType;
use b3nl\Avatar\ContentType\HTML\Adapter;
use Illuminate\Database\Migrations\Migration;

class AddHtmlContentType extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        ContentType::firstOrCreate([
            'class' => Adapter::class,
            'name' => 'Simple HTML-Content'
        ]);
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        // Do nothing. Keep the ids!
    } // function
}
