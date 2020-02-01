<?php

namespace App\Http\Controllers;
use App\Zapato;
use Illuminate\Http\Request;

class ZapatosController extends Controller
{

//========== funcion para obtener listado de zapatos ======================//
    public function getAll()
    {
        
        $zapatos = Zapato::all();
        
        if ($zapatos) {
            return (array(
                'response' => $zapatos,
                'estatus' => 'OK',
                'code' => 200
            ));
        } else {
            return (array(
                'response' => 'fail',
                'estatus' => 'OK',
                'code' => 404
            ));
        }
    }

//========== funcion para agregar zapatos ======================//
    public function add(Request $request)
    {
        $zapato = Zapato::create($request->all());
        if ($zapato) {
            return (array(
                'response' => 'success',
                'estatus' => 'OK',
                'code' => 200
            ));
        } else {
            return (array(
                'response' => 'fail',
                'estatus' => 'OK',
                'code' => 404
            ));
        }
        
    }
//========== funcion para obtener un zapato por su id ======================//
    public function getZapato($id)
    {
        $zapato = Zapato::find($id);
        if ($zapato) {
            return (array(
                'response' => $zapato,
                'estatus' => 'OK',
                'code' => 200
            ));
        } else {
            return (array(
                'response' => 'fail',
                'estatus' => 'OK',
                'code' => 404
            ));
        }
    }
 //========== funcion para actualizar zapatos ======================//   
    public function editZapato($id, Request $request)
    {
        $zapato = Zapato::find($id);
        $zapato->fill($request->all())->save();
        if ($zapato) {
            return (array(
                'response' => 'success',
                'estatus' => 'OK',
                'code' => 200
            ));
        } else {
            return (array(
                'response' => 'fail',
                'estatus' => 'OK',
                'code' => 404
            ));
        }
    }
 //========== funcion para eliminar zapatos ======================//   
    public function deleteZapato($id)
    {
        $zapato = Zapato::find($id);
        $zapato->delete();
        if ($zapato) {
            return (array(
                'response' => 'success',
                'estatus' => 'OK',
                'code' => 200
            ));
        } else {
            return (array(
                'response' => 'fail',
                'estatus' => 'OK',
                'code' => 404
            ));
        }
    }
    
    
}
