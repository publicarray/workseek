<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Recently Added Jobs');

        $this->visit('/job')
             -> see('Recently Added Jobs');

        $this->visit('/job/1')
             -> see('Web Developer');

        $this->visit('/job?page=2&query=a')
             -> see("Search Results for 'a'");

        $this->visit('/seeker')
             -> see('Insufficient Privileges.');

        $this->visit('/employer')
             -> see('Create Employer Account');

        $this->visit('/seeker/create')
             -> see('Register Job Seeker Account');

        $this->visit('/employer/create')
             -> see('Create Employer Account');

        $this->visit('/404err')
             -> see('404 Error - Not Found');
    }
}
