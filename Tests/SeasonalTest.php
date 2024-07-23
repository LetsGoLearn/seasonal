<?php
/**
 * User: ryun
 * Date: 11/21/18
 * Time: 12:06 PM
 */

namespace LGL\Seasonal\Tests;

use Carbon\Carbon;
use LGL\Seasonal\Location;
use LGL\Seasonal\LocationProviders\Custom;
use LGL\Seasonal\SeasonalDateRanges;

/**
 * Class TestCase
 *
 * @package LGL\Seasonal\tests
 */
class SeasonalTest extends TestCase
{

    /**
     * @test
     */
    public function it_can_calculate_all_seasons()
    {

        // Winter
        Carbon::setTestNow(Carbon::create(2018, 12, 25));
        $this->assertEquals('WINTER', $this->seasonal->get());

        // Winter from Jan
        Carbon::setTestNow(Carbon::create(2019, 01, 04));
        $this->assertEquals('WINTER', $this->seasonal->get());

        // Spring
        Carbon::setTestNow(Carbon::create(2019, 03, 23));
        $this->assertEquals('SPRING', $this->seasonal->get());

        // Summer
        Carbon::setTestNow(Carbon::create(2019, 06, 23));
        $this->assertEquals('SUMMER', $this->seasonal->get());
    }


    /**
     * @test
     */
    public function it_can_calculate_all_seasons_with_custom_provider()
    {
        $this->seasonal->setLocation(new Location(new Custom('north'), new SeasonalDateRanges));
        // Winter
        Carbon::setTestNow(Carbon::create(2018, 12, 25));
        $this->assertEquals('WINTER', $this->seasonal->get());

        // Winter from Jan
        Carbon::setTestNow(Carbon::create(2019, 01, 04));
        $this->assertEquals('WINTER', $this->seasonal->get());

        // Spring
        Carbon::setTestNow(Carbon::create(2019, 03, 23));
        $this->assertEquals('SPRING', $this->seasonal->get());

        // Summer
        Carbon::setTestNow(Carbon::create(2019, 06, 23));
        $this->assertEquals('SUMMER', $this->seasonal->get());

        $this->seasonal->setLocation(new Location(new Custom('north'), new SeasonalDateRanges));
        // Winter
        Carbon::setTestNow(Carbon::create(2018, 12, 25));
        $this->assertEquals('WINTER', $this->seasonal->get());

        // Winter from Jan
        Carbon::setTestNow(Carbon::create(2019, 01, 04));
        $this->assertEquals('WINTER', $this->seasonal->get());

        // Spring
        Carbon::setTestNow(Carbon::create(2019, 03, 23));
        $this->assertEquals('SPRING', $this->seasonal->get());

        // Summer
        Carbon::setTestNow(Carbon::create(2019, 06, 23));
        $this->assertEquals('SUMMER', $this->seasonal->get());
    }
}