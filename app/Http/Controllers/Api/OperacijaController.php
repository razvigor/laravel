<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OperacijaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Operacija;
use App\Http\Resources\OperacijaRES;

class OperacijaController extends Controller
{
    
    /// prikaz svih operacija na elementu
    public function index($element_id)
    {
       $operacija=Operacija::where('element_id', $element_id)->get();

        return OperacijaRES::collection($operacija);
        //return Operacija->all();
        //return view('operacijai.index', ['operacijai' => $model->all()]);
        
    }

    /// prikaz jedne operacije
    public function show($id)
    {
        // nađi operacija
        $operacija=Operacija::findOrFail($id);

        // vrati ga kao resource
        return new OperacijaRES($operacija);
    }

    // kreiranje i ažuriranje operacije
    public function store(Request $request)
    {
        // nađi operaciju
        $operacija=$request->isMethod('put') ? Operacija::findOrFail($request->id) : new Operacija;

        if($request->input('element_id')*$request->input('masina_id')*$request->input('alat_id')!==0){
            $operacija->id             = $request->input('id');
            $operacija->element_id     = $request->input('element_id');
            $operacija->redni_broj     = $request->input('redni_broj');
            $operacija->masina_id      = $request->input('masina_id');
            $operacija->br_rr          = $request->input('br_rr');
            $operacija->br_pr          = $request->input('br_pr');
            $operacija->br_us          = $request->input('br_rr')+$request->input('br_pr');

            $operacija->opis           = $request->input('opis');
            $operacija->parametri      = $request->input('parametri');
            $operacija->alat_id        = $request->input('alat_id');
            $operacija->vrijeme        = $request->input('vrijeme')*1000;  // vrijeme se bilježi na 3 decimale


            if($operacija->save()){
                return new OperacijaRES($operacija);
            }

        }


    }

    // brisanje
    public function destroy($id)
    {
        // nađi proizvod
        $operacija=Operacija::findOrFail($id);

        if($operacija->delete()){
            return new OperacijaRES($operacija);

        }
    }


}
