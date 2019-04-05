<?php
/**
 * Created by PhpStorm.
 * User: tombo
 * Date: 03/04/2019
 * Time: 09:02
 */

namespace App\Controller\api;


use App\Entity\Devis;
use App\Entity\Visitor;
use App\Repository\EquipeRepository;
use App\Repository\RecrutmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class ApiController
 * @package App\Controller\api
 * @Route("/api")
 */
class ApiController extends AbstractController
{
    /**
     * @var RecrutmentRepository
     */
    private $recrutmentRepository;
    /**
     * @var EquipeRepository
     */
    private $equipeRepository;

    public function __construct(RecrutmentRepository $recrutmentRepository,EquipeRepository $equipeRepository)
    {
        $this->recrutmentRepository = $recrutmentRepository;
        $this->equipeRepository = $equipeRepository;
    }

    /**
     * @return JsonResponse
     * @Rest\Get("/read/recrutement")
     */
    public function readRecrutement():JsonResponse
    {
        $post=$this->recrutmentRepository->findAll();
        if (empty($post)) {
            return new JsonResponse(['message' => 'Recrutement not found'], Response::HTTP_OK);
        }else{
            $formatted=[];
            foreach ($post as $posts)
            {
                $formatted[]=[
                    'id'=>$posts->getId(),
                    'post'=>$posts->getPost(),
                    'profile'=>$posts->getProfil(),
                    'mission'=>$posts->getMission()
                ];
            }

            return new JsonResponse($formatted);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     *@Rest\Post("/create/visitor")
     */
    public function visitor(Request $request):JsonResponse
    {
        $visitor=new Visitor();
        if (!empty($request->get('name')) && !empty($request->get('telephone')) && !empty($request->get('email')) && !empty($request->get('message')))
        {
            $visitor->setName($request->get('name'));
            $visitor->setTelephone($request->get('telephone'));
            $visitor->setEmail($request->get('email'));
            $visitor->setMessage($request->get('message'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($visitor);
            $em->flush();
            return new JsonResponse(['message' => 'Visiteur inserée'], Response::HTTP_OK);

        }else{
            return new JsonResponse(['message' => 'Veuillez remplir tous les champ','test'=>$request->get('name')], Response::HTTP_OK);
        }
    }


    /**
     * @param Request $request
     * @return JsonResponse
     *@Rest\Post("/create/devis")
     */
    public function devis(Request $request):JsonResponse
    {
        $visitor=new Devis();
        if (!empty($request->get('nom_societe')) && !empty($request->get('telephone')) && !empty($request->get('description')) && !empty($request->get('piece_joint')))
        {
            $visitor->setNomSociete($request->get('name'));
            $visitor->setTelephone($request->get('telephone'));
            $visitor->setDescription($request->get('description'));
            $visitor->setPieceJointe($request->get('piece_joint'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($visitor);
            $em->flush();
            return new JsonResponse(['message' => 'Visiteur inserée'], Response::HTTP_OK);

        }else{
            return new JsonResponse(['message' => 'Veuillez remplir tous les champ','test'=>$request->get('name')], Response::HTTP_OK);
        }
    }


    /**
     * @return JsonResponse
     * @Rest\Get("/read/equipe")
     */
    public function readEquipe():JsonResponse
    {
        $post=$this->equipeRepository->findAll();
        if (empty($post)) {
            return new JsonResponse(['message' => 'Recrutement not found'], Response::HTTP_OK);
        }else{
            $formatted=[];
            foreach ($post as $posts)
            {
                $formatted[]=[
                    'id'=>$posts->getId(),
                    'nom'=>$posts->getNom(),
                    'poste'=>$posts->getPoste(),
                    'image'=>$posts->getImage()
                ];
            }

            return new JsonResponse($formatted);
        }
    }
}