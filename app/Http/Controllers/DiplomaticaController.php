<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Diplomatica;

class DiplomaticaController extends Controller
{
    public function __construct(){$this->middleware('auth');}
    public function index()
    {
        $diplomaticas=Diplomatica::all();
        return view('diplomaticas')->with('diplomaticas',$diplomaticas);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fecha'=>'required',
            'pais_a'=>'required',
            'representante_a'=>'required',
            'pais_b'=>'required',
            'representante_b'=>'required',
            'pais_c'=>'required',
            'representante_c'=>'required',
            'producto'=>'required',
            'descripcion'=>'required'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('ErrorInsert','Completar todos los campos')
                ->withErrors($validator);
        }else{
            $diplomatica=Diplomatica::create([
                'fecha'=>$request->fecha,
                'pais_a'=>$request->pais_a,
                'representante_a'=>$request->representante_a,
                'pais_b'=>$request->pais_b,
                'representante_b'=>$request->representante_b,
                'pais_c'=>$request->pais_c,
                'representante_c'=>$request->representante_c,
                'producto'=>$request->producto,
                'descripcion'=>$request->descripcion
            ]);
            return back()->with('Listo','Se ha registrado una nueva relación diplomatica');
        }
    }
    public function destroy($id)
    {
        $diplomatica=Diplomatica::find($id);
        $diplomatica->delete();
        return back()->with('Listo','Eliminación realizada correctamente');
    }
}
