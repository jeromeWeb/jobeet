<?php

namespace Ens\JobeetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ens\JobeetBundle\Entity\Job;
use Ens\JobeetBundle\Form\JobType;

/**
 * Job controller.
 *
 */
class JobController extends Controller
{
	/**
	 * Lists all Job entities.
	 *
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getEntityManager();

		$categories = $em->getRepository('EnsJobeetBundle:Category')->getWithJobs();

		foreach($categories as $category)
		{
			$category->setActiveJobs($em->getRepository('EnsJobeetBundle:Job')->getActiveJobs($category->getId(), $this->container->getParameter('max_jobs_on_homepage')));
			$category->setMoreJobs($em->getRepository('EnsJobeetBundle:Job')->countActiveJobs($category->getId()) - $this->container->getParameter('max_jobs_on_homepage'));
		}

		return $this->render('EnsJobeetBundle:Job:index.html.twig', array(
				'categories' => $categories
		));
	}

	/**
	 * Finds and displays a Job entity.
	 *
	 */
	public function showAction($id)
	{
	    $em = $this->getDoctrine()->getEntityManager();
	 
	    $entity = $em->getRepository('EnsJobeetBundle:Job')->getActiveJob($id);
	 
	    if (!$entity) {
	        throw $this->createNotFoundException('Unable to find Job entity.');
	    }
	 
	    $session = $this->getRequest()->getSession();
	 
	    // fetch jobs already stored in the job history
	    $jobs = $session->get('job_history', array());
	 
	    // store the job as an array so we can put it in the session and avoid entity serialize errors
	    $job = array('id' => $entity->getId(), 'position' =>$entity->getPosition(), 'company' => $entity->getCompany(), 'companyslug' => $entity->getCompanySlug(), 'locationslug' => $entity->getLocationSlug(), 'positionslug' => $entity->getPositionSlug());
	 
	    if (!in_array($job, $jobs)) {
	        // add the current job at the beginning of the array
	        array_unshift($jobs, $job);
	 
	        // store the new job history back into the session
	        $session->set('job_history', array_slice($jobs, 0, 3));
	    }
	 
	    $deleteForm = $this->createDeleteForm($id);
	 
	    return $this->render('EnsJobeetBundle:Job:show.html.twig', array(
	        'entity'      => $entity,
	        'delete_form' => $deleteForm->createView(),
	    ));
	}

	/**
	 * Displays a form to create a new Job entity.
	 *
	 */
	public function newAction()
	{
		$entity = new Job();
		$entity->setType('full-time');
		$form   = $this->createForm(new JobType(), $entity);

		return $this->render('EnsJobeetBundle:Job:new.html.twig', array(
				'entity' => $entity,
				'form'   => $form->createView(),
		));
	}

	/**
	 * Creates a new Job entity.
	 *
	 */
	public function createAction(Request $request)
	{
		$entity  = new Job();
		$form = $this->createForm(new JobType(), $entity);
		$form->bind($request);

		if ($form->isValid()) {
		    $em = $this->getDoctrine()->getEntityManager();
		 
		    $em->persist($entity);
		    $em->flush();
		 
		    return $this->redirect($this->generateUrl('ens_job_preview', array(
		      'company' => $entity->getCompanySlug(),
		      'location' => $entity->getLocationSlug(),
		      'token' => $entity->getToken(),
		      'position' => $entity->getPositionSlug()
		    )));
		}

		return $this->render('EnsJobeetBundle:Job:new.html.twig', array(
				'entity' => $entity,
				'form'   => $form->createView(),
		));
	}

	/**
	 * Displays a form to edit an existing Job entity.
	 *
	 */
	public function editAction($token)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('EnsJobeetBundle:Job')->findOneByToken($token);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Job entity.');
		}

		if ($entity->getIsActivated()) {
			throw $this->createNotFoundException('Job is activated and cannot be edited.');
		}		
		
		$editForm = $this->createForm(new JobType(), $entity);
		$deleteForm = $this->createDeleteForm($token);

		return $this->render('EnsJobeetBundle:Job:edit.html.twig', array(
				'entity'      => $entity,
				'edit_form'   => $editForm->createView(),
				'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Edits an existing Job entity.
	 *
	 */
	public function updateAction(Request $request, $token)
	{
		$em = $this->getDoctrine()->getManager();

		$entity = $em->getRepository('EnsJobeetBundle:Job')->findOneByToken($token);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Job entity.');
		}

		$deleteForm = $this->createDeleteForm($token);
		$editForm = $this->createForm(new JobType(), $entity);
		$editForm->bind($request);

		if ($editForm->isValid()) {
			$em->persist($entity);
			$em->flush();

			return $this->redirect($this->generateUrl('ens_job_preview', array(
					'company' => $entity->getCompanySlug(),
					'location' => $entity->getLocationSlug(),
					'token' => $entity->getToken(),
					'position' => $entity->getPositionSlug()
			)));			
		}

		return $this->render('EnsJobeetBundle:Job:edit.html.twig', array(
				'entity'      => $entity,
				'edit_form'   => $editForm->createView(),
				'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Deletes a Job entity.
	 *
	 */
	public function deleteAction(Request $request, $token)
	{
		$form = $this->createDeleteForm($token);
		$form->bind($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('EnsJobeetBundle:Job')->findOneByToken($token);

			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Job entity.');
			}

			$em->remove($entity);
			$em->flush();
		}

		return $this->redirect($this->generateUrl('ens_job'));
	}

	private function createDeleteForm($token)
	{
		return $this->createFormBuilder(array('token' => $token))
		->add('token', 'hidden')
		->getForm()
		;
	}
	
	public function previewAction($token)
	{
		$em = $this->getDoctrine()->getEntityManager();
	
		$entity = $em->getRepository('EnsJobeetBundle:Job')->findOneByToken($token);
	
		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Job entity.');
		}
	
		  $deleteForm = $this->createDeleteForm($entity->getId());
		  $publishForm = $this->createPublishForm($entity->getToken());
  	
		  return $this->render('EnsJobeetBundle:Job:show.html.twig', array(
		    'entity'      => $entity,
		    'delete_form' => $deleteForm->createView(),
		    'publish_form' => $publishForm->createView(),
		  ));
	}
	
	public function publishAction($token)
	{
		$form = $this->createPublishForm($token);
		$request = $this->getRequest();
	
		$form->bindRequest($request);
	
		if ($form->isValid()) {
			$em = $this->getDoctrine()->getEntityManager();
			$entity = $em->getRepository('EnsJobeetBundle:Job')->findOneByToken($token);
	
			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Job entity.');
			}
	
			$entity->publish();
			$em->persist($entity);
			$em->flush();
	
			$this->get('session')->setFlash('notice', 'Your job is now online for 30 days.');
		}
	
		return $this->redirect($this->generateUrl('ens_job_preview', array(
				'company' => $entity->getCompanySlug(),
				'location' => $entity->getLocationSlug(),
				'token' => $entity->getToken(),
				'position' => $entity->getPositionSlug()
		)));
	}
	
	private function createPublishForm($token)
	{
		return $this->createFormBuilder(array('token' => $token))
		->add('token', 'hidden')
		->getForm()
		;
	}	
}
