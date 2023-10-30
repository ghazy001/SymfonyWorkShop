<?php

namespace App\Controller;

use App\Entity\Foie;
use App\Form\FoieType;
use App\Repository\FoieRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FoieController extends AbstractController
{
    #[Route('/foie', name: 'app_foie')]
    public function index(): Response
    {
        return $this->render('foie/index.html.twig', [
            'controller_name' => 'FoieController',
        ]);
    }

    #[Route('/affiche', name: 'affiche')]
    public function read(FoieRepository $repository): Response
    {
        $data=$repository->findAll();


        return $this->render('foie/affiche.html.twig', [
            'data' => $data,
        ]);
    }
    #[Route('/add', name: 'add')]
    public function add(ManagerRegistry $managerRegistry,Request $request): Response
    {
        $foie=new Foie();
        $form=$this->createForm(FoieType::class,$foie);
        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){

            $em=$managerRegistry->getManager();
            $em->persist($foie);
            $em->flush();
             return $this->redirectToRoute('affiche');

        }



        return $this->renderForm('foie/add.html.twig', ['form'=> $form,'foie'=>$foie

        ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function edit(ManagerRegistry $managerRegistry,FoieRepository $repository,$id,Request $request): Response
    {
        $data=$repository->find($id);

        $form=$this->createForm(FoieType::class,$data);

        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){

            $em=$managerRegistry->getManager();

            $em->flush();

            return $this->redirectToRoute('affiche');
        }




        return $this->renderForm('foie/add.html.twig', [
            'form' => $form,'data'=>$data
        ]);
    }


    #[Route('/delete/{i}', name: 'delete')]
    public function delete(FoieRepository $repository,ManagerRegistry $managerRegistry,$i): Response
    {
        $data=$repository->find($i);
        $em=$managerRegistry->getManager();
        $em->remove($data);
        $em->flush();

        return $this->redirectToRoute('affiche');
    }


}
