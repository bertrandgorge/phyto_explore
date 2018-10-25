<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AMMProductRepository")
 */
class AMMProduct
{
    /**
     * @ORM\Id()* 
     * @ORM\Column(type="integer", unique=true)
     */
    private $AMM;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $product_type;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $commercial_type;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $immatriculation_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $professional_use;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="products")
     */
    private $company;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAMM(): ?int
    {
        return $this->AMM;
    }

    public function setAMM(int $AMM): self
    {
        $this->AMM = $AMM;

        return $this;
    }

    public function getProductType(): ?string
    {
        return $this->product_type;
    }

    public function setProductType(?string $product_type): self
    {
        $this->product_type = $product_type;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

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

    public function getCommercialType(): ?string
    {
        return $this->commercial_type;
    }

    public function setCommercialType(?string $commercial_type): self
    {
        $this->commercial_type = $commercial_type;

        return $this;
    }

    public function getImmatriculationDate(): ?\DateTimeInterface
    {
        return $this->immatriculation_date;
    }

    public function setImmatriculationDate(?\DateTimeInterface $immatriculation_date): self
    {
        $this->immatriculation_date = $immatriculation_date;

        return $this;
    }

    public function getProfessionalUse(): ?bool
    {
        return $this->professional_use;
    }

    public function setProfessionalUse(bool $professional_use): self
    {
        $this->professional_use = $professional_use;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }
}
