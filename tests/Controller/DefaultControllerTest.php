<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Created by PhpStorm.
 * User: dzhezar-bazar
 * Date: 10.01.19
 * Time: 19:14
 */
class DefaultControllerTest extends WebTestCase
{
    public function testShowContacts()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contacts');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("contacts")')->count()
        );
    }
}