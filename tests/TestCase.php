<?php
/**
 * User: ryun
 * Date: 11/21/18
 * Time: 12:06 PM
 */

namespace LGL\Seasonal\Tests;

use Carbon\Carbon;
use LGL\Seasonal\Location;
use LGL\Seasonal\LocationProviders\Dummy;
use LGL\Seasonal\Seasonal;
use LGL\Seasonal\SeasonalDateRanges;
use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase
 *
 * @package LGL\Seasonal\tests
 */
class TestCase extends BaseTestCase
{

    /**
     * @var \LGL\Seasonal\Seasonal
     */
    protected $seasonal;


    protected function setUp()
    {
        $location       = new Location(new Dummy, new SeasonalDateRanges);
        $this->seasonal = new Seasonal($location);
    }
}