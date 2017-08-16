<?php


namespace Easy;


class EasyArgument
{
    public $name;
    public $description;
    public $type;

    const REQUIRED = 1;
    const OPTIONAL = 2;
    const IS_ARRAY = 4;

    /**
     * EasyArgument constructor.
     * @param $name
     * @param $type
     * @param $description
     */
    public function __construct($name, $type = 1, $description = 'Argument Description')
    {
        $this->name = $name;
        $this->description = $description;
        if (in_array($type, [1, 2, 4])) {
            $this->type = $type;
        } else {
            $this->type = 1;
        }
    }


}