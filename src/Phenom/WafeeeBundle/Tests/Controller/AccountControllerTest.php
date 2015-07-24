<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 7/23/15
 * Time: 3:15 PM
 */

namespace Phenom\WafeeeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;

class AccountControllerTest extends WebTestCase
{
    public function testRegister()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/register');

        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreate()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/register');

        $buttonCrawler = $crawler->selectButton('submit');

        $form = $buttonCrawler->form();

        $form['username'] = "TestUser";
        $form['email'] = "TestEmail@gmail.com";
        $form['password'] = "1234567890";

        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect('/'));
    }

}
