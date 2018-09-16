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
		return $this->render('product/index2.html.twig', [
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

	/**
	 * @param Request  $request
	 * @param Products $product
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 *
	 * @Route("/edit/{product}", name="edit")
	 */
	public function editAction(Request $request, Products $product) {
		$form = $this->createForm(Products::class, $product);
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();
			// for now
			return $this->redirectToRoute('edit', [
				'products' => $product->getId(),
			]);
		}
		return $this->render('product/index2.html.twig', [
			'form' => $form->createView()
		]);
	}

}
