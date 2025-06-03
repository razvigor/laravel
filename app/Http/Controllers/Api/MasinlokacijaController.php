<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\MattipRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Masinlokacija;
use App\Http\Resources\MasinlokacijaRES;





class MasinlokacijaController extends Controller
{

	// primjer zaštite API
	// 15.10.2020
	//public function __construct()
    //{
    //    $this->authorizeResource(Mattip::class);
    //}
	// 15.10.2020



    
    /// prikaz svih tipova
    public function index()
    {
       $result=Masinlokacija::all();

        
        return MasinlokacijaRES::collection($result);
        

    }





}
