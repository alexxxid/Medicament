<?php

namespace App\Entity;

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
}
