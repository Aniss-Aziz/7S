<?php

namespace App\Controller;

use App\Entity\Cinema;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CinemaListController extends AbstractController
{
    #[Route('/cinema', name: 'app_cinema_list')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cinemas = $entityManager->getRepository(Cinema::class)->findAll();

        return $this->render('cinema_list/index.html.twig', [
            'cinemas' => $cinemas,
        ]);
    }
}