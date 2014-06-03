<?php

class JobTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $job = new Job;
        $job->title = 'Web Developer';
        $job->city = 'Gold Coast';
        $job->salary = 4000;
        $job->start_date = '2014-05-28 00:00:00';
        $job->end_date = '2015-06-31 00:00:00';
        $job->created_at = '2014-04-21 00:00:00';
        $job->description = 'We require an experienced Web Developer / Web Administrator to assist in the design, development and implementation of an enterprise strength public facing web capability as well as manage and administer all aspects of web operations hosted by the department.';
        $job->employer_id = 3;
        $job->save();

        $job = new Job;
        $job->title = 'Software Support Consultant';
        $job->city = 'Brisbane';
        $job->salary = 40000;
        $job->start_date = '2014-05-28 00:00:00';
        $job->end_date = '2014-12-21 00:00:00';
        $job->created_at = '2014-05-30 00:00:00';
        $job->description = 'With a proven application support background you will possess a methodical approach and have the ability to interact with customers at all levels. Previous application support is highly advantageous. Your strong customer service orientation, good sense of humor and ability to work well within a team are the essential attributes you possess.';
        $job->employer_id = 3;
        $job->save();

        $job = new Job;
        $job->title = 'Program Engineer';
        $job->city = 'Sydney';
        $job->salary = 9000;
        $job->start_date = '2014-05-14 00:00:00';
        $job->end_date = '2014-07-06 00:00:00';
        $job->created_at = '2014-04-21 00:00:00';
        $job->description = 'The iAd Creative Development team is seeking two Quality Assurance Engineers to help us ensure the highest standards of all iAd products. The ideal candidate needs to be able to prioritise a heavy workload while achieving exceptional quality. We˙re looking for self-starters, critical thinkers, quick learners with outstanding communication skills and the ability to work independently and as part of a team. Recent University Graduates considered';
        $job->employer_id = 3;
        $job->save();

        $job = new Job;
        $job->title = 'Senior QA Engineer, iAd';
        $job->city = 'Sydney';
        $job->salary = 9000;
        $job->start_date = '2014-02-01 00:00:00';
        $job->end_date = '2015-08-21 00:00:00';
        $job->created_at = '2014-02-01 00:00:00';
        $job->description = "The iAd Creative Development team is seeking a Senior QA engineer to help us ensure the highest standards of all iAd products. We're looking for critical thinkers who would like to play a key role in a fast-paced environment. Our team practices agile development that relies heavily on a tight relationship between Engineering and QA. This position requires a self-motivated individual with strong technical and communication skills to handle responsibilities which would include functional testing, design and implementation of test plans and test cases, risk analysis, & integration testing across the system.";
        $job->employer_id = 3;
        $job->save();

        $job = new Job;
        $job->title = 'Delicatessen Manager';
        $job->city = 'Sydney';
        $job->salary = 2000;
        $job->start_date = '2014-04-08 00:00:00';
        $job->end_date = '2014-08-05 00:00:00';
        $job->created_at = '2014-05-08 00:00:00';
        $job->description = 'As the Delicatessen Manager, you will be responsible for motivating and coaching your team members, maximising sales, ensuring safe food handling and hygiene awareness and maintaining the highest customer service standards in the Deli Department.';
        $job->employer_id = 2;
        $job->save();

        $job = new Job;
        $job->title = 'Trade Qualified Butcher';
        $job->city = 'Coffs Harbour';
        $job->salary = 6000;
        $job->start_date = '2014-05-30 00:00:00';
        $job->end_date = '2015-06-31 00:00:00';
        $job->created_at = '2014-05-01 00:00:00';
        $job->description = "We're looking for a casual Trade Qualified Butcher who wants to make our customers shopping experience more meaningful and enjoyable";
        $job->employer_id = 2;
        $job->save();

        $job = new Job;
        $job->title = 'Store Manager';
        $job->city = 'Melbourne';
        $job->salary = 9000;
        $job->start_date = '2014-02-21 00:00:00';
        $job->end_date = '2014-11-11 00:00:00';
        $job->created_at = '2014-02-21 00:00:00';
        $job->description = "As a Store Manger you will utilise your sound operational understanding and people development skills to manage your own store and drive success in a supportive environment. Critical to your success will be your ability to work in a fast paced, dynamic, and change oriented environment. Your exceptional communication skills, customer focus, reaching & building sales targets, minimising loss and developing your team are key areas of accountability. Strong operational management experience in a big box retail environment is critical to the success of your role.";
        $job->employer_id = 2;
        $job->save();

        $job = new Job;
        $job->title = 'Night Fill Team Leader';
        $job->city = 'Adelaide';
        $job->salary = 8000;
        $job->start_date = '2014-04-31 00:00:00';
        $job->end_date = '2014-12-13 00:00:00';
        $job->created_at = '2014-04-21 00:00:00';
        $job->description = "In this role, you will work in a fast paced environment, supervising the replenishment and merchandising of stock in the Grocery and Dairy departments. You will provide leadership, guidance and coaching to your team, to ensure high standards of store presentation and inventory control, while also delivering outstanding customer service.";
        $job->employer_id = 2;
        $job->save();

        $job = new Job;
        $job->title = 'Customer Service Manage';
        $job->city = 'Sydney';
        $job->salary = 3000;
        $job->start_date = '2014-05-21 00:00:00';
        $job->end_date = '2014-06-29 00:00:00';
        $job->created_at = '2014-05-21 00:00:00';
        $job->description = "The Customer Service Manager provides leadership, guidance and coaching to the team to ensure that the highest standards of customer service are delivered. You will have previous experience in a retail leadership role, with outstanding communication skills and an unwavering customer focus. You will also have effective time management and problem solving skills and be adept at coaching, motivating and mentoring a team and managing change. You must also be available for Full time work across store trading hours, including some weekends.";
        $job->employer_id = 2;
        $job->save();

        $job = new Job;
        $job->title = 'Department Manager';
        $job->city = 'Sydney';
        $job->salary = 3000;
        $job->start_date = '2014-06-01 00:00:00';
        $job->end_date = '2014-08-30 00:00:00';
        $job->created_at = '2014-06-01 00:00:00';
        $job->description = "As the Department Manager, you will be responsible for motivating and coaching your team members, maximising sales, ensuring safe food handling and hygiene awareness and maintaining the highest customer service standards in the Deli OR Fresh Produce Department. Your retail leadership experience, proven track record of sales and profit achievement, strong communication skills and commitment to top-quality product will be the keys to your success in this role";
        $job->employer_id = 2;
        $job->save();
    }
}
