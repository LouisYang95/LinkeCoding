<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 244)]
    private ?string $nameProfil = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $career = null;

    #[ORM\Column(length: 255)]
    private ?string $skillsProfil = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameProfil(): ?string
    {
        return $this->nameProfil;
    }

    public function setNameProfil(string $nameProfil): self
    {
        $this->nameProfil = $nameProfil;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getCareer(): ?string
    {
        return $this->career;
    }

    public function setCareer(string $career): self
    {
        $this->career = $career;

        return $this;
    }

    public function getSkillsProfil(): ?string
    {
        return $this->skillsProfil;
    }

    public function setSkillsProfil(string $skillsProfil): self
    {
        $this->skillsProfil = $skillsProfil;

        return $this;
    }
}
