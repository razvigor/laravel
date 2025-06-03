<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\TurbinadiotipRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turbinadiotip;
use App\Http\Resources\TurbinadiotipRES;





class TurbinadiotipController extends Controller
{

	// primjer zaštite API
	// 15.10.2020
	//public function __construct()
    //{
    //    $this->authorizeResource(Mattip::class);
    //}
	// 15.10.2020



    
    /// prikaz svih tipova
    public function index($sort)
    {
       $tipovi=Turbinadiotip::orderBy($sort, 'asc')->get();

        return TurbinadiotipRES::collection($tipovi);
        

    }


}
