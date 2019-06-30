<?php

declare(strict_types = 1);


namespace App\Controller;

use App\Service\Dao\PizzeriaDao;
use App\Service\Dao\PizzaDao;
use App\Entity\Pizza;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PizzeriaController
 * @package App\Controller
 */
class PizzeriaController extends AbstractController
{
    /**
     * @param PizzeriaDao $pizzeriaDao
     * @Route("/pizzerias")
     * @return Response
     */
    public function listeAction(PizzeriaDao $pizzeriaDao): Response
    {
        // récupération des différentes pizzéria de l'application
        $pizzerias = $pizzeriaDao->getAllPizzerias();

        return $this->render("Pizzeria/liste.html.twig", [
            "pizzerias" => $pizzerias,
        ]);
    }

    /**
     * @param int $pizzeriaId
     * @Route(
     *     "/pizzerias/carte-{pizzeriaId}",
     *     requirements={"pizzeriaId": "\d+"}
     * )
     * @return Response
     */
    public function detailAction(int $pizzeriaId, PizzeriaDao $pizzeriaDao, PizzaDao $pizzaDao): Response
    {
        $pizzas = $pizzaDao->getAllPizzas();
        $id_pizza = array();
        $nom_pizza = array();
        $prix = array();
        $detail_pizzeria = $pizzeriaDao->getCartePizzeria($pizzeriaId);
        $mesPizzas = $detail_pizzeria->getPizzas();
        $Marge = $detail_pizzeria->getMarge();
        foreach ($mesPizzas as $key) {
          array_push($id_pizza, $key->getId());
          array_push($nom_pizza, $key->getNom());
        }
        for ($i=0; $i < count($id_pizza); $i++) {
          $prix[$i] = $pizzaDao->getPrixFabrication($id_pizza[$i]) + $Marge;
        }
        return $this->render("Pizzeria/carte.html.twig", [
            "pizzerias" => $detail_pizzeria,
            "prix" => $prix,
            "nom_pizza" => $nom_pizza,
        ]);
        return new Response("Carte de la pizzéria {$pizzeriaId}");
    }
}
