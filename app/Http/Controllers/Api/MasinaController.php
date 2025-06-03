<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MasinaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Masina;
use App\Http\Resources\MasinaRES;

class MasinaController extends Controller
{
    
    /// prikaz svih alata
    public function index()
    {
       $masina=Masina::all();
       
        return MasinaRES::collection($masina);
        
    }

}
