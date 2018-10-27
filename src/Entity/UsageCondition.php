<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsageConditionRepository")
 */
class UsageCondition
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
    private $cat_ref_id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $cat_name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AMMProduct", inversedBy="usageConditions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString() {
        return $this->cat_name . ' : ' . $this->description;
    }    

    public function getCatRefId(): ?string
    {
        return $this->cat_ref_id;
    }

    public function setCatRefId(?string $cat_ref_id): self
    {
        $this->cat_ref_id = $cat_ref_id;

        return $this;
    }

    public function getCatName(): ?string
    {
        return $this->cat_name;
    }

    public function setCatName(?string $cat_name): self
    {
        $this->cat_name = $cat_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
