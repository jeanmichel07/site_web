<?php

namespace App\Controller;

use App\Entity\Recrutment;
use App\Repository\RecrutmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RecrutmentController extends AbstractController
{
    /**
     * @var RecrutmentRepository
     */
    private $recrutmentRepository;

    public function __construct(RecrutmentRepository $recrutmentRepository)
    {
        $this->recrutmentRepository = $recrutmentRepository;
    }

    /**
     * @Route("/affiche/recrutement", name="affiche_recrut")
     */
    public function read()
    {
        $recru=$this->recrutmentRepository->findAll();
        return $this->render('recrutment/read.html.twig',['recrut'=>$recru]);
    }

    /**
     * @Route("/ajouter/recrutement", name="ajout_recrutement")
     */
    public function create()
    {
        $recrutement=new Recrutment();

        $form= $this->createFormBuilder();

    }

}
