<?php

class UserTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $user = new User;
        $user->name = 'Mr. Seeker';
        $user->username = 'seeker';
        $user->email = 'seeker@woorkseek.com';
        $user->phone = '12345678';
        $user->role = 'seeker';
        $user->password = Hash::make('123456');
        $user->save();

        $user = new User;
        $user->name = 'Mr. Employer';
        $user->username = 'employer';
        $user->email = 'employer@woorkseek.com';
        $user->phone = '98765432';
        $user->role = 'employer';
        $user->password = Hash::make('123456');
        $user->save();

        $user = new User;
        $user->name = 'Coles';
        $user->username = 'coles';
        $user->email = 'Coles@Coles.com';
        $user->phone = '98765432';
        $user->role = 'employer';
        $user->password = Hash::make('123456');
        $user->save();

        $user = new User;
        $user->name = 'Apple';
        $user->username = 'apple';
        $user->email = 'Apple@Apple.com';
        $user->phone = '98765432';
        $user->role = 'employer';
        $user->password = Hash::make('123456');
        $user->save();

        $user = new User;
        $user->name = 'Guest';
        $user->username = 'user';
        $user->email = 'User@us.com';
        $user->phone = '98765432';
        $user->role = 'seeker';
        $user->password = Hash::make('123456');
        $user->save();
    }
}
