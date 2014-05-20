<?php

class JobTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $job = new Job;
        $job->title = 'Web Developer';
        $job->city = 'Gold Coast';
        $job->salary = 4000;
        $job->description = 'We require an experienced Web Developer / Web Administrator to assist in the design, development and implementation of an enterprise strength public facing web capability as well as manage and administer all aspects of web operations hosted by the department.';
        $job->employer_id = 2;
        $job->save();

        $job = new Job;
        $job->title = 'Software Support Consultant';
        $job->city = 'Brisbane';
        $job->salary = 40000;
        $job->description = 'With a proven application support background you will possess a methodical approach and have the ability to interact with customers at all levels. Previous application support is highly advantageous. Your strong customer service orientation, good sense of humor and ability to work well within a team are the essential attributes you possess.';
        $job->employer_id = 2;
        $job->save();

        $job = new Job;
        $job->title = 'Delicatessen Manager';
        $job->city = 'Sydney';
        $job->salary = 2000;
        $job->description = 'As the Delicatessen Manager, you will be responsible for motivating and coaching your team members, maximising sales, ensuring safe food handling and hygiene awareness and maintaining the highest customer service standards in the Deli Department.';
        $job->employer_id = 1;
        $job->save();

        $job = new Job;
        $job->title = 'Trade Qualified Butcher';
        $job->city = 'Coffs Harbour';
        $job->salary = 7000;
        $job->description = "We're looking for a casual Trade Qualified Butcher who wants to make our customers shopping experience more meaningful and enjoyable";
        $job->employer_id = 1;
        $job->save();
    }
}