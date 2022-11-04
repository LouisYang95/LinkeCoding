<?php

namespace App\Command;

use App\Entity\JobOffer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


#[AsCommand(
    name: 'jobs:update',
    description: 'Command : display jobs with matches profiles',
)]
class JobsUpdateCommand extends Command
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
            ->addOption('jobname', null, InputOption::VALUE_REQUIRED, 'name of jobs without profile')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $jobName = $input->getOption('jobname');

        $job = new JobOffer();
        $job->setOfferName($jobName);
        $output->write($jobName);

        $this->em->persist($job);
        $this->em->flush();

        $output->write("Jobs Create");

        return Command::SUCCESS;
    }
}
