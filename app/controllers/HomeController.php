<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 1:11 AM
 */

class HomeController extends BaseController{
    public function show() {
        return View::make("home");
    }
} 