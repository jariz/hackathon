<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 12:21 AM
 */

class HousesSeeder extends Seeder{

    public function run(){
        $this->command->info("Parsing JSON...");
        $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', File::get("data/real_estate.json")));
        $this->command->info("Looping...");
        $valid = 0;
        $pad = "http://huizenzoeker.nl";
        foreach($data->items as $item) {
            if(substr($item->url, 6, 23) != "noord-holland/amsterdam") continue;
            $valid++;
            $house = new House();
            $house->adres = $item->adres;
            if(@$item->postcode)
                $house->postal_code = $item->postcode;
            if(@$item->prijs)
                $house->price = intval(preg_replace("/[^0-9]/","", $item->prijs));
            $house->url = $pad.$item->url;
            $house->photo = $pad.$item->foto;
            if(@$item->prijssoort)
                $house->price_sort = $item->prijssoort;
            $house->lat = $item->lat;
            $house->lng = $item->lng;
            $house->house_id = $item->nr;
            $house->save();
        }
        $this->command->info("Real estate in Amsterdam: {$valid} Real estate total: ".count($data->items));
    }

} 