<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Repository\EquipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipeController extends AbstractController
{

    /**
     * @var EquipeRepository
     */
    private $equipeRepository;

    public function __construct(EquipeRepository $equipeRepository)
    {
        $this->equipeRepository = $equipeRepository;
    }

    /**
     * @Route("/equipe", name="equipe")
     */
    public function index()
    {
        return $this->render('equipe/login.html.twig', [
            'controller_name' => 'EquipeController',
        ]);
    }

    /**
     * @Route("/create/equipe", name="create_equipe")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function create(Request $request)
    {
        $equipe=new Equipe();
        $form=$this->createFormBuilder($equipe)
            ->add('nom',TextType::class,[
                'attr'=>[
                    'placeholder'=>'Nom'
                ]
            ])
            ->add('poste',TextType::class,[
                'attr'=>[
                    'placeholder'=>'Poste'
                ]
            ])
            ->add('image',FileType::class,[
                'required'=>false,
                'label'=>'Image',
            ])
            ->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em=$this->getDoctrine()->getManager();

                $file=$equipe->getImage();
                $filename=md5(uniqid()).'.'.$file->guessExtension();
                $file->move($this->getParameter('upload_directory'), $filename);
                $equipe->setImage($filename);

            $em->persist($equipe);
            $em->flush();
            return $this->redirectToRoute('read_equipe');
        }

        return $this->render('equipe/create.html.twig',['form'=>$form->createView()]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/read/equipe", name="read_equipe")
     */
    public function read()
    {
        $equipe=$this->equipeRepository->findAll();

        return $this->render('equipe/read.html.twig',['equipe'=>$equipe]);
    }

    /**
     * @Route("/show/equipe/{id}", name="show_equipe")
     * @param Equipe $equipe
     * @return Response
     */
    public function show(Equipe $equipe):Response
    {
        return $this->render('equipe/show.html.twig',[
            'e'=>$equipe
        ]);
    }
}
