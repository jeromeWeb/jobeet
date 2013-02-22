<?php

namespace Ens\JobeetBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JobControllerTest extends WebTestCase {
	public function getMostRecentProgrammingJob() {
		$kernel = static::createKernel();
		$kernel->boot();
		$em = $kernel->getContainer()->get('doctrine.orm.entity_manager');

		$query = $em
				->createQuery(
						'SELECT j from EnsJobeetBundle:Job j LEFT JOIN j.category c WHERE c.slug = :slug AND j.expires_at > :date ORDER BY j.created_at DESC');
		$query->setParameter('slug', 'programming');
		$query->setParameter('date', date('Y-m-d H:i:s', time()));
		$query->setMaxResults(1);
		return $query->getSingleResult();
	}

	public function getExpiredJob() {
		$kernel = static::createKernel();
		$kernel->boot();
		$em = $kernel->getContainer()->get('doctrine.orm.entity_manager');

		$query = $em
				->createQuery(
						'SELECT j from EnsJobeetBundle:Job j WHERE j.expires_at < :date');
		$query->setParameter('date', date('Y-m-d H:i:s', time()));
		$query->setParameter('date', date('Y-m-d H:i:s', time()));
		$query->setMaxResults(1);
		return $query->getSingleResult();
	}

	public function testIndex() {
		// get the custom parameters from app config.yml
		$kernel = static::createKernel();
		$kernel->boot();
		$max_jobs_on_homepage = $kernel->getContainer()
				->getParameter('max_jobs_on_homepage');
		$max_jobs_on_category = $kernel->getContainer()
				->getParameter('max_jobs_on_category');

		$client = static::createClient();

		$crawler = $client->request('GET', '/');
		$this
				->assertEquals(
						'Ens\JobeetBundle\Controller\JobController::indexAction',
						$client->getRequest()->attributes->get('_controller'));

		// expired jobs are not listed
		$this
				->assertEquals(0, 
						$crawler
								->filter(
										'.jobs td.position:contains("Expired")')
								->count(), "expired jobs are not listed");

		// only $max_jobs_on_homepage jobs are listed for a category
		$this
				->assertTrue(
						$crawler->filter('.category_programming tr')->count()
								== 10, "only $max_jobs_on_homepage jobs are listed for a category");
		$this
				->assertTrue(
						$crawler->filter('.category_design .more_jobs')
								->count() == 0, "No more jobs on design category");
		$this
				->assertTrue(
						$crawler->filter('.category_programming .more_jobs')
								->count() == 1, "one More jobs link on programming category");

		// jobs are sorted by date
		$this
				->assertTrue(
						$crawler->filter('.category_programming tr')->first()
								->filter(
										sprintf('a[href*="/%d/"]',
												$this
														->getMostRecentProgrammingJob()
														->getId()))->count()
								== 1, "jobs are sorted by date");

		// each job on the homepage is clickable and give detailed information
		$job = $this->getMostRecentProgrammingJob();
		$link = $crawler->selectLink('Web Developer')->first()->link();
		$crawler = $client->click($link);
		$this
				->assertEquals(
						'Ens\JobeetBundle\Controller\JobController::showAction',
						$client->getRequest()->attributes->get('_controller'));
		$this
				->assertEquals($job->getCompanySlug(),
						$client->getRequest()->attributes->get('company'));
		$this
				->assertEquals($job->getLocationSlug(),
						$client->getRequest()->attributes->get('location'));
		$this
				->assertEquals($job->getPositionSlug(),
						$client->getRequest()->attributes->get('position'));
		$this
				->assertEquals($job->getId(),
						$client->getRequest()->attributes->get('id'));

		// a non-existent job forwards the user to a 404
		$crawler = $client
				->request('GET', '/job/foo-inc/milano-italy/0/painter');
		$this->assertEquals(404, $client->getResponse()->getStatusCode(), "Get a 404 on a non existent job");

		// an expired job page forwards the user to a 404
		$crawler = $client
				->request('GET',
						sprintf(
								'/job/sensio-labs/paris-france/%d/web-developer-expired',
								$this->getExpiredJob()->getId()));
		$this->assertEquals(404, $client->getResponse()->getStatusCode(), "Get a 404 on an expired job url");
	}
	
	public function testJobForm()
	{
		$client = static::createClient();
	
		$crawler = $client->request('GET', '/job/new');
		$this->assertEquals('Ens\JobeetBundle\Controller\JobController::newAction', $client->getRequest()->attributes->get('_controller'));
		
		 $form = $crawler->selectButton('Preview your job')->form(array(
		    'job[company]'      => 'Sensio Labs',
		    'job[url]'          => 'http://www.sensio.com/',
		    'job[file]'         => __DIR__.'/../../../../../web/bundles/ensjobeet/images/sensio-labs.gif',
		    'job[position]'     => 'Developer',
		    'job[location]'     => 'Atlanta, USA',
		    'job[description]'  => 'You will work with symfony to develop websites for our customers.',
		    'job[how_to_apply]' => 'Send me an email',
		    'job[email]'        => 'for.a.job@example.com',
		    'job[is_public]'    => false,
		  ));
		 
		  $client->submit($form);
		  $this->assertEquals('Ens\JobeetBundle\Controller\JobController::createAction', $client->getRequest()->attributes->get('_controller'));
		  
		  $client->followRedirect();
		  $this->assertEquals('Ens\JobeetBundle\Controller\JobController::previewAction', $client->getRequest()->attributes->get('_controller'));
		  
		  $kernel = static::createKernel();
		  $kernel->boot();
		  $em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
		  
		  $query = $em->createQuery('SELECT count(j.id) from EnsJobeetBundle:Job j WHERE j.location = :location AND j.is_activated IS NULL AND j.is_public = 0');
		  $query->setParameter('location', 'Atlanta, USA');
		  $this->assertTrue(0 < $query->getSingleScalarResult());
		  
		  $crawler = $client->request('GET', '/job/new');
		  $form = $crawler->selectButton('Preview your job')->form(array(
		  		'job[company]'      => 'Sensio Labs',
		  		'job[position]'     => 'Developer',
		  		'job[location]'     => 'Atlanta, USA',
		  		'job[email]'        => 'not.an.email',
		  ));
		  $crawler = $client->submit($form);

		  $this->assertEquals(200, $client->getResponse()->getStatusCode());

		  $client->submit($form);
		  $this->assertEquals('Ens\JobeetBundle\Controller\JobController::createAction', $client->getRequest()->attributes->get('_controller'));
		  
		  // check if we have 3 errors
		  $this->assertEquals(3, $crawler->filter('.error_list')->count(), "We have 3 errors");
		  // check if we have error on job_description field
		  $this->assertEquals(1, $crawler->filter('#job_description')->siblings()->first()->filter('.error_list')->count(), "Error on job description");
		  // check if we have error on job_how_to_apply field
		  $this->assertEquals(1, $crawler->filter('#job_how_to_apply')->siblings()->first()->filter('.error_list')->count(), "Error on how_to_apply field");
		  // check if we have error on job_email field
		  $this->assertEquals(1, $crawler->filter('#job_email')->siblings()->first()->filter('.error_list')->count(), "Error on job_email field");
	}
	
	public function createJob($values = array(), $publish = false)
	{
	  $client = static::createClient();
	  $crawler = $client->request('GET', '/job/new');
	  $form = $crawler->selectButton('Preview your job')->form(array_merge(array(
	    'job[company]'      => 'Sensio Labs',
	    'job[url]'          => 'http://www.sensio.com/',
	    'job[position]'     => 'Developer',
	    'job[location]'     => 'Atlanta, USA',
	    'job[description]'  => 'You will work with symfony to develop websites for our customers.',
	    'job[how_to_apply]' => 'Send me an email',
	    'job[email]'        => 'for.a.job@example.com',
	    'job[is_public]'    => false,
	  ), $values));
	 
	  $client->submit($form);
	  $client->followRedirect();
	 
	  if($publish) {
	    $crawler = $client->getCrawler();
	    $form = $crawler->selectButton('Publish')->form();
	    $client->submit($form);
	    $client->followRedirect();
	  }
	 
	  return $client;
	}
	 
	public function getJobByPosition($position)
	{
	  $kernel = static::createKernel();
	  $kernel->boot();
	  $em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
	 
	  $query = $em->createQuery('SELECT j from EnsJobeetBundle:Job j WHERE j.position = :position');
	  $query->setParameter('position', $position);
	  $query->setMaxResults(1);
	  return $query->getSingleResult();
	}
	
	public function testPublishJob()
	{
		$client = $this->createJob(array('job[position]' => 'FOO1'));
		$crawler = $client->getCrawler();
		$form = $crawler->selectButton('Publish')->form();
		$client->submit($form);
	
		$kernel = static::createKernel();
		$kernel->boot();
		$em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
	
		$query = $em->createQuery('SELECT count(j.id) from EnsJobeetBundle:Job j WHERE j.position = :position AND j.is_activated = 1');
		$query->setParameter('position', 'FOO1');
		$this->assertTrue(0 < $query->getSingleScalarResult());
	}
	
	public function testDeleteJob()
	{
		$client = $this->createJob(array('job[position]' => 'FOO2'));
		$crawler = $client->getCrawler();
		$form = $crawler->selectButton('Delete')->form();
		$client->submit($form);
	
		$kernel = static::createKernel();
		$kernel->boot();
		$em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
	
		$query = $em->createQuery('SELECT count(j.id) from EnsJobeetBundle:Job j WHERE j.position = :position');
		$query->setParameter('position', 'FOO2');
		$this->assertTrue(0 == $query->getSingleScalarResult());
	}	
}
