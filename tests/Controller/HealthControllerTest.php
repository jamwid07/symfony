<?php

namespace App\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class HealthControllerTest extends WebTestCase
{
    public function testHealthCheck(): void
    {
        $client = $this->makeClient();
        $client->request('GET', 'health/check');

        $this->assertStatusCode(200, $client);
    }
}
