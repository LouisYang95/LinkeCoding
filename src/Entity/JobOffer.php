<?php

namespace App\Entity;

use App\Repository\JobOfferRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobOfferRepository::class)]
class JobOffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Company $companyName = null;

    #[ORM\Column(length: 255)]
    private ?string $offerName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionOffer = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $offerSkills = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?company
    {
        return $this->companyName;
    }

    public function setCompanyName(?company $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getOfferName(): ?string
    {
        return $this->offerName;
    }

    public function setOfferName(string $offerName): self
    {
        $this->offerName = $offerName;

        return $this;
    }

    public function getDescriptionOffer(): ?string
    {
        return $this->descriptionOffer;
    }

    public function setDescriptionOffer(?string $descriptionOffer): self
    {
        $this->descriptionOffer = $descriptionOffer;

        return $this;
    }

    public function getOfferSkills(): array
    {
        return $this->offerSkills;
    }

    public function setOfferSkills(string $offerSkills): self
    {
        $this->offerSkills = $offerSkills;

        return $this;
    }
}
