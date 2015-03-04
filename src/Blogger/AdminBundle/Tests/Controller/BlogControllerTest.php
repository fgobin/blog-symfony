<?php

namespace Blogger\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{
    public function testShowblogs()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'show');
    }

}
