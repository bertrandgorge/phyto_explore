<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubstanceQuantityRepository")
 */
class SubstanceQuantity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=5)
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $unit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Substance", inversedBy="substanceQuantities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $substance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AMMProduct", inversedBy="substanceQuantities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString() {
        return $this->substance . ' - ' . $this->quantity . ' ' . $this->unit;
    }    
    
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getSubstance(): ?Substance
    {
        return $this->substance;
    }

    public function setSubstance(?Substance $substance): self
    {
        $this->substance = $substance;

        return $this;
    }

    public function getProduct(): ?AMMProduct
    {
        return $this->product;
    }

    public function setProduct(?AMMProduct $product): self
    {
        $this->product = $product;

        return $this;
    }
}
