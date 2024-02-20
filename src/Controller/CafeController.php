<?php

namespace App\Controller;

use App\Entity\Cafe;
use App\Form\ModifierCafeType;
use App\Repository\CafeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CafeController extends AbstractController
{
    #[Route('/liste-cafe', name: 'app_liste-cafe')]
    public function listeCafe(CafeRepository $cafeRepository): Response
    {
        $cafes = $cafeRepository->findAll();
        $form = $this->createForm(SupprimerCafeType::class, null, [
            'cafes' => $cafes,
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $selectedCafes = $form->get('cafes')->getData();
            foreach ($selectedCafes as $cafe) {
                $em->remove($cafe);
            }
            $em->flush();
            $this->addFlash('notice', 'Cafes supprimées avec succès');
            return $this->redirectToRoute('app_liste_cafe');
        }
        return $this->render('cafe/liste-cafe.html.twig', [
            'cafes' => $cafes,
            'form'=> $form->createView(),
        ]);
    }
    #[Route('/modifier-cafe/{id}', name: 'app_modifier_cafe')]
    public function modifierCategorie(Request $request, Cafe $cafe, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ModifierCafeType::class, $cafe);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($cafe);
                $em->flush();
                $this->addFlash('notice', 'Café modifiée');
                return $this->redirectToRoute('app_liste_cafe');
            }
        }
        return $this->render('cafe/modifier-cafe.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/supprimer-cafe/{id}', name: 'app_supprimer_cafe')]
    public function supprimerCategorie(Request $request, Cafe $cafe, EntityManagerInterface $em): Response
    {
        if ($cafe!= null) {
            $em->remove($cafe);
            $em->flush();
            $this->addFlash('notice', 'Café supprimée');
        }
        return $this->redirectToRoute('app_liste_cafe');
    }
}
