<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Procede; 
use App\Exception\FormExeption; 
use App\Form\ProcedeType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ProcedeRepository ; 
use JMS\Serializer\SerializerInterface;

class ProcedeController extends AbstractController
{
   
    public function __construct(ProcedeRepository $repository ,  EntityManagerInterface  $entityManager )
    {
        $this-> repository= $repository;
        $this->entityManager =  $entityManager;
    }
    public function index(ProcedeRepository $repository)
    {
        $Procede = $repository->transformAll();
        return $this->respond($Procede);
    }

     /**
     * @Route("/procede", name="createProcede",methods="POST")
     */

    public function createProcede(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $procede = new Procede();
        $form = $this->createForm(ProcedeType::class,$procede);
   
           $form->submit($data);
   
           if ($form->isSubmitted() && $form->isValid())
           {
            $entityManager  = $this->getDoctrine()->getManager();

            $entityManager ->persist($procede);

            $entityManager ->flush();
             
           }
           $response = array(
           
            'code' => 0,
            'message' => 'created with success!',
            'errors' => null, 
            'result' => null
    
        );  
            
           return new JsonResponse($response, Response::HTTP_CREATED);
    }
    /**
     * @Route("/procede/{id}", name="show",methods="GET")
     */
    public function show(int $id): Response
    {
        $procede= $this->getDoctrine()
            ->getRepository(Procede::class)
            ->find($id);

        if (!$procede) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        
        return new Response('Check out this Procede: '.$procede->getNom());
    }

    /**
     * @Route("/procede/{id}",name="update", methods="PUT")
     */
    public function update(int $id ,Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        
         $procede = $this->getDoctrine()
         ->getRepository(Procede::class)
         ->find($id);
         if (!$procede) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
    $form = $this->createForm(ProcedeType::class,$procede);
    $form-> handleRequest($request);
    $form->submit($data);
    if($form->isSubmitted() && $form->isValid()){
      

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();}
        $response = array(

            'code' => 0,
            'message' => 'update with success!',
            'errors' => null, 
            'result' => null
    
        );
        return new JsonResponse($response, Response::HTTP_CREATED);
         
    }

  /**
   
     * @Route("/procede/{id}", name="deleteProcede",methods={"DELETE"})
     *

     */
    public function deleteProcede($id):JsonResponse
    {

        $procede = new Procede();
       $entityManager = $this->getDoctrine()->getManager();
       $procede = $this->getDoctrine()
      ->getRepository(Procede::class)
      ->find($id);
        $entityManager->remove($procede);
        $entityManager->flush();
        return new JsonResponse(['status' => 'Procede deleted']);
    }
}
