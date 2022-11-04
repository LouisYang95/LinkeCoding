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
    private ?Company $company = null;

    #[ORM\Column(length: 255)]
    private ?string $offerName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionOffer = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $offerSkill = [];

    public function getId(): ?int
    {
        return $this->id;
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

    public function getOfferSkill(): array
    {
        return $this->offerSkill;
    }

    public function setOfferSkill(?array $offerSkill): self
    {
        $this->offerSkill = $offerSkill;

        return $this;
    }
}
