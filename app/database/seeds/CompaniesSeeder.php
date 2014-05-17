<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 12:21 AM
 */

class CompaniesSeeder extends Seeder{

    public function run(){
        Company::truncate();
        CompanyType::truncate();

        $types = Type::all()->toArray();

        foreach($types as $type){
            $base_url = $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=52.378848,4.900568&radius=2500&types=".$type['name']."&sensor=false&key=AIzaSyC1MLIQOrIBfnjyDk78uP2yrDw7dkvm4hU";
            $this->getCompaniesFromType($type, $base_url, $url);

        }
    }

    public function getCompaniesFromType($type, $base_url, $url){

        $this->command->info('fetch '.$url);
        $data = file_get_contents($url);
        $object = json_decode($data);
        if( $this->createCompany($object->results) ){
            if( isset($object->next_page_token ) ){
                $url =  $base_url.'&pagetoken='.$object->next_page_token;
                $this->getCompaniesFromType($type, $base_url, $url);
            }
        }
    }

    public function createCompany($results){
        foreach( $results as $result){

           if( !is_null( Company::whereMapsId($result->id)->first() ))
                continue;

            $compantObject = new Company;
            $compantObject->name = $result->name;
            $compantObject->lat = $result->geometry->location->lat;
            $compantObject->lng = $result->geometry->location->lng;
            $compantObject->icon = $result->icon;
            $compantObject->maps_id = $result->id;
            $compantObject->save();

            // Create company types
//            $this->command->info('Company aan gemaakt '. $result->name);
            foreach($result->types as $aType){
                $typeObject = Type::whereName($aType)->first();

                if( is_null($typeObject) )
                continue;

                $companyType = new CompanyType;
                $companyType->company_id = $compantObject->id;
                $companyType->type_id = $typeObject->id;
                $companyType->save();

//                $this->command->info('Type  '.$typeObject->name.' gelinked aan'.$result->name);
            }
        }

        return true;
    }

} 