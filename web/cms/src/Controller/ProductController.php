<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Products;
use App\Form\Type\Product;
use Symfony\Component\HttpFoundation\Request;



class ProductController extends Controller
{

	public function index()
	{
		$manager = $this->getDoctrine()->getManager();
		
		$products = $manager->getRepository('App:Products')->findAll();
		return $this->render('product/index2.html.twig', [
			'products' => $products
		]);
	}

	/**
	 * @param Request $request
	 */
	public function createAction(Request $request)
	{
		$form = $this->createForm(Product::class);
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			/**
			 * @var $product Product
			 */
			$product = $form->getData();
			$em = $this->getDoctrine()->getManager();
			$em->persist($product);
			$em->flush();

			return $this->redirectToRoute('edit', [
				'product' => $product->getId(),
			]);
		}
		return $this->render('product/create.html.twig', [
			'form' => $form->createView()
		]);
	}

	 /**
	 * @param Request  $request
	 * @param Products $product
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 *
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

	/**
	 * @param Request  $request
	 * @param Products $product
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 *
	 */
	public function editAction(Request $request, Products $product) {
		$form = $this->createForm(Product::class, $product);
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();

			return $this->redirectToRoute('product');
			
		}
		return $this->render('product/edit.html.twig', [
			'form' => $form->createView()
		]);
	}

}
