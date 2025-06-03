<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MattipvrstaRequest; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mattipvrsta;
use App\Mattip;  // 24.1.2021
use App\Http\Resources\MattipvrstaRES;

class MattipvrstaController extends Controller
{
    

    /// prikaz svih vrsta materijala 
    public function index_all()
    {
       $mattipvrsta=Mattipvrsta::orderBy('mattip_id', 'asc')
                                 ->orderBy('naziv', 'asc')
                                 ->get();   
                               
       //->paginate(10);

        return MattipvrstaRES::collection($mattipvrsta);

        
    }
    
    /// prikaz svih vrsta materijala u tipu
    public function index($mattip_id)
    {
       if ($mattip_id==0){
        $mattip_id=1;
       }

       $mattipvrsta=Mattipvrsta::where('mattip_id', $mattip_id)
                                ->where('dodatni_izbor', 0)
                                ->get();

        return MattipvrstaRES::collection($mattipvrsta);

        
    }


    // kreiranje i ažuriranje vrste materijala
    public function store(Request $request)
    {
        // nađi vrstu
        $mattipvrsta=$request->isMethod('put') ? Mattipvrsta::findOrFail($request->id) : new Mattipvrsta;



        if($request->input('mattip_id')!==0 && $request->input('lokacija_id')!==0){

            $mattip = Mattip::find($request->input('mattip_id'));// 24.01.2021

            $mattipvrsta->id             = $request->input('id');

            $mattipvrsta->mattip_id      = $request->input('mattip_id');  // iz liste
            $mattipvrsta->dodatni_izbor  = $request->input('dodatni_izbor');  // iz liste
            $mattipvrsta->naziv          = $request->input('naziv');
            $mattipvrsta->jed_mjere      = $request->input('jed_mjere');
            
            $mattipvrsta->lokacija_id    = $request->input('lokacija_id');// iz liste

            $mattipvrsta->k_vm_01        = $request->input('k_vm_01')*$mattip->kdec01; 
            $mattipvrsta->k_vm_02        = $request->input('k_vm_02')*$mattip->kdec02; 
            $mattipvrsta->k_vm_03        = $request->input('k_vm_03')*$mattip->kdec03; 
            $mattipvrsta->k_vm_04        = $request->input('k_vm_04')*$mattip->kdec04; 
            $mattipvrsta->k_vm_05        = $request->input('k_vm_05')*$mattip->kdec05; 
            $mattipvrsta->k_vm_06        = $request->input('k_vm_06')*$mattip->kdec06; 
            $mattipvrsta->k_vm_07        = $request->input('k_vm_07')*$mattip->kdec07; 


            if($mattipvrsta->save()){
                return new MattipvrstaRES($mattipvrsta);
            }

        }


    }


}
