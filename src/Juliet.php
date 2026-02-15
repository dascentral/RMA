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

class Juliet
{
    /**
     * Create a new instance of this class.
     *
     * @return void
     */
    public function __construct()
    {
        // no actions at the moment
    }

    /**
     * Format the name in our very special and customized manner.
     *
     * @param  string  $name
     */
    public static function format($name): string
    {
        // just to get us started
        return ucwords(strtolower($name));
    }
}
