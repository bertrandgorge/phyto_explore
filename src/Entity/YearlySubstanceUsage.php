<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\YearlySubstanceUsageRepository")
 */
class YearlySubstanceUsage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $department;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Substance", inversedBy="yearlyUsages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $substance;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=7)
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString() {
        return $this->year . ' - ' . $this->department . ' - ' . $this->quantity . 'kg';
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(?string $department): self
    {
        $this->department = $department;

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

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

}
