<?php

declare(strict_types = 1);

namespace App\Repository;

use App\Entity\Pizzaiolo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class PizzaioloRepository
 * @package App\Repository
 */
class PizzaioloRepository extends ServiceEntityRepository
{
    /**
     * PizzaioloRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pizzaiolo::class);
    }

    /**
     * @return array
     */
    public function getAllPizzaiolos(): array
    {
        // création du query builder avec l'alias p pour pizzaiolo
        $qb = $this->createQueryBuilder("p");

        // création de la requête
        $qb
            ->addSelect("piz")
            ->leftJoin("p.employeur", "piz")
            ->orderBy("p.nom", "ASC")
        ;

        // exécution de la requête
        return $qb->getQuery()->getResult();
    }

    /**
     * @return array
     */
    public function getPizzaioloDisponibles(): array
    {
        // création du query builder avec l'alias p pour pizzaiolo
        $qb = $this->createQueryBuilder("p");

        // création de la requête
        $qb
            ->having($qb->expr()->isNull("p.employeur"))
        ;

        // exécution de la requête
        return $qb->getQuery()->getResult();
    }
}
