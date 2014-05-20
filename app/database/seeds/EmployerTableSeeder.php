<?php

class EmployerTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $employer = new Employer;
        $employer->name = 'Coles';
        $employer->industry = 'Retail';
        $employer->description = 'Coles Supermarkets is a chain store in the supermarket category that is owned by the Australian corporation Wesfarmers.';
        $employer->user_id = 4;
        $employer->save();
        
        $employer = new Employer;
        $employer->name = 'Apple';
        $employer->industry = 'Information Technology';
        $employer->description = 'Apple Inc. is an American multinational corporation headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software and personal computers.';
        $employer->user_id = 3;
        $employer->save();
    }
}