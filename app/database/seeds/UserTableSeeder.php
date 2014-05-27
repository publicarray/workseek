<?php

class UserTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $user = new User;
        $user->username = 'seeker';
        $user->password = Hash::make('123456');
        $user->save();
        $user = new User;
        $user->username = 'employer';
        $user->password = Hash::make('123456');
        $user->save();
    }
}
