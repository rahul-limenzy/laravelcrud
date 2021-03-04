<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Staff;
use App\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\User::class, 50)->create();
        factory(User::class, 50)->create()->each(function ($user) {
            factory(Staff::class, 10)->create(['user_id' => $user->id]);
//            Staff::create([
//                'user_id' => $user->id,
//                'first_name' => Str::random(10),
//                'last_name' => Str::random(10),
//                'email' => Str::random(10) . '@gmail.com',
//            ]);
        });
    }
}
