<?php
/**
 * JARIZ.PRO
 * Date: 17/05/2014
 * Time: 02:20
 * Author: JariZ
 */
namespace HomeIntres;
use Company, CompanyType, Type;
class Search {
    public static function getHousesBasedOnInterests($interests) {
        //STAGE 1 - Loop trough all companies that are of interest.
        //Check for houses within range of these companies.

        //get all houses
//        $houses = \House::take(50)->get();
        $houses = \House::all();

        //get config value for min distance
        $mindistance = \Config::get("homeinterest.minrange");

        //get all companies that are of interest
        $companies = [];
        foreach($interests as $interest) {
            /* @var $interest CompanyType */
            $cts = CompanyType::where("type_id", "=", $interest->id)->get();
            foreach($cts as $ct) {
                $company = Company::find($ct->company_id);
                $company->type = $interest->name;
                $companies[] = $company;
            }


        }

        $i = 0;
        $z = 0;
        foreach($houses as $house) {
//            if($i > 100) {
//                $i = 0;
//                echo "..... hunderd .... \n";
//            }
            echo "house ".$house->id."\n";

            $house_categories = [];
            foreach($companies as $company) {
                $z++;
                $i++;
//                if($z > 10000) die("DOOD: ".$i);

//                $lat = ($company->lat < $house->lat) ? ($house->lat - $company->lat) : ($company->lat - $house->lat);
//                $lng = ($company->lng < $house->lng) ? ($house->lng - $company->lng) : ($company->lng - $house->lng);
//                if($mindistance < $lat|| $mindistance < $lng) {
//                    $house_categories[$company->type] = true;
//                }
                if(($s = self::vincentyGreatCircleDistance($company->lat, $company->lng, $house->lat, $house->lng)) <= 4000)
                    $house_categories[$company->type] = true;
            }
//            if(count($house_categories)) xdebug_break();
            var_dump(count($house_categories));
            foreach(array_keys($house_categories) as $cat) {
                $house->$cat = 1;
            }
            $house->save();
            //verwerk house_categories
        }

        var_dump($i);


    }

    /**
     * Calculates the great-circle distance between two points, with
     * the Vincenty formula.
     * @param float $latitudeFrom Latitude of start point in [deg decimal]
     * @param float $longitudeFrom Longitude of start point in [deg decimal]
     * @param float $latitudeTo Latitude of target point in [deg decimal]
     * @param float $longitudeTo Longitude of target point in [deg decimal]
     * @param float $earthRadius Mean earth radius in [m]
     * @return float Distance between points in [m] (same as earthRadius)
     */
    public static function vincentyGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }
} 