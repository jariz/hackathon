<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 1:10 AM
 */

class ContactController extends BaseController{
    public function show() {
        return View::make("contact");
    }
} 