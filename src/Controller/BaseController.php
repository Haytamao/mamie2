<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CafeType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cafe;
use Doctrine\ORM\EntityManagerInterface;

class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
        ]);
    }
    #[Route('/menu', name: 'app_menu')]
    public function menu(): Response
    {
        return $this->render('base/menu.html.twig', [
        ]);
    }
    #[Route('/boisson', name: 'app_boisson')]
    public function boisson(): Response
    {
        return $this->render('base/boisson.html.twig', [
        ]);
    }
    #[Route('/ajout_boisson', name: 'app_ajout_boisson')]
    public function ajoutBoisson(Request $request, EntityManagerInterface $em): Response
    {
        $cafe = new Cafe();
        $form = $this->createForm(CafeType::class,$cafe);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($cafe);
                $em->flush();
                $this->addFlash('notice','Message envoyé');
                return $this->redirectToRoute('app_ajout_boisson');
            }
            }
        return $this->render('base/ajout-boisson.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
