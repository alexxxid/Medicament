<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedicamentsRepository")
 */
class Medicaments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomCommercial;

    /**
     * @ORM\Column(type="float")
     */
    private $PrixEchantillon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ContreIndication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Effet;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Composer", mappedBy="medicament")
     */
    private $composers;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Famille", inversedBy="medicaments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $famille;

    public function __construct()
    {
        $this->composers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCommercial(): ?string
    {
        return $this->NomCommercial;
    }

    public function setNomCommercial(string $NomCommercial): self
    {
        $this->NomCommercial = $NomCommercial;

        return $this;
    }

    public function getPrixEchantillon(): ?float
    {
        return $this->PrixEchantillon;
    }

    public function setPrixEchantillon(float $PrixEchantillon): self
    {
        $this->PrixEchantillon = $PrixEchantillon;

        return $this;
    }

    public function getContreIndication(): ?string
    {
        return $this->ContreIndication;
    }

    public function setContreIndication(?string $ContreIndication): self
    {
        $this->ContreIndication = $ContreIndication;

        return $this;
    }

    public function getEffet(): ?string
    {
        return $this->Effet;
    }

    public function setEffet(string $Effet): self
    {
        $this->Effet = $Effet;

        return $this;
    }

    /**
     * @return Collection|Composer[]
     */

    public function getComposers(): Collection
    {
        return $this->composers;
    }

    public function addComposers(Composers $composers): self
    {
        if (!$this->composers->contains($composers)) {
            $this->composers[] = $composers;
            $composers->setMedicament($this);
        }

        return $this;
    }

    public function removeComposers(Composer $composers): self
    {
        if ($this->composers->contains($composers)) {
            $this->composers->removeElement($composers);
            // set the owning side to null (unless already changed)
            if ($composers->getMedicament() === $this) {
                $composers->setMedicament(null);
            }
        }

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }
}
