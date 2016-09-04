<?php
namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;


class Demo extends Command
{
    protected function configure()
    {
        $this->setName('demo')
            ->setDescription('Show some features of commands')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Demo argument')
            ->setHelp("this shows help lines");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = $input->getArgument('arg1');

        switch ($command) {
            case 'progressbar':
                $this->progressBar($output);
                break;
            case 'question':
                $this->question($input, $output);
                break;
        }


    }

    private function progressBar(OutputInterface $output)
    {
        $bar = new ProgressBar($output);

        $bar->start(10);
        for ($i = 1; $i < 10; $i++) {
            $bar->advance();
            $bar->display();
            sleep(1);
        }
        $bar->finish();
        $output->writeln('');
    }

    private function question(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion('This is a confirmation question (Y): ', false);
        if (!$helper->ask($input, $output, $question)) {
            $output->writeln('You said no');
        } else {
            $output->writeln('You said yes');
        }

        $question = new Question('This is for input data : ', 'Default answer');
        $answer = $helper->ask($input, $output, $question);
        $output->writeln('This is your answer : ' . $answer);


        $helper = $this->getHelper('question');
        $output->writeln('This a multiple choice question: ');
        $question = new ChoiceQuestion(
            'Please select your favorite color (defaults to red)',
            array('red', 'blue', 'yellow'),
            0
        );
        $question->setErrorMessage('Color %s is invalid.');
        $color = $helper->ask($input, $output, $question);
        $output->writeln('You have just selected: ' . $color);
    }


}