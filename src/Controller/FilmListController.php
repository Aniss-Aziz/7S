<?php

namespace App\Controller;

use App\Entity\Film;
use App\Classe\Search;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class FilmListController extends AbstractController
{
    #[Route('/film', name: 'app_film_list')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);
        $accessibilite = $request->query->get('accessibilite');
        if ($accessibilite) {
            $films = $entityManager->getRepository(Film::class)->findByAccessibilite($accessibilite);
        } else {
            $films = $entityManager->getRepository(Film::class)->findAll();
        }
        return $this->render('film_list/index.html.twig', ['films' => $films, 'selected_accessibilite' => $accessibilite,]);
    }

    #[Route('film/{id}', name: 'app_film_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response
    {
        $film = $entityManager->getRepository(Film::class)->find($id);
        if (!$film) {
            throw $this->createNotFoundException('Le film n\'existe pas.');

        }
        $cinemas = $film->getCinemas();

        return $this->render('film_list/show.html.twig', ['film' => $film, 'cinemas' => $cinemas]);
    }
}
