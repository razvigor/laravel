<?php

namespace App\Http\Controllers\Api;

use DB;
use PDF;
use Config;

use Carbon\Carbon;
use App\Http\Requests\PredracunRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Predracun;
use App\Turbinadiotip;
use App\Kupac;
use App\Http\Resources\PredracunRES;


class PredracunController extends Controller
{

	// primjer zaštite API
	// 15.10.2020
	//public function __construct()
    //{
      //  $this->authorizeResource(Predracun::class);
    //}
	// 15.10.2020


    /// prikaz svih 
    public function index()
    {
       $predracuni=Predracun::orderBy('created_at', 'desc')
                            ->orderBy('broj', 'desc')
                           ->get();

        return PredracunRES::collection($predracuni);
        

    }

    public function index_2($duzina_stranice, $racun_nota, $ziralno_gotovina, $broj, $datum_list, $kupac_naziv, $oem, $napomena, $status_naziv)
    {

      $racun_nota      = $racun_nota      == '_' ? '%' : $racun_nota     ; 
      $ziralno_gotovina      = $ziralno_gotovina      == '_' ? '%' : $ziralno_gotovina     ; 
      $broj            = $broj            == '_' ? '%' : $broj           ;
      $datum_list      = $datum_list      == '_' ? '%' : $datum_list     ;
      $kupac_naziv     = $kupac_naziv     == '_' ? '%' : $kupac_naziv    ;
      $oem             = $oem             == '_' ? '%' : $oem            ;
      $napomena        = $napomena        == '_' ? '%' : $napomena       ;
      $status_naziv    = $status_naziv    == '_' ? '%' : $status_naziv   ;
      

            //      'datum_list'        =>Carbon::createFromFormat('Y-m-d', $this->datum)->format('d-m-Y'),
            //      'kupac_naziv'       =>$this->kupac_id==0 ? $this->kupac_ime : $naziv_kupca,  // 22.8.2022 dodato polje kupac_ime koje nija prazno ako je kupac_id=0
                  
            //  napomena      {{predracun.komplet_remont==1?'Remont':'Servis'}}
            //'status_naziv'          => Config::get('turbine.statusi_predracuna.'.$this->status),
            $nacin_placanja='%';
            if ('%'.$ziralno_gotovina.'%'=='žir.'){$nacin_placanja='2';}
            if ('%'.$ziralno_gotovina.'%'=='got.'){$nacin_placanja='1';}
            
       
            $predracuni= DB::table('predracuni as p')
       ->leftjoin('kupci as k', 'k.id', 'p.kupac_id')    
       
       ->selectRaw('p.*')
       
       ->where('p.racun_nota', 'like', '%'.$racun_nota.'%' )  
       ->where('p.nacin_placanja', 'like', '%'.$nacin_placanja.'%' )      
       ->where('p.broj', 'like', '%'.$broj.'%' )       
       //->where(Carbon::createFromFormat('Y-m-d', `p.datum`)->format('d-m-Y'), 'like', '%'.$datum_list.'%' )       
       //->where('p.kupac_id==0?p.kupac_ime:k.naziv', 'like', '%'.$kupac_naziv.'%' )       
       ->where('p.oem', 'like', '%'.$oem.'%' )       
       //->where('p.komplet_remont==1?"Remont":"Servis"', 'like', '%'.$napomena.'%' )       
       //->where(Config::get('turbine.statusi_predracuna.'.`p`.`status`), 'like', '%'.$status_naziv.'%' )       



       ->orderBy('created_at', 'desc')
                            ->orderBy('broj', 'desc')
                            ->paginate($duzina_stranice);

        return PredracunRES::collection($predracuni);
        

    }


    // kreiranje i ažuriranje Predračuna
    public function store(Request $request)
    {
        // nađi Predracun
        $Predracun=$request->isMethod('put') ? Predracun::findOrFail($request->id) : new Predracun;



        if($request->input('oem')!==''){



            $Predracun->id             = $request->input('id');

            $Predracun->broj           = $request->input('broj');
            $Predracun->datum          = $request->input('datum');
            $Predracun->kupac_id       = $request->input('kupac_id');
            $Predracun->kupac_ime      = $request->input('kupac_ime');
            $Predracun->napomena       = $request->input('napomena');
            $Predracun->oem            = $request->input('oem');
            $Predracun->oem_cijena     = $request->input('komplet_remont')==1?$request->input('oem_cijena')*100:$request->input('usluga_cijena')*100; 

            $Predracun->komplet_remont = $request->input('komplet_remont');
            $Predracun->rabat          = $request->input('rabat');

            $Predracun->usluga_id     = $request->input('usluga_id');
            $Predracun->ukupna_cijena = $request->input('ukupna_cijena')*100;
            $Predracun->nacin_placanja= $request->input('nacin_placanja');
            $Predracun->status        = $request->input('status');
            $Predracun->garancija     = $request->input('garancija');
            $Predracun->garancija_el  = $request->input('garancija_el');

            $Predracun->lokacija      = $request->input('lokacija');
            $Predracun->racun_nota    = $request->input('racun_nota');
            //$Predracun->skinuto_sa_stanja  = 'NE';

/*            
            $Predracun->CW_id  = $request->model['CW'];       $Predracun->CW_cijena  = $request->cijena['CW']*100;     $Predracun->CW_kolicina = $request->kolicina['CW'];   $Predracun->CW_rabat  = $request->rabat_dio['CW'];
            $Predracun->CW_id_2  = $request->model['CW_2'];       $Predracun->CW_cijena_2  = $request->cijena['CW_2']*100;     $Predracun->CW_kolicina_2 = $request->kolicina['CW_2'];   $Predracun->CW_rabat_2  = $request->rabat_dio['CW_2'];
            $Predracun->CW_id_3  = $request->model['CW_3'];       $Predracun->CW_cijena_3  = $request->cijena['CW_3']*100;     $Predracun->CW_kolicina_3 = $request->kolicina['CW_3'];   $Predracun->CW_rabat_3  = $request->rabat_dio['CW_3'];

            $Predracun->TW_id  = $request->model['TW'];       $Predracun->TW_cijena  = $request->cijena['TW']*100;     $Predracun->TW_kolicina = $request->kolicina['TW'];   $Predracun->TW_rabat  = $request->rabat_dio['TW'];
            $Predracun->TW_id_2  = $request->model['TW_2'];       $Predracun->TW_cijena_2  = $request->cijena['TW_2']*100;     $Predracun->TW_kolicina_2 = $request->kolicina['TW_2'];   $Predracun->TW_rabat_2  = $request->rabat_dio['TW_2'];
            $Predracun->TW_id_3  = $request->model['TW_3'];       $Predracun->TW_cijena_3  = $request->cijena['TW_3']*100;     $Predracun->TW_kolicina_3 = $request->kolicina['TW_3'];   $Predracun->TW_rabat_3  = $request->rabat_dio['TW_3'];

            $Predracun->BH_id  = $request->model['BH'];       $Predracun->BH_cijena  = $request->cijena['BH']*100;     $Predracun->BH_kolicina = $request->kolicina['BH'];   $Predracun->BH_rabat  = $request->rabat_dio['BH'];
            $Predracun->BH_id_2  = $request->model['BH_2'];       $Predracun->BH_cijena_2  = $request->cijena['BH_2']*100;     $Predracun->BH_kolicina_2 = $request->kolicina['BH_2'];   $Predracun->BH_rabat_2  = $request->rabat_dio['BH_2'];
            $Predracun->BH_id_3  = $request->model['BH_3'];       $Predracun->BH_cijena_3  = $request->cijena['BH_3']*100;     $Predracun->BH_kolicina_3 = $request->kolicina['BH_3'];   $Predracun->BH_rabat_3  = $request->rabat_dio['BH_3'];

            $Predracun->BP_id  = $request->model['BP'];       $Predracun->BP_cijena  = $request->cijena['BP']*100;     $Predracun->BP_kolicina = $request->kolicina['BP'];   $Predracun->BP_rabat  = $request->rabat_dio['BP'];
            $Predracun->BP_id_2  = $request->model['BP_2'];       $Predracun->BP_cijena_2  = $request->cijena['BP_2']*100;     $Predracun->BP_kolicina_2 = $request->kolicina['BP_2'];   $Predracun->BP_rabat_2  = $request->rabat_dio['BP_2'];
            $Predracun->BP_id_3  = $request->model['BP_3'];       $Predracun->BP_cijena_3  = $request->cijena['BP_3']*100;     $Predracun->BP_kolicina_3 = $request->kolicina['BP_3'];   $Predracun->BP_rabat_3  = $request->rabat_dio['BP_3'];

            $Predracun->HS_id  = $request->model['HS'];       $Predracun->HS_cijena  = $request->cijena['HS']*100;     $Predracun->HS_kolicina = $request->kolicina['HS'];   $Predracun->HS_rabat  = $request->rabat_dio['HS'];
            $Predracun->HS_id_2  = $request->model['HS_2'];       $Predracun->HS_cijena_2  = $request->cijena['HS_2']*100;     $Predracun->HS_kolicina_2 = $request->kolicina['HS_2'];   $Predracun->HS_rabat_2  = $request->rabat_dio['HS_2'];
            $Predracun->HS_id_3  = $request->model['HS_3'];       $Predracun->HS_cijena_3  = $request->cijena['HS_3']*100;     $Predracun->HS_kolicina_3 = $request->kolicina['HS_3'];   $Predracun->HS_rabat_3  = $request->rabat_dio['HS_3'];

            $Predracun->AC_id  = $request->model['AC'];       $Predracun->AC_cijena  = $request->cijena['AC']*100;     $Predracun->AC_kolicina = $request->kolicina['AC'];   $Predracun->AC_rabat  = $request->rabat_dio['AC'];
            $Predracun->AC_id_2  = $request->model['AC_2'];       $Predracun->AC_cijena_2  = $request->cijena['AC_2']*100;     $Predracun->AC_kolicina_2 = $request->kolicina['AC_2'];   $Predracun->AC_rabat_2  = $request->rabat_dio['AC_2'];
            $Predracun->AC_id_3  = $request->model['AC_3'];       $Predracun->AC_cijena_3  = $request->cijena['AC_3']*100;     $Predracun->AC_kolicina_3 = $request->kolicina['AC_3'];   $Predracun->AC_rabat_3  = $request->rabat_dio['AC_3'];

            $Predracun->NZ_id  = $request->model['NZ'];       $Predracun->NZ_cijena  = $request->cijena['NZ']*100;     $Predracun->NZ_kolicina = $request->kolicina['NZ'];   $Predracun->NZ_rabat  = $request->rabat_dio['NZ'];
            $Predracun->NZ_id_2  = $request->model['NZ_2'];       $Predracun->NZ_cijena_2  = $request->cijena['NZ_2']*100;     $Predracun->NZ_kolicina_2 = $request->kolicina['NZ_2'];   $Predracun->NZ_rabat_2  = $request->rabat_dio['NZ_2'];
            $Predracun->NZ_id_3  = $request->model['NZ_3'];       $Predracun->NZ_cijena_3  = $request->cijena['NZ_3']*100;     $Predracun->NZ_kolicina_3 = $request->kolicina['NZ_3'];   $Predracun->NZ_rabat_3  = $request->rabat_dio['NZ_3'];

            $Predracun->GK_id  = $request->model['GK'];       $Predracun->GK_cijena  = $request->cijena['GK']*100;     $Predracun->GK_kolicina = $request->kolicina['GK'];   $Predracun->GK_rabat  = $request->rabat_dio['GK'];
            $Predracun->GK_id_2  = $request->model['GK_2'];       $Predracun->GK_cijena_2  = $request->cijena['GK_2']*100;     $Predracun->GK_kolicina_2 = $request->kolicina['GK_2'];   $Predracun->GK_rabat_2  = $request->rabat_dio['GK_2'];
            $Predracun->GK_id_3  = $request->model['GK_3'];       $Predracun->GK_cijena_3  = $request->cijena['GK_3']*100;     $Predracun->GK_kolicina_3 = $request->kolicina['GK_3'];   $Predracun->GK_rabat_3  = $request->rabat_dio['GK_3'];

            $Predracun->RK_id  = $request->model['RK'];       $Predracun->RK_cijena  = $request->cijena['RK']*100;     $Predracun->RK_kolicina = $request->kolicina['RK'];   $Predracun->RK_rabat  = $request->rabat_dio['RK'];
            $Predracun->RK_id_2  = $request->model['RK_2'];       $Predracun->RK_cijena_2  = $request->cijena['RK_2']*100;     $Predracun->RK_kolicina_2 = $request->kolicina['RK_2'];   $Predracun->RK_rabat_2  = $request->rabat_dio['RK_2'];
            $Predracun->RK_id_3  = $request->model['RK_3'];       $Predracun->RK_cijena_3  = $request->cijena['RK_3']*100;     $Predracun->RK_kolicina_3 = $request->kolicina['RK_3'];   $Predracun->RK_rabat_3  = $request->rabat_dio['RK_3'];
            
            $Predracun->TH_id  = $request->model['TH'];       $Predracun->TH_cijena  = $request->cijena['TH']*100;     $Predracun->TH_kolicina = $request->kolicina['TH'];   $Predracun->TH_rabat  = $request->rabat_dio['TH'];
            $Predracun->TH_id_2  = $request->model['TH_2'];       $Predracun->TH_cijena_2  = $request->cijena['TH_2']*100;     $Predracun->TH_kolicina_2 = $request->kolicina['TH_2'];   $Predracun->TH_rabat_2  = $request->rabat_dio['TH_2'];
            $Predracun->TH_id_3  = $request->model['TH_3'];       $Predracun->TH_cijena_3  = $request->cijena['TH_3']*100;     $Predracun->TH_kolicina_3 = $request->kolicina['TH_3'];   $Predracun->TH_rabat_3  = $request->rabat_dio['TH_3'];

            $Predracun->CN_id  = $request->model['CN'];       $Predracun->CN_cijena  = $request->cijena['CN']*100;     $Predracun->CN_kolicina = $request->kolicina['CN'];   $Predracun->CN_rabat  = $request->rabat_dio['CN'];
            $Predracun->CN_id_2  = $request->model['CN_2'];       $Predracun->CN_cijena_2  = $request->cijena['CN_2']*100;     $Predracun->CN_kolicina_2 = $request->kolicina['CN_2'];   $Predracun->CN_rabat_2  = $request->rabat_dio['CN_2'];
            $Predracun->CN_id_3  = $request->model['CN_3'];       $Predracun->CN_cijena_3  = $request->cijena['CN_3']*100;     $Predracun->CN_kolicina_3 = $request->kolicina['CN_3'];   $Predracun->CN_rabat_3  = $request->rabat_dio['CN_3'];

            $Predracun->X01_id = $request->model['X01'];      $Predracun->X01_cijena = $request->cijena['X01']*100;    $Predracun->X01_kolicina = $request->kolicina['X01'];  $Predracun->X01_rabat = $request->rabat_dio['X01'];
            $Predracun->X02_id = $request->model['X02'];      $Predracun->X02_cijena = $request->cijena['X02']*100;    $Predracun->X02_kolicina = $request->kolicina['X02'];  $Predracun->X02_rabat = $request->rabat_dio['X02'];
            $Predracun->X03_id = $request->model['X03'];      $Predracun->X03_cijena = $request->cijena['X03']*100;    $Predracun->X03_kolicina = $request->kolicina['X03'];  $Predracun->X03_rabat = $request->rabat_dio['X03'];

            $Predracun->X04_id = $request->model['X04'];      $Predracun->X04_cijena = $request->cijena['X04']*100;    $Predracun->X04_kolicina = $request->kolicina['X04'];  $Predracun->X04_rabat = $request->rabat_dio['X04'];
            $Predracun->X04_id_2 = $request->model['X04_2'];      $Predracun->X04_cijena_2 = $request->cijena['X04_2']*100;    $Predracun->X04_kolicina_2 = $request->kolicina['X04_2'];  $Predracun->X04_rabat_2 = $request->rabat_dio['X04_2'];
            $Predracun->X04_id_3 = $request->model['X04_3'];      $Predracun->X04_cijena_3 = $request->cijena['X04_3']*100;    $Predracun->X04_kolicina_3 = $request->kolicina['X04_3'];  $Predracun->X04_rabat_3 = $request->rabat_dio['X04_3'];

            $Predracun->X05_id = $request->model['X05'];      $Predracun->X05_cijena = $request->cijena['X05']*100;    $Predracun->X05_kolicina = $request->kolicina['X05'];  $Predracun->X05_rabat = $request->rabat_dio['X05'];
            $Predracun->X05_id_2 = $request->model['X05_2'];      $Predracun->X05_cijena_2 = $request->cijena['X05_2']*100;    $Predracun->X05_kolicina_2 = $request->kolicina['X05_2'];  $Predracun->X05_rabat_2 = $request->rabat_dio['X05_2'];
            $Predracun->X05_id_3 = $request->model['X05_3'];      $Predracun->X05_cijena_3 = $request->cijena['X05_3']*100;    $Predracun->X05_kolicina_3 = $request->kolicina['X05_3'];  $Predracun->X05_rabat_3 = $request->rabat_dio['X05_3'];

            $Predracun->X06_id = $request->model['X06'];      $Predracun->X06_cijena = $request->cijena['X06']*100;    $Predracun->X06_kolicina = $request->kolicina['X06'];  $Predracun->X06_rabat = $request->rabat_dio['X06'];
            $Predracun->X07_id = $request->model['X07'];      $Predracun->X07_cijena = $request->cijena['X07']*100;    $Predracun->X07_kolicina = $request->kolicina['X07'];  $Predracun->X07_rabat = $request->rabat_dio['X07'];
            $Predracun->X08_id = $request->model['X08'];      $Predracun->X08_cijena = $request->cijena['X08']*100;    $Predracun->X08_kolicina = $request->kolicina['X08'];  $Predracun->X08_rabat = $request->rabat_dio['X08'];
            $Predracun->X09_id = $request->model['X09'];      $Predracun->X09_cijena = $request->cijena['X09']*100;    $Predracun->X09_kolicina = $request->kolicina['X09'];  $Predracun->X09_rabat = $request->rabat_dio['X09'];
            $Predracun->X10_id = $request->model['X10'];      $Predracun->X10_cijena = $request->cijena['X10']*100;    $Predracun->X10_kolicina = $request->kolicina['X10'];  $Predracun->X10_rabat = $request->rabat_dio['X10'];
            $Predracun->X11_id = $request->model['X11'];      $Predracun->X11_cijena = $request->cijena['X11']*100;    $Predracun->X11_kolicina = $request->kolicina['X11'];  $Predracun->X11_rabat = $request->rabat_dio['X11'];

            $Predracun->X12_id = $request->model['X12'];      $Predracun->X12_cijena = $request->cijena['X12']*100;    $Predracun->X12_kolicina = $request->kolicina['X12'];  $Predracun->X12_rabat = $request->rabat_dio['X12'];
            $Predracun->X12_id_2 = $request->model['X12_2'];      $Predracun->X12_cijena_2 = $request->cijena['X12_2']*100;    $Predracun->X12_kolicina_2 = $request->kolicina['X12_2'];  $Predracun->X12_rabat_2 = $request->rabat_dio['X12_2'];
            $Predracun->X12_id_3 = $request->model['X12_3'];      $Predracun->X12_cijena_3 = $request->cijena['X12_3']*100;    $Predracun->X12_kolicina_3 = $request->kolicina['X12_3'];  $Predracun->X12_rabat_3 = $request->rabat_dio['X12_3'];

            $Predracun->X13_id = $request->model['X13'];      $Predracun->X13_cijena = $request->cijena['X13']*100;    $Predracun->X13_kolicina = $request->kolicina['X13'];  $Predracun->X13_rabat = $request->rabat_dio['X13'];
            $Predracun->X13_id_2 = $request->model['X13_2'];      $Predracun->X13_cijena_2 = $request->cijena['X13_2']*100;    $Predracun->X13_kolicina_2 = $request->kolicina['X13_2'];  $Predracun->X13_rabat_2 = $request->rabat_dio['X13_2'];
            $Predracun->X13_id_3 = $request->model['X13_3'];      $Predracun->X13_cijena_3 = $request->cijena['X13_3']*100;    $Predracun->X13_kolicina_3 = $request->kolicina['X13_3'];  $Predracun->X13_rabat_3 = $request->rabat_dio['X13_3'];
 
            
            $Predracun->X14_id = $request->model['X14'];      $Predracun->X14_cijena = $request->cijena['X14']*100;    $Predracun->X14_kolicina = $request->kolicina['X14'];  $Predracun->X14_rabat = $request->rabat_dio['X14'];
            $Predracun->X15_id = $request->model['X15'];      $Predracun->X15_cijena = $request->cijena['X15']*100;    $Predracun->X15_kolicina = $request->kolicina['X15'];  $Predracun->X15_rabat = $request->rabat_dio['X15'];
*/

            $Predracun->X16_id = $request->model['X16'];      $Predracun->X16_cijena = $request->cijena['X16']*100;    $Predracun->X16_kolicina = $request->kolicina['X16'];  $Predracun->X16_rabat = $request->rabat_dio['X16'];
            $Predracun->X16_id_2 = $request->model['X16_2'];      $Predracun->X16_cijena_2 = $request->cijena['X16_2']*100;    $Predracun->X16_kolicina_2 = $request->kolicina['X16_2'];  $Predracun->X16_rabat_2 = $request->rabat_dio['X16_2'];
            $Predracun->X16_id_3 = $request->model['X16_3'];      $Predracun->X16_cijena_3 = $request->cijena['X16_3']*100;    $Predracun->X16_kolicina_3 = $request->kolicina['X16_3'];  $Predracun->X16_rabat_3 = $request->rabat_dio['X16_3'];
            $Predracun->X16_id_4 = $request->model['X16_4'];      $Predracun->X16_cijena_4 = $request->cijena['X16_4']*100;    $Predracun->X16_kolicina_4 = $request->kolicina['X16_4'];  $Predracun->X16_rabat_4 = $request->rabat_dio['X16_4'];
            $Predracun->X16_id_5 = $request->model['X16_5'];      $Predracun->X16_cijena_5 = $request->cijena['X16_5']*100;    $Predracun->X16_kolicina_5 = $request->kolicina['X16_5'];  $Predracun->X16_rabat_5 = $request->rabat_dio['X16_5'];
            


            if($Predracun->save()){

               /*
               $skinuto=DB::statement("select u.skinuto_sa_stanja 
                                         from predracuni u 
                                        WHERE u.id = ".$Predracun->id

                                       );
               */
               //$skinuto=Predracun::find($Predracun->id)->value('skinuto_sa_stanja');
               $skinuto=Predracun::where('id', $Predracun->id)->value('skinuto_sa_stanja');
               // a je predračun potvrđen a naije ažurirano stanje uradi to
               if($Predracun->status==1 && $skinuto=='NE'){
                  
                  
                  
                  // označi predračun kao ažuriran
                  DB::statement("UPDATE predracuni u 
                                    SET u.skinuto_sa_stanja = 'DA'
                                  WHERE u.id = ".$Predracun->id
                  );


                  // skini sa stanja SERVISA
                  if ($Predracun->lokacija=='S') {
                  
                    /*
                     if ( $Predracun->CW_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->CW_kolicina    WHERE u.id = ".$Predracun->CW_id); }
                     if ( $Predracun->CW_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->CW_kolicina_2  WHERE u.id = ".$Predracun->CW_id_2); }
                     if ( $Predracun->CW_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->CW_kolicina_3  WHERE u.id = ".$Predracun->CW_id_3); }
                     if ( $Predracun->TW_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->TW_kolicina    WHERE u.id = ".$Predracun->TW_id); }
                     if ( $Predracun->TW_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->TW_kolicina_2  WHERE u.id = ".$Predracun->TW_id_2); }
                     if ( $Predracun->TW_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->TW_kolicina_3  WHERE u.id = ".$Predracun->TW_id_3); }
                     if ( $Predracun->BH_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->BH_kolicina    WHERE u.id = ".$Predracun->BH_id); }
                     if ( $Predracun->BH_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->BH_kolicina_2  WHERE u.id = ".$Predracun->BH_id_2); }
                     if ( $Predracun->BH_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->BH_kolicina_3  WHERE u.id = ".$Predracun->BH_id_3); }
                     if ( $Predracun->BP_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->BP_kolicina    WHERE u.id = ".$Predracun->BP_id); }
                     if ( $Predracun->BP_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->BP_kolicina_2  WHERE u.id = ".$Predracun->BP_id_2); }
                     if ( $Predracun->BP_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->BP_kolicina_3  WHERE u.id = ".$Predracun->BP_id_3); }
                     if ( $Predracun->HS_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->HS_kolicina    WHERE u.id = ".$Predracun->HS_id); }
                     if ( $Predracun->HS_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->HS_kolicina_2  WHERE u.id = ".$Predracun->HS_id_2); }
                     if ( $Predracun->HS_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->HS_kolicina_3  WHERE u.id = ".$Predracun->HS_id_3); }
                     if ( $Predracun->AC_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->AC_kolicina    WHERE u.id = ".$Predracun->AC_id); }
                     if ( $Predracun->AC_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->AC_kolicina_2  WHERE u.id = ".$Predracun->AC_id_2); }
                     if ( $Predracun->AC_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->AC_kolicina_3  WHERE u.id = ".$Predracun->AC_id_3); }
                     if ( $Predracun->NZ_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->NZ_kolicina    WHERE u.id = ".$Predracun->NZ_id); }
                     if ( $Predracun->NZ_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->NZ_kolicina_2  WHERE u.id = ".$Predracun->NZ_id_2); }
                     if ( $Predracun->NZ_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->NZ_kolicina_3  WHERE u.id = ".$Predracun->NZ_id_3); }
                     if ( $Predracun->GK_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->GK_kolicina    WHERE u.id = ".$Predracun->GK_id); }
                     if ( $Predracun->GK_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->GK_kolicina_2  WHERE u.id = ".$Predracun->GK_id_2); }
                     if ( $Predracun->GK_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->GK_kolicina_3  WHERE u.id = ".$Predracun->GK_id_3); }
                     if ( $Predracun->RK_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->RK_kolicina    WHERE u.id = ".$Predracun->RK_id); }
                     if ( $Predracun->RK_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->RK_kolicina_2  WHERE u.id = ".$Predracun->RK_id_2); }
                     if ( $Predracun->RK_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->RK_kolicina_3  WHERE u.id = ".$Predracun->RK_id_3); }
                     if ( $Predracun->TH_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->TH_kolicina    WHERE u.id = ".$Predracun->TH_id); }
                     if ( $Predracun->TH_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->TH_kolicina_2  WHERE u.id = ".$Predracun->TH_id_2); }
                     if ( $Predracun->TH_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->TH_kolicina_3  WHERE u.id = ".$Predracun->TH_id_3); }
                     if ( $Predracun->CN_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->CN_kolicina    WHERE u.id = ".$Predracun->CN_id); }
                     if ( $Predracun->CN_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->CN_kolicina_2  WHERE u.id = ".$Predracun->CN_id_2); }
                     if ( $Predracun->CN_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->CN_kolicina_3  WHERE u.id = ".$Predracun->CN_id_3); }

                     if ( $Predracun->X01_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X01_kolicina   WHERE u.id = ".$Predracun->X01_id); }
                     if ( $Predracun->X02_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X02_kolicina   WHERE u.id = ".$Predracun->X02_id); }
                     if ( $Predracun->X03_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X03_kolicina   WHERE u.id = ".$Predracun->X03_id); }
                     if ( $Predracun->X04_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X04_kolicina   WHERE u.id = ".$Predracun->X04_id); }
                     if ( $Predracun->X04_kolicina_2 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X04_kolicina_2 WHERE u.id = ".$Predracun->X04_id_2); }
                     if ( $Predracun->X04_kolicina_3 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X04_kolicina_3 WHERE u.id = ".$Predracun->X04_id_3); }
                     if ( $Predracun->X05_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X05_kolicina   WHERE u.id = ".$Predracun->X05_id); }
                     if ( $Predracun->X05_kolicina_2 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X05_kolicina_2 WHERE u.id = ".$Predracun->X05_id_2); }
                     if ( $Predracun->X05_kolicina_3 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X05_kolicina_3 WHERE u.id = ".$Predracun->X05_id_3); }
                     if ( $Predracun->X06_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X06_kolicina   WHERE u.id = ".$Predracun->X06_id); }
                     if ( $Predracun->X07_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X07_kolicina   WHERE u.id = ".$Predracun->X07_id); }
                     if ( $Predracun->X08_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X08_kolicina   WHERE u.id = ".$Predracun->X08_id); }
                     if ( $Predracun->X09_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X09_kolicina   WHERE u.id = ".$Predracun->X09_id); }
                     if ( $Predracun->X10_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X10_kolicina   WHERE u.id = ".$Predracun->X10_id); }
                     if ( $Predracun->X11_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X11_kolicina   WHERE u.id = ".$Predracun->X11_id); }
                     if ( $Predracun->X12_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X12_kolicina   WHERE u.id = ".$Predracun->X12_id); }
                     if ( $Predracun->X12_kolicina_2 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X12_kolicina_2 WHERE u.id = ".$Predracun->X12_id_2); }
                     if ( $Predracun->X12_kolicina_3 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X12_kolicina_3 WHERE u.id = ".$Predracun->X12_id_3); }
                     if ( $Predracun->X13_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X13_kolicina   WHERE u.id = ".$Predracun->X13_id); }
                     if ( $Predracun->X13_kolicina_2 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X13_kolicina_2 WHERE u.id = ".$Predracun->X13_id_2); }
                     if ( $Predracun->X13_kolicina_3 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X13_kolicina_3 WHERE u.id = ".$Predracun->X13_id_3); }
                     if ( $Predracun->X14_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X14_kolicina   WHERE u.id = ".$Predracun->X14_id); }
                     if ( $Predracun->X15_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X15_kolicina   WHERE u.id = ".$Predracun->X15_id); }
                  */   
                     if ( $Predracun->X16_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X16_kolicina   WHERE u.id = ".$Predracun->X16_id); }
                     if ( $Predracun->X16_kolicina_2 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X16_kolicina_2 WHERE u.id = ".$Predracun->X16_id_2); }
                     if ( $Predracun->X16_kolicina_3 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X16_kolicina_3 WHERE u.id = ".$Predracun->X16_id_3); }
                     if ( $Predracun->X16_kolicina_4 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X16_kolicina_4 WHERE u.id = ".$Predracun->X16_id_4); }
                     if ( $Predracun->X16_kolicina_5 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_s = u.na_stanju_s - $Predracun->X16_kolicina_5 WHERE u.id = ".$Predracun->X16_id_5); }
   
                  }


                  // skini sa stanja RADNJE
                  if ($Predracun->lokacija=='R') {
                  
                    /*
                     if ( $Predracun->CW_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->CW_kolicina    WHERE u.id = ".$Predracun->CW_id); }
                     if ( $Predracun->CW_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->CW_kolicina_2  WHERE u.id = ".$Predracun->CW_id_2); }
                     if ( $Predracun->CW_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->CW_kolicina_3  WHERE u.id = ".$Predracun->CW_id_3); }
                     if ( $Predracun->TW_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->TW_kolicina    WHERE u.id = ".$Predracun->TW_id); }
                     if ( $Predracun->TW_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->TW_kolicina_2  WHERE u.id = ".$Predracun->TW_id_2); }
                     if ( $Predracun->TW_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->TW_kolicina_3  WHERE u.id = ".$Predracun->TW_id_3); }
                     if ( $Predracun->BH_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->BH_kolicina    WHERE u.id = ".$Predracun->BH_id); }
                     if ( $Predracun->BH_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->BH_kolicina_2  WHERE u.id = ".$Predracun->BH_id_2); }
                     if ( $Predracun->BH_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->BH_kolicina_3  WHERE u.id = ".$Predracun->BH_id_3); }
                     if ( $Predracun->BP_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->BP_kolicina    WHERE u.id = ".$Predracun->BP_id); }
                     if ( $Predracun->BP_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->BP_kolicina_2  WHERE u.id = ".$Predracun->BP_id_2); }
                     if ( $Predracun->BP_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->BP_kolicina_3  WHERE u.id = ".$Predracun->BP_id_3); }
                     if ( $Predracun->HS_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->HS_kolicina    WHERE u.id = ".$Predracun->HS_id); }
                     if ( $Predracun->HS_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->HS_kolicina_2  WHERE u.id = ".$Predracun->HS_id_2); }
                     if ( $Predracun->HS_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->HS_kolicina_3  WHERE u.id = ".$Predracun->HS_id_3); }
                     if ( $Predracun->AC_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->AC_kolicina    WHERE u.id = ".$Predracun->AC_id); }
                     if ( $Predracun->AC_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->AC_kolicina_2  WHERE u.id = ".$Predracun->AC_id_2); }
                     if ( $Predracun->AC_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->AC_kolicina_3  WHERE u.id = ".$Predracun->AC_id_3); }
                     if ( $Predracun->NZ_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->NZ_kolicina    WHERE u.id = ".$Predracun->NZ_id); }
                     if ( $Predracun->NZ_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->NZ_kolicina_2  WHERE u.id = ".$Predracun->NZ_id_2); }
                     if ( $Predracun->NZ_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->NZ_kolicina_3  WHERE u.id = ".$Predracun->NZ_id_3); }
                     if ( $Predracun->GK_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->GK_kolicina    WHERE u.id = ".$Predracun->GK_id); }
                     if ( $Predracun->GK_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->GK_kolicina_2  WHERE u.id = ".$Predracun->GK_id_2); }
                     if ( $Predracun->GK_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->GK_kolicina_3  WHERE u.id = ".$Predracun->GK_id_3); }
                     if ( $Predracun->RK_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->RK_kolicina    WHERE u.id = ".$Predracun->RK_id); }
                     if ( $Predracun->RK_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->RK_kolicina_2  WHERE u.id = ".$Predracun->RK_id_2); }
                     if ( $Predracun->RK_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->RK_kolicina_3  WHERE u.id = ".$Predracun->RK_id_3); }
                     if ( $Predracun->TH_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->TH_kolicina    WHERE u.id = ".$Predracun->TH_id); }
                     if ( $Predracun->TH_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->TH_kolicina_2  WHERE u.id = ".$Predracun->TH_id_2); }
                     if ( $Predracun->TH_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->TH_kolicina_3  WHERE u.id = ".$Predracun->TH_id_3); }
                     if ( $Predracun->CN_kolicina > 0 )    { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->CN_kolicina    WHERE u.id = ".$Predracun->CN_id); }
                     if ( $Predracun->CN_kolicina_2 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->CN_kolicina_2  WHERE u.id = ".$Predracun->CN_id_2); }
                     if ( $Predracun->CN_kolicina_3 > 0 )  { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->CN_kolicina_3  WHERE u.id = ".$Predracun->CN_id_3); }

                     if ( $Predracun->X01_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X01_kolicina   WHERE u.id = ".$Predracun->X01_id); }
                     if ( $Predracun->X02_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X02_kolicina   WHERE u.id = ".$Predracun->X02_id); }
                     if ( $Predracun->X03_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X03_kolicina   WHERE u.id = ".$Predracun->X03_id); }
                     if ( $Predracun->X04_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X04_kolicina   WHERE u.id = ".$Predracun->X04_id); }
                     if ( $Predracun->X04_kolicina_2 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X04_kolicina_2 WHERE u.id = ".$Predracun->X04_id_2); }
                     if ( $Predracun->X04_kolicina_3 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X04_kolicina_3 WHERE u.id = ".$Predracun->X04_id_3); }
                     if ( $Predracun->X05_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X05_kolicina   WHERE u.id = ".$Predracun->X05_id); }
                     if ( $Predracun->X05_kolicina_2 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X05_kolicina_2 WHERE u.id = ".$Predracun->X05_id_2); }
                     if ( $Predracun->X05_kolicina_3 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X05_kolicina_3 WHERE u.id = ".$Predracun->X05_id_3); }
                     if ( $Predracun->X06_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X06_kolicina   WHERE u.id = ".$Predracun->X06_id); }
                     if ( $Predracun->X07_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X07_kolicina   WHERE u.id = ".$Predracun->X07_id); }
                     if ( $Predracun->X08_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X08_kolicina   WHERE u.id = ".$Predracun->X08_id); }
                     if ( $Predracun->X09_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X09_kolicina   WHERE u.id = ".$Predracun->X09_id); }
                     if ( $Predracun->X10_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X10_kolicina   WHERE u.id = ".$Predracun->X10_id); }
                     if ( $Predracun->X11_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X11_kolicina   WHERE u.id = ".$Predracun->X11_id); }
                     if ( $Predracun->X12_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X12_kolicina   WHERE u.id = ".$Predracun->X12_id); }
                     if ( $Predracun->X12_kolicina_2 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X12_kolicina_2 WHERE u.id = ".$Predracun->X12_id_2); }
                     if ( $Predracun->X12_kolicina_3 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X12_kolicina_3 WHERE u.id = ".$Predracun->X12_id_3); }
                     if ( $Predracun->X13_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X13_kolicina   WHERE u.id = ".$Predracun->X13_id); }
                     if ( $Predracun->X13_kolicina_2 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X13_kolicina_2 WHERE u.id = ".$Predracun->X13_id_2); }
                     if ( $Predracun->X13_kolicina_3 > 0 ) { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X13_kolicina_3 WHERE u.id = ".$Predracun->X13_id_3); }
                     if ( $Predracun->X14_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X14_kolicina   WHERE u.id = ".$Predracun->X14_id); }
                     if ( $Predracun->X15_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_r - $Predracun->X15_kolicina   WHERE u.id = ".$Predracun->X15_id); }
                    */

                     if ( $Predracun->X16_kolicina > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_s - $Predracun->X16_kolicina   WHERE u.id = ".$Predracun->X16_id); }
                     if ( $Predracun->X16_kolicina_2 > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_s - $Predracun->X16_kolicina_2   WHERE u.id = ".$Predracun->X16_id_2); }
                     if ( $Predracun->X16_kolicina_3 > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_s - $Predracun->X16_kolicina_3   WHERE u.id = ".$Predracun->X16_id_3); }
                     if ( $Predracun->X16_kolicina_4 > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_s - $Predracun->X16_kolicina_4   WHERE u.id = ".$Predracun->X16_id_4); }
                     if ( $Predracun->X16_kolicina_5 > 0 )   { DB::statement("UPDATE turbinadijelovi u SET u.na_stanju_r = u.na_stanju_s - $Predracun->X16_kolicina_5   WHERE u.id = ".$Predracun->X16_id_5); }



                  }



               }


               return new PredracunRES($Predracun);
                
            }

            
        }


    }

    
   // brisanje
   public function destroy($id)
   {
      // nađi predracun
      $predracun=Predracun::findOrFail($id);

      if($predracun->delete()){
            return new PredracunRES($predracun);

      }
   }

    public function stampa($predracun_id, $tip)
    {
       
                // nađi Predracun
                //$predracun=Predracun::findOrFail($predracun_id);
                $predracun = DB::table('predracuni')
                ->join('usluge', 'predracuni.usluga_id', '=', 'usluge.id')
                ->select(
                    DB::raw('broj,
                             datum,
                             kupac_id,
                             kupac_ime,
                             status,
                             CASE WHEN status=0 THEN "U pripremi"
                                WHEN status=1 THEN "Potvrđen" 
                                WHEN status=9 THEN "Odbačen" 
                                ELSE "nedefinisan" 
                             END 
                             as opis_statusa,
                             oem,
                             oem_cijena,
                             komplet_remont,
                             rabat,
                             napomena,
                             ukupna_cijena,
                             usluga_id,
                             usluge.opis as usluga_naziv,
                             usluge.cijena as usluga_cijena,
                             nacin_placanja,
                             CASE WHEN nacin_placanja=1 then "Gotovina"
                                  ELSE "Žiralno" 
                             END 
                             as nacin_placanja_naziv,
                             lokacija,
                             CASE WHEN lokacija="S" then "Servis"
                                  ELSE "Radnja" 
                             END 
                             as lokacija_naziv,
                             racun_nota,
                             garancija,
                             CASE WHEN garancija=1 then "1 godina"
                                  WHEN garancija=2 then "2 godine"
                                  WHEN garancija=3 then "3 godine"       
                                  ELSE "-" 
                             END 
                             as garancija_naziv,
                             CASE WHEN garancija_el=0 then "GARANCIJA SE NE ODNOSI NA ELEKTRONIKU TURBINE"
                                  WHEN garancija_el=1 then "GARANCIJA SE ODNOSI I NA ELEKTRONIKU TURBINE"
                                  ELSE "-" 
                             END 
                             as garancija_elektronike                             
                             ')

                ) 
                ->where('predracuni.id','=',$predracun_id)
                ->get();                


                
                //$stavke->CW_naziv = 'CW naziv';
                //$stavke->TW_naziv = 'TW naziv';
 
                //$kupac = DB::table('kupci')->where('id', $predracun->kupac_id)->get();

                  $kupac = Predracun::join('kupci', 'predracuni.kupac_id', '=', 'kupci.id')
                  ->selectRaw('kupci.naziv, kupci.kontakt_osoba, kupci.ulica_i_broj, kupci.post_br_mjesto, kupci.drzava, kupci.jmb_jib') 
                  ->where('predracuni.id','=',$predracun_id)
                  ->get();
  
          
                     

                $tipovi = DB::table('turbinadiotipovi')->select(
                    DB::raw('id, 
                             naziv_2, 
                             oznaka
                          ') 
                    )
                ->orderBy('turbinadiotipovi.naziv_2')
                ->get();                

                $dijelovi = Turbinadiotip::join('turbinadijelovi', 'turbinadiotipovi.id', '=', 'turbinadijelovi.turbinadiotip_id')
                ->leftJoin('predracuni', 'predracuni.id', '=', 'predracuni.id')
                ->selectRaw('
                             turbinadiotipovi.naziv_2    tip_naziv, 
                             turbinadiotipovi.oznaka     tip_oznaka,
                             turbinadijelovi.oznaka      dio_oznaka,
                             turbinadijelovi.id          dio_id, 
                             CASE
                                WHEN predracuni.CW_id=turbinadijelovi.id   THEN predracuni.CW_kolicina
                                WHEN predracuni.CW_id_2=turbinadijelovi.id THEN predracuni.CW_kolicina_2
                                WHEN predracuni.CW_id_3=turbinadijelovi.id THEN predracuni.CW_kolicina_3
                                WHEN predracuni.TW_id=turbinadijelovi.id   THEN predracuni.TW_kolicina
                                WHEN predracuni.TW_id_2=turbinadijelovi.id THEN predracuni.TW_kolicina_2
                                WHEN predracuni.TW_id_3=turbinadijelovi.id THEN predracuni.TW_kolicina_3
                                WHEN predracuni.BH_id=turbinadijelovi.id   THEN predracuni.BH_kolicina
                                WHEN predracuni.BH_id_2=turbinadijelovi.id THEN predracuni.BH_kolicina_2
                                WHEN predracuni.BH_id_3=turbinadijelovi.id THEN predracuni.BH_kolicina_3
                                WHEN predracuni.BP_id=turbinadijelovi.id   THEN predracuni.BP_kolicina
                                WHEN predracuni.BP_id_2=turbinadijelovi.id THEN predracuni.BP_kolicina_2
                                WHEN predracuni.BP_id_3=turbinadijelovi.id THEN predracuni.BP_kolicina_3  
                                WHEN predracuni.HS_id=turbinadijelovi.id   THEN predracuni.HS_kolicina
                                WHEN predracuni.HS_id_2=turbinadijelovi.id THEN predracuni.HS_kolicina_2
                                WHEN predracuni.HS_id_3=turbinadijelovi.id THEN predracuni.HS_kolicina_3
                                WHEN predracuni.AC_id=turbinadijelovi.id   THEN predracuni.AC_kolicina
                                WHEN predracuni.AC_id_2=turbinadijelovi.id THEN predracuni.AC_kolicina_2
                                WHEN predracuni.AC_id_3=turbinadijelovi.id THEN predracuni.AC_kolicina_3
                                WHEN predracuni.NZ_id=turbinadijelovi.id   THEN predracuni.NZ_kolicina
                                WHEN predracuni.NZ_id_2=turbinadijelovi.id THEN predracuni.NZ_kolicina_2
                                WHEN predracuni.NZ_id_3=turbinadijelovi.id THEN predracuni.NZ_kolicina_3
                                WHEN predracuni.GK_id=turbinadijelovi.id   THEN predracuni.GK_kolicina
                                WHEN predracuni.GK_id_2=turbinadijelovi.id THEN predracuni.GK_kolicina_2
                                WHEN predracuni.GK_id_3=turbinadijelovi.id THEN predracuni.GK_kolicina_3
                                WHEN predracuni.RK_id=turbinadijelovi.id   THEN predracuni.RK_kolicina
                                WHEN predracuni.RK_id_2=turbinadijelovi.id THEN predracuni.RK_kolicina_2
                                WHEN predracuni.RK_id_3=turbinadijelovi.id THEN predracuni.RK_kolicina_3
                                WHEN predracuni.TH_id=turbinadijelovi.id   THEN predracuni.TH_kolicina
                                WHEN predracuni.TH_id_2=turbinadijelovi.id THEN predracuni.TH_kolicina_2
                                WHEN predracuni.TH_id_3=turbinadijelovi.id THEN predracuni.TH_kolicina_3
                                WHEN predracuni.CN_id=turbinadijelovi.id   THEN predracuni.CN_kolicina
                                WHEN predracuni.CN_id_2=turbinadijelovi.id THEN predracuni.CN_kolicina_2
                                WHEN predracuni.CN_id_3=turbinadijelovi.id THEN predracuni.CN_kolicina_3

                                WHEN predracuni.X01_id=turbinadijelovi.id   THEN predracuni.X01_kolicina
                                WHEN predracuni.X02_id=turbinadijelovi.id   THEN predracuni.X02_kolicina
                                WHEN predracuni.X03_id=turbinadijelovi.id   THEN predracuni.X03_kolicina
                                WHEN predracuni.X04_id=turbinadijelovi.id   THEN predracuni.X04_kolicina
                                WHEN predracuni.X04_id_2=turbinadijelovi.id THEN predracuni.X04_kolicina_2
                                WHEN predracuni.X04_id_3=turbinadijelovi.id THEN predracuni.X04_kolicina_3
                                WHEN predracuni.X05_id=turbinadijelovi.id   THEN predracuni.X05_kolicina
                                WHEN predracuni.X05_id_2=turbinadijelovi.id THEN predracuni.X05_kolicina_2
                                WHEN predracuni.X05_id_3=turbinadijelovi.id THEN predracuni.X05_kolicina_3
                                WHEN predracuni.X06_id=turbinadijelovi.id   THEN predracuni.X06_kolicina
                                WHEN predracuni.X07_id=turbinadijelovi.id   THEN predracuni.X07_kolicina
                                WHEN predracuni.X08_id=turbinadijelovi.id   THEN predracuni.X08_kolicina
                                WHEN predracuni.X09_id=turbinadijelovi.id   THEN predracuni.X09_kolicina
                                WHEN predracuni.X10_id=turbinadijelovi.id   THEN predracuni.X10_kolicina
                                WHEN predracuni.X11_id=turbinadijelovi.id   THEN predracuni.X11_kolicina
                                WHEN predracuni.X12_id=turbinadijelovi.id   THEN predracuni.X12_kolicina
                                WHEN predracuni.X12_id_2=turbinadijelovi.id THEN predracuni.X12_kolicina_2
                                WHEN predracuni.X12_id_3=turbinadijelovi.id THEN predracuni.X12_kolicina_3
                                WHEN predracuni.X13_id=turbinadijelovi.id   THEN predracuni.X13_kolicina                                                                  
                                WHEN predracuni.X13_id_2=turbinadijelovi.id THEN predracuni.X13_kolicina_2                                                                  
                                WHEN predracuni.X13_id_3=turbinadijelovi.id THEN predracuni.X13_kolicina_3                                                                  
                                WHEN predracuni.X14_id=turbinadijelovi.id   THEN predracuni.X14_kolicina                                                                  
                                WHEN predracuni.X15_id=turbinadijelovi.id   THEN predracuni.X15_kolicina
                                  
                                WHEN predracuni.X16_id=turbinadijelovi.id   THEN predracuni.X16_kolicina                                                                 
                                WHEN predracuni.X16_id_2=turbinadijelovi.id THEN predracuni.X16_kolicina_2 
                                WHEN predracuni.X16_id_3=turbinadijelovi.id THEN predracuni.X16_kolicina_3 
                                WHEN predracuni.X16_id_4=turbinadijelovi.id THEN predracuni.X16_kolicina_4 
                                WHEN predracuni.X16_id_5=turbinadijelovi.id THEN predracuni.X16_kolicina_5 

                                ELSE 0
                             END                         komada,
                             predracuni.rabat,
                             CASE
                                 WHEN predracuni.CW_id=turbinadijelovi.id   THEN predracuni.CW_rabat
                                 WHEN predracuni.CW_id_2=turbinadijelovi.id THEN predracuni.CW_rabat_2
                                 WHEN predracuni.CW_id_3=turbinadijelovi.id THEN predracuni.CW_rabat_3
                                 WHEN predracuni.TW_id=turbinadijelovi.id   THEN predracuni.TW_rabat
                                 WHEN predracuni.TW_id_2=turbinadijelovi.id THEN predracuni.TW_rabat_2
                                 WHEN predracuni.TW_id_3=turbinadijelovi.id THEN predracuni.TW_rabat_3
                                 WHEN predracuni.BH_id=turbinadijelovi.id   THEN predracuni.BH_rabat
                                 WHEN predracuni.BH_id_2=turbinadijelovi.id THEN predracuni.BH_rabat_2
                                 WHEN predracuni.BH_id_3=turbinadijelovi.id THEN predracuni.BH_rabat_3
                                 WHEN predracuni.BP_id=turbinadijelovi.id   THEN predracuni.BP_rabat
                                 WHEN predracuni.BP_id_2=turbinadijelovi.id THEN predracuni.BP_rabat_2
                                 WHEN predracuni.BP_id_3=turbinadijelovi.id THEN predracuni.BP_rabat_3  
                                 WHEN predracuni.HS_id=turbinadijelovi.id   THEN predracuni.HS_rabat
                                 WHEN predracuni.HS_id_2=turbinadijelovi.id THEN predracuni.HS_rabat_2
                                 WHEN predracuni.HS_id_3=turbinadijelovi.id THEN predracuni.HS_rabat_3
                                 WHEN predracuni.AC_id=turbinadijelovi.id   THEN predracuni.AC_rabat
                                 WHEN predracuni.AC_id_2=turbinadijelovi.id THEN predracuni.AC_rabat_2
                                 WHEN predracuni.AC_id_3=turbinadijelovi.id THEN predracuni.AC_rabat_3
                                 WHEN predracuni.NZ_id=turbinadijelovi.id   THEN predracuni.NZ_rabat
                                 WHEN predracuni.NZ_id_2=turbinadijelovi.id THEN predracuni.NZ_rabat_2
                                 WHEN predracuni.NZ_id_3=turbinadijelovi.id THEN predracuni.NZ_rabat_3
                                 WHEN predracuni.GK_id=turbinadijelovi.id   THEN predracuni.GK_rabat
                                 WHEN predracuni.GK_id_2=turbinadijelovi.id THEN predracuni.GK_rabat_2
                                 WHEN predracuni.GK_id_3=turbinadijelovi.id THEN predracuni.GK_rabat_3
                                 WHEN predracuni.RK_id=turbinadijelovi.id   THEN predracuni.RK_rabat
                                 WHEN predracuni.RK_id_2=turbinadijelovi.id THEN predracuni.RK_rabat_2
                                 WHEN predracuni.RK_id_3=turbinadijelovi.id THEN predracuni.RK_rabat_3
                                 WHEN predracuni.TH_id=turbinadijelovi.id   THEN predracuni.TH_rabat
                                 WHEN predracuni.TH_id_2=turbinadijelovi.id THEN predracuni.TH_rabat_2
                                 WHEN predracuni.TH_id_3=turbinadijelovi.id THEN predracuni.TH_rabat_3
                                 WHEN predracuni.CN_id=turbinadijelovi.id   THEN predracuni.CN_rabat
                                 WHEN predracuni.CN_id_2=turbinadijelovi.id THEN predracuni.CN_rabat_2
                                 WHEN predracuni.CN_id_3=turbinadijelovi.id THEN predracuni.CN_rabat_3

                                 WHEN predracuni.X01_id=turbinadijelovi.id   THEN predracuni.X01_rabat
                                 WHEN predracuni.X02_id=turbinadijelovi.id   THEN predracuni.X02_rabat
                                 WHEN predracuni.X03_id=turbinadijelovi.id   THEN predracuni.X03_rabat
                                 WHEN predracuni.X04_id=turbinadijelovi.id   THEN predracuni.X04_rabat
                                 WHEN predracuni.X04_id_2=turbinadijelovi.id THEN predracuni.X04_rabat_2
                                 WHEN predracuni.X04_id_3=turbinadijelovi.id THEN predracuni.X04_rabat_3
                                 WHEN predracuni.X05_id=turbinadijelovi.id   THEN predracuni.X05_rabat
                                 WHEN predracuni.X05_id_2=turbinadijelovi.id THEN predracuni.X05_rabat_2
                                 WHEN predracuni.X05_id_3=turbinadijelovi.id THEN predracuni.X05_rabat_3
                                 WHEN predracuni.X06_id=turbinadijelovi.id   THEN predracuni.X06_rabat
                                 WHEN predracuni.X07_id=turbinadijelovi.id   THEN predracuni.X07_rabat
                                 WHEN predracuni.X08_id=turbinadijelovi.id   THEN predracuni.X08_rabat
                                 WHEN predracuni.X09_id=turbinadijelovi.id   THEN predracuni.X09_rabat
                                 WHEN predracuni.X10_id=turbinadijelovi.id   THEN predracuni.X10_rabat
                                 WHEN predracuni.X11_id=turbinadijelovi.id   THEN predracuni.X11_rabat
                                 WHEN predracuni.X12_id=turbinadijelovi.id   THEN predracuni.X12_rabat
                                 WHEN predracuni.X12_id_2=turbinadijelovi.id THEN predracuni.X12_rabat_2
                                 WHEN predracuni.X12_id_3=turbinadijelovi.id THEN predracuni.X12_rabat_3
                                 WHEN predracuni.X13_id=turbinadijelovi.id   THEN predracuni.X13_rabat                                                                  
                                 WHEN predracuni.X13_id_2=turbinadijelovi.id THEN predracuni.X13_rabat_2                                                                  
                                 WHEN predracuni.X13_id_3=turbinadijelovi.id THEN predracuni.X13_rabat_3
                                 WHEN predracuni.X14_id=turbinadijelovi.id   THEN predracuni.X14_rabat  
                                 WHEN predracuni.X15_id=turbinadijelovi.id   THEN predracuni.X15_rabat 

                                 WHEN predracuni.X16_id=turbinadijelovi.id   THEN predracuni.X16_rabat  
                                 WHEN predracuni.X16_id_2=turbinadijelovi.id   THEN predracuni.X16_rabat_2  
                                 WHEN predracuni.X16_id_3=turbinadijelovi.id   THEN predracuni.X16_rabat_3  
                                 WHEN predracuni.X16_id_4=turbinadijelovi.id   THEN predracuni.X16_rabat_4  
                                 WHEN predracuni.X16_id_5=turbinadijelovi.id   THEN predracuni.X16_rabat_5  
                                 
                                ELSE 0
                             END                         rabat_dio,                               
                             CASE
                                 WHEN predracuni.CW_id=turbinadijelovi.id   THEN predracuni.CW_cijena
                                 WHEN predracuni.CW_id_2=turbinadijelovi.id THEN predracuni.CW_cijena_2
                                 WHEN predracuni.CW_id_3=turbinadijelovi.id THEN predracuni.CW_cijena_3
                                 WHEN predracuni.TW_id=turbinadijelovi.id   THEN predracuni.TW_cijena
                                 WHEN predracuni.TW_id_2=turbinadijelovi.id THEN predracuni.TW_cijena_2
                                 WHEN predracuni.TW_id_3=turbinadijelovi.id THEN predracuni.TW_cijena_3
                                 WHEN predracuni.BH_id=turbinadijelovi.id   THEN predracuni.BH_cijena
                                 WHEN predracuni.BH_id_2=turbinadijelovi.id THEN predracuni.BH_cijena_2
                                 WHEN predracuni.BH_id_3=turbinadijelovi.id THEN predracuni.BH_cijena_3
                                 WHEN predracuni.BP_id=turbinadijelovi.id   THEN predracuni.BP_cijena
                                 WHEN predracuni.BP_id_2=turbinadijelovi.id THEN predracuni.BP_cijena_2
                                 WHEN predracuni.BP_id_3=turbinadijelovi.id THEN predracuni.BP_cijena_3  
                                 WHEN predracuni.HS_id=turbinadijelovi.id   THEN predracuni.HS_cijena
                                 WHEN predracuni.HS_id_2=turbinadijelovi.id THEN predracuni.HS_cijena_2
                                 WHEN predracuni.HS_id_3=turbinadijelovi.id THEN predracuni.HS_cijena_3
                                 WHEN predracuni.AC_id=turbinadijelovi.id   THEN predracuni.AC_cijena
                                 WHEN predracuni.AC_id_2=turbinadijelovi.id THEN predracuni.AC_cijena_2
                                 WHEN predracuni.AC_id_3=turbinadijelovi.id THEN predracuni.AC_cijena_3
                                 WHEN predracuni.NZ_id=turbinadijelovi.id   THEN predracuni.NZ_cijena
                                 WHEN predracuni.NZ_id_2=turbinadijelovi.id THEN predracuni.NZ_cijena_2
                                 WHEN predracuni.NZ_id_3=turbinadijelovi.id THEN predracuni.NZ_cijena_3
                                 WHEN predracuni.GK_id=turbinadijelovi.id   THEN predracuni.GK_cijena
                                 WHEN predracuni.GK_id_2=turbinadijelovi.id THEN predracuni.GK_cijena_2
                                 WHEN predracuni.GK_id_3=turbinadijelovi.id THEN predracuni.GK_cijena_3
                                 WHEN predracuni.RK_id=turbinadijelovi.id   THEN predracuni.RK_cijena
                                 WHEN predracuni.RK_id_2=turbinadijelovi.id THEN predracuni.RK_cijena_2
                                 WHEN predracuni.RK_id_3=turbinadijelovi.id THEN predracuni.RK_cijena_3
                                 WHEN predracuni.TH_id=turbinadijelovi.id   THEN predracuni.TH_cijena
                                 WHEN predracuni.TH_id_2=turbinadijelovi.id THEN predracuni.TH_cijena_2
                                 WHEN predracuni.TH_id_3=turbinadijelovi.id THEN predracuni.TH_cijena_3
                                 WHEN predracuni.CN_id=turbinadijelovi.id   THEN predracuni.CN_cijena
                                 WHEN predracuni.CN_id_2=turbinadijelovi.id THEN predracuni.CN_cijena_2
                                 WHEN predracuni.CN_id_3=turbinadijelovi.id THEN predracuni.CN_cijena_3

                                 WHEN predracuni.X01_id=turbinadijelovi.id   THEN predracuni.X01_cijena
                                 WHEN predracuni.X02_id=turbinadijelovi.id   THEN predracuni.X02_cijena
                                 WHEN predracuni.X03_id=turbinadijelovi.id   THEN predracuni.X03_cijena
                                 WHEN predracuni.X04_id=turbinadijelovi.id   THEN predracuni.X04_cijena
                                 WHEN predracuni.X04_id_2=turbinadijelovi.id THEN predracuni.X04_cijena_2
                                 WHEN predracuni.X04_id_3=turbinadijelovi.id THEN predracuni.X04_cijena_3
                                 WHEN predracuni.X05_id=turbinadijelovi.id   THEN predracuni.X05_cijena
                                 WHEN predracuni.X05_id_2=turbinadijelovi.id THEN predracuni.X05_cijena_2
                                 WHEN predracuni.X05_id_3=turbinadijelovi.id THEN predracuni.X05_cijena_3
                                 WHEN predracuni.X06_id=turbinadijelovi.id   THEN predracuni.X06_cijena
                                 WHEN predracuni.X07_id=turbinadijelovi.id   THEN predracuni.X07_cijena
                                 WHEN predracuni.X08_id=turbinadijelovi.id   THEN predracuni.X08_cijena
                                 WHEN predracuni.X09_id=turbinadijelovi.id   THEN predracuni.X09_cijena
                                 WHEN predracuni.X10_id=turbinadijelovi.id   THEN predracuni.X10_cijena
                                 WHEN predracuni.X11_id=turbinadijelovi.id   THEN predracuni.X11_cijena
                                 WHEN predracuni.X12_id=turbinadijelovi.id   THEN predracuni.X12_cijena
                                 WHEN predracuni.X12_id_2=turbinadijelovi.id THEN predracuni.X12_cijena_2
                                 WHEN predracuni.X12_id_3=turbinadijelovi.id THEN predracuni.X12_cijena_3
                                 WHEN predracuni.X13_id=turbinadijelovi.id   THEN predracuni.X13_cijena                                                                  
                                 WHEN predracuni.X13_id_2=turbinadijelovi.id THEN predracuni.X13_cijena_2                                                                  
                                 WHEN predracuni.X13_id_3=turbinadijelovi.id THEN predracuni.X13_cijena_3
                                 WHEN predracuni.X14_id=turbinadijelovi.id   THEN predracuni.X14_cijena                                  
                                 WHEN predracuni.X15_id=turbinadijelovi.id   THEN predracuni.X15_cijena 

                                 WHEN predracuni.X16_id=turbinadijelovi.id   THEN predracuni.X16_cijena 
                                 WHEN predracuni.X16_id_2=turbinadijelovi.id   THEN predracuni.X16_cijena_2 
                                 WHEN predracuni.X16_id_3=turbinadijelovi.id   THEN predracuni.X16_cijena_3 
                                 WHEN predracuni.X16_id_4=turbinadijelovi.id   THEN predracuni.X16_cijena_4 
                                 WHEN predracuni.X16_id_5=turbinadijelovi.id   THEN predracuni.X16_cijena_5 

                                ELSE 0
                             END                         cijena                             

                          ') 

                ->where('predracuni.id','=',$predracun_id)
                ->orderBy('turbinadiotipovi.naziv')
                //->groupBy('turbinadiotipovi.naziv', '')
                ->get();




      if($tip=='PR' || $tip=='PR_D'){

                $pdf=PDF::loadView('predracuni.predracun_pdf', compact('predracun', 'tipovi', 'dijelovi', 'kupac', 'tip'));
                return $pdf->stream();
      //return $dijelovi;

      }else{
                
               $pdf=PDF::loadView('predracuni.garancija_pdf', compact('predracun', 'tipovi', 'dijelovi', 'kupac'));
              return $pdf->stream();
         //return $kupac;
         
         
         
         //return view('rnalozi.izdatnica_pdf', compact('result', 'rnalog', 'mattipovi'));

      }

       

        
    }    


    public function export_u_pdf($ZGR, $datum_od, $datum_do)
    {
                    
                    $format='landscape'; //landscape


                    if ($ZGR=='SVI'){
                        $export_racuna = Predracun::join('usluge', 'predracuni.usluga_id', '=', 'usluge.id')
                        ->join('kupci', 'predracuni.kupac_id', '=', 'kupci.id')
                        ->selectRaw('
                                    broj,
                                    datum,
                                    case when kupac_id=0 then kupac_ime
                                        else kupci.naziv 
                                    end as kupac_naziv,
                                    usluge.opis as usluga,
                                    round(ukupna_cijena/117, 2) as cijena_bez_PDV,
                                    round(ukupna_cijena/100, 2) - round(ukupna_cijena/117, 2) as PDV,
                                    round(ukupna_cijena/100, 2) as cijena,
                                    CASE WHEN nacin_placanja=1 and racun_nota="R" then "G"
                                         WHEN nacin_placanja=1 and racun_nota="N" then "N"
                                         ELSE "Z" 
                                    END 
                                    as ZGR
                         
                                    ')
        
                        ->where('predracuni.datum','>=',$datum_od)
                        ->where('predracuni.datum','<=',$datum_do)
                        
                        ->orderby('predracuni.datum', 'asc')
                        ->orderby('predracuni.broj', 'asc')
                        
                        ->get();     


                        $N_cijena_bez_PDV = $export_racuna->where('ZGR', 'N')->sum('cijena_bez_PDV')  ;
                        $N_PDV            = $export_racuna->where('ZGR', 'N')->sum('PDV')             ;
                        $N_iznos_sa_PDV   = $export_racuna->where('ZGR', 'N')->sum('cijena')          ;

                        $Z_cijena_bez_PDV = $export_racuna->where('ZGR', 'Z')->sum('cijena_bez_PDV')  ;
                        $Z_PDV            = $export_racuna->where('ZGR', 'Z')->sum('PDV')             ;
                        $Z_iznos_sa_PDV   = $export_racuna->where('ZGR', 'Z')->sum('cijena')          ;

                        $G_cijena_bez_PDV = $export_racuna->where('ZGR', 'G')->sum('cijena_bez_PDV')  ;
                        $G_PDV            = $export_racuna->where('ZGR', 'G')->sum('PDV')             ;
                        $G_iznos_sa_PDV   = $export_racuna->where('ZGR', 'G')->sum('cijena')          ;                        

                        $pdf=PDF::loadView('predracuni.predracuni_svi_export_pdf', compact('export_racuna', 'ZGR', 'datum_od', 'datum_do', 
                                                                                       'N_cijena_bez_PDV', 'N_PDV', 'N_iznos_sa_PDV',
                                                                                       'Z_cijena_bez_PDV', 'Z_PDV', 'Z_iznos_sa_PDV',
                                                                                       'G_cijena_bez_PDV', 'G_PDV', 'G_iznos_sa_PDV',                                                                                        
                                                                                       'format'))->setPaper('a4', $format);                        

                    }else{
                        $export_racuna = Predracun::join('usluge', 'predracuni.usluga_id', '=', 'usluge.id')
                        ->join('kupci', 'predracuni.kupac_id', '=', 'kupci.id')
                        ->selectRaw('
                                     broj,
                                     datum,
                                     case when kupac_id=0 then kupac_ime
                                          else kupci.naziv 
                                     end as kupac_naziv,
                                     usluge.opis as usluga,
                                     round(ukupna_cijena/117, 2) as cijena_bez_PDV,
                                     round(ukupna_cijena/100, 2) - round(ukupna_cijena/117, 2) as PDV,
                                     round(ukupna_cijena/100, 2) as cijena
                           
                                     ')
        
                       
                        ->where('predracuni.nacin_placanja','=',$ZGR=='Z'?2:1)
                        ->where('predracuni.racun_nota','=',$ZGR=='N'?'N':'R')
                        ->where('predracuni.datum','>=',$datum_od)
                        ->where('predracuni.datum','<=',$datum_do)
                        
                        ->orderby('predracuni.datum', 'asc')
                        ->orderby('predracuni.broj', 'asc')
                        ->get();  

                        $cijena_bez_PDV = $export_racuna->sum('cijena_bez_PDV');
                        $PDV            = $export_racuna->sum('PDV');
                        $iznos_sa_PDV   = $export_racuna->sum('cijena');

                        $pdf=PDF::loadView('predracuni.predracuni_export_pdf', compact('export_racuna', 'ZGR', 'datum_od', 'datum_do', 
                                                                                       'cijena_bez_PDV', 'PDV', 'iznos_sa_PDV', 
                                                                                       'format'))->setPaper('a4', $format);

                    }





                    //return $export_racuna;
                    return $pdf->stream();
                    
    }


    public function export_u_xls($ZGR)
    {
                        // Excel file name for download 
                    $vrsta= $ZGR=='Z'?'Žiralne fakture':($ZGR=='N'?'Nota računi':'Gotovinske fakture');   
                    $fileName = $vrsta.', '. date('d-m-Y') . ".xls"; 
                    
                    // Column names 
                    $fields = array('Broj računa', 'Datum', 'Kupac', 'Usluga', 'Cijena bez PDV-a', 'PDV', 'Iznos sa PDV-om'); 
                    
                    // Display column names as first row 
                    $excelData = implode("\t", array_values($fields)) . "\n"; 
                    
/*  
                    $result = Turbinadio::join('turbinadiotipovi', 'turbinadijelovi.turbinadiotip_id', '=', 'turbinadiotipovi.id')

                    ->selectRaw('
                    turbinadiotipovi.naziv tip,
                    turbinadijelovi.oznaka,
                    turbinadijelovi.na_stanju_r as na_stanju,
                    turbinadijelovi.limit_r as "limit"
                                ') 
    
                    ->orderBy('turbinadiotipovi.naziv_2', 'asc')
                    ->orderBy('turbinadijelovi.oznaka', 'asc')
                    ->get();
*/
                    $predracuni = Predracun::join('usluge', 'predracuni.usluga_id', '=', 'usluge.id')
                    ->join('kupci', 'predracuni.kupac_id', '=', 'kupci.id')
                    ->selectRaw('
                                 broj,
                                 datum,
                                 kupac_id,
                                 kupac_ime,
                                 kupci.naziv as kupac_naziv,
                                 usluge.opis as usluga,
                                 round(ukupna_cijena/117, 2) as cijena_bez_PDV,
                                 round(ukupna_cijena/100, 2) - round(ukupna_cijena/117, 2) as PDV,
                                 round(ukupna_cijena/100, 2) as cijena,
                                 CASE WHEN nacin_placanja=1 then "Gotovina"
                                      ELSE "Žiralno" 
                                 END 
                                 as nacin_placanja_naziv,
                                 racun_nota                             
                                 ')
    
                   
                    ->where('predracuni.nacin_placanja','=',$ZGR=='Z'?2:1)
                    ->where('predracuni.racun_nota','=',$ZGR=='N'?'N':'R')
                    ->orderby('predracuni.datum', 'desc')
                    ->get();     



                    foreach($predracuni as $row) {

                        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
                        $lineData = array($row['broj'],                                           
                        Carbon::createFromFormat('Y-m-d', $row['datum'])->format('d-m-Y'),
                                           //$row['datum']->date_format('d-m-Y'),
                                          $row['kupac_id']==0?$row['kupac_ime']:$row['kupac_naziv'], 
                                          $row['usluga'], 
                                          $row['cijena_bez_PDV'],
                                          $row['PDV'],
                                          $row['cijena']
                                          ); 
                        //array_walk($lineData, filterData); 
                        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
                    }

                    /*
                    // Fetch records from database 
                    $query = $db->query("SELECT * FROM members ORDER BY id ASC"); 
                    if($query->num_rows > 0){ 
                        // Output each row of the data 
                        while($row = $query->fetch_assoc()){ 
                            $status = ($row['status'] == 1)?'Active':'Inactive'; 
                            $lineData = array($row['id'], $row['first_name'], $row['last_name'], $row['email'], $row['gender'], $row['country'], $row['created'], $status); 
                            array_walk($lineData, 'filterData'); 
                            $excelData .= implode("\t", array_values($lineData)) . "\n"; 
                        } 
                    }else{ 
                        $excelData .= 'No records found...'. "\n"; 
                    } 
                    */
                    
                    // Headers for download 
                    header("Content-Type: application/vnd.ms-excel"); 
                    header("Content-Disposition: attachment; filename=\"$fileName\""); 
                    
                    // Render excel data 
                    echo $excelData; 
                    
                    exit;
    
    }



}
