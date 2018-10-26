<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RiskRepository")
 */
class Risk
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $caption;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $pict;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AMMProduct", inversedBy="risks")
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getPict(): ?string
    {
        return $this->pict;
    }

    public function setPict(?string $pict): self
    {
        $this->pict = $pict;

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
