<?php

class JobTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $product = new Job;
        $product->title = 'Web Developer';
        $product->city = 'Gold Coast';
        $product->salary = 4000;
        $product->description = 'We require an experienced Web Developer / Web Administrator to assist in the design, development and implementation of an enterprise strength public facing web capability as well as manage and administer all aspects of web operations hosted by the department.';
        $product->employer_id = 2;
        $product->save();

        $product = new Job;
        $product->title = 'Software Support Consultant';
        $product->city = 'Brisbane';
        $product->salary = 40000;
        $product->description = 'With a proven application support background you will possess a methodical approach and have the ability to interact with customers at all levels. Previous application support is highly advantageous. Your strong customer service orientation, good sense of humor and ability to work well within a team are the essential attributes you possess.';
        $product->employer_id = 2;
        $product->save();

        $product = new Job;
        $product->title = 'Delicatessen Manager';
        $product->city = 'Sydney';
        $product->salary = 2000;
        $product->description = 'As the Delicatessen Manager, you will be responsible for motivating and coaching your team members, maximising sales, ensuring safe food handling and hygiene awareness and maintaining the highest customer service standards in the Deli Department.';
        $product->employer_id = 1;
        $product->save();

        $product = new Job;
        $product->title = 'Trade Qualified Butcher';
        $product->city = 'Coffs Harbour';
        $product->salary = 7000;
        $product->description = "We're looking for a casual Trade Qualified Butcher who wants to make our customers shopping experience more meaningful and enjoyable";
        $product->employer_id = 1;
        $product->save();
    }
}