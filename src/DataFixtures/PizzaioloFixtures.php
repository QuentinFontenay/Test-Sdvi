<?php

declare(strict_types = 1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Pizzaiolo;
use App\Entity\Pizzeria;

/**
 * Class PizzaioloFixtures
 * @package App\DataFixtures\ORM
 */
class PizzaioloFixtures extends Fixture implements DependentFixtureInterface
{
    const DATA = [
        ["nom" => "Dubois",         "prenom" => "Marc",      "numSecu" => "15404456513585", "employeur" => "pizzeria-La Belle Rouge"],
        ["nom" => "Roger",          "prenom" => "Julien",    "numSecu" => "16504654879585", "employeur" => "pizzeria-La Belle Rouge"],
        ["nom" => "Frenan",         "prenom" => "Xavier",    "numSecu" => "14586523565785", "employeur" => null                     ],
        ["nom" => "Fouchau",        "prenom" => "Thierry",   "numSecu" => "14745869535645", "employeur" => null                     ],
        ["nom" => "Devil",          "prenom" => "Paul",      "numSecu" => "12235665948684", "employeur" => null                     ],
        ["nom" => "Mitalino",       "prenom" => "Guillermo", "numSecu" => "15989646565355", "employeur" => null                     ],
        ["nom" => "Bruccheti",      "prenom" => "Brad",      "numSecu" => "15689676467563", "employeur" => "pizzeria-Au Feu de Bois"],
        ["nom" => "Marscarpone",    "prenom" => "Tino",      "numSecu" => "15648963655498", "employeur" => "pizzeria-Au Feu de Bois"],
        ["nom" => "Henry",          "prenom" => "Jean",      "numSecu" => "16546899966665", "employeur" => "pizzeria-Chez Dédé"     ],
        ["nom" => "Gerbaque",       "prenom" => "Henry",     "numSecu" => "14447988965665", "employeur" => "pizzeria-La Belle Rouge"],
        ["nom" => "De La Tourette", "prenom" => "Marc",      "numSecu" => "18895969816565", "employeur" => "pizzeria-Chez Dédé"     ],
        ["nom" => "Dubreton",       "prenom" => "Pierre",    "numSecu" => "15559687985656", "employeur" => "pizzeria-Chez Dédé"     ],
        ["nom" => "Blanchard",      "prenom" => "Franky",    "numSecu" => "14477964657456", "employeur" => null                     ],
        ["nom" => "Gertrude",       "prenom" => "Brigitte",  "numSecu" => "25598656565669", "employeur" => null                     ],
        ["nom" => "Malmaire",       "prenom" => "Mireille",  "numSecu" => "26698984645464", "employeur" => null                     ],
        ["nom" => "Bobino",         "prenom" => "Juliette",  "numSecu" => "29865656566535", "employeur" => null                     ],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        // parcourt des différents pizzaiolos
        foreach (self::DATA as $pizzaioloData) {
            // création d'une instance de Pizzaiolo
            $pizzaiolo = new Pizzaiolo();
            // définition des attributs
            $pizzaiolo
                ->setNom($pizzaioloData["nom"])
                ->setPrenom($pizzaioloData["prenom"])
                ->setNumeroSecu($pizzaioloData["numSecu"])
            ;

            // recherche de la référence de l'employeur si != null
            if ($refPizzeria = $pizzaioloData["employeur"]) {
                /** @var Pizzeria $pizzeria */
                $pizzeria = $this->getReference($refPizzeria);

                // ajout de l'employeur
                $pizzaiolo->setEmployeur($pizzeria);
                // ajout du pizzaiolo à la pizzeria
                $pizzeria->addPizzaiolo($pizzaiolo);

                // sauvegarde de la pizzeria en base de données
                $manager->persist($pizzeria);
            }

            // sauvegarde du pizzaiolo en base de données
            $manager->persist($pizzaiolo);
            $manager->flush();
        }
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [PizzeriaFixtures::class];
    }
}
