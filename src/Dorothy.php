<?php

/*
 * This file is part of the RMA package.
 *
 * (c) Douglas Smith <douglas@dascentral.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Dascentral\Rma;

class Dorothy
{
    /**
     * Create a new instance of this class.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Round down to the nearest multiple.
     *
     * @param int|float $value
     * @param int|null $multiple
     */
    public static function roundDownToNearest($value, $multiple): int
    {
        return floor(floor($value) / $multiple) * $multiple;
    }

    /**
     * Round to the nearest multiple.
     *
     * @param int|float $value
     * @param int|null $multiple
     */
    public static function roundUpToNearest($value, $multiple): int
    {
        return (round($value) % $multiple === 0)
            ? (int) round($value)
            : (int) round(($value + $multiple / 2) / $multiple) * $multiple;
    }
}
