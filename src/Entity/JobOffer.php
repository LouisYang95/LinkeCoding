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

    #[ORM\ManyToOne(inversedBy: 'jobOffers')]
    private ?Company $companyName = null;

    #[ORM\Column(length: 255)]
    private ?string $offerName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionOffer = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $offerSkills = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skillOffer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?Company
    {
        return $this->companyName;
    }

    public function setCompanyName(?Company $companyName): self
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

    public function setOfferSkills(?array $offerSkills): self
    {
        $this->offerSkills = $offerSkills;

        return $this;
    }

    public function getSkillOffer(): ?string
    {
        return $this->skillOffer;
    }

    public function setSkillOffer(?string $skillOffer): self
    {
        $this->skillOffer= $skillOffer;

        return $this;
    }
}
