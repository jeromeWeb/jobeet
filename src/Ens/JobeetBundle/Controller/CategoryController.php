<?php 

namespace Ens\JobeetBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ens\JobeetBundle\Entity\Category;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{
	public function showAction($slug)
	{
		$em = $this->getDoctrine()->getEntityManager();
		
		$category = $em->getRepository('EnsJobeetBundle:Category')->findOneBySlug($slug);
		
		if (!$category) {
			throw $this->createNotFoundException('Unable to find Category entity.');
		}
		
		$category->setActiveJobs($em->getRepository('EnsJobeetBundle:Job')->getActiveJobs($category->getId()));
		
		return $this->render('EnsJobeetBundle:Category:show.html.twig', array(
				'category' => $category,
		));		
	}
}