<?php

namespace App\Http\Controllers;

class SeriesController{
    public function index(){
        return [
            "GOT",
            "The Expanse",
            "The Boys"
        ];
    }
}