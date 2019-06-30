<?php

namespace App\Service\Dao;

use App\Entity\Pizza;
use App\Repository\PizzaRepository;

/**
 * Class PizzaDao
 * @package App\Service\Dao
 */
class PizzaDao
{
    /** @var PizzaRepository */
    private $repository;

    /**
     * PizzaDao constructor.
     * @param PizzaRepository $repository
     */
    public function __construct(PizzaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function getAllPizzas(): array
    {
        // appel à la méthode du répository et renvoi du résultat
        return $this->repository->findAll();
    }

    /**
     * @param int $pizzaId
     * @return Pizza
     */
    public function getDetailPizza(int $pizzaId): Pizza
    {
        // test si l'id de la pizza est bien un nombre supérieur à 0
        if (!is_numeric($pizzaId) || $pizzaId <= 0) {
            throw new \Exception("Impossible de d'obtenir le détail de la pizza ({$pizzaId}).");
        }

        // appel à la méthode du répository et renvoi du résultat
        return $this->repository->findPizzaAvecDetailComplet($pizzaId);
    }
    /**
     * @return array
     */
     public function GetPrixFabrication(int $pizzaId) : float
     {
       $couttotal = 0;
       $detail_pizzas = $this->repository->findPizzaAvecDetailComplet($pizzaId);
       $cout = array();
       $cout2 = array();
       $cout3 = array();
       $mesIngredients = $detail_pizzas->getQuantiteIngredients();
       foreach ($mesIngredients as $ingredient)
       {
         array_push($cout, ($ingredient->convertirGrammeEnKilo($ingredient->getQuantite())));
         array_push($cout2, ($ingredient->getIngredient()));
       }
       foreach ($cout2 as $value)
       {
         array_push($cout3, ($value->getCout()));
       }
       for ($i = 0; $i < count($cout) && $i < count($cout3); $i++)
       {
         $couttotal = $couttotal + ($cout[$i] * $cout3[$i]);
       }
       return $couttotal;
     }
}
