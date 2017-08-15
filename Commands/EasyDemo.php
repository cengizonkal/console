<?php


namespace Commands;


use Easy\EasyCommand;
use Symfony\Component\Console\Input\InputArgument;


class EasyDemo extends EasyCommand
{


    protected $name = 'easyDemo';


    public function handle()
    {
        $this->message("test");
        $a = $this->ask('is this ok');
        $this->output->writeln($a);

        $a = $this->confirm('is this ok');
        $this->output->writeln($a);

        $c = $this->choose('gender', ['male', 'female']);
        $this->message($c);


    }


}