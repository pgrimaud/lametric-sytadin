<?php
namespace Lametric\Sytadin;

class Icon
{
    /**
     * @var integer
     */
    private $percent;

    /**
     * Icon constructor.
     * @param $percent
     */
    public function __construct($percent)
    {
        $this->percent = $percent;
    }
}