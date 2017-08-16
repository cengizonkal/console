<?php


namespace Easy;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

abstract class EasyCommand extends Command
{

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
    /**
     * @var SymfonyStyle
     */
    protected $io;


    protected $description = 'description';


    protected $help = '';

    /**
     * @return string name of the command
     */
    abstract protected function name();

    protected function ask($question, $default = null)
    {
        return $this->io->ask($question, $default);
    }

    protected function confirm($question, $default = false)
    {
        return $this->io->confirm($question, $default);
    }

    protected function configure()
    {
        $this->setName($this->name())
            ->setDescription($this->description)
            ->setHelp($this->help);
        foreach ($this->arguments() as $argument) {
            $this->addArgument($argument->name, $argument->type, $argument->description);
        }

    }


    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;
        $this->io = new SymfonyStyle($this->input, $this->output);

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->handle();
    }

    protected function warning($message)
    {
        $this->io->warning($message);
    }

    protected function error($message)
    {
        $this->io->error($message);
    }

    protected function choose($question, Array $list)
    {
        return $this->io->choice($question, $list);

    }

    protected function success($message)
    {
        $this->io->success($message);
    }

    protected function message($message)
    {
        $this->io->text($message);
    }

    protected function title($title)
    {
        $this->io->title($title);
    }

    public abstract function handle();

    protected function comment($message)
    {
        $this->io->comment($message);
    }

    protected function note($message){
        $this->io->note($message);
    }

    /**
     * @return EasyArgument[]
     */
    abstract protected function arguments();

    protected function getArgument($name)
    {
         return $this->input->getArgument($name);
    }

}
