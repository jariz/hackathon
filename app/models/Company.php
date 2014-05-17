<?php
/**
 * Created by PhpStorm.
 * 
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 12:18 AM
 *
 * @property integer $id
 * @property string $name
 * @property string $lat
 * @property string $lng
 * @property string $icon
 * @property string $maps_id
 */

class Company extends Eloquent {
    protected $table = 'companies';
    public $timestamps = false;
    protected $softDelete = false;
} 