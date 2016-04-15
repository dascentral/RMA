<?php

/*
 * This file is part of the RMA package.
 *
 * (c) Douglas Smith <douglas@dascentral.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dascentral\Rma\Willard;

use Carbon\Carbon;

class Willard extends Carbon
{
    /**
     * Create a new instance of this class.
     *
     * @return void
     */
    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);
    }

    /**
     * Determine the Sunday of the given week.
     *
     * @param  string $date
     * @return Isotope
     */
    public static function sunday($date = null)
    {
        return (Date('N') == 7) ? self::parse(Date('Y-m-d')) : self::parse('last Sunday');
    }

    /**
     * Convert the provided date into a custom human readable form.
     *
     * @param  mixed $date
     * @return string
     */
    public static function human($date)
    {
        $diff = self::parse(Date('Y-m-d'))->diffInDays(self::parse($date), false);
        if ($diff == 0) {
            return 'Today';
        } elseif ($diff == 1) {
            return 'Tomorrow';
        } elseif ($diff == -1) {
            return 'Yesterday';
        } elseif ($diff > 0 && $diff < 7) {
            return self::parse($date)->format('l');
        } elseif ($diff < 0 && $diff > -7) {
            return 'last ' . self::parse($date)->format('l');
        } else {
            return self::parse($date)->format('l, M j');
        }
    }
}
