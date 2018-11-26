<?php
/**
 * User: ryun
 * Date: 11/21/18
 * Time: 9:14 AM
 */

namespace LGL\Seasonal;

/**
 * Class Seasonal
 *
 * @package App\Seasonal\src
 */
class Seasonal
{
    /**
     * @var \LGL\Seasonal\Location
     */
    protected $location;


    /**
     * Seasonal constructor.
     *
     * @param \LGL\Seasonal\Location $location
     */
    public function __construct(Location $location)
    {
        $this->location = $location;

        return $this;
    }


    /**
     * @return string
     */
    public function get()
    {
        return $this->location->get();
    }


    /**
     * @return \LGL\Seasonal\Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }


    /**
     * @param \LGL\Seasonal\Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }
}