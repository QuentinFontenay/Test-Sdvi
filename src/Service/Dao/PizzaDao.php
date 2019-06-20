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
}
