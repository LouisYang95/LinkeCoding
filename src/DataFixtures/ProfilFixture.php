<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Profil;

class ProfilFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $profil = new Profil();
        $profil->setNameProfil("Adrien");
        $profil->setFirstName("Adrien");
        $profil->setCareer("Développeur Web");
        $profil->setSkillsProfil(["PHP", "Symfony", "HTML", "CSS", "JavaScript", "MySQL"]);
        
        $manager->persist($profil);
        $manager->flush();
    }
}
