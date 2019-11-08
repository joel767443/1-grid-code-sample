<?php


namespace App\Services;


/**
 * Class GoogleService
 * @package App\Services
 */
class GoogleService
{

    /**
     * Get the distance from an employees address
     * and time it will take to travel to the office in traffic
     *
     * @param $address
     * @return bool|string
     */
    public static function getLatLng($address)
    {
        try {

            $latLng = self::getGeoCode($address);
            return self::getDistance($latLng);

        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * get the latitude and longitude of the employee's address
     *
     * @param $address
     * @return false|string
     */
    private static function getGeoCode($address)
    {
        $geocode = json_decode(file_get_contents('https://maps.google.com/maps/api/geocode/json?address=' . str_replace(' ', '+', $address) . '&sensor=false&key=AIzaSyCCX5ppLL8PIM3FPVuMEKl_1A_jp7M_ZYA'));

        return $geocode->results[0]->geometry->location->lat . "," . $geocode->results[0]->geometry->location->lng;
    }

    /**
     * Get the distance and time from employee's latitude and longitude
     * to the office's latitude and longitude
     *
     * @param $latLng
     * @return false|string
     */
    private static function getDistance($latLng)
    {
        $result = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=" . $latLng . "&destination=" . env("OFFICE_LOCATION", "-33.929343,18.430018") . "&departure_time=now&key=" . env('GOOGLE_KEY', 'AIzaSyCCX5ppLL8PIM3FPVuMEKl_1A_jp7M_ZYA')));
        return $result->routes[0]->legs[0]->distance->text . " " . $result->routes[0]->legs[0]->duration_in_traffic->text . " in traffic";
    }
}
