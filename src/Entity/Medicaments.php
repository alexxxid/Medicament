<?php

namespace App\Entity;


use App\Entity\Composer;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

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
    public $id;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Composer", mappedBy="medicament", cascade={"persist"})
     *       @ORM\JoinColumn(nullable=true)
     */
    public $composers;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Famille", inversedBy="medicaments")
     * @ORM\JoinColumn(nullable=true)
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

    public function addComposers(Composer $composers): self
    {




        if (!$this->composers->contains($composers)) {
            $this->composers[] = $composers;
            $composers->setMedicament($this);
        }

        return $this;
    }

    public function removeComposers(Composer $composers, ObjectManager $manager): self
    {
        if ($this->composers->contains($composers)) {
            $this->composers->removeElement($composers);
            // set the owning side to null (unless already changed)
            $manager->remove($composers);
            $manager->flush();
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
