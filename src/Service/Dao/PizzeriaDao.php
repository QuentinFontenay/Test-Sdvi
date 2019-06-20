<?php

namespace App\Service\Dao;

use App\Entity\Pizzeria;
use App\Repository\PizzeriaRepository;

/**
 * Class PizzeriaDao
 * @package App\Service\Dao
 */
class PizzeriaDao
{
    /** @var PizzeriaRepository */
    private $repository;

    /**
     * PizzeriaDao constructor.
     * @param PizzeriaRepository $repository
     */
    public function __construct(PizzeriaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function getAllPizzerias(): array
    {
        // appel à la méthode du répository et renvoi du résultat
        return $this->repository->findAll();
    }

    /**
     * @param int $pizzeriaId
     * @return Pizzeria
     */
    public function getCartePizzeria(int $pizzeriaId): Pizzeria
    {
        // test si l'id de la pizzeria est bien un nombre supérieur à 0
        if (!is_numeric($pizzeriaId) || $pizzeriaId <= 0) {
            throw new \Exception("Impossible de d'obtenir le détail de la pizzeria ({$pizzeriaId}).");
        }

        // appel à la méthode du répository et renvoi du résultat
        return $this->repository->findCartePizzeria($pizzeriaId);
    }
}
