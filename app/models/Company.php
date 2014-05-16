<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 12:18 AM
 */

class Company extends Eloquent {
    protected $table = 'companies';
    public $timestamps = false;
    protected $softDelete = false;
} 