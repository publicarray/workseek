<?php

class UserTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $user = new User;
        $user->username = 'seeker';
        $user->password = Hash::make('helloworld');
        $user->save();
        $user = new User;
        $user->username = 'guest';
        $user->password = Hash::make('helloworld');
        $user->save();
        $user = new User;
        $user->username = 'jobs';
        $user->password = Hash::make('laravel');
        $user->save();
        $user = new User;
        $user->username = 'ian';
        $user->password = Hash::make('laravel');
        $user->save();
    }
}