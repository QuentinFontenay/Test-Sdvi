<?php

declare(strict_types = 1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Ingredient;

/**
 * Class IngredientFixtures
 * @package App\DataFixtures
 */
class IngredientFixtures extends Fixture
{
    const DATA = [
        ["nom" => "Champignons",        "cout" => 7.90 ],
        ["nom" => "Emmental",           "cout" => 12.32],
        ["nom" => "Mozzarela",          "cout" => 10.72],
        ["nom" => "Tomate",             "cout" => 2.95 ],
        ["nom" => "Crème fraiche",      "cout" => 3.70 ],
        ["nom" => "Anchois",            "cout" => 21.00],
        ["nom" => "Poivrons",           "cout" => 2.82 ],
        ["nom" => "Poulet",             "cout" => 3.95 ],
        ["nom" => "Merguez",            "cout" => 14.90],
        ["nom" => "Chorizo",            "cout" => 8.58 ],
        ["nom" => "Jambon",             "cout" => 12.38],
        ["nom" => "Lardons",            "cout" => 6.30 ],
        ["nom" => "Pomme de terre",     "cout" => 1.00 ],
        ["nom" => "Olives vertes",      "cout" => 8.60 ],
        ["nom" => "Olives noires",      "cout" => 10.33],
        ["nom" => "Fromage de chèvre",  "cout" => 9.55 ],
        ["nom" => "Thon",               "cout" => 11.46],
        ["nom" => "Poireau",            "cout" => 1.95 ],
        ["nom" => "Saumon",             "cout" => 30.40],
        ["nom" => "Viande hachée",      "cout" => 8.23 ],
        ["nom" => "Ananas",             "cout" => 4.71 ],
        ["nom" => "Gorgonzola",         "cout" => 12.95],
        ["nom" => "Oignons",            "cout" => 2.68 ],
        ["nom" => "Bleu",               "cout" => 8.96 ],
        ["nom" => "Reblochon",          "cout" => 11.33],
        ["nom" => "Kebab",              "cout" => 7.23 ],
        ["nom" => "Miel",               "cout" => 12.0 ],
        ["nom" => "Origan",             "cout" => 13.45],
        ["nom" => "Herbes de provence", "cout" => 14.77],
        ["nom" => "Curry",              "cout" => 11.08],
        ["nom" => "Tandoori",           "cout" => 56.25],
        ["nom" => "Pommes",             "cout" => 2.34 ],
        ["nom" => "Magret de canard",   "cout" => 22.04],
        ["nom" => "Noix de St Jacques", "cout" => 23.69],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        // parcourt des différents ingrédients
        foreach (self::DATA as $ingredientData) {
            // création d'une instance d'ingrédient
            $ingredient = new Ingredient();
            // définition des attributs
            $ingredient
                ->setNom($ingredientData["nom"])
                ->setCout($ingredientData["cout"])
            ;

            // création d'une clé unique (ingredient-nom) pour faire une référence
            $cleUnique = "ingredient-{$ingredient->getNom()}";
            // référence de l'ingrédient
            $this->addReference($cleUnique, $ingredient);

            // sauvegarde de l'ingredient en base de données
            $manager->persist($ingredient);
            $manager->flush();
        }
    }
}
