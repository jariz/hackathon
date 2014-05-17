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
            $data = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=52.378848,4.900568&radius=2500&types=".$type['name']."&sensor=false&key=AIzaSyC1MLIQOrIBfnjyDk78uP2yrDw7dkvm4hU");
            $object = json_decode($data);
            $this->command->info('Bedrijven ophalen van het type '.$type['name']);
            $this->createCompany($object->results);

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
            $this->command->info('Company aan gemaakt '. $result->name);
            foreach($result->types as $aType){
                $typeObject = Type::whereName($aType)->first();

                if( is_null($typeObject) )
                continue;

                $companyType = new CompanyType;
                $companyType->company_id = $compantObject->id;
                $companyType->type_id = $typeObject->id;
                $companyType->save();

                $this->command->info('Type  '.$typeObject->name.' gelinked aan'.$result->name);
            }
        }
    }

} 