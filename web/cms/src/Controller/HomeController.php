<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return $this->render('home/index2.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
