<?php

class SeekerTableSeeder extends Seeder { public function run()

    // creates sample user accounts
    {
        $seeker = new Seeker;
        $seeker->user_id = 1;
        $seeker->save();

        $seeker = new Seeker;
        $seeker->user_id = 5;
        $seeker->save();

    }
}
