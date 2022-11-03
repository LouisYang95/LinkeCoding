<?php

namespace App\Entity;

use App\Repository\JobOfferRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobOfferRepository::class)]
class JobOffer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $offerTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $companyName = null;

    #[ORM\Column(length: 255)]
    private ?string $placeOfOffer = null;

    #[ORM\Column]
    private ?int $salary = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOfferTitle(): ?string
    {
        return $this->offerTitle;
    }

    public function setOfferTitle(string $offerTitle): self
    {
        $this->offerTitle = $offerTitle;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getPlaceOfOffer(): ?string
    {
        return $this->placeOfOffer;
    }

    public function setPlaceOfOffer(string $placeOfOffer): self
    {
        $this->placeOfOffer = $placeOfOffer;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): self
    {
        $this->salary = $salary;

        return $this;
    }
}
