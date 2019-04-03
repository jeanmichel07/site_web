<?php
/**
 * Created by PhpStorm.
 * User: tombo
 * Date: 03/04/2019
 * Time: 09:02
 */

namespace App\Controller\api;


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

    public function __construct(RecrutmentRepository $recrutmentRepository)
    {
        $this->recrutmentRepository = $recrutmentRepository;
    }

    /**
     * @return JsonResponse
     * @Rest\Get("/read/recrutement")
     */
    public function read():JsonResponse
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
}