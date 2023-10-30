<?php

namespace App\Controller;

use App\Entity\Chauffeur;
use App\Form\ChauffeurType;
use App\Repository\ChauffeurRepository;


use App\Repository\FoieRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use ymfony\Component\Form\FormView;

class ChauffeurController extends AbstractController
{
    #[Route('/chauffeur', name: 'app_chauffeur')]
    public function index(): Response
    {
        return $this->render('chauffeur/index.html.twig', [
            'controller_name' => 'ChauffeurController',
        ]);
    }
    #[Route('/affichec', name: 'affichec')]
    public function affiche(ChauffeurRepository $repository): Response
    {
        $data=$repository->findAll();


        return $this->render('chauffeur/affichec.html.twig', [
            'data' => $data,
        ]);
    }
    #[Route('/addc', name: 'addc')]
    public function addc(ManagerRegistry $managerRegistry,Request $request): Response
    {
        $chauffeur= new Chauffeur();
        $form=$this->createForm(ChauffeurType::class,$chauffeur);
        $form->handleRequest($request);


        if($form->isSubmitted()&&$form->isValid()){
            $em=$managerRegistry->getManager();
            $em->persist($chauffeur);
            $em->flush();

            return $this->redirectToRoute('affichec');

        }



        return $this->renderForm('chauffeur/addc.html.twig', [
            'form' => $form,'chauffeur'=>$chauffeur,
        ]);
    }
    #[Route('/editc/{id}', name: 'editc')]
    public function editc(ManagerRegistry $managerRegistry,Request $request,ChauffeurRepository $repository,$id): Response
    {
          $chauffeur=$repository->find($id);

        $form=$this->createForm(ChauffeurType::class,$chauffeur);
        $form->handleRequest($request);


        if($form->isSubmitted()&&$form->isValid()){
            $em=$managerRegistry->getManager();
            $em->flush();

            return $this->redirectToRoute('affichec');

        }



        return $this->renderForm('chauffeur/addc.html.twig', [
            'form' => $form,'chauffeur'=>$chauffeur,
        ]);
    }


    #[Route('/deletec/{i}', name: 'deletec')]
    public function delete(ChauffeurRepository $repository,ManagerRegistry $managerRegistry,$i): Response
    {
        $data=$repository->find($i);
        $em=$managerRegistry->getManager();
        $em->remove($data);
        $em->flush();

        return $this->redirectToRoute('affichec');
    }
}
