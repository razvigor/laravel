<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\TurbinadiopodtipRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turbinadiopodtip;
use App\Http\Resources\TurbinadiopodtipRES;





class TurbinadiopodtipController extends Controller
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
       $podtipovi=Turbinadiopodtip::orderBy('naziv', 'asc')->get();

        return TurbinadiopodtipRES::collection($podtipovi);
        

    }


}
