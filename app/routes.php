<?php

Route::get("/", ['as' => 'home', 'uses' =>  "HomeController@show"]);
Route::get('questions', ['as' => 'questions', 'uses' => 'QuestionsController@show']);
Route::get('house/{id?}', ['as' => 'house', 'uses' => 'HouseController@show']);
Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@show']);
Route::get("count/excluded/{params}", ["as" => "count-excluded", "uses" => "QuestionsController@countExcluded"]);