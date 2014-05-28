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
	}
}
