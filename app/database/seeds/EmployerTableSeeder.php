<?php

class EmployerTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $product = new Employer;
        $product->name = 'Coles';
        $product->industry = 'Retail';
        $product->description = 'Coles Supermarkets is a chain store in the supermarket category that is owned by the Australian corporation Wesfarmers.';
        $product->user_id = 4;
        $product->save();
        $product = new Employer;
        $product->name = 'Apple';
        $product->industry = 'Information Technology';
        $product->description = 'Apple Inc. is an American multinational corporation headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software and personal computers.';
        $product->user_id = 3;
        $product->save();
    }
}