<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    #[Route('/categories', name: 'app_categories', methods: ["GET"])]
    public function listeCategories(CategorieRepository $repo): Response
    {
        $categories = $repo->findAll();
        return $this->render('categorie/listeCategories.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/categorie/{id}', name: 'app_categorie', methods: ["GET"])]
    public function ficheCategorie(Categorie $categorie): Response
    {
        // mise en oeuvre du ParamConverter
        return $this->render('categorie/ficheCategorie.html.twig', [
            'categorie' => $categorie,
        ]);
    }


}
