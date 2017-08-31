<?php


namespace Commands;


use Easy\EasyArgument;
use Easy\EasyCommand;
use Easy\EasyDB;


class EasyDemo extends EasyCommand
{


    public function handle()
    {
//        $db = new EasyDB();
//        dd($db->table('users')->get());


        $this->message('argument:' . $this->getArgument('arg1'));

        $this->title('Easy Command Demo Title');
        $this->warning('this a warning');
        $this->error('this a error');
        $this->success('Successful');
        $this->message('simple text');
        $this->comment('comment');
        $this->note('note');

        $a = $this->ask('This is a question');
        $this->message($a);

        if ($this->confirm('Please confirm')) {
            $this->message('Confirmed');
        } else {
            $this->message('Declined');
        };


        $c = $this->choose('Choose a gender', ['male', 'female']);
        $this->message($c);

        $this->io->progressStart(100);
        for ($i = 0; $i < 100; $i += 20) {
            $this->io->progressAdvance(20);
            sleep(1);
        }
        $this->io->progressFinish();


    }


    /**
     * @return string name of the command
     */
    protected function name()
    {
        return 'easyDemo';
    }

    /**
     * @return EasyArgument[]
     */
    protected function arguments()
    {
        return [
            new EasyArgument('arg1', EasyArgument::OPTIONAL),
        ];
    }


}