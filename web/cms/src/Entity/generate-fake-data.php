<?php 
require_once '../../vendor/fzaninotto/faker/src/autoload.php';
$generator = \Faker\Factory::create();
$populator = new Faker\ORM\Doctrine\Populator($generator);


$populator->addEntity('Users', 5,  array(
    'email' => function() use ($generator) { return $generator->ean8(); },  
    'password' => function() use ($generator) { return $generator->password(); }, 
    'name' => function() use ($generator) { return $generator->firstName(); },
    'surname' => function() use ($generator) { return $generator->lastName(); },
    'status' => null,
    'creatededDate' => function() use ($generator) { return $generator->dateTime(); },
    'updatedDate' => function() use ($generator) { return $generator->dateTime(); }    
  ));

$insertedPKs = $populator->execute();






