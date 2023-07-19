<?php
/**
 * User: ryun
 * Date: 11/21/18
 * Time: 9:16 AM
 */

namespace LGL\Seasonal\LocationProviders;


class Dummy implements Provider
{

    /**
     * @return array
     */
    public function getLocation(): array
    {
        return [
            'lat' => 40.8004,
            'lon' => -124.1528,
        ];
    }

}