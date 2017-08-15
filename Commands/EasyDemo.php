<?php


namespace Commands;


use Easy\EasyCommand;
use Symfony\Component\Console\Input\InputArgument;


class EasyDemo extends EasyCommand
{



    public function handle()
    {
        $this->title('Easy Command Demo Title');
        $this->warning('this a warning');
        $this->error('this a error');
        $this->success('Successful');
        $this->message('simple text');
        $this->comment('comment');
        $this->note('note');

        $a = $this->ask('is this ok');
        $this->output->writeln($a);

        $a = $this->confirm('is this ok');
        $this->output->writeln($a);

        $c = $this->choose('gender', ['male', 'female']);
        $this->message($c);


    }


    /**
     * @return string name of the command
     */
    protected function name()
    {
        return 'easyDemo';
    }

}