<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubstanceRepository")
 */
class Substance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $ref_id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true, unique=true)
     */
    private $variant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubstanceQuantity", mappedBy="substance", orphanRemoval=true)
     */
    private $substanceQuantities;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->substanceQuantities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString() {
        return $this->name . ' (' . $this->variant . ')';
    }    

    public function getRefId(): ?string
    {
        return $this->ref_id;
    }

    public function setRefId(?string $ref_id): self
    {
        $this->ref_id = $ref_id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getVariant(): ?string
    {
        return $this->variant;
    }

    public function setVariant(?string $variant): self
    {
        $this->variant = $variant;

        return $this;
    }

    /**
     * @return Collection|SubstanceQuantity[]
     */
    public function getSubstanceQuantities(): Collection
    {
        return $this->substanceQuantities;
    }

    public function addSubstanceQuantity(SubstanceQuantity $substanceQuantity): self
    {
        if (!$this->substanceQuantities->contains($substanceQuantity)) {
            $this->substanceQuantities[] = $substanceQuantity;
            $substanceQuantity->setSubstance($this);
        }

        return $this;
    }

    public function removeSubstanceQuantity(SubstanceQuantity $substanceQuantity): self
    {
        if ($this->substanceQuantities->contains($substanceQuantity)) {
            $this->substanceQuantities->removeElement($substanceQuantity);
            // set the owning side to null (unless already changed)
            if ($substanceQuantity->getSubstance() === $this) {
                $substanceQuantity->setSubstance(null);
            }
        }

        return $this;
    }

}
