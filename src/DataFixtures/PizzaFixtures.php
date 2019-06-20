<?php

declare(strict_types = 1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Ingredient;
use App\Entity\IngredientPizza;
use App\Entity\Pizza;

/**
 * Class PizzaFixtures
 * @package App\DataFixtures
 */
class PizzaFixtures extends Fixture implements DependentFixtureInterface
{
    const DATA = [
        [
            "nom" => "La 5 fromages",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",            "quantite" => 80 ],
                ["refIngredient" => "ingredient-Fromage de chèvre", "quantite" => 75 ],
                ["refIngredient" => "ingredient-Mozzarela",         "quantite" => 120],
                ["refIngredient" => "ingredient-Bleu",              "quantite" => 70 ],
                ["refIngredient" => "ingredient-Reblochon",         "quantite" => 80 ],
                ["refIngredient" => "ingredient-Emmental",          "quantite" => 110],
            ],
        ],
        [
            "nom" => "L'Océane",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",      "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",   "quantite" => 120],
                ["refIngredient" => "ingredient-Thon",        "quantite" => 125],
                ["refIngredient" => "ingredient-Champignons", "quantite" => 90 ],
            ],
        ],
        [
            "nom" => "La Tartiflette",
            "ingredients" => [
                ["refIngredient" => "ingredient-Crème fraiche",  "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",      "quantite" => 100],
                ["refIngredient" => "ingredient-Pomme de terre", "quantite" => 180],
                ["refIngredient" => "ingredient-Lardons",        "quantite" => 95 ],
            ],
        ],
        [
            "nom" => "Flamenckuche",
            "ingredients" => [
                ["refIngredient" => "ingredient-Crème fraiche", "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",     "quantite" => 105],
                ["refIngredient" => "ingredient-Champignons",   "quantite" => 45 ],
                ["refIngredient" => "ingredient-Lardons",       "quantite" => 60 ],
                ["refIngredient" => "ingredient-Oignons",       "quantite" => 30 ],
                ["refIngredient" => "ingredient-Jambon",        "quantite" => 48 ],
                ["refIngredient" => "ingredient-Emmental",      "quantite" => 105],
            ],
        ],
        [
            "nom" => "L’Hawaïenne",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",    "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela", "quantite" => 65 ],
                ["refIngredient" => "ingredient-Jambon",    "quantite" => 80 ],
                ["refIngredient" => "ingredient-Ananas",    "quantite" => 60 ],
                ["refIngredient" => "ingredient-Emmental",  "quantite" => 105],
            ],
        ],
        [
            "nom" => "La Kebab",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",        "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",     "quantite" => 65 ],
                ["refIngredient" => "ingredient-Poivrons",      "quantite" => 80 ],
                ["refIngredient" => "ingredient-Kebab",         "quantite" => 115],
                ["refIngredient" => "ingredient-Oignons",       "quantite" => 45 ],
                ["refIngredient" => "ingredient-Emmental",      "quantite" => 120],
                ["refIngredient" => "ingredient-Crème fraiche", "quantite" => 20 ],
            ],
        ],
        [
            "nom" => "La Végétarienne",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",        "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",     "quantite" => 65 ],
                ["refIngredient" => "ingredient-Champignons",   "quantite" => 75 ],
                ["refIngredient" => "ingredient-Poivrons",      "quantite" => 50 ],
                ["refIngredient" => "ingredient-Emmental",      "quantite" => 120],
                ["refIngredient" => "ingredient-Olives noires", "quantite" => 50 ],
            ],
        ],
        [
            "nom" => "La Texane",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",        "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",     "quantite" => 65 ],
                ["refIngredient" => "ingredient-Champignons",   "quantite" => 75 ],
                ["refIngredient" => "ingredient-Viande hachée", "quantite" => 132],
                ["refIngredient" => "ingredient-Emmental",      "quantite" => 95 ],
            ],
        ],
        [
            "nom" => "La Chèvremiel",
            "ingredients" => [
                ["refIngredient" => "ingredient-Crème fraiche",     "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",         "quantite" => 65 ],
                ["refIngredient" => "ingredient-Lardons",           "quantite" => 80 ],
                ["refIngredient" => "ingredient-Oignons",           "quantite" => 40 ],
                ["refIngredient" => "ingredient-Fromage de chèvre", "quantite" => 100],
                ["refIngredient" => "ingredient-Emmental",          "quantite" => 75 ],
                ["refIngredient" => "ingredient-Miel",              "quantite" => 30 ],
            ],
        ],
        [
            "nom" => "La Basquaise",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",             "quantite" => 80 ],
                ["refIngredient" => "ingredient-Poulet",             "quantite" => 105],
                ["refIngredient" => "ingredient-Chorizo",            "quantite" => 50 ],
                ["refIngredient" => "ingredient-Poivrons",           "quantite" => 60 ],
                ["refIngredient" => "ingredient-Herbes de provence", "quantite" => 10 ],
            ],
        ],
        [
            "nom" => "L'Exotique",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",            "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",         "quantite" => 65 ],
                ["refIngredient" => "ingredient-Poulet",            "quantite" => 90 ],
                ["refIngredient" => "ingredient-Ananas",            "quantite" => 60 ],
                ["refIngredient" => "ingredient-Fromage de chèvre", "quantite" => 60 ],
                ["refIngredient" => "ingredient-Emmental",          "quantite" => 102],
                ["refIngredient" => "ingredient-Curry",             "quantite" => 10 ],
            ],
        ],
        [
            "nom" => "La Périgourdine",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",           "quantite" => 80],
                ["refIngredient" => "ingredient-Mozzarela",        "quantite" => 65],
                ["refIngredient" => "ingredient-Pommes",           "quantite" => 70],
                ["refIngredient" => "ingredient-Oignons",          "quantite" => 35],
                ["refIngredient" => "ingredient-Jambon",           "quantite" => 40],
                ["refIngredient" => "ingredient-Magret de canard", "quantite" => 60],
                ["refIngredient" => "ingredient-Miel",             "quantite" => 30],
                ["refIngredient" => "ingredient-Crème fraiche",    "quantite" => 20],
            ],
        ],
        [
            "nom" => "La St Jacques",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",             "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",          "quantite" => 65 ],
                ["refIngredient" => "ingredient-Champignons",        "quantite" => 50 ],
                ["refIngredient" => "ingredient-Oignons",            "quantite" => 40 ],
                ["refIngredient" => "ingredient-Noix de St Jacques", "quantite" => 75 ],
                ["refIngredient" => "ingredient-Emmental",           "quantite" => 105],
            ],
        ],
        [
            "nom" => "La Reine",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",      "quantite" => 80],
                ["refIngredient" => "ingredient-Mozzarela",   "quantite" => 65],
                ["refIngredient" => "ingredient-Jambon",      "quantite" => 95],
                ["refIngredient" => "ingredient-Champignons", "quantite" => 50],
                ["refIngredient" => "ingredient-Emmental",    "quantite" => 95],
                ["refIngredient" => "ingredient-Origan",      "quantite" => 10],
            ],
        ],
        [
            "nom" => "La Marguerita",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",    "quantite" => 80],
                ["refIngredient" => "ingredient-Mozzarela", "quantite" => 65],
                ["refIngredient" => "ingredient-Oignons",   "quantite" => 50],
                ["refIngredient" => "ingredient-Emmental",  "quantite" => 95],
                ["refIngredient" => "ingredient-Origan",    "quantite" => 10],
            ],
        ],
        [
            "nom" => "La Sicilienne",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",      "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",   "quantite" => 65 ],
                ["refIngredient" => "ingredient-Champignons", "quantite" => 50 ],
                ["refIngredient" => "ingredient-Oignons",     "quantite" => 45 ],
                ["refIngredient" => "ingredient-Emmental",    "quantite" => 100],
                ["refIngredient" => "ingredient-Origan",      "quantite" => 10 ],
                ["refIngredient" => "ingredient-Anchois",     "quantite" => 45 ],
            ],
        ],
        [
            "nom" => "La Poulet",
            "ingredients" => [
                ["refIngredient" => "ingredient-Crème fraiche", "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",     "quantite" => 65 ],
                ["refIngredient" => "ingredient-Champignons",   "quantite" => 60 ],
                ["refIngredient" => "ingredient-Poulet",        "quantite" => 105],
                ["refIngredient" => "ingredient-Reblochon",     "quantite" => 80 ],
            ],
        ],
        [
            "nom" => "La Romaine",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",      "quantite" => 80 ],
                ["refIngredient" => "ingredient-Mozzarela",   "quantite" => 65 ],
                ["refIngredient" => "ingredient-Champignons", "quantite" => 50 ],
                ["refIngredient" => "ingredient-Jambon",      "quantite" => 85 ],
                ["refIngredient" => "ingredient-Emmental",    "quantite" => 100],
            ],
        ],
        [
            "nom" => "La Campagnarde",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",             "quantite" => 80],
                ["refIngredient" => "ingredient-Mozzarela",          "quantite" => 65],
                ["refIngredient" => "ingredient-Champignons",        "quantite" => 50],
                ["refIngredient" => "ingredient-Lardons",            "quantite" => 75],
                ["refIngredient" => "ingredient-Jambon",             "quantite" => 80],
                ["refIngredient" => "ingredient-Herbes de provence", "quantite" => 10],
            ],
        ],
        [
            "nom" => "L'Orientale",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",      "quantite" => 80],
                ["refIngredient" => "ingredient-Mozzarela",   "quantite" => 65],
                ["refIngredient" => "ingredient-Champignons", "quantite" => 50],
                ["refIngredient" => "ingredient-Poivrons",    "quantite" => 45],
                ["refIngredient" => "ingredient-Merguez",     "quantite" => 75],
                ["refIngredient" => "ingredient-Chorizo",     "quantite" => 75],
                ["refIngredient" => "ingredient-Tandoori",    "quantite" => 10],
            ],
        ],
        [
            "nom" => "L'Indienne",
            "ingredients" => [
                ["refIngredient" => "ingredient-Tomate",      "quantite" => 80],
                ["refIngredient" => "ingredient-Mozzarela",   "quantite" => 65],
                ["refIngredient" => "ingredient-Poivrons",    "quantite" => 45],
                ["refIngredient" => "ingredient-Champignons", "quantite" => 50],
                ["refIngredient" => "ingredient-Poulet",      "quantite" => 95],
                ["refIngredient" => "ingredient-Tandoori",    "quantite" => 10],
            ],
        ],
        [
            "nom" => "La Montagnarde",
            "ingredients" => [
                ["refIngredient" => "ingredient-Crème fraiche",     "quantite" => 80],
                ["refIngredient" => "ingredient-Pomme de terre",    "quantite" => 80],
                ["refIngredient" => "ingredient-Jambon",            "quantite" => 60],
                ["refIngredient" => "ingredient-Fromage de chèvre", "quantite" => 40],
                ["refIngredient" => "ingredient-Bleu",              "quantite" => 45],
                ["refIngredient" => "ingredient-Reblochon",         "quantite" => 60],
            ],
        ],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        // parcourt des différentes pizzas
        foreach (self::DATA as $pizzaData) {
            // création d'une instance de pizza
            $pizza = new Pizza();
            // définition du nom de la pizza
            $pizza->setNom($pizzaData["nom"]);

            // parcourts des ingrédients
            foreach ($pizzaData["ingredients"] as $ingredientData) {
                // recherche de l'ingrédient par sa référence
                /** @var Ingredient $ingredient */
                $ingredient = $this->getReference($ingredientData["refIngredient"]);

                // création d'une instance de IngredientPizza pour stoker la quantité
                $ingreParPizza = new IngredientPizza();
                // définition de la quantité
                $ingreParPizza
                    ->setQuantite($ingredientData["quantite"])
                    ->setIngredient($ingredient)
                ;

                // ajout de la quantité pour l'ingrédient à la pizza
                $pizza->addQuantiteIngredients($ingreParPizza);

                // sauvegarde de la quantité
                $manager->persist($ingreParPizza);
            }


            // création d'une clé unique (pizza-nom) pour faire une référence à la pizza
            $cleUnique = "pizza-{$pizza->getNom()}";
            // référence de la pizza
            $this->addReference($cleUnique, $pizza);

            // sauvegarde de la pizza en base de données
            $manager->persist($pizza);
            $manager->flush();
        }
    }

    /**
     * @return array|void
     */
    public function getDependencies(): array
    {
        return [IngredientFixtures::class];
    }
}
