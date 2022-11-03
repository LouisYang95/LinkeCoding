<?php

namespace App\DataFixtures;

use App\Entity\Profil;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        for($i = 0; $i < 20; $i++){
            $profil = new Profil();
            $profil->setNameProfil('TestNameProfil'.$i);
            $profil->setFirstName('MyFirstName'.$i);
            $manager->persist($profil);
        }
        $manager->flush();
    }
}