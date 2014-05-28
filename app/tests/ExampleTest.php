<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());

        $this->call('GET', '/job');
        $this->call('GET', '/seeker');
        $this->call('GET', '/employer');
        $this->call('GET', '/seeker/create');
        $this->call('GET', '/employer/create');

        // $response1 = $this->call('GET', 'job');
        // $response2 = $this->call('GET', 'job/result?query=');
        // $response3 = $this->call('GET', 'job/1');
        // $response4 = $this->call('GET', 'job/4');
        // $response5 = $this->call('GET', 'job/result?query=');
        // $response6 = $this->call('GET', 'user/create');
        // $response7 = $this->call('GET', 'user');
	}
}
