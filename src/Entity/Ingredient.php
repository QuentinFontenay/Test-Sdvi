<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ingredient")
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRepository")
 */
class Ingredient
{
    /**
     * @var int
     * @ORM\Column(name="id_ingredient", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var float
     * @ORM\Column(name="cout", type="float")
     */
    private $cout;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Ingredient
     */
    public function setId(int $id): Ingredient
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return float
     */
    public function getCout(): ?float
    {
        return $this->cout;
    }

    /**
     * @param float $cout
     * @return Ingredient
     */
    public function setCout(float $cout): Ingredient
    {
        $this->cout = $cout;

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
     * @return Ingredient
     */
    public function setNom(string $nom): Ingredient
    {
        $this->nom = $nom;

        return $this;
    }
}
