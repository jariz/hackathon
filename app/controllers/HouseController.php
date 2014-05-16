<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 1:10 AM
 */

class HouseController extends BaseController{
    public function show($id = null) {
        return View::make("house");
    }
} 