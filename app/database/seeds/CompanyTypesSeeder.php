<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 12:23 AM
 */

class CompanyTypesSeeder extends Seeder {

    public function run(){

        Company::truncate();

        $types = Type::all()->toArray();

        foreach($types as $type){
            $data = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=52.378848,4.900568&radius=16000&types=".$type['name']."&sensor=false&key=AIzaSyC1MLIQOrIBfnjyDk78uP2yrDw7dkvm4hU");
            $object = json_decode($data);
            $this->createCompany($object->results);
        }


    }

    public function createCompany($results){
        foreach( $results as $result){
            $compantObject = new Company;
            $compantObject->name = $result->name;
            $compantObject->lat = $result->location->lat;
            $compantObject->lng = $result->location->lng;
            $compantObject->icon = $result->icon;
            $compantObject->map_id = $result->id;
            $compantObject->save();
        }
    }

} 