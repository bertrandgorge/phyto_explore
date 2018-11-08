<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IFTRepository")
 */
class IFT
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AMMProduct", inversedBy="targets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Target", inversedBy="iFTs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $target;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Culture", inversedBy="iFTs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $culture;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=5)
     */
    private $dose;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $unit;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTarget(): ?Target
    {
        return $this->target;
    }

    public function setTarget(?Target $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function getCulture(): ?Culture
    {
        return $this->culture;
    }

    public function setCulture(?Culture $culture): self
    {
        $this->culture = $culture;

        return $this;
    }

    public function getDose()
    {
        return $this->dose;
    }

    public function setDose($dose): self
    {
        $this->dose = $dose;

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }
}
