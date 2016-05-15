<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DonorsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$blood_groups = ['A+','A-','B+','B-','O+','O-','AB+','AB-'];
		foreach(range(1, 100) as $index)
		{
			Donor::create([
				'name' => $faker->name,
				'email' => $faker->email,
				'age' => $faker->numberBetween(10,80),
				'sex' => $faker->word,
				'blood_group' => $blood_groups[$faker->numberBetween(0,7)],
				'address' => $faker->address,
				'mobile' => $faker->phoneNumber,
				'observations' => $faker->paragraph(3)
			]);
		}
	}

}