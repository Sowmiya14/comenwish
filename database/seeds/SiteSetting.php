<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SiteSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        DB::table('sitesetting')->truncate();
        DB::table('sitesetting')->insert([
            'brandname' => 'Demo',
            'brandicon' => asset('asset/img/img.png'),
            'supportmail' => 'admin@demo.com',
            'supportcontactnumber'=>'',
            'bookingidprefix'=>'',
            'copyrightyear' => Carbon::now()->format('Y'),
           
        ]);
    }
}
