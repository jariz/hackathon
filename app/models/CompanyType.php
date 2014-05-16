<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 12:19 AM
 */

class CompanyType extends Eloquent{
    protected $table = 'company_types';
    public $timestamps = false;
    protected $softDelete = false;
} 