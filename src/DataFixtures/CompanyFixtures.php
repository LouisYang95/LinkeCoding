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

        $company1 = new Company;
        $company1->setCompanyName("ABED CORP");
        $company1->setCompanyDescription("This is the company of ABED, the ABED Corporation");
        
        $manager->persist($company1);
        $manager->flush();

        
        $company2 = new Company;
        $company2->setCompanyName("Florian CORP");
        $company2->setCompanyDescription("This is the company of ABED, the ABED Corporation");
        
        $manager->persist($company2);
        $manager->flush();
        
        $company3 = new Company;
        $company3->setCompanyName("Louis CORP");
        $company3->setCompanyDescription("This is the company of ABED, the ABED Corporation");
        
        $manager->persist($company3);
        $manager->flush();
    }
}
