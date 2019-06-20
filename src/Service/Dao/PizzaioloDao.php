<?php

namespace App\Service\Dao;

use App\Repository\PizzaioloRepository;

/**
 * Class PizzaioloDao
 * @package App\Service\Dao
 */
class PizzaioloDao
{
    /** @var PizzaioloRepository */
    private $repository;

    /**
     * PizzaioloDao constructor.
     * @param PizzaioloRepository $repository
     */
    public function __construct(PizzaioloRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function getAllPizzaiolos(): array
    {
        // appel à la méthode du répository et renvoi du résultat
        return $this->repository->getAllPizzaiolos();
    }

    /**
     * @return array
     */
    public function getPizzaioloDisponibles(): array
    {
        // appel à la méthode du répository et renvoi du résultat
        return $this->repository->getPizzaioloDisponibles();
    }
}
