<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Validator\DateValidator;
use App\Converter\MarsConverter;




class RunConvertorCommand extends Command
{
     // the name of the command (the part after "bin/console")
     protected static $defaultName = 'app:convert-mars';

     protected function configure()
     {
        $this
        ->setName(self::$defaultName)
        // the short description shown while running "php bin/console list"
        ->setDescription('Convert Earth date and time to Mars. Sample: YYYY-MM-DD H24:Mi:SS ')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command convert earth date and time to Mars Sol Date (MSD) and Martian Coordinated Time (MTC)')
        ->addArgument('date',InputArgument::REQUIRED,'Date and time to convert')
        ->addArgument('time',InputArgument::REQUIRED,'Time and time to convert');
     }
 
     protected function execute(InputInterface $input, OutputInterface $output)
     {
        $date = $input->getArgument('date');
        $time = $input->getArgument('time');
        $output->writeln("Converting  $date $time \n");

        $request = Request::create(
            '/api/convert',
            'POST',
            ['datetime' => $date.' '.$time]
        );

        // Convert and show in command line
        $reader = new DateValidator($request);
        $converter = new MarsConverter($reader->getDateTime());
        $marsSolDate = $converter->getMarsSolDate();
        $martianTime = $converter->getMartianCoordinatedTime();

        $output->writeln("Mars Sol Date (MSD): $marsSolDate \n");
        $output->writeln("Martian Coordinated Time (MTC): $martianTime \n");
        
        return Command::SUCCESS;
 
     }
}