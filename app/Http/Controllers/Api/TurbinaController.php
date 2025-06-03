<?php

namespace App\Http\Controllers\Api;

use DB;


use App\Http\Requests\TurbinaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Turbina;
use App\Turbinadio;
use App\Turbinadiophoto;

use App\Http\Resources\TurbineRES;
use App\Http\Resources\Turbine_WS_RES;
use App\Http\Resources\Turbine_WS_RES_x; //novija verzija

use App\Http\Resources\Turbina_WS_RES;   //detalji turbine
use App\Http\Resources\Turbina_WS_RES_x; //novija verzija

use App\Http\Resources\TurbinaRES;

class TurbinaController extends Controller
{

    
    /// prikaz svih Turbina
    public function index()
    {
        $Turbina=Turbina::orderBy('oem', 'asc')
                        ->get(); 
        return TurbineRES::collection($Turbina);
    }
    
    /// prikaz svih Turbina za Web Shop
    public function index_WS()
    {
        $Turbina=Turbina::orderBy('oem', 'asc')
                        ->get(); 
        return Turbine_WS_RES::collection($Turbina);
    }

    /// prikaz svih Turbina za Web Shop - TESTNI
    public function index_WS_x()
    {
        $Turbina=Turbina::orderBy('oem', 'asc')
                        ->get(); 
        return Turbine_WS_RES_x::collection($Turbina);
    }

    /// prikaz filtriranih Turbina
    public function index_2($duzina_stranice, $oem, $opis, $cw, $tw, $bh, $bp, $hs, $ac, $nz, $gk, $rk, $th, $cn)
    {

        $oem = $oem == '_' ? '%' : $oem;
        $opis= $opis== '_' ? '%' : $opis;
        
        $cw = $cw == '_' ? '%' : '%'.$cw.'%';
        $tw = $tw == '_' ? '%' : '%'.$tw.'%';
        $bh = $bh == '_' ? '%' : '%'.$bh.'%';
        $bp = $bp == '_' ? '%' : '%'.$bp.'%';
        $hs = $hs == '_' ? '%' : '%'.$hs.'%';
        $ac = $ac == '_' ? '%' : '%'.$ac.'%';
        $nz = $nz == '_' ? '%' : '%'.$nz.'%';
        $gk = $gk == '_' ? '%' : '%'.$gk.'%';
        $rk = $rk == '_' ? '%' : '%'.$rk.'%';
        $th = $th == '_' ? '%' : '%'.$th.'%';
        $cn = $cn == '_' ? '%' : '%'.$cn.'%';


        $Turbina = DB::table('turbine AS t')
        ->leftjoin('turbinadijelovi AS cw'  , 'cw.id'  , '=', 't.comp_wheel')
        ->leftjoin('turbinadijelovi AS cw_2', 'cw_2.id', '=', 't.comp_wheel_2') 
        ->leftjoin('turbinadijelovi AS cw_3', 'cw_3.id', '=', 't.comp_wheel_3') 

        ->leftjoin('turbinadijelovi AS tw'  , 'tw.id'  , '=', 't.turbine_wheel') 
        ->leftjoin('turbinadijelovi AS tw_2', 'tw_2.id', '=', 't.turbine_wheel_2') 
        ->leftjoin('turbinadijelovi AS tw_3', 'tw_3.id', '=', 't.turbine_wheel_3') 

        ->leftjoin('turbinadijelovi AS bh',   'bh.id', '=', 't.bearing_housing') 
        ->leftjoin('turbinadijelovi AS bh_2', 'bh_2.id', '=', 't.bearing_housing_2') 
        ->leftjoin('turbinadijelovi AS bh_3', 'bh_3.id', '=', 't.bearing_housing_3') 

        ->leftjoin('turbinadijelovi AS bp'  , 'bp.id'  , '=', 't.back_plate') 
        ->leftjoin('turbinadijelovi AS bp_2', 'bp_2.id', '=', 't.back_plate_2') 
        ->leftjoin('turbinadijelovi AS bp_3', 'bp_3.id', '=', 't.back_plate_3') 

        ->leftjoin('turbinadijelovi AS hs',   'hs.id', '=', 't.heat_shield') 
        ->leftjoin('turbinadijelovi AS hs_2', 'hs_2.id', '=', 't.heat_shield_2') 
        ->leftjoin('turbinadijelovi AS hs_3', 'hs_3.id', '=', 't.heat_shield_3') 

        ->leftjoin('turbinadijelovi AS ac'  , 'ac.id'  , '=', 't.actuator') 
        ->leftjoin('turbinadijelovi AS ac_2', 'ac_2.id', '=', 't.actuator_2') 
        ->leftjoin('turbinadijelovi AS ac_3', 'ac_3.id', '=', 't.actuator_3') 

        ->leftjoin('turbinadijelovi AS nz',   'nz.id', '=', 't.noozles') 
        ->leftjoin('turbinadijelovi AS nz_2', 'nz_2.id', '=', 't.noozles_2') 
        ->leftjoin('turbinadijelovi AS nz_3', 'nz_3.id', '=', 't.noozles_3') 
        
        ->leftjoin('turbinadijelovi AS gk',   'gk.id', '=', 't.gasket_kit') 
        ->leftjoin('turbinadijelovi AS gk_2', 'gk_2.id', '=', 't.gasket_kit_2') 
        ->leftjoin('turbinadijelovi AS gk_3', 'gk_3.id', '=', 't.gasket_kit_3') 
        
        ->leftjoin('turbinadijelovi AS rk'  , 'rk.id'  , '=', 't.repair_kit') 
        ->leftjoin('turbinadijelovi AS rk_2', 'rk_2.id', '=', 't.repair_kit_2') 
        ->leftjoin('turbinadijelovi AS rk_3', 'rk_3.id', '=', 't.repair_kit_3') 
        
        ->leftjoin('turbinadijelovi AS th',   'th.id', '=', 't.turbine_housing') 
        ->leftjoin('turbinadijelovi AS th_2', 'th_2.id', '=', 't.turbine_housing_2') 
        ->leftjoin('turbinadijelovi AS th_3', 'th_3.id', '=', 't.turbine_housing_3') 

        ->leftjoin('turbinadijelovi AS cn'  , 'cn.id'  , '=', 't.chra_no')
        ->leftjoin('turbinadijelovi AS cn_2', 'cn_2.id', '=', 't.chra_no_2') 
        ->leftjoin('turbinadijelovi AS cn_3', 'cn_3.id', '=', 't.chra_no_3') 

        ->selectRaw('t.*')
        ->where('t.oem', 'like', '%'.$oem.'%')
        ->where('t.opis', 'like', '%'.$opis.'%')
        

        // DB::Raw('IFNULL( `downloads`.`is_download` , 0 )');
        
        ->where(function ($query) use ($cw) {
            $query->where(DB::Raw('IFNULL( `cw`.`oznaka` , "%" )')   , 'like', $cw)
                ->orWhere(DB::Raw('IFNULL( `cw_2`.`oznaka` , "%" )') , 'like', $cw)
                ->orWhere(DB::Raw('IFNULL( `cw_3`.`oznaka` , "%" )') , 'like', $cw);
        })                
        
        ->where(function ($query) use ($tw) {
            $query->where(DB::Raw('IFNULL( `tw`.`oznaka` , "%" )')   , 'like', $tw) 
                ->orWhere(DB::Raw('IFNULL( `tw_2`.`oznaka` , "%" )') , 'like', $tw)
                ->orWhere(DB::Raw('IFNULL( `tw_3`.`oznaka` , "%" )') , 'like', $tw);
        })        
        
        ->where(function ($query) use ($bh) {
            $query->where(DB::Raw('IFNULL( `bh`.`oznaka` , "%" )')   , 'like', $bh) 
                ->orWhere(DB::Raw('IFNULL( `bh_2`.`oznaka` , "%" )') , 'like', $bh)
                ->orWhere(DB::Raw('IFNULL( `bh_3`.`oznaka` , "%" )') , 'like', $bh);
        })
        
        ->where(function ($query) use ($bp) {
            $query->where(DB::Raw('IFNULL( `bp`.`oznaka` , "%" )')   , 'like', $bp) 
                ->orWhere(DB::Raw('IFNULL( `bp_2`.`oznaka` , "%" )') , 'like', $bp)
                ->orWhere(DB::Raw('IFNULL( `bp_3`.`oznaka` , "%" )') , 'like', $bp);
        })

        ->where(function ($query) use ($hs) {
            $query->where(DB::Raw('IFNULL( `hs`.`oznaka` , "%" )')   , 'like', $hs) 
                ->orWhere(DB::Raw('IFNULL( `hs_2`.`oznaka` , "%" )') , 'like', $hs)
                ->orWhere(DB::Raw('IFNULL( `hs_3`.`oznaka` , "%" )') , 'like', $hs);
        })
        
        ->where(function ($query) use ($ac) {
            $query->where(DB::Raw('IFNULL( `ac`.`oznaka` , "%" )')   , 'like', $ac) 
                ->orWhere(DB::Raw('IFNULL( `ac_2`.`oznaka` , "%" )') , 'like', $ac)
                ->orWhere(DB::Raw('IFNULL( `ac_3`.`oznaka` , "%" )') , 'like', $ac);
        })

        ->where(function ($query) use ($nz) {
            $query->where(DB::Raw('IFNULL( `nz`.`oznaka` , "%" )')   , 'like', $nz) 
                ->orWhere(DB::Raw('IFNULL( `nz_2`.`oznaka` , "%" )') , 'like', $nz)
                ->orWhere(DB::Raw('IFNULL( `nz_3`.`oznaka` , "%" )') , 'like', $nz);
        })

        ->where(function ($query) use ($gk) {
            $query->where(DB::Raw('IFNULL( `gk`.`oznaka` , "%" )')   , 'like', $gk) 
                ->orWhere(DB::Raw('IFNULL( `gk_2`.`oznaka` , "%" )') , 'like', $gk)
                ->orWhere(DB::Raw('IFNULL( `gk_3`.`oznaka` , "%" )') , 'like', $gk);
        })
        
        ->where(function ($query) use ($rk) {
            $query->where(DB::Raw('IFNULL( `rk`.`oznaka` , "%" )')   , 'like', $rk)
                ->orWhere(DB::Raw('IFNULL( `rk_2`.`oznaka` , "%" )') , 'like', $rk)
                ->orWhere(DB::Raw('IFNULL( `rk_3`.`oznaka` , "%" )') , 'like', $rk);
        })
      
        ->where(function ($query) use ($th) {
            $query->where(DB::Raw('IFNULL( `th`.`oznaka` , "%" )')   , 'like', $th)
                ->orWhere(DB::Raw('IFNULL( `th_2`.`oznaka` , "%" )') , 'like', $th)
                ->orWhere(DB::Raw('IFNULL( `th_3`.`oznaka` , "%" )') , 'like', $th);
        })
        
        ->where(function ($query) use ($cn) {
            $query->where(DB::Raw('IFNULL( `cn`.`oznaka` , "%" )')   , 'like', $cn)
                ->orWhere(DB::Raw('IFNULL( `cn_2`.`oznaka` , "%" )') , 'like', $cn)
                ->orWhere(DB::Raw('IFNULL( `cn_3`.`oznaka` , "%" )') , 'like', $cn);
        })      

        ->orderBy('t.oem', 'asc')
        ->paginate($duzina_stranice);

        //return $Turbina;
        return TurbineRES::collection($Turbina);


    }

    // kreiranje i ažuriranje Turbina
    public function store(Request $request)
    {
        // nađi Turbina
        $Turbina=$request->isMethod('put') ? Turbina::findOrFail($request->id) : new Turbina;



        if($request->input('oem')!==''){



            $Turbina->id              = $request->input('id');

            $Turbina->oem             = $request->input('oem');
            $Turbina->opis            = $request->input('opis');
            $Turbina->oem_comp        = $request->input('oem_comp');

         

            $Turbina->comp_wheel        = $request->model['CW'];    $Turbina->CW_napomena     = $request->input('CW_napomena');   
            $Turbina->comp_wheel_2      = $request->model['CW_2'];  $Turbina->CW_napomena_2   = $request->input('CW_napomena_2'); 
            $Turbina->comp_wheel_3      = $request->model['CW_3'];  $Turbina->CW_napomena_3   = $request->input('CW_napomena_3'); 

            $Turbina->turbine_wheel     = $request->model['TW'];    $Turbina->TW_napomena     = $request->input('TW_napomena');   // (18.12.2022)
            $Turbina->turbine_wheel_2   = $request->model['TW_2'];  $Turbina->TW_napomena_2   = $request->input('TW_napomena_2'); // (18.12.2022)
            $Turbina->turbine_wheel_3   = $request->model['TW_3'];  $Turbina->TW_napomena_3   = $request->input('TW_napomena_3'); // (18.12.2022)
            
            $Turbina->bearing_housing   = $request->model['BH'];    $Turbina->BH_napomena     = $request->input('BH_napomena');   // (15.1.2023)
            $Turbina->bearing_housing_2 = $request->model['BH_2'];  $Turbina->BH_napomena_2   = $request->input('BH_napomena_2'); // (15.1.2023)
            $Turbina->bearing_housing_3 = $request->model['BH_3'];  $Turbina->BH_napomena_3   = $request->input('BH_napomena_3'); // (15.1.2023)
            
            $Turbina->back_plate        = $request->model['BP'];    $Turbina->BP_napomena     = $request->input('BP_napomena');   // (18.12.2022) 
            $Turbina->back_plate_2      = $request->model['BP_2'];  $Turbina->BP_napomena_2   = $request->input('BP_napomena_2'); // (18.12.2022) 
            $Turbina->back_plate_3      = $request->model['BP_3'];  $Turbina->BP_napomena_3   = $request->input('BP_napomena_3'); // (18.12.2022)   
            
            $Turbina->heat_shield       = $request->model['HS'];    $Turbina->HS_napomena     = $request->input('HS_napomena');   // (15.1.2023)
            $Turbina->heat_shield_2     = $request->model['HS_2'];  $Turbina->HS_napomena_2   = $request->input('HS_napomena_2'); // (15.1.2023)
            $Turbina->heat_shield_3     = $request->model['HS_3'];  $Turbina->HS_napomena_3   = $request->input('HS_napomena_3'); // (15.1.2023)
            
            $Turbina->actuator          = $request->model['AC'];    $Turbina->AC_napomena     = $request->input('AC_napomena');   // (18.12.2022)
            $Turbina->actuator_2        = $request->model['AC_2'];  $Turbina->AC_napomena_2   = $request->input('AC_napomena_2'); // (18.12.2022)
            $Turbina->actuator_3        = $request->model['AC_3'];  $Turbina->AC_napomena_3   = $request->input('AC_napomena_3'); // (18.12.2022)
            
            $Turbina->noozles           = $request->model['NZ'];    $Turbina->NZ_napomena     = $request->input('NZ_napomena');   // (15.1.2023)
            $Turbina->noozles_2         = $request->model['NZ_2'];  $Turbina->NZ_napomena_2   = $request->input('NZ_napomena_2'); // (15.1.2023)
            $Turbina->noozles_3         = $request->model['NZ_3'];  $Turbina->NZ_napomena_3   = $request->input('NZ_napomena_3'); // (15.1.2023)

            $Turbina->gasket_kit        = $request->model['GK'];    $Turbina->GK_napomena     = $request->input('GK_napomena');   // (15.1.2023)
            $Turbina->gasket_kit_2      = $request->model['GK_2'];  $Turbina->GK_napomena_2   = $request->input('GK_napomena_2'); // (15.1.2023)
            $Turbina->gasket_kit_3      = $request->model['GK_3'];  $Turbina->GK_napomena_3   = $request->input('GK_napomena_3'); // (15.1.2023)
            
            $Turbina->repair_kit        = $request->model['RK'];    $Turbina->RK_napomena     = $request->input('RK_napomena');   // za sada (24.8.2022) samo RK ima napomenu
            $Turbina->repair_kit_2      = $request->model['RK_2'];  $Turbina->RK_napomena_2   = $request->input('RK_napomena_2'); // za sada (16.12.2022) samo RK ima napomen
            $Turbina->repair_kit_3      = $request->model['RK_3'];  $Turbina->RK_napomena_3   = $request->input('RK_napomena_3'); // za sada (16.12.2022) samo RK ima napomen

            $Turbina->turbine_housing   = $request->model['TH'];    $Turbina->TH_napomena     = $request->input('TH_napomena');   // (15.1.2023)
            $Turbina->turbine_housing_2 = $request->model['TH_2'];  $Turbina->TH_napomena_2   = $request->input('TH_napomena_2'); // (15.1.2023)
            $Turbina->turbine_housing_3 = $request->model['TH_3'];  $Turbina->TH_napomena_3   = $request->input('TH_napomena_3'); // (15.1.2023)

            $Turbina->chra_no           = $request->model['CN'];    $Turbina->CN_napomena     = $request->input('CN_napomena');   // (18.12.2022) 
            $Turbina->chra_no_2         = $request->model['CN_2'];  $Turbina->CN_napomena_2   = $request->input('CN_napomena_2'); // (18.12.2022) 
            $Turbina->chra_no_3         = $request->model['CN_3'];  $Turbina->CN_napomena_3   = $request->input('CN_napomena_3'); // (18.12.2022)        


            $Turbina->X01 = $request->model['X01'];
            $Turbina->X02 = $request->model['X02'];

            $Turbina->X03 = $request->model['X03'];
            $Turbina->X03_2 = $request->model['X03_2'];
            $Turbina->X03_3 = $request->model['X03_3'];
            $Turbina->X03_napomena     = $request->input('X03_napomena');   
            $Turbina->X03_napomena_2   = $request->input('X03_napomena_2'); 
            $Turbina->X03_napomena_3   = $request->input('X03_napomena_3'); 
            
            $Turbina->X04   = $request->model['X04'];
            $Turbina->X04_2 = $request->model['X04_2'];// (15.1.2023)
            $Turbina->X04_3 = $request->model['X04_3'];// (15.1.2023)
            $Turbina->X04_napomena     = $request->input('X04_napomena');   //
            $Turbina->X04_napomena_2   = $request->input('X04_napomena_2'); //
            $Turbina->X04_napomena_3   = $request->input('X04_napomena_3'); //

            $Turbina->X05   = $request->model['X05'];
            $Turbina->X05_2 = $request->model['X05_2'];// (15.1.2023)
            $Turbina->X05_3 = $request->model['X05_3'];// (15.1.2023)
            $Turbina->X05_napomena     = $request->input('X05_napomena');   //
            $Turbina->X05_napomena_2   = $request->input('X05_napomena_2'); //
            $Turbina->X05_napomena_3   = $request->input('X05_napomena_3'); //
            
            $Turbina->X06 = $request->model['X06'];
            $Turbina->X06_2 = $request->model['X06_2'];
            $Turbina->X06_3 = $request->model['X06_3'];
            $Turbina->X06_napomena     = $request->input('X06_napomena');   
            $Turbina->X06_napomena_2   = $request->input('X06_napomena_2'); 
            $Turbina->X06_napomena_3   = $request->input('X06_napomena_3'); 

            $Turbina->X07 = $request->model['X07'];
            $Turbina->X07_2 = $request->model['X07_2'];
            $Turbina->X07_3 = $request->model['X07_3'];
            $Turbina->X07_napomena     = $request->input('X07_napomena');   
            $Turbina->X07_napomena_2   = $request->input('X07_napomena_2'); 
            $Turbina->X07_napomena_3   = $request->input('X07_napomena_3'); 
            
            $Turbina->X08 = $request->model['X08'];
            $Turbina->X08_2 = $request->model['X08_2'];
            $Turbina->X08_3 = $request->model['X08_3'];
            $Turbina->X08_napomena     = $request->input('X08_napomena');   
            $Turbina->X08_napomena_2   = $request->input('X08_napomena_2'); 
            $Turbina->X08_napomena_3   = $request->input('X08_napomena_3'); 
            
            $Turbina->X09 = $request->model['X09'];
            $Turbina->X09_2 = $request->model['X09_2'];
            $Turbina->X09_3 = $request->model['X09_3'];
            $Turbina->X09_napomena     = $request->input('X09_napomena');   
            $Turbina->X09_napomena_2   = $request->input('X09_napomena_2'); 
            $Turbina->X09_napomena_3   = $request->input('X09_napomena_3'); 
            
            $Turbina->X10 = $request->model['X10'];
            $Turbina->X10_2 = $request->model['X10_2'];
            $Turbina->X10_3 = $request->model['X10_3'];
            $Turbina->X10_napomena     = $request->input('X10_napomena');   
            $Turbina->X10_napomena_2   = $request->input('X10_napomena_2'); 
            $Turbina->X10_napomena_3   = $request->input('X10_napomena_3'); 
            
            $Turbina->X11 = $request->model['X11'];
            $Turbina->X11_2 = $request->model['X11_2'];
            $Turbina->X11_3 = $request->model['X11_3'];
            $Turbina->X11_napomena     = $request->input('X11_napomena');   
            $Turbina->X11_napomena_2   = $request->input('X11_napomena_2'); 
            $Turbina->X11_napomena_3   = $request->input('X11_napomena_3'); 
            
            $Turbina->X12   = $request->model['X12'];
            $Turbina->X12_2 = $request->model['X12_2'];// (15.1.2023)
            $Turbina->X12_3 = $request->model['X12_3'];// (15.1.2023)
            $Turbina->X12_napomena     = $request->input('X12_napomena');   //
            $Turbina->X12_napomena_2   = $request->input('X12_napomena_2'); //
            $Turbina->X12_napomena_3   = $request->input('X12_napomena_3'); //            
            
            $Turbina->X13   = $request->model['X13']; 
            $Turbina->X13_2 = $request->model['X13_2'];// (15.1.2023)
            $Turbina->X13_3 = $request->model['X13_3'];// (15.1.2023)
            $Turbina->X13_napomena     = $request->input('X13_napomena');   //
            $Turbina->X13_napomena_2   = $request->input('X13_napomena_2'); //
            $Turbina->X13_napomena_3   = $request->input('X13_napomena_3'); //

            $Turbina->X14   = $request->model['X14']; 
            
            $Turbina->X15   = $request->model['X15']; 
            $Turbina->X15_2 = $request->model['X15_2'];
            $Turbina->X15_3 = $request->model['X15_3'];
            $Turbina->X15_napomena     = $request->input('X15_napomena');   
            $Turbina->X15_napomena_2   = $request->input('X15_napomena_2'); 
            $Turbina->X15_napomena_3   = $request->input('X15_napomena_3'); 


            $Turbina->X16   = $request->model['X16']; 
            $Turbina->X16_2   = $request->model['X16_2']; 
            $Turbina->X16_3   = $request->model['X16_3']; 
            $Turbina->X16_4   = $request->model['X16_4']; 
            $Turbina->X16_5   = $request->model['X16_5']; 
            $Turbina->X16_napomena     = $request->input('X16_napomena');   //
            $Turbina->X16_napomena_2     = $request->input('X16_napomena_2');   //
            $Turbina->X16_napomena_3     = $request->input('X16_napomena_3');   //
            $Turbina->X16_napomena_4     = $request->input('X16_napomena_4');   //
            $Turbina->X16_napomena_5     = $request->input('X16_napomena_5');   //



            /// vjerovatno višak 26.10.2023
            /*
            $Turbina->cijena         = $request->input('oem_cijena')*100; 
            $Turbina->na_stanju      = $request->input('na_stanju');
            $Turbina->limit          = $request->input('limit');    
            $Turbina->nab_cijena     = $request->input('nab_cijena')*100;
            
            $Turbina->polica         = $request->input('polica');  
            */   


            if($Turbina->save()){
                return new TurbinaRES($Turbina);
            }

        }


    }


    // kreiranje duplikata Turbine
    public function store_d(Request $request)
    {
        // nađi Turbina
        $Turbina = new Turbina;

        /// provjeriti da li postoji vec taj oem

        if($request->input('oem')!==''){



            $Turbina->id              = $request->input('id');

            $Turbina->oem             = $request->input('oem');
            $Turbina->opis            = $request->input('opis');
            $Turbina->oem_comp        = $request->input('oem_comp');

            
            $Turbina->comp_wheel      = $request->model['CW'];      $Turbina->CW_napomena   = $request->input('CW_napomena');   
            $Turbina->comp_wheel_2    = $request->model['CW_2'];    $Turbina->CW_napomena_2 = $request->input('CW_napomena_2'); 
            $Turbina->comp_wheel_3    = $request->model['CW_3'];    $Turbina->CW_napomena_3 = $request->input('CW_napomena_3'); 

            $Turbina->turbine_wheel   = $request->model['TW'];      $Turbina->TW_napomena   = $request->input('TW_napomena');   // (18.12.2022)
            $Turbina->turbine_wheel_2 = $request->model['TW_2'];    $Turbina->TW_napomena_2 = $request->input('TW_napomena_2'); // (18.12.2022)
            $Turbina->turbine_wheel_3 = $request->model['TW_3'];    $Turbina->TW_napomena_3 = $request->input('TW_napomena_3'); // (18.12.2022)
            
            $Turbina->bearing_housing   = $request->model['BH'];    $Turbina->BH_napomena     = $request->input('BH_napomena');   // (15.1.2023)
            $Turbina->bearing_housing_2 = $request->model['BH_2'];  $Turbina->BH_napomena_2   = $request->input('BH_napomena_2'); // (15.1.2023)
            $Turbina->bearing_housing_3 = $request->model['BH_3'];  $Turbina->BH_napomena_3   = $request->input('BH_napomena_3'); // (15.1.2023)               
            
            $Turbina->back_plate      = $request->model['BP'];      $Turbina->BP_napomena   = $request->input('BP_napomena');   // (18.12.2022) 
            $Turbina->back_plate_2    = $request->model['BP_2'];    $Turbina->BP_napomena_2 = $request->input('BP_napomena_2'); // (18.12.2022) 
            $Turbina->back_plate_3    = $request->model['BP_3'];    $Turbina->BP_napomena_3 = $request->input('BP_napomena_3'); // (18.12.2022)   
            
            $Turbina->heat_shield       = $request->model['HS'];    $Turbina->HS_napomena     = $request->input('HS_napomena');   // (15.1.2023)
            $Turbina->heat_shield_2     = $request->model['HS_2'];  $Turbina->HS_napomena_2   = $request->input('HS_napomena_2'); // (15.1.2023)
            $Turbina->heat_shield_3     = $request->model['HS_3'];  $Turbina->HS_napomena_3   = $request->input('HS_napomena_3'); // (15.1.2023)    
            
            $Turbina->actuator        = $request->model['AC'];      $Turbina->AC_napomena   = $request->input('AC_napomena');   // (18.12.2022)
            $Turbina->actuator_2      = $request->model['AC_2'];    $Turbina->AC_napomena_2 = $request->input('AC_napomena_2'); // (18.12.2022)
            $Turbina->actuator_3      = $request->model['AC_3'];    $Turbina->AC_napomena_3 = $request->input('AC_napomena_3'); // (18.12.2022)
            
            $Turbina->noozles           = $request->model['NZ'];    $Turbina->NZ_napomena     = $request->input('NZ_napomena');   // (15.1.2023)
            $Turbina->noozles_2         = $request->model['NZ_2'];  $Turbina->NZ_napomena_2   = $request->input('NZ_napomena_2'); // (15.1.2023)
            $Turbina->noozles_3         = $request->model['NZ_3'];  $Turbina->NZ_napomena_3   = $request->input('NZ_napomena_3'); // (15.1.2023)

            $Turbina->gasket_kit        = $request->model['GK'];    $Turbina->GK_napomena     = $request->input('GK_napomena');   // (15.1.2023)
            $Turbina->gasket_kit_2      = $request->model['GK_2'];  $Turbina->GK_napomena_2   = $request->input('GK_napomena_2'); // (15.1.2023)
            $Turbina->gasket_kit_3      = $request->model['GK_3'];  $Turbina->GK_napomena_3   = $request->input('GK_napomena_3'); // (15.1.2023)
            
            $Turbina->repair_kit      = $request->model['RK'];      $Turbina->RK_napomena   = $request->input('RK_napomena');   // za sada (24.8.2022) samo RK ima napomenu
            $Turbina->repair_kit_2    = $request->model['RK_2'];    $Turbina->RK_napomena_2 = $request->input('RK_napomena_2'); // za sada (16.12.2022) samo RK ima napomen
            $Turbina->repair_kit_3    = $request->model['RK_3'];    $Turbina->RK_napomena_3 = $request->input('RK_napomena_3'); // za sada (16.12.2022) samo RK ima napomen

            $Turbina->turbine_housing   = $request->model['TH'];    $Turbina->TH_napomena     = $request->input('TH_napomena');   // (15.1.2023)
            $Turbina->turbine_housing_2 = $request->model['TH_2'];  $Turbina->TH_napomena_2   = $request->input('TH_napomena_2'); // (15.1.2023)
            $Turbina->turbine_housing_3 = $request->model['TH_3'];  $Turbina->TH_napomena_3   = $request->input('TH_napomena_3'); // (15.1.2023)
            
            $Turbina->chra_no         = $request->model['CN'];      $Turbina->CN_napomena   = $request->input('CN_napomena');   // (18.12.2022) 
            $Turbina->chra_no_2       = $request->model['CN_2'];    $Turbina->CN_napomena_2 = $request->input('CN_napomena_2'); // (18.12.2022) 
            $Turbina->chra_no_3       = $request->model['CN_3'];    $Turbina->CN_napomena_3 = $request->input('CN_napomena_3'); // (18.12.2022)        


            $Turbina->X01 = $request->model['X01'];
            $Turbina->X02 = $request->model['X02'];

            $Turbina->X03 = $request->model['X03']; 
            $Turbina->X03_2 = $request->model['X03_2']; 
            $Turbina->X03_3 = $request->model['X03_3']; 
            
            $Turbina->X04   = $request->model['X04'];
            $Turbina->X04_2 = $request->model['X04_2'];// (15.1.2023)
            $Turbina->X04_3 = $request->model['X04_3'];// (15.1.2023)
            
            $Turbina->X05   = $request->model['X05'];
            $Turbina->X05_2 = $request->model['X05_2'];// (15.1.2023)
            $Turbina->X05_3 = $request->model['X05_3'];// (15.1.2023)

            $Turbina->X06 = $request->model['X06'];
            $Turbina->X06_2 = $request->model['X06_2'];
            $Turbina->X06_3 = $request->model['X06_3'];
            
            $Turbina->X07 = $request->model['X07'];
            $Turbina->X07_2 = $request->model['X07_2'];
            $Turbina->X07_3 = $request->model['X07_3'];
            
            $Turbina->X08 = $request->model['X08'];
            $Turbina->X08_2 = $request->model['X08_2'];
            $Turbina->X08_3 = $request->model['X08_3'];
            
            $Turbina->X09 = $request->model['X09'];
            $Turbina->X09_2 = $request->model['X09_2'];
            $Turbina->X09_3 = $request->model['X09_3'];
            
            $Turbina->X10 = $request->model['X10'];
            $Turbina->X10_2 = $request->model['X10_2'];
            $Turbina->X10_3 = $request->model['X10_3'];
            
            $Turbina->X11 = $request->model['X11'];
            $Turbina->X11_2 = $request->model['X11_2'];
            $Turbina->X11_3 = $request->model['X11_3'];
            
            $Turbina->X12   = $request->model['X12'];
            $Turbina->X12_2 = $request->model['X12_2'];// (15.1.2023)
            $Turbina->X12_3 = $request->model['X12_3'];// (15.1.2023)
            
            $Turbina->X13   = $request->model['X13']; 
            $Turbina->X13_2 = $request->model['X13_2'];// (15.1.2023)
            $Turbina->X13_3 = $request->model['X13_3'];// (15.1.2023)

            $Turbina->X14   = $request->model['X14']; 
            
            $Turbina->X15   = $request->model['X15']; 
            $Turbina->X15_2   = $request->model['X15_2']; 
            $Turbina->X15_3   = $request->model['X15_3']; 
            

            $Turbina->X16   = $request->model['X16']; 
            $Turbina->X16_2   = $request->model['X16_2']; 
            $Turbina->X16_3   = $request->model['X16_3']; 
            $Turbina->X16_4   = $request->model['X16_4']; 
            $Turbina->X16_5   = $request->model['X16_5']; 
            $Turbina->X16_napomena     = $request->input('X16_napomena');   //
            $Turbina->X16_napomena_2     = $request->input('X16_napomena_2');   //
            $Turbina->X16_napomena_3     = $request->input('X16_napomena_3');   //
            $Turbina->X16_napomena_4     = $request->input('X16_napomena_4');   //
            $Turbina->X16_napomena_5     = $request->input('X16_napomena_5');   //


            $Turbina->cijena         = $request->input('oem_cijena')*100; 
            $Turbina->na_stanju      = $request->input('na_stanju');
            $Turbina->limit          = $request->input('limit');    
            $Turbina->nab_cijena     = $request->input('nab_cijena')*100;
            
            $Turbina->polica         = $request->input('polica');  
               


            if($Turbina->save()){
                return new TurbinaRES($Turbina);
            }

        }


    }


    // detalji turbine

    public function turbina_detalji_WS($id)
    {
       // nađi turbinu
       $turbina=Turbina::findOrFail($id);
 
       if($turbina->get()){
             return new Turbina_WS_RES($turbina);
 
       }
    }

    public function turbina_detalji_WS_x($id)
    {
       // nađi turbinu
       $turbina=Turbina::findOrFail($id);
 
       if($turbina->get()){
             return new Turbina_WS_RES_x($turbina);
 
       }
    }

   // brisanje

   public function destroy($id)
   {
      // nađi predracun
      $turbina=Turbina::findOrFail($id);

      if($turbina->delete()){
            return new TurbineRES($turbina);

      }
   }


}
