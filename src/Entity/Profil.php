<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameProfil = '';

    #[ORM\Column(length: 255)]
    private ?string $firstName = '';

    #[ORM\Column(length: 255)]
    private ?string $career = '';

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $skillsProfil = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profilSkill = null;

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

    public function getSkillsProfil(): array
    {
        return $this->skillsProfil;
    }

    public function setSkillsProfil(?array $skillsProfil): self
    {
        $this->skillsProfil = $skillsProfil;

        return $this;
    }

    public function getProfilSkill(): ?string
    {
        return $this->profilSkill;
    }

    public function setProfilSkill(?string $profilSkill): self
    {
        $this->profilSkill = $profilSkill;

        return $this;
    }
}
