<?php
/**
 * Created by PhpStorm.
 * User: SudhakarAnnadurai
 * Date: 19/05/18
 * Time: 12:58 PM
 */
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            'name' => 'Demo',
            'email' => 'admin@demo.com',
            'profilepicture' =>'http://lorempixel.com/150/150/business/',
            'password' => bcrypt('123456'),
           
        ]);
    }
}
