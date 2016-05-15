<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		User::truncate();
		Donor::truncate();
		Patient::truncate();
		$this->call('UsersTableSeeder');
		$this->call('DonorsTableSeeder');
		$this->call('PatientsTableSeeder');
	}

}
