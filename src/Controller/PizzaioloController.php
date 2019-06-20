<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Service\Dao\PizzaioloDao;
use App\Service\Dao\PizzeriaDao;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PizzaioloController
 * @package App\Controller
 */
class PizzaioloController extends AbstractController
{
    /**
     * @param PizzeriaDao $pizzaioloDao
     * @Route("/pizzaiolos/disponibles")
     * @return Response
     */
    public function disponiblesAction(PizzaioloDao $pizzaioloDao): Response
    {
        // récupération des pizzaiolos
        $pizzaiolos = $pizzaioloDao->getAllPizzaiolos();

        return $this->render("Pizzaiolo/liste.html.twig", [
            "pizzaiolos" => $pizzaiolos,
        ]);
    }
}
