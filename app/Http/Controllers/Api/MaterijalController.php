<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MaterijalRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Materijal;
use App\Mattip;
use App\Http\Resources\MaterijaliRES;
use App\Http\Resources\MaterijalRES;

class MaterijalController extends Controller
{

    
    /// prikaz svih materijala 
    public function index_all()
    {
       $materijal=Materijal::orderBy('mattip_id', 'asc')
                            ->orderBy('mattipvrsta_id', 'asc')
                            ->get(); 
                            //->paginate(10);

        return MaterijaliRES::collection($materijal);
    }
    
    /// prikaz svih materijala u tipu
    public function index($mattip_id)
    {
        $materijal=Materijal::where('mattip_id', $mattip_id)->get();

        return MaterijalRES::collection($materijal);
        //return Element->all();
        //return view('elementi.index', ['elementi' => $model->all()]);
        
    }

    // kreiranje i ažuriranje materijala
    public function store(Request $request)
    {
        // nađi materijal
        $materijal=$request->isMethod('put') ? Materijal::findOrFail($request->id) : new Materijal;



        if($request->input('mattip_id')!==0 && $request->input('mattipvrsta_id')!==0){

            $mattip = Mattip::find($request->input('mattip_id'));// 24.01.2021

            $materijal->id             = $request->input('id');

            $materijal->mattip_id      = $request->input('mattip_id');
            $materijal->mattipvrsta_id = $request->input('mattipvrsta_id');
            $materijal->naziv          = $request->input('slozeni_naziv');    /// umjesto naziva upiši složeni nahiv
            $materijal->dodatni_opis   = $request->input('dodatni_opis');
            $materijal->vrsta_podloge  = $request->input('vrsta_podloge');
            //$materijal->vrsta_okova    = $request->input('vrsta_okova');
            $materijal->proizvodjac    = $request->input('proizvodjac');
            $materijal->namjena        = $request->input('namjena');                
            $materijal->forma_oblik    = $request->input('forma_oblik');  

            $materijal->sp_tezina      = $request->input('sp_tezina');  
            $materijal->gustina        = $request->input('gustina');  
            $materijal->tvrdoca        = $request->input('tvrdoca');                                      

            $materijal->klasa          = $request->input('klasa');     
            $materijal->br_linija      = $request->input('br_linija');
            $materijal->br_slojeva     = $request->input('br_slojeva');            
            $materijal->debljina       = $request->input('debljina');
            $materijal->sirina         = $request->input('sirina');
            $materijal->duz_razred     = $request->input('duz_razred');       
             
            $materijal->cijena         = $request->input('cijena')*10000; 
            $materijal->mattipoznaka_id= $request->input('mattipoznaka_id');   

            
            $materijal->kmat_01        = $request->input('kmat_01')*$mattip->kdec01; 
            $materijal->kmat_02        = $request->input('kmat_02')*$mattip->kdec02; 
            $materijal->kmat_03        = $request->input('kmat_03')*$mattip->kdec03; 
            $materijal->kmat_04        = $request->input('kmat_04')*$mattip->kdec04; 
            $materijal->kmat_05        = $request->input('kmat_05')*$mattip->kdec05; 
            $materijal->kmat_06        = $request->input('kmat_06')*$mattip->kdec06; 
            $materijal->kmat_07        = $request->input('kmat_07')*$mattip->kdec07; 


            if($materijal->save()){
                return new MaterijalRES($materijal);
            }

        }


    }




}
