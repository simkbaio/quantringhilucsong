<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StudentTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        Student::truncate();
		foreach(range(1, 10) as $index)
		{
			Student::create([
                'name' => $faker->name,
                'sex' => '0',
                'birdday' => $faker->time(),
                'address' => $faker->address,
                'hometown' => $faker->address,
                'province_id' => 1,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'facebook' => "fackebook.com/".$faker->sentence(10),
                'married' => 0,
                'educated' => 0,
                'type_disabilities' => 0,
                'person_authen_name' => $faker->name,
                'person_authen_address' => $faker->address,
			]);
		}
	}

}