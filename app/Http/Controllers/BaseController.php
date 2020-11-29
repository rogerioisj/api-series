<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{

    protected $class;

    public function index()
    {
        return $this->class::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json($this->class::create($request->all()), 201);
    }

    public function show(int $id)
    {
        try {
            $resource = $this->class::findOrFail($id);
            return response()
                ->json($resource, 200);
        } catch (Exception $e) {
            //return response()
            //  ->json(['error' => $e->getMessage()], $e->getStatusCode());
            return $e;
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            $resource = $this->class::findOrFail($id);
            $resource->fill($request->all());
            $resource->save();
            return response()
                ->json($resource, 200);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function destroy(int $id)
    {
        try {
            $exists = $this->class::findOrFail($id);
            if (!is_null($exists)) {
                $this->class::destroy($id);
                return response()
                    ->json(['message' => 'Recurso removido com sucesso'], 200);
            }
        } catch (Exception $e) {
            return $e;
        }
    }
}
