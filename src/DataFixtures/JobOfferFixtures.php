<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\JobOffer;

class JobOfferFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $jobOffer = new JobOffer;
        
        $jobOffer->setOfferName("Développeur Web");
        $jobOffer->setDescriptionOffer("Nous recherchons un développeur web pour notre agence de communication");
        $jobOffer->setOfferSkill(["HTML", "CSS", "PHP", "JavaScript", "Symfony"]);
        $manager->flush();
    }
}
