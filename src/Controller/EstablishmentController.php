<?php

namespace App\Controller;

use App\Repository\EstablishmentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EstablishmentController extends AbstractController
{
    #[Route('/etablissement', name: 'establishment.index', methods:['GET'])]
    public function index(
        EstablishmentRepository $repository,
        Request $request
    ): Response {

        $establishments = 
        $repository->findAll();
        return $this->render('pages/establishment/index.html.twig', [
            'establishment' => $establishments
        ]);
    }

    // #[Route('/etablissement/inscription', name: 'establishment.register', methods: ['GET', 'POST'])]
    // public function register();
}
