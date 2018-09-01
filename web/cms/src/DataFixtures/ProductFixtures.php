<?php
namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Categories;

class ProductFixtures extends Fixture
{
	public function load(ObjectManager $manager) {
		
		$categories = $manager->getRepository('App:Categories')->findAll();
		foreach($categories as $category){
			for ($i = 0; $i <= 10; $i++) {
				$product = new Products;		
				$faker = \Faker\Factory::create();
				$product->setTitle($faker->word);
				$product->setDescription($faker->sentence);
				$product->setPrice($faker->randomDigit);
				$product->setPriceCurrency($faker->currencyCode);
				$product->setColor($faker->colorName);
				$product->setImage($faker->imageUrl());
				$product->addCategory($category);
				$product->setCreatedDate(new \DateTime()); 
				$product->setUpdatedDate(new \DateTime());
				
				$manager->persist($product);
			}
		}
		$manager->flush();
	}
}