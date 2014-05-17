<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 1:29 AM
 */

class QuestionsController extends BaseController {

    private $question = [
        [
            'phrase' => 'Do you like books?',
            'answers' => [
                    'no' => [
                        'book_store',
                        'library'
                    ]
             ]
        ],
        [
            'phrase' => 'Do you have a car?',
            'answers' => [
                'no' => [
                    'parking',
                    'car_repair',
                    'car_wash',
                    'gas_station'
                ],
                'yes' => [
                    'car_dealer'
                ]
            ]
        ],
        [
            'phrase' => 'Do you like to party?',
                'no' => [
                    'night_club',
                    'bar'
                ]

        ],
        [
            'phrase' => 'Do you like coffee?',
            'no' => [
                'cafe'
            ]
        ],
        [
            'phrase' => 'Do you like shopping?',
            'no' => [
                'shopping_mall',
                'store',
                'shoe_store'
            ]
        ],
        [
            'phrase' => 'Do you have health problems?',
            'no' => [
                'dentist',
                'hospital',
                'doctor'
            ]
        ],
        [
           'phrase' => 'Do you like animals?',
            'no' => [
                'pet_store',
                 'zoo'
            ]

        ],

        [
            'phrase' => 'Do you have a pet?',
            'no' => [
                'veterinary_care'
            ]
        ],

        [
            'phrase' => 'Do you like to cook?',
            'no' => [
                'meal_delivery',
                'meal_takeaway'
            ]
        ],
        [
            'phrase' => 'Do you use the public transport often?.',
            'no' => [
                'taxi_stand',
                'train_station',
                'bus_station'
            ]
        ],
        [
            'phrase' => 'Are you planning to study',
            'no' => [
                'university'
            ]
        ]

    ];

    public function show(){
        return View::make("questions");
    }

    public function getResults(){
        $filterTypes = Session::get('filter');

    }

    public function resetFilter(){
        Session::forget('filter');
    }

} 