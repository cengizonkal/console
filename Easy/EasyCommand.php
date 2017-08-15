<?php


namespace Easy;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

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

    protected function ask($question, $default = null)
    {
        $helper = $this->getHelper('question');
        $question = new Question('<fg=yellow>' . $question . '</>', $default);
        $answer = $helper->ask($this->input, $this->output, $question);
        return $answer;
    }

    protected function confirm($question, $default = false)
    {
        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion($question, $default);
        return $helper->ask($this->input, $this->output, $question);

    }


    protected function initialize(InputInterface $input, OutputInterface $output)
    {
        $this->input = $input;
        $this->output = $output;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->handle();
    }

    public abstract function handle();

}
