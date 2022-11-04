<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Company;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $company = new Company;
        $company->setCompanyName("AD CORP");
        $company->setCompanyDescription("This is the company of Adrien, the Adrien Corporation");
        
        $manager->persist($company);
        $manager->flush();
    }
}
