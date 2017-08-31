<?php


namespace Easy;

use Illuminate\Database\Capsule\Manager as Capsule;

class EasyDB extends Capsule
{
    public function __construct()
    {
        parent::__construct();
        $this->connect();
        $this->setAsGlobal();
    }

    public function connect()
    {
        foreach (config('database') as $connection => $database) {
            $this->addConnection($database, $connection);
        }
    }
}