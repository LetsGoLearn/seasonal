<?php
/**
 * User: ryun
 * Date: 11/21/18
 * Time: 9:15 AM
 */

namespace LGL\Seasonal;

use LGL\Seasonal\LocationProviders\Provider;

/**
 * Class Location
 *
 * @package Seasonal
 */
class Location
{
    /**
     * @var \LGL\Seasonal\LocationProviders\Provider
     */
    protected $provider;
    /**
     * @var \LGL\Seasonal\SeasonalDateRanges
     */
    protected $dateRangeCalc;


    /**
     * Location constructor.
     *
     * @param \LGL\Seasonal\LocationProviders\Provider $provider
     * @param \LGL\Seasonal\SeasonalDateRanges         $dateRangeCalc
     */
    public function __construct(Provider $provider, SeasonalDateRanges $dateRangeCalc)
    {
        $this->provider      = $provider;
        $this->dateRangeCalc = $dateRangeCalc;
    }


    /**
     * @return string
     */
    public function get()
    {
        $hemisphere = $this->getHemisphere($this->provider->getLocation()['lat']);

        return $this->dateRangeCalc->calculate($hemisphere);
    }

    /**
     * @return \Seasonal\LocationProviders\Provider
     */
    public function getProvider(): \Seasonal\LocationProviders\Provider
    {
        return $this->provider;
    }


    /**
     * @param \Seasonal\LocationProviders\Provider $provider
     */
    public function setProvider(\Seasonal\LocationProviders\Provider $provider)
    {
        $this->provider = $provider;
    }


    /**
     * @param $latitude
     *
     * @return string
     */
    public function getHemisphere($latitude)
    {
        return $latitude < 0 ? 'south' : 'north';
    }

}