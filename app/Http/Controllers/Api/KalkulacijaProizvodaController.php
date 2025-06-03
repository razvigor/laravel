<?php

namespace App\Http\Controllers\Api;

use DB;
use PDF;
use App\Http\Requests\ElementRequest;
//use App\Http\Requests\OperacijaRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Element;

use App\Proizvod;
use App\Parametar;

use App\Mattip;

use App\Http\Resources\ProizvodRES;

class KalkulacijaProizvodaController extends Controller
{
    
    /// prikaz svih mašina na proizvodu
    public function index($proizvod_id)
    {
       
       
       //$element=Element::where('proizvod_id', $proizvod_id)->get();

       $result = Element::join('materijali', 'elementi.materijal_id', '=', 'materijali.id')
       ->leftJoin('mattipovi', 'elementi.mattip_id', '=', 'mattipovi.id')
       
       ->leftJoin('mattipvrste as mtv', 'materijali.mattipvrsta_id', '=', 'mtv.id') 
       //->leftJoin('mattipvrste as mtv_k', substr('mtv.k_vm_07', 1,2), '=', 'mtv_k.dodatni_opis') 
       //->leftJoin('mattipvrste as mtv_r', substr('mtv.k_vm_07', 3,2), '=', 'mtv_r.dodatni_opis') 

       ->leftJoin('masinlokacije', 'mtv.lokacija_id', '=', 'masinlokacije.id')      
       //->selectRaw('ROW_NUMBER() OVER(ORDER BY masine.name ASC) AS RB')
       ->selectRaw('mattipovi.naziv mattip_naziv, 
                    materijali.naziv materijal_naziv,
                    mtv.naziv vrsta_materijala,
                    

                    masinlokacije.teh_koef, 
                    sum(CASE WHEN elementi.mattip_id = 1 or (elementi.mattip_id = 2 and mtv.jed_mjere like "m3") THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_04/1000   *
                                elementi.elint_05/1000   *
                                elementi.elint_06/1000   *
                                elementi.elint_07/1000   
                                /1000000000

                            WHEN elementi.mattip_id = 2 and mtv.jed_mjere like "m2" THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_04/1000   *
                                elementi.elint_05/1000   *
                                elementi.elint_07/1000   
                                /1000000

                            WHEN elementi.mattip_id = 2 and mtv.jed_mjere like "kom" THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_07/1000   
                                

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

                            WHEN elementi.mattip_id = 5 THEN 
                                mtv.k_vm_01/100   *
                                mtv.k_vm_02/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_02/1000   *
                                elementi.elint_04/1000   *
                                elementi.elint_06/1000   
                                /1000000


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

                            WHEN elementi.mattip_id = 12 THEN 
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_01/1000   
                                

                            WHEN elementi.mattip_id = 13 THEN  
                                mtv.k_vm_01/100   *
                                masinlokacije.teh_koef/100   *
                                elementi.elint_01/1000                                 
                                
                                

                             ELSE 0
                        END
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


                    mtv.jed_mjere, materijali.cijena/10000 cijena
                         
,mtv.k_vm_01,mtv.k_vm_02

                   ')
       ->where('elementi.proizvod_id','=',$proizvod_id)
       ->groupBy('mattipovi.naziv', 'materijali.naziv', 'mtv.naziv',
       'elementi.mattip_id', 'mtv.k_vm_07',
       'mtv.lokacija_id', 'masinlokacije.teh_koef', 
       'mtv.jed_mjere' ,'materijali.cijena',
       
       'mtv.k_vm_01',
       'mtv.k_vm_02',
       
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



    public function stampa($proizvod_id)
    {

                // nađi proizvod
                $proizvod=Proizvod::findOrFail($proizvod_id);
                $norma_sat=Parametar::findOrFail(1);
                $mattipovi = Element::join('materijali', 'elementi.materijal_id', '=', 'materijali.id')
                ->leftJoin('mattipovi', 'elementi.mattip_id', '=', 'mattipovi.id')
                ->selectRaw('mattipovi.id mattip_id, mattipovi.naziv mattip_naziv') 
                ->where('elementi.proizvod_id','=',$proizvod_id)
                ->groupBy('mattipovi.id', 'mattipovi.naziv')
                ->orderBy('mattipovi.redni_broj','asc')
                ->get();
                // vrati ga kao resource
                //return new ProizvodRES($proizvod);

                $radnici_na_elementu = DB::table('operacije')
                ->select('element_id','masina_id', DB::raw('MAX(coalesce(br_us, 0)) as usvojeno_radnika'))
                ->groupBy('element_id', 'masina_id');
                
                $radnici_po_proizvodu_old = DB::table('elementi')
                        ->joinSub($radnici_na_elementu, 'radnici_na_elementu', function ($join) {
                            $join->on('elementi.id', '=', 'radnici_na_elementu.element_id');
                        })
                        ->select(DB::raw('sum(usvojeno_radnika) as ukupno_usvojeno'))
                        ->where('elementi.proizvod_id','=',$proizvod_id)
                        ->get();


                        $radnici_na_masini = Element::join('operacije', 'elementi.id', 'operacije.element_id')
                        ->select('operacije.masina_id', DB::raw('MAX(coalesce(br_us, 0)) as usvojeno_radnika'))
                        ->where('elementi.proizvod_id','=',$proizvod_id)
                        ->groupBy('operacije.masina_id');

                        $radnici_po_proizvodu = DB::table('masine')
                        ->joinSub($radnici_na_masini, 'radnici_na_masini', function ($join) {
                            $join->on('masine.id', '=', 'radnici_na_masini.masina_id');
                        })
                        ->select(DB::raw('sum(usvojeno_radnika) as ukupno_usvojeno'))
                        ->get();
                        ;


        $result = Element::join('materijali', 'elementi.materijal_id', '=', 'materijali.id')
        ->leftJoin('mattipovi', 'elementi.mattip_id', '=', 'mattipovi.id')
        ->leftJoin('mattipvrste as mtv', 'materijali.mattipvrsta_id', '=', 'mtv.id') 
        ->leftJoin('proizvodi', 'elementi.proizvod_id', '=', 'proizvodi.id')
        //->leftJoin('mattipvrste as mtv_k', substr('mtv.k_vm_07', 1,2), '=', 'mtv_k.dodatni_opis') 
        //->leftJoin('mattipvrste as mtv_r', substr('mtv.k_vm_07', 3,2), '=', 'mtv_r.dodatni_opis') 
 
        ->leftJoin('masinlokacije', 'mtv.lokacija_id', '=', 'masinlokacije.id')      
        //->selectRaw('ROW_NUMBER() OVER(ORDER BY masine.name ASC) AS RB')
        ->selectRaw('mattipovi.naziv mattip_naziv,
                     elementi.mattip_id,
                     materijali.naziv materijal_naziv,
                     mtv.naziv vrsta_materijala,
                     
                     proizvodi.naziv naziv_proizvoda,
                     masinlokacije.teh_koef, 
                     cast(
                     sum(CASE WHEN elementi.mattip_id = 1 or (elementi.mattip_id = 2 and mtv.jed_mjere like "m3") THEN 
                                 mtv.k_vm_01/100   *
                                 masinlokacije.teh_koef/100   *
                                 elementi.elint_04/1000   *
                                 elementi.elint_05/1000   *
                                 elementi.elint_06/1000   *
                                 elementi.elint_07/1000   
                                 /1000000000
 
                             WHEN elementi.mattip_id = 2 and mtv.jed_mjere like "m2" THEN 
                                 mtv.k_vm_01/100   *
                                 masinlokacije.teh_koef/100   *
                                 elementi.elint_04/1000   *
                                 elementi.elint_05/1000   *
                                 elementi.elint_07/1000   
                                 /1000000
 
                             WHEN elementi.mattip_id = 2 and mtv.jed_mjere like "kom" THEN 
                                 mtv.k_vm_01/100   *
                                 masinlokacije.teh_koef/100   *
                                 elementi.elint_07/1000   
                                 
 
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
 
                             WHEN elementi.mattip_id = 5 THEN 
                                 mtv.k_vm_01/100   *
                                 mtv.k_vm_02/100   *
                                 masinlokacije.teh_koef/100   *
                                 elementi.elint_02/1000   *
                                 elementi.elint_04/1000   *
                                 elementi.elint_06/1000   
                                 /1000000
 
 
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
 
                             WHEN elementi.mattip_id = 12 THEN 
                                 mtv.k_vm_01/100   *
                                 masinlokacije.teh_koef/100   *
                                 elementi.elint_01/1000   
                                 
 
                             WHEN elementi.mattip_id = 13 THEN  
                                 mtv.k_vm_01/100   *
                                 masinlokacije.teh_koef/100   *
                                 elementi.elint_01/1000                                 
                                 
                                 
 
                              ELSE 0
                         END
                         )
                         AS DECIMAL(10,4)) potrosnja, 
 
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
 
                         cast(
                         case when elementi.mattip_id = 10 and mtv.k_vm_07>0
                              then                        
                                 (select mtv_k.k_vm_06/100 from mattipvrste as mtv_k where mtv_k.dodatni_izbor=substr(mtv.k_vm_07, 3,2)) 
                              else
                                 0
                          end
                          AS DECIMAL(10,4)) 
                          r_cijena,
 
                     mtv.jed_mjere, 
                     materijali.cijena/10000 cijena,
                     mtv.k_vm_01,mtv.k_vm_02
 
 
                    ')
        ->where('elementi.proizvod_id','=',$proizvod_id)
        ->groupBy('mattipovi.naziv', 'materijali.naziv', 'mtv.naziv',
        'elementi.mattip_id', 'mtv.k_vm_07',
        'mtv.lokacija_id', 'masinlokacije.teh_koef', 
        'mtv.jed_mjere' ,'materijali.cijena',
        'proizvodi.naziv',
        'mtv.k_vm_01',
        'mtv.k_vm_02',
        
        'mtv.k_vm_03',
        'mtv.k_vm_04',
        'mtv.k_vm_05',
        'mtv.k_vm_06'
 
 
        )
        ->orderBy('mattipovi.redni_broj','asc')       
        ->orderBy('materijali.cijena','desc')
        ->get();

            //return view('proizvodi.kalkulacija_pdf', compact('result', 'proizvod', 'mattipovi'));
            //return $radnici_na_elementu;
            $pdf=PDF::loadView('proizvodi.kalkulacija_pdf', compact('result', 'proizvod', 'mattipovi', 'radnici_po_proizvodu', 'norma_sat' ));
            return $pdf->stream();//download('kalkulacija.pdf');
    }



}
