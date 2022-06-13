<?php

namespace App\Entity;

use App\Repository\RegionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegionsRepository::class)
 */
class Regions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Offreslocations::class, mappedBy="regions")
     */
    private $offreslocations;

    /**
     * @ORM\OneToMany(targetEntity=Curiosites::class, mappedBy="region")
     */
    private $curiosites;

    public function __construct()
    {
        $this->offreslocations = new ArrayCollection();
        $this->curiosites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Offreslocations>
     */
    public function getOffreslocations(): Collection
    {
        return $this->offreslocations;
    }

    public function addOffreslocation(Offreslocations $offreslocation): self
    {
        if (!$this->offreslocations->contains($offreslocation)) {
            $this->offreslocations[] = $offreslocation;
            $offreslocation->setRegions($this);
        }

        return $this;
    }

    public function removeOffreslocation(Offreslocations $offreslocation): self
    {
        if ($this->offreslocations->removeElement($offreslocation)) {
            // set the owning side to null (unless already changed)
            if ($offreslocation->getRegions() === $this) {
                $offreslocation->setRegions(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Curiosites>
     */
    public function getCuriosites(): Collection
    {
        return $this->curiosites;
    }

    public function addCuriosite(Curiosites $curiosite): self
    {
        if (!$this->curiosites->contains($curiosite)) {
            $this->curiosites[] = $curiosite;
            $curiosite->setRegion($this);
        }

        return $this;
    }

    public function removeCuriosite(Curiosites $curiosite): self
    {
        if ($this->curiosites->removeElement($curiosite)) {
            // set the owning side to null (unless already changed)
            if ($curiosite->getRegion() === $this) {
                $curiosite->setRegion(null);
            }
        }

        return $this;
    }
}
