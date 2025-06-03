<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\MattipRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mattip;
use App\Http\Resources\MattipRES;
use App\Http\Resources\Mattip_koef_RES;




class MattipController extends Controller
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
       $mattipovi=Mattip::where('aktivan','=','1')->paginate(15);

        return MattipRES::collection($mattipovi);
        

    }


    /// prikaz osobina elementa zadanog tipa
    public function show($id)
    {
        if ($id==0){

            return 'nema osobina za tip  0';
        }else{
        // nađi element
        $element_osobine=Mattip::findOrFail($id);

        // vrati ga kao resource
        return new MattipRES($element_osobine);
        }
    }

    /// prikaz koeficijenata zadanog tipa
    public function show_k($id)
    {
        
        if ($id==0){
            $id=1;
        }

        // nađi element
        $tip_koeficijenti=Mattip::findOrFail($id);

        // vrati ga kao resource
        return new Mattip_koef_RES($tip_koeficijenti);
    }



}
