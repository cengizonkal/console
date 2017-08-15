<?php


namespace Commands;


use Easy\EasyCommand;
use Symfony\Component\Console\Input\InputArgument;

class EasyDemo extends EasyCommand
{

    protected function configure()
    {
        $this->setName('easyDemo')
            ->setDescription('Show some features of commands')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Demo argument')
            ->setHelp("this shows help lines");
    }
    public function handle()
    {
        $this->output->writeln('Test');
    }
}