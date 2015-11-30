<?php
use Avatar\Language;
use Illuminate\Database\Seeder;

/**
 * Seeds the language table.
 * @author b3nl
 * @category database
 * @package Avatar\database
 * @subpackage seeds
 */
class LanguageSeeder extends Seeder
{
    public function run()
    {
        DB::table('languages')->delete();

        Language::create([
            'name'  => 'german'
        ]);
    }
}
