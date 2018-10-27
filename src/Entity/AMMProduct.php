<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AMMProductRepository")
 */
class AMMProduct
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", unique=true)
     */
    private $id;

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
     * @ORM\Column(type="date", nullable=true)
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SubstanceQuantity", mappedBy="product", orphanRemoval=true)
     */
    private $substanceQuantities;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UsageCondition", mappedBy="product", orphanRemoval=true)
     */
    private $usageConditions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Usecase", mappedBy="products")
     */
    private $usecases;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Formulation", mappedBy="products")
     */
    private $formulations;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Mention", mappedBy="products")
     */
    private $mentions;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Danger", mappedBy="products")
     */
    private $dangers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Risk", mappedBy="products")
     */
    private $risks;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AMMProduct", inversedBy="linkedProducts")
     */
    private $linkedProducts;


    public function __construct()
    {
        $this->substances = new ArrayCollection();
        $this->substanceQuantities = new ArrayCollection();
        $this->usageConditions = new ArrayCollection();
        $this->usecases = new ArrayCollection();
        $this->formulations = new ArrayCollection();
        $this->mentions = new ArrayCollection();
        $this->dangers = new ArrayCollection();
        $this->risks = new ArrayCollection();
        $this->linkedProducts = new ArrayCollection();
    }

    public function __toString() {
        return $this->name . ' (' . $this->id . ')';
    }    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductType(): ?string
    {
        return $this->product_type;
    }
    public function getproductTypeLabel(): ?string
    {
        switch($this->product_type)
        {
            case 'A':  return 'Adjuvant';
            case 'M':  return 'Mélange';
            case 'F':  return 'MFSC (Matières fertilisantes et supports de cultures)';
            case 'P':  return 'PPP (Produit Phytopharmaceutique)';
            case 'X':  return 'Produit-Mixte';
            default:
                return 'Unknown product type';
        }

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
    
    public function getStatusLabel(): ?string
    {
        switch($this->status)
        {
            case 'A': return 'Autorisé';
            case 'O': return 'Autre cas';
            case 'C': return 'Inscription en cours';
            case 'I': return 'Inscrite';
            case 'N': return 'Non inscrite';
            case 'R': return 'Retiré';        
            default:
                return "Status unknown";
        }
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

    public function getCommercialTypeLabel(): ?string
    {
        switch($this->commercial_type)
        {
            case 'R': return 'Produit de référence';
            case 'S': return 'Second nom commercial';
            case 'D': return 'Deuxième gamme';
            case 'P': return 'Produit de revente';
            case 'G': return 'Générique';
            default:
                return "Unknown commercial type";
        }
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
            $substanceQuantity->setProduct($this);
        }

        return $this;
    }

    public function removeSubstanceQuantity(SubstanceQuantity $substanceQuantity): self
    {
        if ($this->substanceQuantities->contains($substanceQuantity)) {
            $this->substanceQuantities->removeElement($substanceQuantity);
            // set the owning side to null (unless already changed)
            if ($substanceQuantity->getProduct() === $this) {
                $substanceQuantity->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UsageCondition[]
     */
    public function getUsageConditions(): Collection
    {
        return $this->usageConditions;
    }

    public function getUsageConditionsList(): ?string
    {
        $str = '';
        $currentCatName = '';

        foreach ($this->usageConditions as $condition)
        {
            if ($currentCatName != $condition->getCatName())
                $str .= '<h4>' . $condition->getCatName() . '</h4>';
                
            $str .= '<p>' . nl2br($condition->getDescription()) . '</p>';

            $currentCatName = $condition->getCatName();
        }

        return $str;
    }

    public function addUsageCondition(UsageCondition $usageCondition): self
    {
        if (!$this->usageConditions->contains($usageCondition)) {
            $this->usageConditions[] = $usageCondition;
            $usageCondition->setProduct($this);
        }

        return $this;
    }

    public function removeUsageCondition(UsageCondition $usageCondition): self
    {
        if ($this->usageConditions->contains($usageCondition)) {
            $this->usageConditions->removeElement($usageCondition);
            // set the owning side to null (unless already changed)
            if ($usageCondition->getProduct() === $this) {
                $usageCondition->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Usecase[]
     */
    public function getUsecases(): Collection
    {
        return $this->usecases;
    }

    public function addUsecase(Usecase $usecase): self
    {
        if (!$this->usecases->contains($usecase)) {
            $this->usecases[] = $usecase;
            $usecase->addProduct($this);
        }

        return $this;
    }

    public function removeUsecase(Usecase $usecase): self
    {
        if ($this->usecases->contains($usecase)) {
            $this->usecases->removeElement($usecase);
            $usecase->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Formulation[]
     */
    public function getFormulations(): Collection
    {
        return $this->formulations;
    }

    public function addFormulation(Formulation $formulation): self
    {
        if (!$this->formulations->contains($formulation)) {
            $this->formulations[] = $formulation;
            $formulation->addProduct($this);
        }

        return $this;
    }

    public function removeFormulation(Formulation $formulation): self
    {
        if ($this->formulations->contains($formulation)) {
            $this->formulations->removeElement($formulation);
            $formulation->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Mention[]
     */
    public function getMentions(): Collection
    {
        return $this->mentions;
    }

    public function addMention(Mention $mention): self
    {
        if (!$this->mentions->contains($mention)) {
            $this->mentions[] = $mention;
            $mention->addProduct($this);
        }

        return $this;
    }

    public function removeMention(Mention $mention): self
    {
        if ($this->mentions->contains($mention)) {
            $this->mentions->removeElement($mention);
            $mention->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Danger[]
     */
    public function getDangers(): Collection
    {
        return $this->dangers;
    }

    public function addDanger(Danger $danger): self
    {
        if (!$this->dangers->contains($danger)) {
            $this->dangers[] = $danger;
            $danger->addProduct($this);
        }

        return $this;
    }

    public function removeDanger(Danger $danger): self
    {
        if ($this->dangers->contains($danger)) {
            $this->dangers->removeElement($danger);
            $danger->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Risk[]
     */
    public function getRisks(): Collection
    {
        return $this->risks;
    }

    public function addRisk(Risk $risk): self
    {
        if (!$this->risks->contains($risk)) {
            $this->risks[] = $risk;
            $risk->addProduct($this);
        }

        return $this;
    }

    public function removeRisk(Risk $risk): self
    {
        if ($this->risks->contains($risk)) {
            $this->risks->removeElement($risk);
            $risk->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getLinkedProducts(): Collection
    {
        return $this->linkedProducts;
    }

    public function addLinkedProduct(self $linkedProduct): self
    {
        if (!$this->linkedProducts->contains($linkedProduct)) {
            $this->linkedProducts[] = $linkedProduct;
        }

        return $this;
    }

    public function removeLinkedProduct(self $linkedProduct): self
    {
        if ($this->linkedProducts->contains($linkedProduct)) {
            $this->linkedProducts->removeElement($linkedProduct);
        }

        return $this;
    }
}
