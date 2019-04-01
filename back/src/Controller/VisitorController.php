<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VisitorController extends AbstractController
{
    /**
     * @Route("/visitor", name="visitor")
     */
    public function index()
    {
        return $this->render('visitor/login.html.twig', [
            'controller_name' => 'VisitorController',
        ]);
    }
}
