<?php
namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
	public function load(ObjectManager $manager) {
		$category = new Categories;
		$faker = \Faker\Factory::create();
		
		for ($i = 0; $i <= 10; $i++) {
			$category->setTitle($faker->colorName);
			$category->setStatus("active");
			
			$category->setCreatedDate(new \DateTime()); 
			$category->setUpdatedDate(new \DateTime());
			
			$manager->persist($category);
			
		}
		$manager->flush();
			
	  
	}
}