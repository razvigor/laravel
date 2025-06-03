<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\ElementRequest;
use App\Http\Requests\OperacijaRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proizvod;
use App\Element;
use App\StavkaRN;
use App\Operacija;
use App\Http\Resources\AnalizaOperacijaRES;

class AnalizaKapacitetaController extends Controller
{
    
    /// prikaz svih mašina na proizvodu
    public function index($proizvod_id)
    {
       

       $result = Element::join('operacije', 'elementi.id', '=', 'operacije.element_id')
       
       ->leftJoin('masine', 'operacije.masina_id', '=', 'masine.id')
       ->leftJoin('masinlokacije', 'masine.masinlokacija_id', '=', 'masinlokacije.id')
       //->selectRaw('ROW_NUMBER() OVER(ORDER BY masine.name ASC) AS RB')
       
       //->selectRaw(' masine.name as masina, masinlokacije.teh_koef/100 teh_k, 
       //             sum(CASE WHEN elementi.mattip_id in  (1, 2) THEN COALESCE(operacije.vrijeme*elementi.elint_07, 0) ELSE COALESCE(operacije.vrijeme, 0) END)/100*masinlokacije.teh_koef AS vrijeme,
       //             max(operacije.br_rr+operacije.br_pr) as br_radnika, max(operacije.br_us) br_radnika_usvojen
       //            ')
   
                   ->selectRaw('
                                    
                                masine.id masina_id,
                                elementi.proizvod_id,
                                masinlokacije.naziv lokacija, 
                                masine.name as masina, 
                                masinlokacije.teh_koef/100 teh_k, 
                                sum(CASE WHEN elementi.mattip_id in  (1, 2) THEN COALESCE(operacije.vrijeme*elementi.elint_07/1000/1000, 0) 
                                         
                                         ELSE COALESCE(operacije.vrijeme/1000, 0) 
                                    END)
                                         
                                         /100*masinlokacije.teh_koef AS vrijeme,
                                         
                                max(operacije.br_rr+operacije.br_pr) as br_radnika, 
                                max(operacije.br_us) br_radnika_usvojen
                   
                  ')                   
       ->where('elementi.proizvod_id','=',$proizvod_id)
       //->groupBy('masine.name', 'masinlokacije.teh_koef')
       ->groupBy('masine.id', 'elementi.proizvod_id', 'masinlokacije.naziv','masine.name', 'masinlokacije.teh_koef')

       ->orderBy('masinlokacije.r_br', 'asc')
       ->orderBy('masine.r_br','asc')
       ->get();

       return  $result;
       //return AnalizaRES::collection($element);

       
       //return view('operacijai.index', ['operacijai' => $model->all()]);
        
    }


    /// prikaz rada svih mašina na proizvodima jednog naloga
    public function index_rn($rnalog_id)
    {
       

       $result = 
       StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')       
       ->leftJoin('elementi', 'proizvodi.id', '=', 'elementi.proizvod_id')
       ->leftJoin('operacije', 'elementi.id', '=', 'operacije.element_id')
       
       ->leftJoin('masine', 'operacije.masina_id', '=', 'masine.id')
       ->leftJoin('masinlokacije', 'masine.masinlokacija_id', '=', 'masinlokacije.id')
       //->selectRaw('ROW_NUMBER() OVER(ORDER BY masine.name ASC) AS RB')
       
       //->selectRaw(' masine.name as masina, masinlokacije.teh_koef/100 teh_k, 
       //             sum(CASE WHEN elementi.mattip_id in  (1, 2) THEN COALESCE(operacije.vrijeme*elementi.elint_07, 0) ELSE COALESCE(operacije.vrijeme, 0) END)/100*masinlokacije.teh_koef AS vrijeme,
       //             max(operacije.br_rr+operacije.br_pr) as br_radnika, max(operacije.br_us) br_radnika_usvojen
       //            ')
   
                   ->selectRaw('
                                    
                                masine.id masina_id,
                               
                                masinlokacije.naziv lokacija, 
                                masine.name as masina, 
                                masinlokacije.teh_koef/100 teh_k, 
                                sum(CASE WHEN elementi.mattip_id in  (1, 2) THEN COALESCE(operacije.vrijeme*elementi.elint_07/1000/1000, 0) 
                                         
                                         ELSE COALESCE(operacije.vrijeme/1000, 0) 
                                    END)
                                         
                                         /100*masinlokacije.teh_koef AS vrijeme,
                                
                                max(operacije.br_rr+operacije.br_pr) as br_radnika, 
                                max(operacije.br_us) br_radnika_usvojen
                   
                  ')                   
       ->where('stavkern.rnalog_id','=',$rnalog_id)
       ->whereNotNull('masine.id')
       //->groupBy('masine.name', 'masinlokacije.teh_koef')
       ->groupBy('masine.id', 'masinlokacije.naziv','masine.name', 'masinlokacije.teh_koef')

       ->orderBy('masinlokacije.r_br', 'asc')
       ->orderBy('masine.r_br','asc')
       ->get();

       return  $result;
       //return AnalizaRES::collection($element);

       
       //return view('operacijai.index', ['operacijai' => $model->all()]);
        
    }    

    /// prikaz vremena mašina na proizvodima jednog naloga
    public function index_rn_masina_proizvod($rnalog_id)
    {
       

       $result = 
       StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')       
       ->leftJoin('elementi', 'proizvodi.id', '=', 'elementi.proizvod_id')
       ->leftJoin('operacije', 'elementi.id', '=', 'operacije.element_id')
       
       ->leftJoin('masine', 'operacije.masina_id', '=', 'masine.id')
       ->leftJoin('masinlokacije', 'masine.masinlokacija_id', '=', 'masinlokacije.id')
       //->selectRaw('ROW_NUMBER() OVER(ORDER BY masine.name ASC) AS RB')
       
       //->selectRaw(' masine.name as masina, masinlokacije.teh_koef/100 teh_k, 
       //             sum(CASE WHEN elementi.mattip_id in  (1, 2) THEN COALESCE(operacije.vrijeme*elementi.elint_07, 0) ELSE COALESCE(operacije.vrijeme, 0) END)/100*masinlokacije.teh_koef AS vrijeme,
       //             max(operacije.br_rr+operacije.br_pr) as br_radnika, max(operacije.br_us) br_radnika_usvojen
       //            ')
       ->distinct()
                   ->selectRaw('
                                  
                   
                                masine.id masina_id,
                                proizvodi.id as proizvod_id,
                                masinlokacije.naziv lokacija, 
                                masine.name as masina, 
                                masinlokacije.teh_koef/100 teh_k, 
                                CASE WHEN elementi.mattip_id in  (1, 2) THEN COALESCE(operacije.vrijeme*elementi.elint_07/1000/1000, 0) 
                                         
                                         ELSE COALESCE(operacije.vrijeme/1000, 0) 
                                    END                                      
                                         /100*masinlokacije.teh_koef AS vrijeme, 
                                max(operacije.br_rr+operacije.br_pr) as br_radnika, 
                                max(operacije.br_us) br_radnika_usvojen         
                   
                  ')                   
       ->where('stavkern.rnalog_id','=',$rnalog_id)
       ->whereNotNull('masine.id')
       ->groupBy('masine.id', 'proizvodi.id', 'masinlokacije.naziv','masine.name', 'masinlokacije.teh_koef', 'elementi.mattip_id', 'operacije.vrijeme','elementi.elint_07')

       //->groupBy('masine.id', 'masinlokacije.naziv','masine.name', 'masinlokacije.teh_koef')

       ->orderBy('masinlokacije.r_br', 'asc')
       ->orderBy('masine.r_br','asc')
       ->get();

       return  $result;
       //return AnalizaRES::collection($element);

       
       //return view('operacijai.index', ['operacijai' => $model->all()]);
        
    }    

    // kreiranje i ažuriranje operacije
    public function store(Request $request)
    {
/*
        // nađi operaciju
        $operacija=Operacija::findOrFail($request->id);

        
        if($request->input('id_operacije')!==0){
            //$operacija->id             = $request->input('id_operacije');
            //$operacija->element_id     = $request->input('element_id');
            //$operacija->redni_broj     = $request->input('redni_broj');
            //$operacija->masina_id      = $request->input('masina_id');
            //$operacija->br_rr          = $request->input('br_rr');
            //$operacija->br_pr          = $request->input('br_pr');
            $operacija->br_us          = $request->input('br_radnika_usvojen');

            //$operacija->opis           = $request->input('opis');
            //$operacija->parametri      = $request->input('parametri');
            //$operacija->alat_id        = $request->input('alat_id');
            //$operacija->vrijeme        = $request->input('vrijeme');

            //$operacija->save();
            if($operacija->save()){
                return new AnalizaOperacijaRES($operacija);
            }
*/
        // nađi operacije  
        
        $elementiProizvoda = Element::select('id')
            ->where('proizvod_id', '=', $request->proizvod_id)
            ->get();
        
        $IDevi_elemenata = array_map(function($item) {
                                return (array)$item; 
                       }, $elementiProizvoda->toArray()
             );


        //$matchThese = ['masina_id' => $request->masina_id];
      
        Operacija::where('masina_id', $request->masina_id)
                 ->wherein('element_id',$IDevi_elemenata)
                 ->update([
            'br_us' => $request->input('br_radnika_usvojen')
         ]);
/*
        $operacije=Operacija::where('masina_id', $request->input('masina_id'))->get();
        foreach ($operacije as $operacija){
                $operacija->br_us          = $request->input('br_radnika_usvojen');
                //return MaterijalRES::collection($materijal);
                $operacija->save();
            //return new AnalizaOperacijaRES($operacija);
        }
 */       
        return $request->input('br_radnika_usvojen');
       

        


    }



}
