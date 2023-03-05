<?php

namespace App\Controller;

use App\Entity\Membre;
use App\Repository\MembreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MembreController extends AbstractController
{
    #[Route('/membres', name: 'app_membres')]
    public function index(MembreRepository $repo): Response
    {
        $membres = $repo->findAll();
        //dd($membres);
        return $this->render('membre/listeMembres.html.twig', [
            'membres' => $membres 
        ]);
    }

    #[Route('/membre/{id}', name: 'app_membre', methods: ["GET"])]
    public function ficheMembre(Membre $membre): Response
    {
        //dd($membre);
        return $this->render('membre/ficheMembre.html.twig', [
            'membre' => $membre,
        ]);
    }

    #[Route('/membres/sexe/{sexe}', name: 'app_membresBySexe', methods: ["GET"])]
    public function membresBySexe($sexe, MembreRepository $repo): Response
    {
        $membres = $repo->findBy(
            ['sexe' => $sexe],
            ['nom' => 'ASC']
        );
        return $this->render('membre/listeMembres.html.twig', [
            'membres' => $membres,
        ]);
    }

}
