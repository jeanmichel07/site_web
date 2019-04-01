<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecrutmentController extends AbstractController
{
    /**
     * @Route("/recrutment", name="recrutment")
     */
    public function index()
    {
        return $this->render('recrutment/login.html.twig');
    }

}
