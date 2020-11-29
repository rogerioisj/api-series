<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController{
    public function index(){
        return Serie::all();
    }

    public function store(Request $request){
        return response()
        ->json(Serie::create(['nome' => $request->nome]), 201);
    }

    public function show(int $id){
        try{
            $serie = Serie::findOrFail($id);
            return response()
            ->json($serie, 200);
        } catch (Exception $e){
            return response()
            ->json(['error' => $e->getMessage()]);
        }
    }
}