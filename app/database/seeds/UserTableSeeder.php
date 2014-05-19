<?php

class UserTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $product = new User;
        $product->username = 'seeker';
        $product->password = Hash::make('helloworld');
        $product->save();
        $product = new User;
        $product->username = 'guest';
        $product->password = Hash::make('helloworld');
        $product->save();
        $product = new User;
        $product->username = 'jobs';
        $product->password = Hash::make('laravel');
        $product->save();
        $product = new User;
        $product->username = 'ian';
        $product->password = Hash::make('laravel');
        $product->save();
    }
}