<?php

namespace App\Command;

use App\Entity\Profil;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use  Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'display:profil',
    description: 'Command : Create a profil with juste the name in option',
)]
class DisplayProfilCommand extends Command
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('name', null, InputOption::VALUE_REQUIRED, 'name of profile')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $name = $input->getOption('name');

        $profil = new Profil();
        $profil->setNameProfil($name);

        $output->write($name);

        $this->em->persist($profil);
        $this->em->flush();

        $output->write("Jobs add");

        return Command::SUCCESS;
    }
}
