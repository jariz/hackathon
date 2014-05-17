<?php
/**
 * Created by PhpStorm.
 * 
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 12:14 AM
 *
 * @property integer $id
 * @property string $adres
 * @property string $postal_code
 * @property string $photo
 * @property string $price_sort
 * @property string $house_id
 * @property integer $price
 * @property string $lat
 * @property string $lng
 * @property string $url
 */

class House extends Eloquent{

    protected $table = 'houses';
    public $timestamps = false;
    protected $softDelete = false;

    protected $appends = ['money_format'];

    public function getMoneyFormatAttribute(){
        return number_format($this->attributes['price'], 0, ',', '.');

    }
} 