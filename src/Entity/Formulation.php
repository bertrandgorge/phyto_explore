<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormulationRepository")
 */
class Formulation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, nullable=true, unique=true)
     */
    private $ref_id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $caption;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AMMProduct", inversedBy="formulations")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function __toString() {
        return $this->caption;
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

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @return Collection|AMMProduct[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(AMMProduct $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    public function removeProduct(AMMProduct $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
        }

        return $this;
    }
}
