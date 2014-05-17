<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 12:22 AM
 */

class TypesSeeder extends Seeder{

    public function run(){

        $types = [
           [
               'name' => 'book_store',
               'display_name' => 'Book store'
           ],

            [
                'name' => 'library',
                'display_name' => 'Library'
            ],
            [
                'name' => 'parking',
                'display_name' => 'Parking'
            ],
            [
                'name' => 'car_repair',
                'display_name' => 'Car repair'
            ],
            [
                'name' => 'car_wash',
                'display_name' => 'Car wash'
            ],
            [
                'name' => 'gas_station',
                'display_name' => 'Gas station'
            ],
           [
               'name' => 'car_dealer',
               'display_name' => 'Car dealer'
           ],
            [
                'name' => 'night_club',
                'display_name' => 'Nightclub'
            ],
            [
                'name' => 'bar',
                'display_name' => 'Bar'
            ],
            [
                'name' => 'cafe',
                'display_name' => 'Cafe'
            ],
            [
                'name' => 'shopping_mall',
                'display_name' => 'Shopping mall'
            ],
            [
                'name' => 'store',
                'display_name' => 'Store'
            ],
            [
                'name' => 'shoe_store',
                'display_name' => 'Shoe store'
            ],
            [
                'name' => 'dentist',
                'display_name' => 'Dentist'
            ],
            [
                'name' => 'hospital',
                'display_name' => 'Hospital'
            ],
            [
                'name' => 'doctor',
                'display_name' => 'Doctor'
            ],
            [
                'name' => 'pet_store',
                'display_name' => 'Pet store'
            ],
            [
                'name' => 'zoo',
                'display_name' => 'Zoo'
            ],
            [
                'name' => 'veterinary_care',
                'display_name' => 'Veterinary care'
            ],
            [
                'name' => 'meal_delivery',
                'display_name' => 'Meal delivery'
            ],
            [
                'name' => 'meal_takeaway',
                'display_name' => 'Meal takeaway'
            ],
            [
                'name' => 'taxi_stand',
                'display_name' => 'Taxi stand'
            ],
            [
                'name' => 'train_station',
                'display_name' => 'Train station'
            ],
            [
                'name' => 'bus_station',
                'display_name' => 'Bus station'
            ],
            [
                'name' => 'university',
                'display_name' => 'University'
            ]
        ];

        Type::truncate();

        foreach($types as $type){
            $TypeObject = new Type;

            foreach($type as $key => $value){
                $TypeObject->$key = $value;
            }

            $TypeObject->save();
        }

    }

} 