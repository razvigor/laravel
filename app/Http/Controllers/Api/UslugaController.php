<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\UslugaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usluga;
use App\Http\Resources\UslugaRES;

class UslugaController extends Controller
{

    
    /// prikaz svih usluga 
    public function index()
    {
       $usluge=Usluga::orderBy('id', 'asc')
                            ->get(); 
                            //->paginate(10);

        return UslugaRES::collection($usluge);
        
    }
    

/*
    // kreiranje i ažuriranje kupaca
    public function store(Request $request)
    {
        // nađi kupca
        $kupac=$request->isMethod('put') ? Kupac::findOrFail($request->id) : new Kupac;



        if($request->input('naziv')!==''){

            //$mattip = Mattip::find($request->input('mattip_id'));// 24.01.2021

            $kupac->id             = $request->input('id');


            $kupac->naziv          = $request->input('naziv'); 
            $kupac->jmb_jib        = $request->input('jmb_jib'); 
            $kupac->ulica_i_broj   = $request->input('ulica_i_broj'); 
            $kupac->post_br_mjesto = $request->input('post_br_mjesto'); 
            $kupac->drzava         = $request->input('drzava'); 
            $kupac->mail           = $request->input('mail');   
            $kupac->telefon        = $request->input('telefon');     
            $kupac->status         = $request->input('status');
 


            if($kupac->save()){
                return new KupacRES($kupac);
            }

        }


    }
*/



}
