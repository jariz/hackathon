<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/17/14
 * Time: 1:09 AM
 */

class QuestionController extends BaseController{
    public function show() {
        return View::make("questions");
    }
} 