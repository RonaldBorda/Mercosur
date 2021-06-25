<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Comercial;

class ComercialController extends Controller
{
    public function __construct(){$this->middleware('auth');}
    public function index()
    {
        
        $comercials=Comercial::all();
        return view('comerciales')->with('comercials',$comercials);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fecha'=>'required',
            'pais_a'=>'required',
            'representante_a'=>'required',
            'pais_b'=>'required',
            'representante_b'=>'required',
            'tipo'=>'required',
            'producto'=>'required',
            'descripcion'=>'required'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('ErrorInsert','Completar todos los campos')
                ->withErrors($validator);
        }else{
            $comercial=Comercial::create([
                'fecha'=>$request->fecha,
                'pais_a'=>$request->pais_a,
                'representante_a'=>$request->representante_a,
                'pais_b'=>$request->pais_b,
                'representante_b'=>$request->representante_b,
                'tipo'=>$request->tipo,
                'producto'=>$request->producto,
                'descripcion'=>$request->descripcion
            ]);
            return back()->with('Listo','Se ha registrado una nueva relación comercial');
        }
    }
    public function destroy($id)
    {
        $comercial=Comercial::find($id);
        $comercial->delete();
        return back()->with('Listo','Eliminación realizada correctamente');
    }
    public function editarComercial(Request $request)
    {
        $comercial=Comercial::find($request->id);
        $validator = Validator::make($request->all(),[
            'fecha'=>'required',
            'pais_a'=>'required',
            'representante_a'=>'required',
            'pais_b'=>'required',
            'representante_b'=>'required',
            'tipo'=>'required',
            'producto'=>'required',
            'descripcion'=>'required'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('ErrorInsert','Completar todos los campos')
                ->withErrors($validator);
        }else{
            $comercial->fecha=$request->fecha;
            $comercial->pais_a=$request->pais_a;
            $comercial->representante_a=$request->representante_a;
            $comercial->pais_b=$request->pais_b;
            $comercial->representante_b=$request->representante_b;
            $comercial->tipo=$request->tipo;
            $comercial->producto=$request->producto;
            $comercial->descripcion=$request->descripcion;

            $comercial->save();
            return back()->with('Listo','Actualización realizada correctamente');
        }//llave else validator
    }//Llave funcion
}
