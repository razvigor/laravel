<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProiztipvrstaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proiztipvrsta;
use App\Http\Resources\ProiztipvrstaRES;

class ProiztipvrstaController extends Controller
{
    
    /// prikaz svih alata
    public function index()
    {
       $Proiztipvrsta=Proiztipvrsta::all();
       
        return ProiztipvrstaRES::collection($Proiztipvrsta);
        
    }

}
