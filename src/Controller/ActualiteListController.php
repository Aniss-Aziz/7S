<?php

namespace App\Controller;

use App\Entity\Actualite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ActualiteListController extends AbstractController
{
    #[Route('/actualites', name: 'app_actualite_list')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        // Filtre dynamique, par exemple 'auteur' ou 'date'
        $auteur = $request->query->get('auteur');
        $date = $request->query->get('date');

        if ($auteur) {
            $actualites = $entityManager->getRepository(Actualite::class)->findBy(['auteur' => $auteur], ['datePublication' => 'DESC']);
        } elseif ($date) {
            $actualites = $entityManager->getRepository(Actualite::class)->findBy(['datePublication' => new \DateTime($date)], ['datePublication' => 'DESC']);
        } else {
            $actualites = $entityManager->getRepository(Actualite::class)->findBy([], ['datePublication' => 'DESC']);
        }

        return $this->render('actualite_list/index.html.twig', [
            'actualites' => $actualites,
            'selected_auteur' => $auteur,
            'selected_date' => $date,
        ]);
    }
    #[Route('/actualite/{id}', name: 'app_actualite_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $actualite = $entityManager->getRepository(Actualite::class)->find($id);

        if (!$actualite) {
            throw $this->createNotFoundException('Actualité non trouvée.');
        }

        return $this->render('actualite_list/show.html.twig', [
            'actualite' => $actualite,
        ]);
    }

}
