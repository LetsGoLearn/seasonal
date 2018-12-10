<?php

namespace LGL\Seasonal\LocationProviders;

/**
 * User: ryun
 * Date: 11/21/18
 * Time: 9:16 AM
 */

namespace LGL\Seasonal\LocationProviders;

/**
 * Class Custom
 *
 * @package LGL\Seasonal\LocationProviders
 */
class Custom implements Provider
{

    protected $hemisphere = 'north';


    /**
     * Preset constructor.
     *
     * @param string $hemisphere
     */
    public function __construct($hemisphere = 'north')
    {
        $this->hemisphere = [
            'lat' => $hemisphere == 'north' ? 1 : -1,
            'lon' => -124.1528,
        ];
    }


    /**
     *
     */
    public function setNorth()
    {
        $this->hemisphere['lat'] = 1;
    }


    /**
     *
     */
    public function setSouth()
    {
        $this->hemisphere['lat'] = -1;
    }


    /**
     * @return array
     */
    public function getLocation(): array
    {
        return $this->hemisphere;
    }

}