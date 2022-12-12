<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;
use App\Entity\MealPlan;
use App\Entity\Recipe;
use App\Entity\RecipeManager;
use App\Entity\Users;

class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $recipe = $doctrine->getRepository(Recipe::class)->findAll();

        dd($recipe);
        return $this->render('main/index.html.twig', [
            "recipe" => $recipe
        ]);
    }
}
