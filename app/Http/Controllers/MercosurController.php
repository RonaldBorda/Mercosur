<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comercial;
use App\Models\Diplomatica;

class MercosurController extends Controller
{
    public function index()
    {
        $comercials=Comercial::all();
        $diplomaticas=Diplomatica::all();
        return view('mercosur',compact('comercials','diplomaticas'));

        
    }
}
