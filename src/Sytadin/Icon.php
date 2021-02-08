<?php

declare(strict_types=1);

namespace Lametric;

class Icon
{
    const ICON_ERROR = 'i2809';

    /**
     * @param int $delay
     * @param int $time
     *
     * @return string
     */
    public static function getDelayIcon(int $delay, int $time): string
    {
        if ($delay === 0) {
            return 'i2817';
        } elseif ($delay < $time) {
            return 'i2818';
        } else {
            return 'i2819';
        }
    }
}
