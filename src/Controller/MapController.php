<?php

namespace App\Controller;

use App\Repository\MapRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MapController extends AbstractController
{
    #[Route('/carte', name: 'map.index', methods: ['GET'])]
    public function index(
        MapRepository $repository,
        Request $request
    ): Response {

        $maps = 
        $repository->findAll();
        return $this->render('pages/map/index.html.twig', [
            'map' => $maps,
        ]);
    }
}
