<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pizza")
 * @ORM\Entity(repositoryClass="App\Repository\PizzaRepository")
 */
class Pizza
{
    /**
     * @var int
     * @ORM\Column(name="id_pizza", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_pizza;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=191, unique=true)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\IngredientPizza")
     * @ORM\JoinTable(name="pizza_ingredientpizza",
     *      joinColumns={@ORM\JoinColumn(name="pizza", referencedColumnName="id_pizza")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ingredientpizza", referencedColumnName="id_ingredient_pizza", unique=true)}
     *      )
     */
    private $quantiteIngredients;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pizzerias = new ArrayCollection();
        $this->quantiteIngredients = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id_pizza;
    }

    /**
     * @param int $id_pizza
     * @return Pizza
     */
    public function setId(int $id_pizza): Pizza
    {
        $this->id_pizza = $id_pizza;

        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Pizza
     */
    public function setNom(string $nom): Pizza
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getQuantiteIngredients(): Collection
    {
        return $this->quantiteIngredients;
    }

    /**
    * @param IngredientPizza $quantiteIngredients
    * @return Pizza
    */
    public function addQuantiteIngredients(IngredientPizza $quantiteIngredients): Pizza
    {
        $this->quantiteIngredients[] = $quantiteIngredients;
        return $this;
    }

    /**
     * @param IngredientPizza $quantiteIngredients
     */
    public function removeQuantiteIngredients(IngredientPizza $quantiteIngredients): void
    {
      $this->quantiteIngredients->removeElement($quantiteIngredients);
    }
}
