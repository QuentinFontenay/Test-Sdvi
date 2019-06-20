<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="pizzaiolo")
 * @ORM\Entity(repositoryClass="App\Repository\PizzaioloRepository")
 */
class Pizzaiolo
{
    /**
     * @var int
     * @ORM\Column(name="id_pizzaiolo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     * @ORM\Column(name="numero_secu", type="string", length=255, unique=true)
     */
    private $numeroSecu;

    /**
     * @var Pizzeria
     * @ORM\ManyToOne(
     *     targetEntity="App\Entity\Pizzeria",
     *     inversedBy="pizzaiolos"
     * )
     * @ORM\JoinColumn(
     *     name="pizzeria_id",
     *     referencedColumnName="id_pizzeria"
     * )
     */
    private $employeur;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Pizzaiolo
     */
    public function setId(int $id): Pizzaiolo
    {
        $this->id = $id;

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
     * @return Pizzaiolo
     */
    public function setNom(string $nom): Pizzaiolo
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Pizzaiolo
     */
    public function setPrenom(string $prenom): Pizzaiolo
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumeroSecu(): ?string
    {
        return $this->numeroSecu;
    }

    /**
     * @param string $numeroSecu
     * @return Pizzaiolo
     */
    public function setNumeroSecu(string $numeroSecu): Pizzaiolo
    {
        $this->numeroSecu = $numeroSecu;

        return $this;
    }

    /**
     * @return Pizzeria
     */
    public function getEmployeur(): ?Pizzeria
    {
        return $this->employeur;
    }

    /**
     * @param Pizzeria|null $employeur
     * @return Pizzaiolo
     */
    public function setEmployeur(Pizzeria $employeur = null): Pizzaiolo
    {
        $this->employeur = $employeur;

        return $this;
    }
}
