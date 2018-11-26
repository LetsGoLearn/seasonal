<?php
/**
 * User: ryun
 * Date: 11/21/18
 * Time: 9:16 AM
 */

namespace LGL\Seasonal\LocationProviders;

/**
 * Interface Provider
 *
 * @package LGL\Seasonal\LocationProviders
 */
interface Provider
{
    /**
     * @return array return lon lat of location
     */
    public function getLocation(): array;
}