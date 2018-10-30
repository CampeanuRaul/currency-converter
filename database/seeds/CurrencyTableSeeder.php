<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = 'http://www.bnr.ro/nbrfxrates10days.xml';
        $xml = simplexml_load_file($url);

 	foreach($xml->Body->Cube as $d) {
 		foreach($d as $i) {
        DB::table('currency')->insert([
            'moneda' => $i['currency'],
            'valoare' => $i,
            'data' => $d['date'],
        ]);

    	}
    }
    }
}
	