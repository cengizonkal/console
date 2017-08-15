<?php


namespace Easy;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Output\OutputInterface;

abstract class EasyCommand extends Command
{
    protected $progressBar;
    /**
     * The input interface implementation.
     *
     * @var Input
     */
    protected $input;

    /**
     * The output interface implementation.
     *
     * @var Output
     */
    protected $output;


    protected function initialize(InputInterface $input, OutputInterface $output)
    {

    }


    abstract function handle();

}
