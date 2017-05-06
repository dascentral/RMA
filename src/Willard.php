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
     * Determine the first sunday of the given year.
     *
     * @param  int $year
     * @return Isotope
     */
    public static function firstSundayOfYear($year)
    {
        $new_years_day = $year . '-01-01';
        $day_of_week = Date('N', strtotime($new_years_day));
        $first_sunday = ($day_of_week == 7) ? self::parse($new_years_day) : self::parse($new_years_day)->addDays(7 - $day_of_week);
        return $first_sunday;
    }

    /**
     * Convert the provided date into a custom human readable form.
     *
     * @param  mixed $date
     * @return string
     */
    public static function human($date, $format = 'l, M j'): string
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
            return self::parse($date)->format($format);
        }
    }

    /**
     * Return an array of days for populating an HTML <select> element.
     *
     * @param  string $format
     * @return array
     */
    public static function selectDays($format = '%02d'): array
    {
        $days = [];
        for ($i = 1; $i <= 31; $i++) {
            $val = sprintf($format, $i);
            $label = $i;
            $days[$val] = $label;
        }
        return $days;
    }

    /**
     * Return an array of months for populating an HTML <select> element.
     *
     * @param  string $format
     * @return array
     */
    public static function selectMonths($format = '%02d'): array
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $val = sprintf($format, $i);
            $label = Date('F', strtotime('2000-' . $val . '-01'));
            $months[$val] = $label;
        }
        return $months;
    }

    /**
     * Determine the Sunday of the given week.
     *
     * @param  string $date
     * @return Isotope
     */
    public static function sunday($date = null)
    {
        // create a class object
        $date = ($date) ? self::parse($date) : self::parse(Date('Y-m-d'));

        // return the date if it is already sunday
        if ($date->format('l') == 'Sunday') {
            return $date;
        }

        // calculate the sunday prior
        $days_ahead_of_sunday = (int) $date->format('w');
        return $date->subDays($days_ahead_of_sunday);
    }

    /**
     * Return an array of Sundays for the provided year.
     *
     * @param  int $year
     * @return array
     */
    public static function sundays($year = null): array
    {
        // determine the first sunday that is inclusive of all days in the given year
        $year = ($year) ? (int) $year : Date('Y');
        $this_sunday = static::firstSundayOfYear($year);
        if ($this_sunday->format('m-d') != '01-01') {
            $this_sunday->subDays(7);
        }

        // load up the array and return
        $sundays = [];
        while ((int) $this_sunday->format('Y') <= ($year)) {
            $sundays[] = clone $this_sunday;
            $this_sunday = $this_sunday->addDays(7);
        }
        return $sundays;
    }

    /**
     * Return the provided number of weekdays.
     *
     * @param  int $num
     * @return array
     */
    public static function weekdays($num = 1): array
    {
        $days = [];
        $day = self::parse(Date('Y-m-d'));
        while (count($days) < $num) {
            if (!$day->isWeekend()) {
                $days[] = clone $day;
            }
            $day->addWeekday();
        }
        return $days;
    }
}
