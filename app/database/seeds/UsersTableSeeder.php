<?php
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder{

    public function run(){
        $faker = Faker::create();
        User::truncate();
        foreach(range(1,20) as $index){
            $user = Sentry::createUser(
                [
                    'first_name'=>$faker->firstName,
                    'last_name'=>$faker->lastName,
                    'email'=>$faker->email,
                    'password'=>Hash::make($faker->sentence(10)),
                ]

            );
            $group = Sentry::findGroupByName('Users');
            $user->addGroup($group);
        }

    }

}
