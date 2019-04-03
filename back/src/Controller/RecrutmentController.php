<?php

namespace App\Controller;

use App\Entity\Recrutment;
use App\Repository\RecrutmentRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecrutmentController extends AbstractController
{
    /**
     * @var RecrutmentRepository
     */
    private $recrutmentRepository;
    private $em;

    public function __construct(RecrutmentRepository $recrutmentRepository, ObjectManager $em)
    {
        $this->recrutmentRepository = $recrutmentRepository;
        $this->em = $em;
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
    public function create(Request $request)
    {
        $recrutement=new Recrutment();

        $form= $this->createFormBuilder($recrutement)
        ->add('post',TextType::class,[
            'attr'=>[
                'placeholder'=>'Poste',
            ],
            'label'=>'Poste'
        ])
        ->add('profil', TextareaType::class,[
            'attr'=>[
                'placeholder'=>'Profile...'
            ]
        ])
        ->add('mission',TextareaType::class,[
            'attr'=>[
                'placeholder'=>'Mission...'
            ]
        ])
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($recrutement);
            $em->flush();
            return $this->redirectToRoute('affiche_recrut');
        }
        return $this->render('recrutment/create.html.twig',['form'=>$form->createView()]);

    }

    /**
     * @param Recrutment $recrutment
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/update/recrutment/{id}", name="update_recrutment")
     */
    public function update(Recrutment $recrutment, Request $request)
    {
        $form=$this->createFormBuilder($recrutment)
            ->add('post')
            ->add('profil')
            ->add('mission')
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            return $this->redirectToRoute("affiche_recrut");
        }
        return $this->render('recrutment/update.html.twig',[
            'pro'=>$recrutment,
            'form'=>$form->createView()]);
    }

    /**
     * @Route("/show/recrutment/{id}", name="show_recrutment")
     * @param Recrutment $recrutment
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Recrutment $recrutment):Response
    {
        return $this->render('recrutment/show.html.twig',[
            'recrut'=>$recrutment
        ]);
    }

}
