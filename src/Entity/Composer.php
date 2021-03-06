<?php

namespace App\Entity;

use App\Entity\Composant;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComposerRepository")
 */
class Composer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medicaments", inversedBy="composers")
     */
    private $medicament;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Composant", inversedBy="composers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $composant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(int $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getMedicament(): ?Medicaments
    {
        return $this->medicament;
    }

    public function setMedicament(?Medicaments $medicament): self
    {
        $this->medicament = $medicament;

        return $this;
    }

    public function getComposant(): ?Composant
    {
        return $this->composant;
    }

    public function setComposant(?Composant $Composant): self
    {
        $this->composant = $Composant;

        return $this;
    }
}
