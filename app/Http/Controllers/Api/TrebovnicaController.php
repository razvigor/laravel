<?php

namespace App\Http\Controllers\Api;


use PDF;
//use App\Http\Requests\ElementRequest;
use App\Http\Requests\StavkarnRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use App\Element;
use App\StavkaRN;
use App\Rnalog;


class TrebovnicaController extends Controller
{
    
    /// prikaz svih elmenata na proizvodima u nalogu
    public function index($rnalog_id)
    {
       
       $result =  StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')
       ->join('elementi', 'elementi.proizvod_id', '=', 'proizvodi.id')       
       ->join('materijali', 'elementi.materijal_id', '=', 'materijali.id')
       ->join('mattipovi', 'elementi.mattip_id', '=', 'mattipovi.id')
       ->join('mattipvrste as mtv', 'materijali.mattipvrsta_id', '=', 'mtv.id') 
       ->join('masinlokacije', 'mtv.lokacija_id', '=', 'masinlokacije.id')      
       
       ->selectRaw('mattipovi.naziv mattip_naziv, 
                    materijali.naziv materijal_naziv,
                    mtv.naziv vrsta_materijala,

                    masinlokacije.teh_koef,
                     
                    sum(CASE WHEN elementi.mattip_id in (1, 2) THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_04/1000   *
                                elementi.elint_05/1000   *
                                elementi.elint_06/1000   *
                                elementi.elint_07/1000   
                                /1000000000

                             WHEN elementi.mattip_id = 3 THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_03/1000   

                            WHEN elementi.mattip_id = 4 THEN 
                                (
                                mtv.k_vm_01/100 * elementi.elint_06/1000 +
                                if(elementi.elint_05=0, 0, mtv.k_vm_02/100 /(elementi.elint_05/1000))
                                ) *
                                masinlokacije.teh_koef/100 

                            WHEN elementi.mattip_id = 6 THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_05/1000                                  

                            WHEN elementi.mattip_id = 7 THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_03/1000                                

                            WHEN elementi.mattip_id = 9 THEN 
                                mtv.k_vm_01/100 *
                                mtv.k_vm_02/100 *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_01/1000   

                            WHEN elementi.mattip_id = 10 THEN 
                                mtv.k_vm_01/100 *
                                mtv.k_vm_02/100 *
                                masinlokacije.teh_koef/100   *
                                
                                elementi.elint_01/1000   

                             ELSE 0
                        END * stavkern.kolicina
                        ) potrosnja,
                         

                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                              then substr(mtv.k_vm_07, 1,2)
                              else 0
                         end     
                        ima_kontakt,

                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                             then                        
                                (select mtv_k.k_vm_03/100 from mattipvrste as mtv_k where mtv_k.dodatni_izbor=substr(mtv.k_vm_07, 1,2)) 
                             else
                                0
                         end
                        k_koef,
                        
                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                             then                        
                                (select mtv_k.k_vm_04/100 from mattipvrste as mtv_k where mtv_k.dodatni_izbor=substr(mtv.k_vm_07, 1,2)) 
                             else
                                0
                         end                        
                        k_cijena,
                        

                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                              then substr(mtv.k_vm_07, 3,2)
                              else 0
                         end     
                        ima_razredjivac,
                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                             then                        
                                (select mtv_k.k_vm_05/100 from mattipvrste as mtv_k where mtv_k.dodatni_izbor=substr(mtv.k_vm_07, 3,2)) 
                             else
                                0
                         end                        
                        r_koef,

                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                             then                        
                                (select mtv_k.k_vm_06/100 from mattipvrste as mtv_k where mtv_k.dodatni_izbor=substr(mtv.k_vm_07, 3,2)) 
                             else
                                0
                         end
                         r_cijena,

                        mtv.jed_mjere, 
                        
                        materijali.cijena/10000 cijena,
                        
                        mtv.k_vm_01

                   ')

                   
       ->where('stavkern.rnalog_id','=',$rnalog_id)

       ->groupBy('mattipovi.naziv', 'materijali.naziv', 'mtv.naziv', 'masinlokacije.teh_koef',  
       'elementi.mattip_id', 'mtv.k_vm_07', 
      
       
       'mtv.jed_mjere' ,'materijali.cijena',
             
       'mtv.k_vm_01',
       'mtv.lokacija_id',
       'mtv.k_vm_03',
       'mtv.k_vm_04',
       'mtv.k_vm_05',
       'mtv.k_vm_06'

       
       )
       
       ->orderBy('mattipovi.redni_broj','asc')       
       ->orderBy('materijali.cijena','desc')
       
       ->get();

       return  $result;

        
    }


    public function stampa($rnalog_id, $tr_iz)
    {
       
                // nađi RADNI NALOG
                $rnalog=Rnalog::findOrFail($rnalog_id);
                
                $mattipovi = StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')
                ->join('elementi', 'elementi.proizvod_id', '=', 'proizvodi.id')
                ->join('materijali', 'elementi.materijal_id', '=', 'materijali.id')
                ->leftJoin('mattipovi', 'elementi.mattip_id', '=', 'mattipovi.id')
                ->selectRaw('mattipovi.id mattip_id, mattipovi.naziv mattip_naziv') 
                ->where('stavkern.rnalog_id','=',$rnalog_id)
                ->groupBy('mattipovi.id', 'mattipovi.naziv')
                ->orderBy('mattipovi.redni_broj','asc')
                ->get();

/*
                    mattipovi.naziv mattip_naziv, 
                    mtv.naziv vrsta_materijala,
                    masinlokacije.teh_koef,

*/


       $result =  StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')
       ->join('elementi', 'elementi.proizvod_id', '=', 'proizvodi.id')       
       ->join('materijali', 'elementi.materijal_id', '=', 'materijali.id')
       ->join('mattipovi', 'elementi.mattip_id', '=', 'mattipovi.id')
       ->join('mattipvrste as mtv', 'materijali.mattipvrsta_id', '=', 'mtv.id') 
       ->join('masinlokacije', 'mtv.lokacija_id', '=', 'masinlokacije.id')      
       
       ->selectRaw('elementi.mattip_id,
                    materijali.naziv materijal_naziv,
                                 
                     
                    sum(CASE WHEN elementi.mattip_id in (1, 2) THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_04/1000   *
                                elementi.elint_05/1000   *
                                elementi.elint_06/1000   *
                                elementi.elint_07/1000   
                                /1000000000

                             WHEN elementi.mattip_id = 3 THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_03/1000   

                            WHEN elementi.mattip_id = 4 THEN 
                                (
                                mtv.k_vm_01/100 * elementi.elint_06/1000 +
                                if(elementi.elint_05=0, 0, mtv.k_vm_02/100 /(elementi.elint_05/1000))
                                ) *
                                masinlokacije.teh_koef/100 

                            WHEN elementi.mattip_id = 6 THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_05/1000                                  

                            WHEN elementi.mattip_id = 7 THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_03/1000                                

                            WHEN elementi.mattip_id = 9 THEN 
                                mtv.k_vm_01/100 *
                                mtv.k_vm_02/100 *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_01/1000   

                            WHEN elementi.mattip_id = 10 THEN 
                                mtv.k_vm_01/100 *
                                mtv.k_vm_02/100 *
                                masinlokacije.teh_koef/100   *
                                
                                elementi.elint_01/1000   

                             ELSE 0
                        END * stavkern.kolicina
                        )  potrosnja,
                         

                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                              then substr(mtv.k_vm_07, 1,2)
                              else 0
                         end     
                        ima_kontakt,

                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                             then                        
                                (select mtv_k.k_vm_03/100 from mattipvrste as mtv_k where mtv_k.dodatni_izbor=substr(mtv.k_vm_07, 1,2)) 
                             else
                                0
                         end
                        k_koef,
                        
                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                             then                        
                                (select mtv_k.k_vm_04/100 from mattipvrste as mtv_k where mtv_k.dodatni_izbor=substr(mtv.k_vm_07, 1,2)) 
                             else
                                0
                         end                        
                        k_cijena,
                        

                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                              then substr(mtv.k_vm_07, 3,2)
                              else 0
                         end     
                        ima_razredjivac,
                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                             then                        
                                (select mtv_k.k_vm_05/100 from mattipvrste as mtv_k where mtv_k.dodatni_izbor=substr(mtv.k_vm_07, 3,2)) 
                             else
                                0
                         end                        
                        r_koef,

                        case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                             then                        
                                (select mtv_k.k_vm_06/100 from mattipvrste as mtv_k where mtv_k.dodatni_izbor=substr(mtv.k_vm_07, 3,2)) 
                             else
                                0
                         end
                         r_cijena,

                        mtv.jed_mjere, 
                        
                        materijali.cijena/10000 cijena,
                        
                        mtv.k_vm_01

                   ')

                   
       ->where('stavkern.rnalog_id','=',$rnalog_id)

       ->groupBy('mattipovi.naziv', 'materijali.naziv', 'mtv.naziv', 'masinlokacije.teh_koef',  
       'elementi.mattip_id', 'mtv.k_vm_07', 
      
       
       'mtv.jed_mjere'  ,'materijali.cijena',
             
       'mtv.k_vm_01',
       'mtv.lokacija_id',
       'mtv.k_vm_03',
       'mtv.k_vm_04',
       'mtv.k_vm_05',
       'mtv.k_vm_06'

       
       )
       
       ->orderBy('mattipovi.redni_broj','asc')       
       ->orderBy('materijali.cijena','desc')
       
       ->get();

      //return view('rnalozi.trebovnica_pdf', compact('result', 'rnalog', 'mattipovi'));

      
      //return $result;

      if($tr_iz=='T'){
         $pdf=PDF::loadView('rnalozi.trebovnica_pdf', compact('result', 'rnalog', 'mattipovi' ));
         return $pdf->stream();
      }else{
         $pdf=PDF::loadView('rnalozi.izdatnica_pdf', compact('result', 'rnalog', 'mattipovi' ))->setPaper('a4', 'landscape');
         return $pdf->stream();
         
         //return view('rnalozi.izdatnica_pdf', compact('result', 'rnalog', 'mattipovi'));

      }

       

        
    }






}
