<?php
namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Test extends Command
{
    protected function configure()
    {
        $this->setName('test')
            ->setDescription('Creates new users.')
            ->setHelp("This command allows you to create users...");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $bar = new ProgressBar($output);
        $bar->setBarWidth(100);

        for ($i = 1; $i < 100; $i++) {
            $bar->advance();
            $bar->display();
            sleep(1);
        }
        $bar->finish();


    }
}