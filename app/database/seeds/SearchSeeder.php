<?php
/**
 * JARIZ.PRO
 * Date: 17/05/2014
 * Time: 06:21
 * Author: JariZ
 */

class SearchSeeder extends Seeder{
    public function run() {
        $types = Type::all();
        foreach(House::all() as $house) {
            foreach($types as $type) {
                $omg = $type->name;
                $house->$omg= mt_rand(0,10) == 0;
            }
//            echo $house->id."\n";
            $house->save();
        }
    }
} 