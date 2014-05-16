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
               'name' => 'test',
               'display_name' => 'test Display name'
           ]
        ];

        foreach($types as $type){
            $TypeObject = new Type;

            foreach($type as $key => $value){
                $TypeObject->$key = $value;
            }

            $TypeObject->save();
        }

    }

} 