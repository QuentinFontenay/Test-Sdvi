<?php

declare(strict_types = 1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Pizza;
use App\Entity\Pizzeria;

/**
 * Class PizzeriaFixtures
 * @package AppBundle\DataFixtures
 */
class PizzeriaFixtures extends Fixture implements DependentFixtureInterface
{
    const DATA = [
        [
            "nom"     => "La Belle Rouge",
            "numTel"  => "0247895632",
            "marge"   => 2.65,
            "pizzas"  => [
                "pizza-La 5 fromages",
                "pizza-L'Océane",
                "pizza-La Kebab",
                "pizza-La Végétarienne",
                "pizza-La Chèvremiel",
                "pizza-L'Exotique",
                "pizza-La Périgourdine",
                "pizza-La St Jacques",
                "pizza-La Marguerita",
                "pizza-La Sicilienne",
                "pizza-La Poulet",
                "pizza-La Romaine",
            ],
        ],
        [
            "nom"     => "Au Feu de Bois",
            "numTel"  => "0254898885",
            "marge"   => 1.48,
            "pizzas"  => [
                "pizza-La 5 fromages",
                "pizza-L'Océane",
                "pizza-Flamenckuche",
                "pizza-La Campagnarde",
                "pizza-La Romaine",
                "pizza-L'Indienne",
                "pizza-La Montagnarde",
                "pizza-La Basquaise",
                "pizza-La Texane",
            ],
        ],
        [
            "nom"     => "Chez Dédé",
            "numTel"  => "0245454547",
            "marge"   => 3.39,
            "pizzas"  => [
                "pizza-L'Océane",
                "pizza-Flamenckuche",
                "pizza-L'Indienne",
                "pizza-La Sicilienne",
                "pizza-La Campagnarde",
                "pizza-L’Hawaïenne",
                "pizza-La Tartiflette",
            ],
        ],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        // parcourt des différentes pizzeria
        foreach (self::DATA as $pizzeriaData) {
            // création d'une instance de pizzeria
            $pizzeria = new Pizzeria();
            // définition du nom de la pizzeria
            $pizzeria
                ->setNom($pizzeriaData["nom"])
                ->setNumTelephone($pizzeriaData["numTel"])
                ->setMarge($pizzeriaData["marge"])
            ;

            // parcourts des différentes pizzas
            foreach ($pizzeriaData["pizzas"] as $pizzaData) {
                // recherche de la pizza par sa référence
                /** @var Pizza $pizza */
                $pizza = $this->getReference($pizzaData);

                // ajout de la pizza à la pizzeria
                $pizzeria->addPizza($pizza);
            }

            // création d'une clé unique (pizza-nom) pour faire une référence à la pizzeria
            $cleUnique = "pizzeria-{$pizzeria->getNom()}";
            // référence de la pizza
            $this->addReference($cleUnique, $pizzeria);

            // sauvegarde de la pizzeria en base de données
            $manager->persist($pizzeria);
            $manager->flush();
        }
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [PizzaFixtures::class];
    }
}
