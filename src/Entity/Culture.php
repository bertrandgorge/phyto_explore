<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CultureRepository")
 */
class Culture
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\IFT", mappedBy="culture", orphanRemoval=true)
     */
    private $iFTs;

    public function __construct()
    {
        $this->iFTs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|IFT[]
     */
    public function getIFTs(): Collection
    {
        return $this->iFTs;
    }

    public function addIFT(IFT $iFT): self
    {
        if (!$this->iFTs->contains($iFT)) {
            $this->iFTs[] = $iFT;
            $iFT->setCulture($this);
        }

        return $this;
    }

    public function removeIFT(IFT $iFT): self
    {
        if ($this->iFTs->contains($iFT)) {
            $this->iFTs->removeElement($iFT);
            // set the owning side to null (unless already changed)
            if ($iFT->getCulture() === $this) {
                $iFT->setCulture(null);
            }
        }

        return $this;
    }
}
