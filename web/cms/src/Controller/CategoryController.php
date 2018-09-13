<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Categories;
use Doctrine\Common\Persistence\ObjectManager;



class CategoryController extends Controller
{

	public function index()
	{
		$manager = $this->getDoctrine()->getManager();
		$categories = $manager->getRepository('App:Categories')->findAll();

		return $this->render('category/index.html.twig', [
			'categories' => $categories
		]);
	}

	public function update($id)
	{
		$entityManager = $this->getDoctrine()->getManager();
		$categpry = $entityManager->getRepository('App:Categories')->find($id);
	
		if (!$category) {
			throw $this->createNotFoundException(
				'No category found for id '.$id
			);
		}
	
		$category->setTitle('New Category name!');
		$entityManager->flush();
	
		return $this->redirectToRoute('category_show', [
			'id' => $product->getId()
		]);
	}
}
