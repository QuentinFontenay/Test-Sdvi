<?php

declare(strict_types = 1);

namespace App\Repository;

use App\Entity\IngredientPizza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class IngredientPizzaRepository
 * @package App\Repository
 */
class IngredientPizzaRepository extends ServiceEntityRepository
{
    /**
     * IngredientPizzaRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, IngredientPizza::class);
    }
}
