<?php
/**
 * Created by PhpStorm.
 * 
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 12:19 AM
 *
 * @property integer $id
 * @property string $name
 * @property string $display_name
 */

class Type extends Eloquent{
    protected $table = 'types';
    public $timestamps = false;
    protected $softDelete = false;
} 