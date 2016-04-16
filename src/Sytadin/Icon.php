<?php
namespace Lametric\Sytadin;

class Icon
{
    const ICON_ERROR = 'i1';

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