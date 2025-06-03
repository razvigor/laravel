<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MattipoznakaRequest; 
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mattipoznaka;  
use App\Http\Resources\MattipoznakaRES;

class MattipoznakaController extends Controller
{
    

    /// prikaz svih vrsta mattipoznaka 
    public function index_all()
    {
       $result=Mattipoznaka::all(); 

        return MattipoznakaRES::collection($result);
        
    }
    
    // kreiranje i ažuriranje oznaka
    public function store(Request $request)
    {
        // nađi oznaku
        $mattipoznaka = $request->isMethod('put') ? Mattipoznaka::findOrFail($request->id) : new Mattipoznaka;



        if($request->input('oznaka')!==''){

            //$mattip = Mattip::find($request->input('mattip_id'));// 24.01.2021

            $mattipoznaka->id             = $request->input('id');

            $mattipoznaka->mattip_id       = $request->input('mattip_sifra')=='700'?7:10;   
            $mattipoznaka->natpis          = $request->input('mattip_sifra')=='700'?'Kat. ozn.':substr($request->input('mattip_sifra'), 2);
            $mattipoznaka->oznaka          = $request->input('oznaka');   
            $mattipoznaka->internasifra    = $request->input('internasifra'); 
 


            if($mattipoznaka->save()){
                return new MattipoznakaRES($mattipoznaka);
            }

        }


    }



}
