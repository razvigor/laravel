<?php

namespace App\Http\Controllers\Api;

use PDF;
use App\Http\Requests\StavkarnRequest;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rnalog;
use App\StavkaRN;


class RadniListoviController extends Controller
{
    
    /// prikaz svih mašina za izradu proizvoda na radnom nalogu
    public function index($rnalog_id, $kupac_id, $model_id)
    {
       
      $result =  StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')
       ->join('elementi', 'elementi.proizvod_id', '=', 'proizvodi.id')
       ->leftJoin('materijali', 'elementi.materijal_id', '=', 'materijali.id') 
       ->leftJoin('operacije', 'elementi.id', '=', 'operacije.element_id')
       ->leftJoin('masine', 'operacije.masina_id', '=', 'masine.id')
       ->leftJoin('masinlokacije', 'masine.masinlokacija_id', '=', 'masinlokacije.id')
                   ->selectRaw('
                   stavkern.rnalog_id,
                   sum(stavkern.kolicina) kolicina,
                   masinlokacije.r_br lokacija_rb,
                   masinlokacije.naziv lokacija,
                   masine.r_br masina_rb,
                   masine.id masina_id, 
                   masine.name as masina_naziv,
                   masine.bruto_mjere,
                   elementi.proizvod_id, 
                   proizvodi.naziv proizvod_naziv,
                             
                   
                   materijali.naziv mat_naziv,
                   SUBSTR(SUBSTRING_INDEX(materijali.naziv, ",", 2),
                   POSITION("," IN
                   SUBSTRING_INDEX(materijali.naziv, ",", 2)
                   )+2) mat_naziv_kratki,

                   SUBSTR(materijali.klasa, 4) klasa,
                   elementi.naziv element_naziv,
                   elementi.elint_01/1000 neto_duzina,
                   elementi.elint_02/1000 neto_sirina,
                   elementi.elint_03/1000 neto_debljina,
                   elementi.elint_04/1000 bruto_duzina,
                   elementi.elint_06/1000 bruto_sirina,
                   elementi.elint_06/1000 bruto_debljina,
                   CASE WHEN masine.bruto_mjere=1 THEN elementi.elint_04/1000 ELSE elementi.elint_01/1000 END duzina,
                   CASE WHEN masine.bruto_mjere=1 THEN elementi.elint_05/1000 ELSE elementi.elint_02/1000 END sirina,
                   CASE WHEN masine.bruto_mjere=1 THEN elementi.elint_06/1000 ELSE elementi.elint_03/1000 END debljina,


                   sum(stavkern.kolicina*elementi.elint_07/1000) broj_komada,
                                
                                

                                masinlokacije.teh_koef/100 teh_k
                                ') 
       ->where('stavkern.rnalog_id','=',$rnalog_id)
       ->where('stavkern.kupac_id','like',$kupac_id == 0 ? '%' : $kupac_id)
       ->where('proizvodi.model_id','like',$model_id == 0 ? '%' : $model_id)
       ->whereNotNull('masine.id')
       
       ->groupBy(
                 'stavkern.rnalog_id',
                 'masine.id', 
                 'masinlokacije.r_br',
                 'masine.r_br',
                 'masine.name', 
                 'masine.bruto_mjere',
                 'proizvodi.naziv',
                 'materijali.naziv',
                 'materijali.klasa',
                 'elementi.naziv',
                 'elementi.elint_01',
                 'elementi.elint_02',
                 'elementi.elint_03',
                 'elementi.elint_04',
                 'elementi.elint_05',
                 'elementi.elint_06',
                 'elementi.elint_07',
                 
                 'elementi.proizvod_id', 
                 'masinlokacije.naziv',
                 'masinlokacije.teh_koef')
        

       ->orderBy('masinlokacije.r_br', 'asc')
       ->orderBy('masine.r_br','asc')
       ->get();

       return  $result;
        
    }
       
    /// prikaz svih mašina za izradu proizvoda na radnom nalogu
    public function stampa($rnalog_id, $masina_id, $kupac_id, $model_id)
    {

        $rnalog=Rnalog::findOrFail($rnalog_id);

        $masine =  StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')
        ->join('elementi', 'elementi.proizvod_id', '=', 'proizvodi.id')
        ->leftJoin('materijali', 'elementi.materijal_id', '=', 'materijali.id') 
        ->leftJoin('operacije', 'elementi.id', '=', 'operacije.element_id')
        ->leftJoin('masine', 'operacije.masina_id', '=', 'masine.id')
        ->leftJoin('masinlokacije', 'masine.masinlokacija_id', '=', 'masinlokacije.id')
        ->selectRaw('
                    masinlokacije.r_br lokacija_rb,
                    masinlokacije.naziv lokacija,
                    masine.r_br masina_rb,
                    masine.id masina_id, 
                    masine.name as masina_naziv
                   ')
        ->where('stavkern.rnalog_id','=',$rnalog_id)
        ->where('masine.id','like',$masina_id == 0 ? '%' : $masina_id)
        ->where('stavkern.kupac_id','like',$kupac_id == 0 ? '%' : $kupac_id)
        ->where('proizvodi.model_id','like',$model_id == 0 ? '%' : $model_id)
        ->whereNotNull('masine.id')
        ->groupBy(
        'masinlokacije.r_br',
        'masinlokacije.naziv',
        'masine.r_br',
        'masine.id', 
        'masine.name'
        )

        ->orderBy('masinlokacije.r_br', 'asc')
        ->orderBy('masine.r_br','asc')
        ->get();
              

      $result =  StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')
       ->join('elementi', 'elementi.proizvod_id', '=', 'proizvodi.id')
       ->leftJoin('materijali', 'elementi.materijal_id', '=', 'materijali.id') 
       ->leftJoin('operacije', 'elementi.id', '=', 'operacije.element_id')
       ->leftJoin('masine', 'operacije.masina_id', '=', 'masine.id')
       ->leftJoin('masinlokacije', 'masine.masinlokacija_id', '=', 'masinlokacije.id')
                   ->selectRaw('
                   stavkern.rnalog_id,
                   sum(stavkern.kolicina) kolicina,
                   masinlokacije.r_br lokacija_rb,
                   masinlokacije.naziv lokacija,
                   masine.r_br masina_rb,
                   masine.id masina_id, 
                   masine.name as masina_naziv,
                   masine.bruto_mjere,
                   elementi.proizvod_id, 
                   proizvodi.naziv proizvod_naziv,
                             
                   
                   materijali.naziv mat_naziv,
                   SUBSTR(SUBSTRING_INDEX(materijali.naziv, ",", 2),
                   POSITION("," IN
                   SUBSTRING_INDEX(materijali.naziv, ",", 2)
                   )+2) mat_naziv_kratki,

                   SUBSTR(materijali.klasa, 4) klasa,
                   elementi.naziv element_naziv,
                   elementi.elint_01/1000 neto_duzina,
                   elementi.elint_02/1000 neto_sirina,
                   elementi.elint_03/1000 neto_debljina,
                   elementi.elint_04/1000 bruto_duzina,
                   elementi.elint_06/1000 bruto_sirina,
                   elementi.elint_06/1000 bruto_debljina,
                   CASE WHEN masine.bruto_mjere=1 THEN elementi.elint_04/1000 ELSE elementi.elint_01/1000 END duzina,
                   CASE WHEN masine.bruto_mjere=1 THEN elementi.elint_05/1000 ELSE elementi.elint_02/1000 END sirina,
                   CASE WHEN masine.bruto_mjere=1 THEN elementi.elint_06/1000 ELSE elementi.elint_03/1000 END debljina,


                   sum(stavkern.kolicina*elementi.elint_07/1000) broj_komada,
                                
                                

                                masinlokacije.teh_koef/100 teh_k
                                ') 
       ->where('stavkern.rnalog_id','=',$rnalog_id)
       ->where('stavkern.kupac_id','like',$kupac_id == 0 ? '%' : $kupac_id)
       ->where('proizvodi.model_id','like',$model_id == 0 ? '%' : $model_id)
       ->whereNotNull('masine.id')
       
       ->groupBy(
        'stavkern.rnalog_id',
        'masine.id', 
        'masinlokacije.r_br',
        'masine.r_br',
        'masine.name', 
        'masine.bruto_mjere',
        'proizvodi.naziv',
        'materijali.naziv',
        'materijali.klasa',
        'elementi.naziv',
        'elementi.elint_01',
        'elementi.elint_02',
        'elementi.elint_03',
        'elementi.elint_04',
        'elementi.elint_05',
        'elementi.elint_06',
        'elementi.elint_07',
        
        'elementi.proizvod_id', 
        'masinlokacije.naziv',
        'masinlokacije.teh_koef')

       ->orderBy('masinlokacije.r_br', 'asc')
       ->orderBy('masine.r_br','asc')
       ->get();

       //return  $result;
       $pdf=PDF::loadView('rnalozi.radni_listovi_pdf', compact('result', 'rnalog', 'masine' ))->setPaper('a4', 'landscape');
       return $pdf->stream();

    }  




}
