<?php

namespace App\Controller;

use App\Entity\Bus;
use App\Entity\Foie;
use App\Form\BusType;
use App\Form\FoieType;
use App\Repository\BusRepository;
use App\Repository\FoieRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BusController extends AbstractController
{
    #[Route('/bus', name: 'app_bus')]
    public function index(): Response
    {
        return $this->render('bus/index.html.twig', [
            'controller_name' => 'BusController',
        ]);
    }
    #[Route('/afficheb', name: 'afficheb')]
    public function read(BusRepository $repository): Response
    {
        $data=$repository->findAll();


        return $this->render('bus/afficheb.html.twig', [
            'data' => $data,
        ]);
    }
    #[Route('/addb', name: 'addb')]
    public function add(ManagerRegistry $managerRegistry,Request $request): Response
    {
        $bus=new Bus();
        $form=$this->createForm(BusType::class,$bus);
        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){

            $em=$managerRegistry->getManager();
            $em->persist($bus);
            $em->flush();
            return $this->redirectToRoute('afficheb');

        }



        return $this->renderForm('bus/addb.html.twig', ['form'=> $form,'bus'=>$bus

        ]);
    }

    #[Route('/editb/{id}', name: 'editb')]
    public function edit(ManagerRegistry $managerRegistry,BusRepository $repository,$id,Request $request): Response
    {
        $data=$repository->find($id);

        $form=$this->createForm(BusType::class,$data);

        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){

            $em=$managerRegistry->getManager();

            $em->flush();

            return $this->redirectToRoute('afficheb');
        }




        return $this->renderForm('bus/addb.html.twig', [
            'form' => $form,'data'=>$data
        ]);
    }


    #[Route('/deleteb/{i}', name: 'deleteb')]
    public function delete(BusRepository $repository,ManagerRegistry $managerRegistry,$i): Response
    {
        $data=$repository->find($i);
        $em=$managerRegistry->getManager();
        $em->remove($data);
        $em->flush();

        return $this->redirectToRoute('afficheb');
    }



}
