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

class Graham
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
     * Format the phone number in our very special and customized manner.
     *
     * @param  string $date
     * @return string
     */
    public static function format($phone)
    {
        // Since we are a US-based application, we want to strip the "+1" US country code to facilitate formatting below
        if (substr($phone, 0, 3) == '+1 ') {
            $phone = str_replace('+1 ', '', $phone);
        }

        // US numbers will have 10 digits. Otherwise, leave alone.
        if (preg_match_all('/[0-9]/', $phone) == 10) {
            $phone = preg_replace('/[^0-9]/', '', $phone);
            $phone = '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . '-' . substr($phone, 6);
        }

        // Empty phone values should be made null
        if (empty($phone)) {
            $phone = null;
        }

        return $phone;
    }
}
