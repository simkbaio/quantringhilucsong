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
                'stu_name' => $faker->name,
                'stu_sex' => '0',
                'stu_birdday' => $faker->time(),
                'stu_address' => $faker->address,
                'stu_hometown' => $faker->address,
                'stu_province_id' => 1,
                'stu_phone' => $faker->phoneNumber,
                'stu_email' => $faker->email,
                'stu_facebook' => "fackebook.com/".$faker->sentence(10),
                'stu_married' => 0,
                'stu_educated' => 0,
                'stu_type_disabilities' => 0,
                'stu_person_authen_name' => $faker->name,
                'stu_person_authen_address' => $faker->address,
			]);
		}
	}

}