<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComposantRepository")
 */
class Composant
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
    private $NomComposant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Composer", mappedBy="composant")
     */
    private $composers;

    public function __construct()
    {
        $this->composers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComposant(): ?string
    {
        return $this->NomComposant;
    }

    public function setNomComposant(string $NomComposant): self
    {
        $this->NomComposant = $NomComposant;

        return $this;
    }

    /**
     * @return Collection|Composer[]
     */
    public function getComposers(): Collection
    {
        return $this->composers;
    }

    public function addComposer(Composer $composer): self
    {
        if (!$this->composers->contains($composer)) {
            $this->composers[] = $composer;
            $composer->setComposant($this);
        }

        return $this;
    }

    public function removeComposer(Composer $composer): self
    {
        if ($this->composers->contains($composer)) {
            $this->composers->removeElement($composer);
            // set the owning side to null (unless already changed)
            if ($composer->getComposant() === $this) {
                $composer->setComposant(null);
            }
        }

        return $this;
    }
}
