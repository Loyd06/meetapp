<?php

namespace App\Controller;

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
}
