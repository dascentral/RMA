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
    public static function firstSundayOfYear($year = null)
    {
        $year = $year ? (int) $year : Date('Y');
        $sunday = Carbon::parse($year . '-01-01')->startOfWeek(Carbon::SUNDAY);
        return ((int) $sunday->format('Y') === $year) ? $sunday : $sunday->addDays(7);
    }

    /**
     * Determine the first week of the given year.
     *
     * @param  int $year
     * @return Isotope
     */
    public static function firstWeekOfYear($year = null)
    {
        $year = $year ? (int) $year : Date('Y');
        return Carbon::parse($year . '-01-01')->startOfWeek(Carbon::SUNDAY);
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
     * Create a human readable representation of a typical "last_updated" DATETIME value.
     *
     * @param  mixed $date
     * @param  boolean $withTime
     * @return string
     */
    public static function lastUpdated($date, $withTime = true): string
    {
        $objDate = self::parse($date);
        $date = self::parse($objDate)->format('Y-m-d');
        $days = self::parse(Date('Y-m-d'))->diffInDays(self::parse($date));

        if ($days == 0) {
            $msg = 'today';
        } elseif ($days == 1) {
            $msg = 'yesterday';
        } elseif ($days > 1 && $days < 7) {
            $msg = $objDate->format('l');
        } elseif ($days >= 7 && $days < 32) {
            $msg = $days . ' days ago';
            $withTime = false;
        } elseif ($days >= 32 && $days < 365) {
            $months = self::parse(Date('Y-m-d'))->diffInMonths($objDate);
            $msg = $months . (($months > 1) ? ' months ' : ' month ') . 'ago';
            $withTime = false;
        } else {
            $years = self::parse(Date('Y-m-d'))->diffInYears($objDate);
            $msg = $years . (($years > 1) ? ' years ' : ' year ') . 'ago';
            $withTime = false;
        }

        return ($withTime) ? $msg . ' at ' . $objDate->format('g:ia') : $msg;
    }

    /**
     * Create a Carbon object for 12:00am on the provided date.
     *
     * @param  mixed $date
     * @return Isotope
     */
    public static function midnight($date = null)
    {
        $date = $date ? Carbon::parse($date) : Carbon::now();
        return Carbon::createMidnightDate($date->format('Y'), $date->format('n'), $date->format('j'));
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
     * Helper method that determines the Sunday of the given week.
     *
     * @param  string $date
     * @return Isotope
     */
    public static function sunday($date = null)
    {
        if ($date) {
            return Carbon::parse($date)->startOfWeek(Carbon::SUNDAY);
        }

        return Carbon::now()->startOfWeek(Carbon::SUNDAY);
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
     * Convert the provided date into an array that describes the week containing the given date.
     *
     * @param  string $date
     * @return array
     */
    public static function weekDetails($date): array
    {
        $sunday = self::sunday($date);
        $current = ($sunday->eq(self::sunday())) ? 1 : 0;
        $future = ($sunday->gt(self::now())) ? 1 : 0;
        $past = (!$current && !$future) ? 1 : 0;

        return [
            'sunday' => $sunday->format('Y-m-d'),
            'past' => $past,
            'current' => $current,
            'future' => $future,
            'prev_week' => $sunday->copy()->subDays(7)->format('Y-m-d'),
            'next_week' => $sunday->copy()->addDays(7)->format('Y-m-d'),
        ];
    }

    /**
     * Return the provided number of weekdays.
     *
     * @param  int $num
     * @param  mixed $start
     * @return array
     */
    public static function weekdays($num = 1, $start = null): array
    {
        $day = $start ? self::parse($start) : self::now();

        $days = [];
        while (count($days) < $num) {
            if (!$day->isWeekend()) {
                $days[] = clone $day;
            }
            $day->addWeekday();
        }
        return $days;
    }
}
