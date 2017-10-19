<?php

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
        factory( 'App\User', 250 )->create()->each(function ($user){
        	$user->email = "user_" . $user->id . '@mailinator.com';
        	$user->save();
        });

        $this->command->info('Users table Seeded');
    }
}
