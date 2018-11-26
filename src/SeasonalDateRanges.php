<?php
/**
 * User: ryun
 * Date: 11/21/18
 * Time: 9:22 AM
 */

namespace LGL\Seasonal;

use Carbon\Carbon;

/**
 * Class SeasonalDateRanges
 *
 * @package LGL\Seasonal
 */
class SeasonalDateRanges
{
    protected $north = [
        'SUMMER' => ['06-21', '09-20'],
        'FALL'   => ['09-21', '12-20'],
        'WINTER' => ['12-21', '03-20'],
        'SPRING' => ['03-21', '06-20']
    ];

    protected $south = [
        'SUMMER' => ['12-21', '03-20'],
        'FALL'   => ['03-21', '06-20'],
        'WINTER' => ['06-21', '09-20'],
        'SPRING' => ['09-21', '12-20']
    ];


    /**
     * @param string $hemisphere
     *
     * @return string
     */
    public function calculate($hemisphere = 'north'): string
    {
        $dates          = $this->{$hemisphere};
        $now            = Carbon::now();
        $year           = $now->year;
        $season         = $hemisphere == 'north' ? 'WINTER' : 'SUMMER';

        foreach ($dates as $key => $range) {

            $start = Carbon::createFromFormat('Y-m-d', $year.'-'.$range[0])->startOfDay();
            $end   = Carbon::createFromFormat('Y-m-d', $year.'-'.$range[1])->endOfDay();
            if ($key == $season) continue;
            if ($now->between($start, $end)) {
                $season = $key;
                break;
            }
        }

        return $season;
    }


    /**
     * @param string $hemisphere
     *
     * @return array
     */
    public function getDates($hemisphere)
    {
        return $this->{$hemisphere};
    }


    /**
     * @param       $hemisphere
     * @param array $dates
     *
     * @return $this
     * @throws \Exception
     */
    public function setDates($hemisphere, array $dates)
    {
        $this->throwIfInvalidHemisphere($hemisphere);

        $this->{$hemisphere} = $dates;

        return $this;
    }


    /**
     * @param array $dates
     *
     * @return \LGL\Seasonal\SeasonalDateRanges
     * @throws \Exception
     */
    public function setNorth(array $dates)
    {
        return $this->setDates('north', $dates);
    }


    /**
     * @param array $dates
     *
     * @return \LGL\Seasonal\SeasonalDateRanges
     * @throws \Exception
     */
    public function setSouth(array $dates)
    {
        return $this->setDates('south', $dates);
    }


    /**
     * @param $hemisphere
     *
     * @return bool
     */
    protected function isValidHemisphere($hemisphere)
    {
        return $hemisphere === 'north' || $hemisphere === 'south';
    }


    /**
     * @param $hemisphere
     *
     * @return void
     * @throws \Exception
     */
    protected function throwIfInvalidHemisphere($hemisphere)
    {
        if ($this->isValidHemisphere($hemisphere)) {
            throw new \Exception('Invalid hemisphere.');
        }
    }
}