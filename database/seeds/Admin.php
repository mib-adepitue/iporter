<?php

use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
	        'name'  => "Mib-Ade'Pitue",
	        'email' => 'adepitue@gmail.com',
	        'password'  => bcrypt('12345678'),
	        'alamat' => 'makassar'
		]);
    }
}
