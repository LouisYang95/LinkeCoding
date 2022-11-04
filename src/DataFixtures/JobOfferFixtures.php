<?php

namespace App\DataFixtures;

use doctrine;
use App\Entity\Company;
use App\Entity\JobOffer;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class JobOfferFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $company = new Company();
        $company->setCompanyName('Company 1');
        $company->setCompanyDescription('Description 1');
        $manager->persist($company);
        $manager->flush();

        $jobOffer = new JobOffer;
        $jobOffer->setOfferName("Développeur Web");
        $jobOffer->setCompanyName($company);
        $jobOffer->setDescriptionOffer("Nous recherchons un développeur web pour notre agence de communication");
        $jobOffer->setOfferSkills(["HTML", "CSS", "PHP", "JavaScript", "Symfony"]);
        $jobOffer->setSkillOffer('java');
        $manager->persist($jobOffer);
        $manager->flush();
    }
}
