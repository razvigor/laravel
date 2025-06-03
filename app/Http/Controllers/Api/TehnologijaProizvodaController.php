<?php

namespace App\Http\Controllers\Api;

use DB;
use PDF;
use App\Http\Requests\ElementRequest;
//use App\Http\Requests\OperacijaRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Element;
use App\Operacija;

use App\Proizvod;
use App\Parametar;

use App\Mattip;

use App\Http\Resources\ProizvodRES;

class TehnologijaProizvodaController extends Controller
{
    
    /// prikaz svih elemenata na proizvodu
    public function index($proizvod_id)
    {
       
       
       //$element=Element::where('proizvod_id', $proizvod_id)->get();

       $result = Element::join('operacije', 'elementi.id', '=', 'operacije.element_id')
       ->leftJoin('mattipovi', 'elementi.mattip_id', '=', 'mattipovi.id')
       ->leftJoin('masine', 'operacije.masina_id', '=', 'masine.id')
       ->leftJoin('alati', 'operacije.alat_id', '=', 'alati.id')
       ->leftJoin('alatnazivi', 'alati.alatnaziv_id', '=', 'alatnazivi.id')
       

       ->selectRaw('mattipovi.naziv mattip_naziv, 
                    elementi.id element_id,
                    elementi.naziv element_naziv,

                    operacije.redni_broj,
                    operacije.masina_id,
                    masine.name masina_naziv,
                    operacije.br_rr,
                    operacije.br_pr,
                    COALESCE(operacije.opis, "-") opis,
                    COALESCE(operacije.parametri, "-") parametri,
                    operacije.alat_id,
                    alatnazivi.naziv alat_naziv,
                    operacije.vrijeme/1000 vrijeme
                    


                   ')
       ->where('elementi.proizvod_id','=',$proizvod_id)

/*
       ->groupBy('mattipovi.naziv', 'materijali.naziv', 'mtv.naziv',
       )
*/
       ->orderBy('mattipovi.redni_broj','asc')       
       ->orderBy('operacije.redni_broj','asc')
       ->get();

       return  $result;

        
    }



    public function stampa($proizvod_id, $element_id)
    {

                // nađi proizvod
                $proizvod=Proizvod::findOrFail($proizvod_id);

                $mattipovi_elementi = Element::leftJoin('mattipovi', 'elementi.mattip_id', '=', 'mattipovi.id')
                ->join('operacije', 'elementi.id', '=', 'operacije.element_id')
                ->selectRaw('mattipovi.id mattip_id, mattipovi.naziv mattip_naziv,
                             elementi.id element_id, elementi.naziv element_naziv
                             ') 
                ->where('elementi.proizvod_id','=',$proizvod_id)
                ->where('elementi.id','like',$element_id == 0 ? '%' : $element_id)
                ->whereNotNull('operacije.id')
                ->groupBy('mattipovi.id', 'mattipovi.naziv','elementi.id', 'elementi.naziv')
                ->orderBy('mattipovi.redni_broj','asc')
                ->orderBy('elementi.naziv','asc')
                ->get();


                $result = Element::join('operacije', 'elementi.id', '=', 'operacije.element_id')
                ->leftJoin('mattipovi', 'elementi.mattip_id', '=', 'mattipovi.id')
                ->leftJoin('masine', 'operacije.masina_id', '=', 'masine.id')
                ->leftJoin('alati', 'operacije.alat_id', '=', 'alati.id')
                ->leftJoin('alatnazivi', 'alati.alatnaziv_id', '=', 'alatnazivi.id')
                
         
                ->selectRaw('mattipovi.naziv mattip_naziv, 
                             elementi.id element_id,
                             elementi.naziv element_naziv,
         
                             operacije.redni_broj,
                             operacije.masina_id,
                             masine.name masina_naziv,
                             operacije.br_rr,
                             operacije.br_pr,
                             COALESCE(operacije.opis, "-") opis,
                             COALESCE(operacije.parametri, "-") parametri,
                             operacije.alat_id,
                             alatnazivi.naziv alat_naziv,
                             operacije.vrijeme/1000 vrijeme
                             
         
         
                            ')
                ->where('elementi.proizvod_id','=',$proizvod_id)
                ->where('elementi.id','like',$element_id == 0 ? '%' : $element_id)
         /*
                ->groupBy('mattipovi.naziv', 'materijali.naziv', 'mtv.naziv',
                )
         */
                ->orderBy('mattipovi.redni_broj','asc')       
                ->orderBy('operacije.redni_broj','asc')
                ->get();

//return $mattipovi_elementi;

  //          return view('proizvodi.tehnologija_pdf', compact('result', 'proizvod', 'mattipovi_elementi'));
            //return $norma_sat;
            $pdf=PDF::loadView('proizvodi.tehnologija_pdf', compact('result', 'proizvod', 'mattipovi_elementi'))
                  ->setPaper('a4', 'landscape');
                  
            return $pdf->stream();//download('kalkulacija.pdf');
    }



}
