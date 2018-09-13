<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Products;
use Doctrine\Common\Persistence\ObjectManager;



class ProductController extends Controller
{

	public function index()
	{
		$manager = $this->getDoctrine()->getManager();
		
		$products = $manager->getRepository('App:Products')->findAll();
		return $this->render('product/index.html.twig', [
			'products' => $products
		]);
	}
}
