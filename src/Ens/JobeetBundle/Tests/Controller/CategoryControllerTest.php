<?php 

// src/Ens/JobeetBundle/Tests/Controller/CategoryControllerTest.php
namespace Ens\JobeetBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{
	public function testShow()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/category/index');
		$this->assertEquals('Ens\JobeetBundle\Controller\CategoryController::showAction', $client->getRequest()->attributes->get('_controller'));
		$this->assertTrue(200 === $client->getResponse()->getStatusCode());
	}
}
