<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController
{
    public function index()
    {
        return Serie::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json(Serie::create(['nome' => $request->nome]), 201);
    }

    public function show(int $id)
    {
        try {
            $serie = Serie::findOrFail($id);
            return response()
                ->json($serie, 200);
        } catch (Exception $e) {
            //return response()
            //  ->json(['error' => $e->getMessage()], $e->getStatusCode());
            return $e;
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            $serie = Serie::findOrFail($id);
            $serie->fill($request->all());
            $serie->save();
            return response()
                ->json($serie, 200);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function destroy(int $id){
        try{
            $exists = Serie::findOrFail($id);
            if(!is_null($exists)){
            Serie::destroy($id);
            return response()
            ->json(['message' => 'Serie removida com sucesso'], 200);
            }
        } catch(Exception $e){
            return $e;
        }
    }
}
