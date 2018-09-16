<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Product extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('title', TextType::class)	
			->add('description', TextType::class)
			->add('price', TextType::class)
			->add('priceCurrency', TextType::class)
			->add('color', TextType::class)
			->add('submit', SubmitType::class)
		;
	}

	public function getName()
	{
		return 'product';
	}
}