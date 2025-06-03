<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AlatRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alat;
use App\Http\Resources\AlatRES;

class AlatController extends Controller
{
    
    /// prikaz svih alata
    public function index()
    {
       $alat=Alat::all();
       
        return AlatRES::collection($alat);
        
    }

}
