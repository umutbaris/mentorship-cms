<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Products;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;




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

	 /**
	 * @param Request  $request
	 * @param Products $product
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 *
	 * @Route("/delete/{product}", name="delete")
	 */
	public function deleteAction(Request $request, Products $product)
	{
		if ($product === null) {
			return $this->redirectToRoute('product');
		}
		$em = $this->getDoctrine()->getManager();
		$em->remove($product);
		$em->flush();
		return $this->redirectToRoute('product');
	}

}
