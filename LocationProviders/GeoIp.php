<?php
/**
 * User: ryun
 * Date: 11/21/18
 * Time: 9:16 AM
 */

namespace LGL\Seasonal\LocationProviders;

use GeoIp2\Database\Reader;
use Illuminate\Support\Str;

class GeoIp implements Provider
{

    /**
     * @return array return lon lat of location
     * @throws \GeoIp2\Exception\AddressNotFoundException
     * @throws \MaxMind\Db\Reader\InvalidDatabaseException
     */
    public function getLocation(): array
    {
        $reader = new Reader(realpath(__DIR__.'/../resources').'/GeoLite2-City.mmdb');

        $record = $reader->city($this->getIp());

        return [
            'lat' => $record->location->latitude,
            'lon' => $record->location->longitude,
        ];
    }


    protected function getIp()
    {
        if ( ! empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif ( ! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return Str::contains($ip,'127.0.0.1') ? '8.8.8.8' : $ip;
    }
}