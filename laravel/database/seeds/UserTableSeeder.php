<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        $user->name = 'Ms. Employer';
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
        $user->image_file_name = 'coles.jpg';
        $user->image_content_type = 'image/jpeg';
        $user->save();

        $user = new User;
        $user->name = 'Apple';
        $user->username = 'apple';
        $user->email = 'Apple@Apple.com';
        $user->phone = '98765432';
        $user->role = 'employer';
        $user->password = Hash::make('123456');
        $user->image_file_name = 'appleLogo.jpg';
        $user->image_content_type = 'image/jpeg';
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
