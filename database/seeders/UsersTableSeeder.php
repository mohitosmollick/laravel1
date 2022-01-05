<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker =  Factory::create();
          $this->defaultUser();
            foreach (range(1, 23) as $index){
                User::create([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password'=> bcrypt($faker->password)
                ]);
            }
        }
        public function defaultUser(){
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')
        ]);

    }
}
