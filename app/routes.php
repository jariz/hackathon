<?php

Route::get("/", ['as' => 'home', 'uses' =>  "HomeController@show"]);
Route::get('questions', ['as' => 'questions', 'uses' => 'QuestionsController@show']);
Route::get('house/{id?}', ['as' => 'house', 'uses' => 'HouseController@show']);
Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@show']);

Route::get('test', function(){

    Company::truncate();

    $types = Type::all()->toArray();

    foreach($types as $type){
        $data = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=52.378848,4.900568&radius=16000&types=".$type['name']."&sensor=false&key=AIzaSyC1MLIQOrIBfnjyDk78uP2yrDw7dkvm4hU");
        $object = json_decode($data);

        foreach( $object->results as $result){
            $compantObject = new Company;
            $compantObject->name = $result->name;
            $compantObject->lat = $result->geometry->location->lat;
            $compantObject->lng = $result->geometry->location->lng;
            $compantObject->icon = $result->icon;
            $compantObject->maps_id = $result->id;
            $compantObject->save();
        }

    }



    return dd($object);
});