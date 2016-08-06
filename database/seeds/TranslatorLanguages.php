<?php

use Illuminate\Database\Seeder;
use \Waavi\Translation\Models\Language;

class TranslatorLanguages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/////////Date Now()////////
		$now = date('Y-m-d H:i:s');
		///////////////////////////
		
		//////////Clean Tables/////////////
		DB::table('translator_languages')->delete();
		///////////////////////////////////
		
		////////////Languages///////////
		$language = [
        	[
        		'locale' => 'ru',
        		'name' => 'Русский'
        	],
        	[
        		'locale' => 'en',
        		'name' => 'English'
        	],
			[
        		'locale' => 'de',
        		'name' => 'Deutch'
        	]
        ];

        foreach ($language as $key => $value) {
		
			$language = new Language();
			$language->locale = $value['locale'];
			$language->name = $value['name'];
			$language->created_at = $now;
			$language->updated_at = $now;
			$language->save();
        }
    }
}
