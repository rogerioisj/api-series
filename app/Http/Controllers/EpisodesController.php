<?php

namespace App\Http\Controllers;

use App\Episodio;
use Illuminate\Http\Request;

class EpisodesController extends BaseController
{
    public function __construct(){
        $this->class = Episodio::class;
    }
}
