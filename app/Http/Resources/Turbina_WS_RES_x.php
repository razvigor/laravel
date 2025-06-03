<?php

namespace App\Http\Resources;

use DB;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Turbinadio;
use App\Turbinadiotip;
use App\Turbinadiopodtip;
use App\Turbinadiophoto;


class Turbina_WS_RES_x extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

   


        /// SLIKE ////////////////////////////////////////

        $CW_slike=Turbinadiophoto::where('turbinadio_id', '=',      $this->comp_wheel)->get();
        $TW_slike=Turbinadiophoto::where('turbinadio_id', '=',   $this->turbine_wheel)->get();
        $BH_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->bearing_housing)->get();
        $BP_slike=Turbinadiophoto::where('turbinadio_id', '=',      $this->back_plate)->get();
        $HS_slike=Turbinadiophoto::where('turbinadio_id', '=',     $this->heat_shield)->get();
        $AC_slike=Turbinadiophoto::where('turbinadio_id', '=',        $this->actuator)->get();
        $NZ_slike=Turbinadiophoto::where('turbinadio_id', '=',         $this->noozles)->get();
        $GK_slike=Turbinadiophoto::where('turbinadio_id', '=',      $this->gasket_kit)->get();
        $RK_slike=Turbinadiophoto::where('turbinadio_id', '=',      $this->repair_kit)->get();
        $TH_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->turbine_housing)->get();
        $CN_slike=Turbinadiophoto::where('turbinadio_id', '=',         $this->chra_no)->get();

        $CW_slike_2=Turbinadiophoto::where('turbinadio_id', '=',      $this->comp_wheel_2)->get();
        $TW_slike_2=Turbinadiophoto::where('turbinadio_id', '=',   $this->turbine_wheel_2)->get();
        $BH_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->bearing_housing_2)->get();
        $BP_slike_2=Turbinadiophoto::where('turbinadio_id', '=',      $this->back_plate_2)->get();
        $HS_slike_2=Turbinadiophoto::where('turbinadio_id', '=',     $this->heat_shield_2)->get();
        $AC_slike_2=Turbinadiophoto::where('turbinadio_id', '=',        $this->actuator_2)->get();
        $NZ_slike_2=Turbinadiophoto::where('turbinadio_id', '=',         $this->noozles_2)->get();
        $GK_slike_2=Turbinadiophoto::where('turbinadio_id', '=',      $this->gasket_kit_2)->get();
        $RK_slike_2=Turbinadiophoto::where('turbinadio_id', '=',      $this->repair_kit_2)->get();
        $TH_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->turbine_housing_2)->get();
        $CN_slike_2=Turbinadiophoto::where('turbinadio_id', '=',         $this->chra_no_2)->get();

        $CW_slike_3=Turbinadiophoto::where('turbinadio_id', '=',      $this->comp_wheel_3)->get();
        $TW_slike_3=Turbinadiophoto::where('turbinadio_id', '=',   $this->turbine_wheel_3)->get();
        $BH_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->bearing_housing_3)->get();
        $BP_slike_3=Turbinadiophoto::where('turbinadio_id', '=',      $this->back_plate_3)->get();
        $HS_slike_3=Turbinadiophoto::where('turbinadio_id', '=',     $this->heat_shield_3)->get();
        $AC_slike_3=Turbinadiophoto::where('turbinadio_id', '=',        $this->actuator_3)->get();
        $NZ_slike_3=Turbinadiophoto::where('turbinadio_id', '=',         $this->noozles_3)->get();
        $GK_slike_3=Turbinadiophoto::where('turbinadio_id', '=',      $this->gasket_kit_3)->get();
        $RK_slike_3=Turbinadiophoto::where('turbinadio_id', '=',      $this->repair_kit_3)->get();
        $TH_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->turbine_housing_3)->get();
        $CN_slike_3=Turbinadiophoto::where('turbinadio_id', '=',         $this->chra_no_3)->get();


        $X01_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X01)->get();
        $X02_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X02)->get();

        $X03_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X03)->get();
        $X03_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X03_2)->get();
        $X03_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X03_3)->get();

        $X04_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X04)->get();
        $X04_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X04_2)->get();
        $X04_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X04_3)->get();

        $X05_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X05)->get();
        $X05_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X05_2)->get();
        $X05_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X05_3)->get();

        $X06_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X06)->get();
        $X06_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X06_2)->get();
        $X06_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X06_3)->get();
        
        $X07_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X07)->get();
        $X07_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X07_2)->get();
        $X07_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X07_3)->get();
        
        $X08_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X08)->get();
        $X08_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X08_2)->get();
        $X08_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X08_3)->get();
        
        $X09_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X09)->get();
        $X09_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X09_2)->get();
        $X09_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X09_3)->get();
        
        $X10_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X10)->get();
        $X10_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X10_2)->get();
        $X10_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X10_3)->get();
        
        $X11_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X11)->get();
        $X11_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X11_2)->get();
        $X11_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X11_3)->get();

        $X12_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X12)->get();
        $X12_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X12_2)->get();
        $X12_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X12_3)->get();

        $X13_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X13)->get();
        $X13_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X13_2)->get();
        $X13_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X13_3)->get();

        $X14_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X14)->get();
        
        $X15_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X15)->get();
        $X15_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X15_2)->get();
        $X15_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X15_3)->get();

        $X16_slike=Turbinadiophoto::where('turbinadio_id', '=', $this->X16)->get();
        $X16_slike_2=Turbinadiophoto::where('turbinadio_id', '=', $this->X16_2)->get();        
        $X16_slike_3=Turbinadiophoto::where('turbinadio_id', '=', $this->X16_3)->get();
        $X16_slike_4=Turbinadiophoto::where('turbinadio_id', '=', $this->X16_4)->get();
        $X16_slike_5=Turbinadiophoto::where('turbinadio_id', '=', $this->X16_5)->get();
        /// SLIKE ////////////////////////////////////////




// #######################################################################################################################
// ###     #####                                                                                     #####     ###########
// ####   ######  EKVIVALENTI: za X01-X13 nisu potrebni ekvivalenti jer se ne prikazuju na pregledu  ######   ############
// ##### #######                                                                                     ####### #############
// #######################################################################################################################        

        $cw_ekvivalent=$this->comp_wheel===0?0:Turbinadio::where('id','=',$this->comp_wheel)->value('ekvivalent_za_id');
        $comp_wheel_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->comp_wheel)
        ->Where('ekvivalent_za_id', '=', $cw_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $cw_ekvivalent_2=$this->comp_wheel_2===0?0:Turbinadio::where('id','=',$this->comp_wheel_2)->value('ekvivalent_za_id');
        $comp_wheel_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->comp_wheel_2)
        ->Where('ekvivalent_za_id', '=', $cw_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $cw_ekvivalent_3=$this->comp_wheel_3===0?0:Turbinadio::where('id','=',$this->comp_wheel_3)->value('ekvivalent_za_id');
        $comp_wheel_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->comp_wheel_3)
        ->Where('ekvivalent_za_id', '=', $cw_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
        $tw_ekvivalent=$this->turbine_wheel===0?0:Turbinadio::where('id','=',$this->turbine_wheel)->value('ekvivalent_za_id');
        $turbine_wheel_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->turbine_wheel)
        ->Where('ekvivalent_za_id', '=', $tw_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $tw_ekvivalent_2=$this->turbine_wheel_2===0?0:Turbinadio::where('id','=',$this->turbine_wheel_2)->value('ekvivalent_za_id');
        $turbine_wheel_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->turbine_wheel_2)
        ->Where('ekvivalent_za_id', '=', $tw_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $tw_ekvivalent_3=$this->turbine_wheel_3===0?0:Turbinadio::where('id','=',$this->turbine_wheel_3)->value('ekvivalent_za_id');
        $turbine_wheel_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->turbine_wheel_3)
        ->Where('ekvivalent_za_id', '=', $tw_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
        $bh_ekvivalent=$this->bearing_housing===0?0:Turbinadio::where('id','=',$this->bearing_housing)->value('ekvivalent_za_id');
        $bearing_housing_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->bearing_housing)
        ->Where('ekvivalent_za_id', '=', $bh_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $bh_ekvivalent_2=$this->bearing_housing_2===0?0:Turbinadio::where('id','=',$this->bearing_housing_2)->value('ekvivalent_za_id');
        $bearing_housing_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->bearing_housing_2)
        ->Where('ekvivalent_za_id', '=', $bh_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $bh_ekvivalent_3=$this->bearing_housing_3===0?0:Turbinadio::where('id','=',$this->bearing_housing_3)->value('ekvivalent_za_id');
        $bearing_housing_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->bearing_housing_3)
        ->Where('ekvivalent_za_id', '=', $bh_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------

        $bp_ekvivalent=$this->back_plate===0?0:Turbinadio::where('id','=',$this->back_plate)->value('ekvivalent_za_id');
        $back_plate_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->back_plate)
        ->Where('ekvivalent_za_id', '=', $bp_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $bp_ekvivalent_2=$this->back_plate_2===0?0:Turbinadio::where('id','=',$this->back_plate_2)->value('ekvivalent_za_id');
        $back_plate_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->back_plate_2)
        ->Where('ekvivalent_za_id', '=', $bp_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $bp_ekvivalent_3=$this->back_plate_3===0?0:Turbinadio::where('id','=',$this->back_plate_3)->value('ekvivalent_za_id');
        $back_plate_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->back_plate_3)
        ->Where('ekvivalent_za_id', '=', $bp_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();                          

//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------

        $hs_ekvivalent=$this->heat_shield===0?0:Turbinadio::where('id','=',$this->heat_shield)->value('ekvivalent_za_id');
        $heat_shield_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->heat_shield)
        ->Where('ekvivalent_za_id', '=', $hs_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $hs_ekvivalent_2=$this->heat_shield_2===0?0:Turbinadio::where('id','=',$this->heat_shield_2)->value('ekvivalent_za_id');
        $heat_shield_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->heat_shield_2)
        ->Where('ekvivalent_za_id', '=', $hs_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $hs_ekvivalent_3=$this->heat_shield_3===0?0:Turbinadio::where('id','=',$this->heat_shield_3)->value('ekvivalent_za_id');
        $heat_shield_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->heat_shield_3)
        ->Where('ekvivalent_za_id', '=', $hs_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();


//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
        
        $ac_ekvivalent=$this->actuator===0?0:Turbinadio::where('id','=',$this->actuator)->value('ekvivalent_za_id');
        $actuator_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->actuator)
        ->Where('ekvivalent_za_id', '=', $ac_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();        


        $ac_ekvivalent_2=$this->actuator_2===0?0:Turbinadio::where('id','=',$this->actuator_2)->value('ekvivalent_za_id');
        $actuator_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->actuator_2)
        ->Where('ekvivalent_za_id', '=', $ac_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();  
        
        $ac_ekvivalent_3=$this->actuator_3===0?0:Turbinadio::where('id','=',$this->actuator_3)->value('ekvivalent_za_id');
        $actuator_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->actuator_3)
        ->Where('ekvivalent_za_id', '=', $ac_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();         

//--------------------------------------------------------------------------------------------------------------------------

        $nz_ekvivalent=$this->noozles===0?0:Turbinadio::where('id','=',$this->noozles)->value('ekvivalent_za_id');
        $noozles_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->noozles)
        ->Where('ekvivalent_za_id', '=', $nz_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();   

        $nz_ekvivalent_2=$this->noozles_2===0?0:Turbinadio::where('id','=',$this->noozles_2)->value('ekvivalent_za_id');
        $noozles_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->noozles_2)
        ->Where('ekvivalent_za_id', '=', $nz_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();   

        $nz_ekvivalent_3=$this->noozles_3===0?0:Turbinadio::where('id','=',$this->noozles_3)->value('ekvivalent_za_id');
        $noozles_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->noozles_3)
        ->Where('ekvivalent_za_id', '=', $nz_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();   

//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------

        $gk_ekvivalent=$this->gasket_kit===0?0:Turbinadio::where('id','=',$this->gasket_kit)->value('ekvivalent_za_id');
        $gasket_kit_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->gasket_kit)
        ->Where('ekvivalent_za_id', '=', $gk_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();    
        
        $gk_ekvivalent_2=$this->gasket_kit_2===0?0:Turbinadio::where('id','=',$this->gasket_kit_2)->value('ekvivalent_za_id');
        $gasket_kit_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->gasket_kit_2)
        ->Where('ekvivalent_za_id', '=', $gk_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();    
        
        $gk_ekvivalent_3=$this->gasket_kit_3===0?0:Turbinadio::where('id','=',$this->gasket_kit_3)->value('ekvivalent_za_id');
        $gasket_kit_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->gasket_kit_3)
        ->Where('ekvivalent_za_id', '=', $gk_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();    
        
        
//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
        
        $rk_ekvivalent=$this->repair_kit===0?0:Turbinadio::where('id','=',$this->repair_kit)->value('ekvivalent_za_id');
        $repair_kit_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->repair_kit)
        ->Where('ekvivalent_za_id', '=', $rk_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $rk_ekvivalent_2=$this->repair_kit_2===0?0:Turbinadio::where('id','=',$this->repair_kit_2)->value('ekvivalent_za_id');
        $repair_kit_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->repair_kit_2)
        ->Where('ekvivalent_za_id', '=', $rk_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get(); 
        
        $rk_ekvivalent_3=$this->repair_kit_3===0?0:Turbinadio::where('id','=',$this->repair_kit_3)->value('ekvivalent_za_id');
        $repair_kit_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->repair_kit_3)
        ->Where('ekvivalent_za_id', '=', $rk_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();                  
//--------------------------------------------------------------------------------------------------------------------------

        $th_ekvivalent=$this->turbine_housing===0?0:Turbinadio::where('id','=',$this->turbine_housing)->value('ekvivalent_za_id');
        $turbine_housing_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->turbine_housing)
        ->Where('ekvivalent_za_id', '=', $th_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();          

        $th_ekvivalent_2=$this->turbine_housing_2===0?0:Turbinadio::where('id','=',$this->turbine_housing_2)->value('ekvivalent_za_id');
        $turbine_housing_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->turbine_housing_2)
        ->Where('ekvivalent_za_id', '=', $th_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();      

        $th_ekvivalent_3=$this->turbine_housing_3===0?0:Turbinadio::where('id','=',$this->turbine_housing_3)->value('ekvivalent_za_id');
        $turbine_housing_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->turbine_housing_3)
        ->Where('ekvivalent_za_id', '=', $th_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();      

//--------------------------------------------------------------------------------------------------------------------------

        $cn_ekvivalent=$this->chra_no===0?0:Turbinadio::where('id','=',$this->chra_no)->value('ekvivalent_za_id');
        $chra_no_ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->chra_no)
        ->Where('ekvivalent_za_id', '=', $cn_ekvivalent)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();          

        $cn_ekvivalent_2=$this->chra_no_2===0?0:Turbinadio::where('id','=',$this->chra_no_2)->value('ekvivalent_za_id');
        $chra_no_ekvivalenti_2 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->chra_no_2)
        ->Where('ekvivalent_za_id', '=', $cn_ekvivalent_2)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();

        $cn_ekvivalent_3=$this->chra_no_3===0?0:Turbinadio::where('id','=',$this->chra_no_3)->value('ekvivalent_za_id');
        $chra_no_ekvivalenti_3 = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
                        turbinadijelovi.id as id_ekvivalenta,
                        turbinadijelovi.oznaka,
                        turbinadijelovi.cijena/100 as cijena,
                        turbinadijelovi.cijena_as/100 as cijena_as,
                        turbinadijelovi.cijena_ts/100 as cijena_ts,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        GROUP_CONCAT(turbinadiophotos.photo) as slike,
                        turbinadijelovi.ekvivalent_za_id
                    ') 
        ->where('turbinadijelovi.id', '<>', $this->chra_no_3)
        ->Where('ekvivalent_za_id', '=', $cn_ekvivalent_3)
        ->groupby('turbinadijelovi.id',
                    'turbinadijelovi.oznaka',
                    'turbinadijelovi.cijena',
                    'turbinadijelovi.cijena_as',
                    'turbinadijelovi.cijena_ts',
                    'turbinadijelovi.na_stanju_s',
                    'turbinadijelovi.na_stanju_r',
                    'turbinadijelovi.ekvivalent_za_id')
        ->get();        




//--------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------

// #########################################################################################################################
// ##### #######                                                                                  ############ #############
// ####   ######  NAPOMENA: za X01-X13 nisu potrebni ekvivalenti jer se ne prikazuju na pregledu  ###########   ############
// ###     #####                                                                                  ##########     ###########
// #########################################################################################################################


        return [

            'id'                     =>$this->id,


            'oem'                    =>$this->oem,
            'opis'                   =>$this->opis?$this->opis:'-',
            'oem_comp'               =>$this->oem_comp,
            
            // ###################################################################################################################################################
            'comp_wheel'             =>$this->comp_wheel,
            'CW_napomena'            =>$this->CW_napomena,       
            'comp_wheel_oznaka'      =>$this->comp_wheel===0?'-':Turbinadio::where('id','=',$this->comp_wheel)->value('oznaka'),
            'comp_wheel_tip'         =>$this->comp_wheel===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->comp_wheel)->value('turbinadiotip_id'))->value('naziv_2'),
            'comp_wheel_podtip'      =>$this->comp_wheel===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->comp_wheel)->value('turbinadiopodtip_id'))->value('naziv'),
            'comp_wheel_na_stanju'   =>$this->comp_wheel===0? 0 :Turbinadio::where('id','=',$this->comp_wheel)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'comp_wheel_u_servisu'   =>Turbinadio::where('id','=',$this->comp_wheel)->sum(\DB::raw('na_stanju_s')),
            'comp_wheel_u_radnji'    =>Turbinadio::where('id','=',$this->comp_wheel)->sum(\DB::raw('na_stanju_r')),
            'comp_wheel_cijena'      =>$this->comp_wheel===0?'-':Turbinadio::where('id','=',$this->comp_wheel)->value('cijena')/100,
            'comp_wheel_cijena_as'      =>$this->comp_wheel===0?'-':Turbinadio::where('id','=',$this->comp_wheel)->value('cijena_as')/100,
            'comp_wheel_cijena_ts'      =>$this->comp_wheel===0?'-':Turbinadio::where('id','=',$this->comp_wheel)->value('cijena_ts')/100,
            'comp_wheel_slike' => JsonResource::collection($CW_slike),

            // niz ekvivalentnih dijelova (može biti prazan)
            'comp_wheel_ekvivalenti' => JsonResource::collection($comp_wheel_ekvivalenti),
             

            'comp_wheel_2'             =>$this->comp_wheel_2,
            'CW_napomena_2'            =>$this->CW_napomena_2,       
            'comp_wheel_oznaka_2'      =>$this->comp_wheel_2===0?'-':Turbinadio::where('id','=',$this->comp_wheel_2)->value('oznaka'),
            'comp_wheel_tip_2'         =>$this->comp_wheel_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->comp_wheel_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'comp_wheel_podtip_2'      =>$this->comp_wheel_2===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->comp_wheel_2)->value('turbinadiopodtip_id'))->value('naziv'),
            'comp_wheel_na_stanju_2'   =>$this->comp_wheel_2===0? 0 :Turbinadio::where('id','=',$this->comp_wheel_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'comp_wheel_u_servisu_2'   =>Turbinadio::where('id','=',$this->comp_wheel_2)->sum(\DB::raw('na_stanju_s')),
            'comp_wheel_u_radnji_2'    =>Turbinadio::where('id','=',$this->comp_wheel_2)->sum(\DB::raw('na_stanju_r')),
            'comp_wheel_cijena_2'      =>$this->comp_wheel_2===0?'-':Turbinadio::where('id','=',$this->comp_wheel_2)->value('cijena')/100,
            'comp_wheel_cijena_2_as'      =>$this->comp_wheel_2===0?'-':Turbinadio::where('id','=',$this->comp_wheel_2)->value('cijena_as')/100,
            'comp_wheel_cijena_2_ts'      =>$this->comp_wheel_2===0?'-':Turbinadio::where('id','=',$this->comp_wheel_2)->value('cijena_ts')/100,
            'comp_wheel_slike_2' => JsonResource::collection($CW_slike_2),

            // niz ekvivalentnih dijelova (može biti prazan)
            'comp_wheel_ekvivalenti_2' => JsonResource::collection($comp_wheel_ekvivalenti_2),            

            'comp_wheel_3'             =>$this->comp_wheel_3,
            'CW_napomena_3'            =>$this->CW_napomena_3,       
            'comp_wheel_oznaka_3'      =>$this->comp_wheel_3===0?'-':Turbinadio::where('id','=',$this->comp_wheel_3)->value('oznaka'),
            'comp_wheel_tip_3'         =>$this->comp_wheel_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->comp_wheel_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'comp_wheel_podtip_3'      =>$this->comp_wheel_3===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->comp_wheel_3)->value('turbinadiopodtip_id'))->value('naziv'),
            'comp_wheel_na_stanju_3'   =>$this->comp_wheel_3===0? 0 :Turbinadio::where('id','=',$this->comp_wheel_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'comp_wheel_u_servisu_3'   =>Turbinadio::where('id','=',$this->comp_wheel_3)->sum(\DB::raw('na_stanju_s')),
            'comp_wheel_u_radnji_3'    =>Turbinadio::where('id','=',$this->comp_wheel_3)->sum(\DB::raw('na_stanju_r')),
            'comp_wheel_cijena_3'      =>$this->comp_wheel_3===0?'-':Turbinadio::where('id','=',$this->comp_wheel_3)->value('cijena')/100,
            'comp_wheel_cijena_3_as'      =>$this->comp_wheel_3===0?'-':Turbinadio::where('id','=',$this->comp_wheel_3)->value('cijena_as')/100,
            'comp_wheel_cijena_3_ts'      =>$this->comp_wheel_3===0?'-':Turbinadio::where('id','=',$this->comp_wheel_3)->value('cijena_ts')/100,
            'comp_wheel_slike_3' => JsonResource::collection($CW_slike_3),

            // niz ekvivalentnih dijelova (može biti prazan)
            'comp_wheel_ekvivalenti_3' => JsonResource::collection($comp_wheel_ekvivalenti_3),            
            // _________________________________________________________________________________________________________________________________________________


            // ###################################################################################################################################################
            'turbine_wheel'          =>$this->turbine_wheel, 
            'TW_napomena'            =>$this->TW_napomena,       
            'turbine_wheel_oznaka'   =>$this->turbine_wheel===0?'-':Turbinadio::where('id','=',$this->turbine_wheel)->value('oznaka'),
            'turbine_wheel_tip'      =>$this->turbine_wheel===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->turbine_wheel)->value('turbinadiotip_id'))->value('naziv_2'),
            'turbine_wheel_na_stanju'=>$this->turbine_wheel===0? 0 :Turbinadio::where('id','=',$this->turbine_wheel)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'turbine_wheel_u_servisu'=>Turbinadio::where('id','=',$this->turbine_wheel)->sum(\DB::raw('na_stanju_s')),
            'turbine_wheel_u_radnji' =>Turbinadio::where('id','=',$this->turbine_wheel)->sum(\DB::raw('na_stanju_r')),
            'turbine_wheel_cijena'   =>$this->turbine_wheel===0?'-':Turbinadio::where('id','=',$this->turbine_wheel)->value('cijena')/100,
            'turbine_wheel_cijena_as'   =>$this->turbine_wheel===0?'-':Turbinadio::where('id','=',$this->turbine_wheel)->value('cijena_as')/100,
            'turbine_wheel_cijena_ts'   =>$this->turbine_wheel===0?'-':Turbinadio::where('id','=',$this->turbine_wheel)->value('cijena_ts')/100,
            'turbine_wheel_slike' => JsonResource::collection($TW_slike),

            // niz ekvivalentnih dijelova (može biti prazan)
            'turbine_wheel_ekvivalenti' => JsonResource::collection($turbine_wheel_ekvivalenti),

            'turbine_wheel_2'          =>$this->turbine_wheel_2, 
            'TW_napomena_2'            =>$this->TW_napomena_2,       
            'turbine_wheel_oznaka_2'   =>$this->turbine_wheel_2===0?'-':Turbinadio::where('id','=',$this->turbine_wheel_2)->value('oznaka'),
            'turbine_wheel_tip_2'      =>$this->turbine_wheel_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->turbine_wheel_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'turbine_wheel_na_stanju_2'=>$this->turbine_wheel_2===0? 0 :Turbinadio::where('id','=',$this->turbine_wheel_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'turbine_wheel_u_servisu_2'=>Turbinadio::where('id','=',$this->turbine_wheel_2)->sum(\DB::raw('na_stanju_s')),
            'turbine_wheel_u_radnji_2' =>Turbinadio::where('id','=',$this->turbine_wheel_2)->sum(\DB::raw('na_stanju_r')),
            'turbine_wheel_cijena_2'   =>$this->turbine_wheel_2===0?'-':Turbinadio::where('id','=',$this->turbine_wheel_2)->value('cijena')/100,
            'turbine_wheel_cijena_2_as'   =>$this->turbine_wheel_2===0?'-':Turbinadio::where('id','=',$this->turbine_wheel_2)->value('cijena_as')/100,
            'turbine_wheel_cijena_2_ts'   =>$this->turbine_wheel_2===0?'-':Turbinadio::where('id','=',$this->turbine_wheel_2)->value('cijena_ts')/100,
            'turbine_wheel_slike_2' => JsonResource::collection($TW_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'turbine_wheel_ekvivalenti_2' => JsonResource::collection($turbine_wheel_ekvivalenti_2),
            
            'turbine_wheel_3'          =>$this->turbine_wheel_3, 
            'TW_napomena_3'            =>$this->TW_napomena_3,       
            'turbine_wheel_oznaka_3'   =>$this->turbine_wheel_3===0?'-':Turbinadio::where('id','=',$this->turbine_wheel_3)->value('oznaka'),
            'turbine_wheel_tip_3'      =>$this->turbine_wheel_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->turbine_wheel_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'turbine_wheel_na_stanju_3'=>$this->turbine_wheel_3===0? 0 :Turbinadio::where('id','=',$this->turbine_wheel_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'turbine_wheel_u_servisu_3'=>Turbinadio::where('id','=',$this->turbine_wheel_3)->sum(\DB::raw('na_stanju_s')),
            'cturbine_wheel_u_radnji_3'=>Turbinadio::where('id','=',$this->turbine_wheel_3)->sum(\DB::raw('na_stanju_r')),
            'turbine_wheel_cijena_3'   =>$this->turbine_wheel_3===0?'-':Turbinadio::where('id','=',$this->turbine_wheel_3)->value('cijena')/100,
            'turbine_wheel_cijena_3_as'   =>$this->turbine_wheel_3===0?'-':Turbinadio::where('id','=',$this->turbine_wheel_3)->value('cijena_as')/100,
            'turbine_wheel_cijena_3_ts'   =>$this->turbine_wheel_3===0?'-':Turbinadio::where('id','=',$this->turbine_wheel_3)->value('cijena_ts')/100,
            'turbine_wheel_slike_3' => JsonResource::collection($TW_slike_3),
            // niz ekvivalentnih dijelova (može biti prazan)
            'turbine_wheel_ekvivalenti_3' => JsonResource::collection($turbine_wheel_ekvivalenti_3),            
            // _________________________________________________________________________________________________________________________________________________


            // ### 15.1.2023 ######################################################################################################################################
            'bearing_housing'          =>$this->bearing_housing,             
            'BH_napomena'              =>$this->BH_napomena,       
            'bearing_housing_oznaka'   =>$this->bearing_housing===0?'-':Turbinadio::where('id','=',$this->bearing_housing)->value('oznaka'),
            'bearing_housing_tip'      =>$this->bearing_housing===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->bearing_housing)->value('turbinadiotip_id'))->value('naziv_2'),
            'bearing_housing_na_stanju'=>$this->bearing_housing===0? 0 :Turbinadio::where('id','=',$this->bearing_housing)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'bearing_housing_u_servisu'=>Turbinadio::where('id','=',$this->bearing_housing)->sum(\DB::raw('na_stanju_s')),
            'bearing_housing_u_radnji' =>Turbinadio::where('id','=',$this->bearing_housing)->sum(\DB::raw('na_stanju_r')),
            'bearing_housing_cijena'   =>$this->bearing_housing===0?'-':Turbinadio::where('id','=',$this->bearing_housing)->value('cijena')/100,
            'bearing_housing_cijena_as'   =>$this->bearing_housing===0?'-':Turbinadio::where('id','=',$this->bearing_housing)->value('cijena_as')/100,
            'bearing_housing_cijena_ts'   =>$this->bearing_housing===0?'-':Turbinadio::where('id','=',$this->bearing_housing)->value('cijena_ts')/100,
            'bearing_housing_slike' => JsonResource::collection($BH_slike),

            'bearing_housing_ekvivalenti' => JsonResource::collection($bearing_housing_ekvivalenti),

            'bearing_housing_2'          =>$this->bearing_housing_2,             
            'BH_napomena_2'              =>$this->BH_napomena_2,       
            'bearing_housing_oznaka_2'   =>$this->bearing_housing_2===0?'-':Turbinadio::where('id','=',$this->bearing_housing_2)->value('oznaka'),
            'bearing_housing_tip_2'      =>$this->bearing_housing_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->bearing_housing_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'bearing_housing_na_stanju_2'=>$this->bearing_housing_2===0? 0 :Turbinadio::where('id','=',$this->bearing_housing_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'bearing_housing_u_servisu_2'=>Turbinadio::where('id','=',$this->bearing_housing_2)->sum(\DB::raw('na_stanju_s')),
            'bearing_housing_u_radnji_2' =>Turbinadio::where('id','=',$this->bearing_housing_2)->sum(\DB::raw('na_stanju_r')),
            'bearing_housing_cijena_2'   =>$this->bearing_housing_2===0?'-':Turbinadio::where('id','=',$this->bearing_housing_2)->value('cijena')/100,
            'bearing_housing_cijena_2_as'   =>$this->bearing_housing_2===0?'-':Turbinadio::where('id','=',$this->bearing_housing_2)->value('cijena_as')/100,
            'bearing_housing_cijena_2_ts'   =>$this->bearing_housing_2===0?'-':Turbinadio::where('id','=',$this->bearing_housing_2)->value('cijena_ts')/100,
            'bearing_housing_slike_2' => JsonResource::collection($BH_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'bearing_housing_ekvivalenti_2' => JsonResource::collection($bearing_housing_ekvivalenti_2),

            'bearing_housing_3'          =>$this->bearing_housing_3,             
            'BH_napomena_3'              =>$this->BH_napomena_3,       
            'bearing_housing_oznaka_3'   =>$this->bearing_housing_3===0?'-':Turbinadio::where('id','=',$this->bearing_housing_3)->value('oznaka'),
            'bearing_housing_tip_3'      =>$this->bearing_housing_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->bearing_housing_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'bearing_housing_na_stanju_3'=>$this->bearing_housing_3===0? 0 :Turbinadio::where('id','=',$this->bearing_housing_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'bearing_housing_u_servisu_3'=>Turbinadio::where('id','=',$this->bearing_housing_3)->sum(\DB::raw('na_stanju_s')),
            'bearing_housing_u_radnji_3' =>Turbinadio::where('id','=',$this->bearing_housing_3)->sum(\DB::raw('na_stanju_r')),
            'bearing_housing_cijena_3'   =>$this->bearing_housing_3===0?'-':Turbinadio::where('id','=',$this->bearing_housing_3)->value('cijena')/100,
            'bearing_housing_cijena_3_as'   =>$this->bearing_housing_3===0?'-':Turbinadio::where('id','=',$this->bearing_housing_3)->value('cijena_as')/100,
            'bearing_housing_cijena_3_ts'   =>$this->bearing_housing_3===0?'-':Turbinadio::where('id','=',$this->bearing_housing_3)->value('cijena_ts')/100,
            'bearing_housing_slike_3' => JsonResource::collection($BH_slike_3),
            // niz ekvivalentnih dijelova (može biti prazan)
            'bearing_housing_ekvivalenti_3' => JsonResource::collection($bearing_housing_ekvivalenti_3),
            // _________________________________________________________________________________________________________________________________________________

            // ###################################################################################################################################################
            'back_plate'             =>$this->back_plate,
            'BP_napomena'            =>$this->BP_napomena,       
            'back_plate_oznaka'      =>$this->back_plate===0?'-':Turbinadio::where('id','=',$this->back_plate)->value('oznaka'),
            'back_plate_tip'         =>$this->back_plate===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->back_plate)->value('turbinadiotip_id'))->value('naziv_2'),
            'back_plate_na_stanju'   =>$this->back_plate===0? 0 :Turbinadio::where('id','=',$this->back_plate)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'back_plate_u_servisu'   =>Turbinadio::where('id','=',$this->back_plate)->sum(\DB::raw('na_stanju_s')),
            'back_plate_u_radnji'    =>Turbinadio::where('id','=',$this->back_plate)->sum(\DB::raw('na_stanju_r')),
            'back_plate_cijena'      =>$this->back_plate===0?'-':Turbinadio::where('id','=',$this->back_plate)->value('cijena')/100,
            'back_plate_cijena_as'      =>$this->back_plate===0?'-':Turbinadio::where('id','=',$this->back_plate)->value('cijena_as')/100,
            'back_plate_cijena_ts'      =>$this->back_plate===0?'-':Turbinadio::where('id','=',$this->back_plate)->value('cijena_ts')/100,
            'back_plate_slike'       => JsonResource::collection($BP_slike),
           
                        
            // niz ekvivalentnih dijelova (može biti prazan)
            'back_plate_ekvivalenti' => JsonResource::collection($back_plate_ekvivalenti),

            'back_plate_2'             =>$this->back_plate_2,
            'BP_napomena_2'            =>$this->BP_napomena_2,       
            'back_plate_oznaka_2'      =>$this->back_plate_2===0?'-':Turbinadio::where('id','=',$this->back_plate_2)->value('oznaka'),
            'back_plate_tip_2'         =>$this->back_plate_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->back_plate_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'back_plate_na_stanju_2'   =>$this->back_plate_2===0? 0 :Turbinadio::where('id','=',$this->back_plate_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'back_plate_u_servisu_2'   =>Turbinadio::where('id','=',$this->back_plate_2)->sum(\DB::raw('na_stanju_s')),
            'back_plate_u_radnji_2'    =>Turbinadio::where('id','=',$this->back_plate_2)->sum(\DB::raw('na_stanju_r')),
            'back_plate_cijena_2'      =>$this->back_plate_2===0?'-':Turbinadio::where('id','=',$this->back_plate_2)->value('cijena')/100,
            'back_plate_cijena_2_as'      =>$this->back_plate_2===0?'-':Turbinadio::where('id','=',$this->back_plate_2)->value('cijena_as')/100,
            'back_plate_cijena_2_ts'      =>$this->back_plate_2===0?'-':Turbinadio::where('id','=',$this->back_plate_2)->value('cijena_ts')/100,
            'back_plate_slike_2'       => JsonResource::collection($BP_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'back_plate_ekvivalenti_2' => JsonResource::collection($back_plate_ekvivalenti_2),

            'back_plate_3'             =>$this->back_plate_3,
            'BP_napomena_3'            =>$this->BP_napomena_3,       
            'back_plate_oznaka_3'      =>$this->back_plate_3===0?'-':Turbinadio::where('id','=',$this->back_plate_3)->value('oznaka'),
            'back_plate_tip_3'         =>$this->back_plate_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->back_plate_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'back_plate_na_stanju_3'   =>$this->back_plate_3===0? 0 :Turbinadio::where('id','=',$this->back_plate_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'back_plate_u_servisu_3'   =>Turbinadio::where('id','=',$this->back_plate_3)->sum(\DB::raw('na_stanju_s')),
            'back_plate_u_radnji_3'    =>Turbinadio::where('id','=',$this->back_plate_3)->sum(\DB::raw('na_stanju_r')),
            'back_plate_cijena_3'      =>$this->back_plate_3===0?'-':Turbinadio::where('id','=',$this->back_plate_3)->value('cijena')/100,            
            'back_plate_cijena_3_as'      =>$this->back_plate_3===0?'-':Turbinadio::where('id','=',$this->back_plate_3)->value('cijena_as')/100,            
            'back_plate_cijena_3_ts'      =>$this->back_plate_3===0?'-':Turbinadio::where('id','=',$this->back_plate_3)->value('cijena_ts')/100,  
            'back_plate_slike_3'       => JsonResource::collection($BP_slike_3),          
            // niz ekvivalentnih dijelova (može biti prazan)
            'back_plate_ekvivalenti_3' => JsonResource::collection($back_plate_ekvivalenti_3),
            // _________________________________________________________________________________________________________________________________________________

            // ### 15.1.2023 ######################################################################################################################################
            'heat_shield'            =>$this->heat_shield,  
            'HS_napomena'            =>$this->HS_napomena,       
            'heat_shield_oznaka'     =>$this->heat_shield===0?'-':Turbinadio::where('id','=',$this->heat_shield)->value('oznaka'),
            'heat_shield_tip'         =>$this->heat_shield===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->heat_shield)->value('turbinadiotip_id'))->value('naziv_2'),
            'heat_shield_podtip'     =>$this->heat_shield===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->heat_shield)->value('turbinadiopodtip_id'))->value('naziv'),
            'heat_shield_na_stanju'  =>$this->heat_shield===0? 0 :Turbinadio::where('id','=',$this->heat_shield)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'heat_shield_u_servisu'  =>Turbinadio::where('id','=',$this->heat_shield)->sum(\DB::raw('na_stanju_s')),
            'heat_shield_u_radnji'   =>Turbinadio::where('id','=',$this->heat_shield)->sum(\DB::raw('na_stanju_r')),
            'heat_shield_cijena'     =>$this->heat_shield===0?'-':Turbinadio::where('id','=',$this->heat_shield)->value('cijena')/100,
            'heat_shield_cijena_as'     =>$this->heat_shield===0?'-':Turbinadio::where('id','=',$this->heat_shield)->value('cijena_as')/100,
            'heat_shield_cijena_ts'     =>$this->heat_shield===0?'-':Turbinadio::where('id','=',$this->heat_shield)->value('cijena_ts')/100,
            'heat_shield_slike' => JsonResource::collection($HS_slike),


            // niz ekvivalentnih dijelova (može biti prazan)
            'heat_shield_ekvivalenti' => JsonResource::collection($heat_shield_ekvivalenti),

            'heat_shield_2'            =>$this->heat_shield_2,  
            'HS_napomena_2'            =>$this->HS_napomena_2,       
            'heat_shield_oznaka_2'     =>$this->heat_shield_2===0?'-':Turbinadio::where('id','=',$this->heat_shield_2)->value('oznaka'),
            'heat_shield_tip_2'         =>$this->heat_shield_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->heat_shield_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'heat_shield_podtip_2'     =>$this->heat_shield_2===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->heat_shield_2)->value('turbinadiopodtip_id'))->value('naziv'),
            'heat_shield_na_stanju_2'  =>$this->heat_shield_2===0? 0 :Turbinadio::where('id','=',$this->heat_shield_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'heat_shield_u_servisu_2'  =>Turbinadio::where('id','=',$this->heat_shield_2)->sum(\DB::raw('na_stanju_s')),
            'heat_shield_u_radnji_2'   =>Turbinadio::where('id','=',$this->heat_shield_2)->sum(\DB::raw('na_stanju_r')),
            'heat_shield_cijena_2'     =>$this->heat_shield_2===0?'-':Turbinadio::where('id','=',$this->heat_shield_2)->value('cijena')/100,
            'heat_shield_cijena_2_as'     =>$this->heat_shield_2===0?'-':Turbinadio::where('id','=',$this->heat_shield_2)->value('cijena_as')/100,
            'heat_shield_cijena_2_ts'     =>$this->heat_shield_2===0?'-':Turbinadio::where('id','=',$this->heat_shield_2)->value('cijena_ts')/100,
            'heat_shield_slike_2' => JsonResource::collection($HS_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'heat_shield_ekvivalenti_2' => JsonResource::collection($heat_shield_ekvivalenti_2),

            'heat_shield_3'            =>$this->heat_shield_3,  
            'HS_napomena_3'            =>$this->HS_napomena_3,       
            'heat_shield_oznaka_3'     =>$this->heat_shield_3===0?'-':Turbinadio::where('id','=',$this->heat_shield_3)->value('oznaka'),
            'heat_shield_tip_3'        =>$this->heat_shield_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->heat_shield_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'heat_shield_podtip_3'     =>$this->heat_shield_3===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->heat_shield_3)->value('turbinadiopodtip_id'))->value('naziv'),
            'heat_shield_na_stanju_3'  =>$this->heat_shield_3===0? 0 :Turbinadio::where('id','=',$this->heat_shield_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'heat_shield_u_servisu_3'  =>Turbinadio::where('id','=',$this->heat_shield_3)->sum(\DB::raw('na_stanju_s')),
            'heat_shield_u_radnji_3'   =>Turbinadio::where('id','=',$this->heat_shield_3)->sum(\DB::raw('na_stanju_r')),
            'heat_shield_cijena_3'     =>$this->heat_shield_3===0?'-':Turbinadio::where('id','=',$this->heat_shield_3)->value('cijena')/100,
            'heat_shield_cijena_3_as'     =>$this->heat_shield_3===0?'-':Turbinadio::where('id','=',$this->heat_shield_3)->value('cijena_as')/100,
            'heat_shield_cijena_3_ts'     =>$this->heat_shield_3===0?'-':Turbinadio::where('id','=',$this->heat_shield_3)->value('cijena_ts')/100,
            'heat_shield_slike_3' => JsonResource::collection($HS_slike_3),
            // niz ekvivalentnih dijelova (može biti prazan)
            'heat_shield_ekvivalenti_3' => JsonResource::collection($heat_shield_ekvivalenti_3),
            // _________________________________________________________________________________________________________________________________________________

            // ###################################################################################################################################################
            'actuator'               =>$this->actuator, 
            'AC_napomena'            =>$this->AC_napomena,       
            'actuator_oznaka'        =>$this->actuator===0?'-':Turbinadio::where('id','=',$this->actuator)->value('oznaka'),
            'actuator_tip'           =>$this->actuator===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->actuator)->value('turbinadiotip_id'))->value('naziv_2'),
            'actuator_podtip'        =>$this->actuator===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->actuator)->value('turbinadiopodtip_id'))->value('naziv'),
            'actuator_na_stanju'     =>$this->actuator===0? 0 :Turbinadio::where('id','=',$this->actuator)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'actuator_u_servisu'     =>Turbinadio::where('id','=',$this->actuator)->sum(\DB::raw('na_stanju_s')),
            'actuator_u_radnji'      =>Turbinadio::where('id','=',$this->actuator)->sum(\DB::raw('na_stanju_r')),
            'actuator_cijena'        =>$this->actuator===0?'-':Turbinadio::where('id','=',$this->actuator)->value('cijena')/100,
            'actuator_cijena_as'        =>$this->actuator===0?'-':Turbinadio::where('id','=',$this->actuator)->value('cijena_as')/100,
            'actuator_cijena_ts'        =>$this->actuator===0?'-':Turbinadio::where('id','=',$this->actuator)->value('cijena_ts')/100,
            'actuator_slike' => JsonResource::collection($AC_slike),


            // niz ekvivalentnih dijelova (može biti prazan)
            'actuator_ekvivalenti' => JsonResource::collection($actuator_ekvivalenti),

            'actuator_2'               =>$this->actuator_2, 
            'AC_napomena_2'            =>$this->AC_napomena_2,       
            'actuator_oznaka_2'        =>$this->actuator_2===0?'-':Turbinadio::where('id','=',$this->actuator_2)->value('oznaka'),
            'actuator_tip_2'           =>$this->actuator_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->actuator_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'actuator_podtip_2'        =>$this->actuator_2===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->actuator_2)->value('turbinadiopodtip_id'))->value('naziv'),
            'actuator_na_stanju_2'     =>$this->actuator_2===0? 0 :Turbinadio::where('id','=',$this->actuator_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'actuator_u_servisu_2'     =>Turbinadio::where('id','=',$this->actuator_2)->sum(\DB::raw('na_stanju_s')),
            'actuator_u_radnji_2'      =>Turbinadio::where('id','=',$this->actuator_2)->sum(\DB::raw('na_stanju_r')),
            'actuator_cijena_2'        =>$this->actuator_2===0?'-':Turbinadio::where('id','=',$this->actuator_2)->value('cijena')/100,
            'actuator_cijena_2_as'        =>$this->actuator_2===0?'-':Turbinadio::where('id','=',$this->actuator_2)->value('cijena_as')/100,
            'actuator_cijena_2_ts'        =>$this->actuator_2===0?'-':Turbinadio::where('id','=',$this->actuator_2)->value('cijena_ts')/100,
            'actuator_slike_2' => JsonResource::collection($AC_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'actuator_ekvivalenti_2' => JsonResource::collection($actuator_ekvivalenti_2),

            'actuator_3'               =>$this->actuator_3, 
            'AC_napomena_3'            =>$this->AC_napomena_3,       
            'actuator_oznaka_3'        =>$this->actuator_3===0?'-':Turbinadio::where('id','=',$this->actuator_3)->value('oznaka'),
            'actuator_tip_3'           =>$this->actuator_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->actuator_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'actuator_podtip_3'        =>$this->actuator_3===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->actuator_3)->value('turbinadiopodtip_id'))->value('naziv'),
            'actuator_na_stanju_3'     =>$this->actuator_3===0? 0 :Turbinadio::where('id','=',$this->actuator_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'actuator_u_servisu_3'     =>Turbinadio::where('id','=',$this->actuator_3)->sum(\DB::raw('na_stanju_s')),
            'actuator_u_radnji_3'      =>Turbinadio::where('id','=',$this->actuator_3)->sum(\DB::raw('na_stanju_r')),
            'actuator_cijena_3'        =>$this->actuator===0?'-':Turbinadio::where('id','=',$this->actuator_3)->value('cijena')/100,
            'actuator_cijena_3_as'        =>$this->actuator===0?'-':Turbinadio::where('id','=',$this->actuator_3)->value('cijena_as')/100,
            'actuator_cijena_3_ts'        =>$this->actuator===0?'-':Turbinadio::where('id','=',$this->actuator_3)->value('cijena_ts')/100,
            'actuator_slike_3' => JsonResource::collection($AC_slike_3),
            // niz ekvivalentnih dijelova (može biti prazan)
            'actuator_ekvivalenti_3' => JsonResource::collection($actuator_ekvivalenti_3),            
            // _________________________________________________________________________________________________________________________________________________

            // ### 15.1.2023 ######################################################################################################################################
            'noozles'                =>$this->noozles,            
            'NZ_napomena'            =>$this->NZ_napomena, 
            'noozles_oznaka'         =>$this->noozles===0?'-':Turbinadio::where('id','=',$this->noozles)->value('oznaka'),
            'noozles_tip'            =>$this->noozles===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->noozles)->value('turbinadiotip_id'))->value('naziv_2'),
            'noozles_podtip'         =>$this->noozles===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->noozles)->value('turbinadiopodtip_id'))->value('naziv'),
            'noozles_na_stanju'      =>$this->noozles===0? 0 :Turbinadio::where('id','=',$this->noozles)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'noozles_u_servisu'      =>Turbinadio::where('id','=',$this->noozles)->sum(\DB::raw('na_stanju_s')),
            'noozles_u_radnji'       =>Turbinadio::where('id','=',$this->noozles)->sum(\DB::raw('na_stanju_r')),
            'noozles_cijena'         =>$this->noozles===0?'-':Turbinadio::where('id','=',$this->noozles)->value('cijena')/100,
            'noozles_cijena_as'         =>$this->noozles===0?'-':Turbinadio::where('id','=',$this->noozles)->value('cijena_as')/100,
            'noozles_cijena_ts'         =>$this->noozles===0?'-':Turbinadio::where('id','=',$this->noozles)->value('cijena_ts')/100,
            'noozles_slike' => JsonResource::collection($NZ_slike),


            // niz ekvivalentnih dijelova (može biti prazan)
            'noozles_ekvivalenti' => JsonResource::collection($noozles_ekvivalenti),

            'noozles_2'                =>$this->noozles_2,            
            'NZ_napomena_2'            =>$this->NZ_napomena_2, 
            'noozles_oznaka_2'         =>$this->noozles_2===0?'-':Turbinadio::where('id','=',$this->noozles_2)->value('oznaka'),
            'noozles_tip_2'            =>$this->noozles_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->noozles_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'noozles_podtip_2'         =>$this->noozles_2===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->noozles_2)->value('turbinadiopodtip_id'))->value('naziv'),
            'noozles_na_stanju_2'      =>$this->noozles_2===0? 0 :Turbinadio::where('id','=',$this->noozles_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'noozles_u_servisu_2'      =>Turbinadio::where('id','=',$this->noozles_2)->sum(\DB::raw('na_stanju_s')),
            'noozles_u_radnji_2'       =>Turbinadio::where('id','=',$this->noozles_2)->sum(\DB::raw('na_stanju_r')),
            'noozles_cijena_2'         =>$this->noozles_2===0?'-':Turbinadio::where('id','=',$this->noozles_2)->value('cijena')/100,
            'noozles_cijena_2_as'         =>$this->noozles_2===0?'-':Turbinadio::where('id','=',$this->noozles_2)->value('cijena_as')/100,
            'noozles_cijena_2_ts'         =>$this->noozles_2===0?'-':Turbinadio::where('id','=',$this->noozles_2)->value('cijena_ts')/100,
            'noozles_slike_2' => JsonResource::collection($NZ_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'noozles_ekvivalenti_2' => JsonResource::collection($noozles_ekvivalenti_2),

            'noozles_3'                =>$this->noozles_3,            
            'NZ_napomena_3'            =>$this->NZ_napomena_3, 
            'noozles_oznaka_3'         =>$this->noozles_3===0?'-':Turbinadio::where('id','=',$this->noozles_3)->value('oznaka'),
            'noozles_tip_3'            =>$this->noozles_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->noozles_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'noozles_podtip_3'         =>$this->noozles_3===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->noozles_3)->value('turbinadiopodtip_id'))->value('naziv'),
            'noozles_na_stanju_3'      =>$this->noozles_3===0? 0 :Turbinadio::where('id','=',$this->noozles_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'noozles_u_servisu_3'      =>Turbinadio::where('id','=',$this->noozles_3)->sum(\DB::raw('na_stanju_s')),
            'noozles_u_radnji_3'       =>Turbinadio::where('id','=',$this->noozles_3)->sum(\DB::raw('na_stanju_r')),
            'noozles_cijena_3'         =>$this->noozles_3===0?'-':Turbinadio::where('id','=',$this->noozles_3)->value('cijena')/100,
            'noozles_cijena_3_as'         =>$this->noozles_3===0?'-':Turbinadio::where('id','=',$this->noozles_3)->value('cijena_as')/100,
            'noozles_cijena_3_ts'         =>$this->noozles_3===0?'-':Turbinadio::where('id','=',$this->noozles_3)->value('cijena_ts')/100,
            'noozles_slike_3' => JsonResource::collection($NZ_slike_3),
            // niz ekvivalentnih dijelova (može biti prazan)
            'noozles_ekvivalenti_3' => JsonResource::collection($noozles_ekvivalenti_3),
            // _________________________________________________________________________________________________________________________________________________

            // ### 15.1.2023 ######################################################################################################################################
            'gasket_kit'             =>$this->gasket_kit, 
            'GK_napomena'            =>$this->GK_napomena, 
            'gasket_kit_oznaka'      =>$this->gasket_kit===0?'-':Turbinadio::where('id','=',$this->gasket_kit)->value('oznaka'),
            'gasket_kit_tip'         =>$this->gasket_kit===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->gasket_kit)->value('turbinadiotip_id'))->value('naziv_2'),
            'gasket_kit_na_stanju'   =>$this->gasket_kit===0? 0 :Turbinadio::where('id','=',$this->gasket_kit)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'gasket_kit_u_servisu'   =>Turbinadio::where('id','=',$this->gasket_kit)->sum(\DB::raw('na_stanju_s')),
            'gasket_kit_u_radnji'    =>Turbinadio::where('id','=',$this->gasket_kit)->sum(\DB::raw('na_stanju_r')),
            'gasket_kit_cijena'      =>$this->gasket_kit===0?'-':Turbinadio::where('id','=',$this->gasket_kit)->value('cijena')/100,
            'gasket_kit_cijena_as'      =>$this->gasket_kit===0?'-':Turbinadio::where('id','=',$this->gasket_kit)->value('cijena_as')/100,
            'gasket_kit_cijena_ts'      =>$this->gasket_kit===0?'-':Turbinadio::where('id','=',$this->gasket_kit)->value('cijena_ts')/100,
            'gasket_kit_slike' => JsonResource::collection($GK_slike),
 

            // niz ekvivalentnih dijelova (može biti prazan)
            'gasket_kit_ekvivalenti' => JsonResource::collection($gasket_kit_ekvivalenti),

            'gasket_kit_2'             =>$this->gasket_kit_2, 
            'GK_napomena_2'            =>$this->GK_napomena_2, 
            'gasket_kit_oznaka_2'      =>$this->gasket_kit_2===0?'-':Turbinadio::where('id','=',$this->gasket_kit_2)->value('oznaka'),
            'gasket_kit_tip_2'         =>$this->gasket_kit_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->gasket_kit_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'gasket_kit_na_stanju_2'   =>$this->gasket_kit_2===0? 0 :Turbinadio::where('id','=',$this->gasket_kit_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'gasket_kit_u_servisu_2'   =>Turbinadio::where('id','=',$this->gasket_kit_2)->sum(\DB::raw('na_stanju_s')),
            'gasket_kit_u_radnji_2'    =>Turbinadio::where('id','=',$this->gasket_kit_2)->sum(\DB::raw('na_stanju_r')),
            'gasket_kit_cijena_2'      =>$this->gasket_kit_2===0?'-':Turbinadio::where('id','=',$this->gasket_kit_2)->value('cijena')/100,
            'gasket_kit_cijena_2_as'      =>$this->gasket_kit_2===0?'-':Turbinadio::where('id','=',$this->gasket_kit_2)->value('cijena_as')/100,
            'gasket_kit_cijena_2_ts'      =>$this->gasket_kit_2===0?'-':Turbinadio::where('id','=',$this->gasket_kit_2)->value('cijena_ts')/100,
            'gasket_kit_slike_2' => JsonResource::collection($GK_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'gasket_kit_ekvivalenti_2' => JsonResource::collection($gasket_kit_ekvivalenti_2),

            'gasket_kit_3'             =>$this->gasket_kit_3, 
            'GK_napomena_3'            =>$this->GK_napomena_3, 
            'gasket_kit_oznaka_3'      =>$this->gasket_kit_3===0?'-':Turbinadio::where('id','=',$this->gasket_kit_3)->value('oznaka'),
            'gasket_kit_tip_3'         =>$this->gasket_kit_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->gasket_kit_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'gasket_kit_na_stanju_3'   =>$this->gasket_kit_3===0? 0 :Turbinadio::where('id','=',$this->gasket_kit_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'gasket_kit_u_servisu_3'   =>Turbinadio::where('id','=',$this->gasket_kit_3)->sum(\DB::raw('na_stanju_s')),
            'gasket_kit_u_radnji_3'    =>Turbinadio::where('id','=',$this->gasket_kit_3)->sum(\DB::raw('na_stanju_r')),
            'gasket_kit_cijena_3'      =>$this->gasket_kit_3===0?'-':Turbinadio::where('id','=',$this->gasket_kit_3)->value('cijena')/100,
            'gasket_kit_cijena_3_as'      =>$this->gasket_kit_3===0?'-':Turbinadio::where('id','=',$this->gasket_kit_3)->value('cijena_as')/100,
            'gasket_kit_cijena_3_ts'      =>$this->gasket_kit_3===0?'-':Turbinadio::where('id','=',$this->gasket_kit_3)->value('cijena_ts')/100,
            'gasket_kit_slike_3' => JsonResource::collection($GK_slike_3),
            // niz ekvivalentnih dijelova (može biti prazan)
            'gasket_kit_ekvivalenti_3' => JsonResource::collection($gasket_kit_ekvivalenti_3),
            // _________________________________________________________________________________________________________________________________________________

            // ###################################################################################################################################################
            'repair_kit'             =>$this->repair_kit,             /* ####### dodato 24.8.2022  ########*/ 
            'RK_napomena'            =>$this->RK_napomena, 
            'repair_kit_oznaka'      =>$this->repair_kit===0?'-':Turbinadio::where('id','=',$this->repair_kit)->value('oznaka'),
            'repair_kit_tip'         =>$this->repair_kit===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->repair_kit)->value('turbinadiotip_id'))->value('naziv_2'),
            'repair_kit_na_stanju'   =>$this->repair_kit===0? 0 :Turbinadio::where('id','=',$this->repair_kit)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'repair_kit_u_servisu'   =>Turbinadio::where('id','=',$this->repair_kit)->sum(\DB::raw('na_stanju_s')),
            'repair_kit_u_radnji'    =>Turbinadio::where('id','=',$this->repair_kit)->sum(\DB::raw('na_stanju_r')),
            'repair_kit_cijena'      =>$this->repair_kit===0?'-':Turbinadio::where('id','=',$this->repair_kit)->value('cijena')/100,
            'repair_kit_cijena_as'      =>$this->repair_kit===0?'-':Turbinadio::where('id','=',$this->repair_kit)->value('cijena_as')/100,
            'repair_kit_cijena_ts'      =>$this->repair_kit===0?'-':Turbinadio::where('id','=',$this->repair_kit)->value('cijena_ts')/100,
            'repair_kit_slike' => JsonResource::collection($RK_slike),


            // niz ekvivalentnih dijelova (može biti prazan)
            'repair_kit_ekvivalenti' => JsonResource::collection($repair_kit_ekvivalenti),

            'repair_kit_2'             =>$this->repair_kit_2,                                                 
            'RK_napomena_2'            =>$this->RK_napomena_2, 
            'repair_kit_oznaka_2'      =>$this->repair_kit_2===0?'-':Turbinadio::where('id','=',$this->repair_kit_2)->value('oznaka'),
            'repair_kit_tip_2'         =>$this->repair_kit_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->repair_kit_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'repair_kit_na_stanju_2'   =>$this->repair_kit_2===0? 0 :Turbinadio::where('id','=',$this->repair_kit_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'repair_kit_u_servisu_2'   =>Turbinadio::where('id','=',$this->repair_kit_2)->sum(\DB::raw('na_stanju_s')),
            'repair_kit_u_radnji_2'    =>Turbinadio::where('id','=',$this->repair_kit_2)->sum(\DB::raw('na_stanju_r')),
            'repair_kit_cijena_2'      =>$this->repair_kit_2===0?'-':Turbinadio::where('id','=',$this->repair_kit_2)->value('cijena')/100,
            'repair_kit_cijena_2_as'      =>$this->repair_kit_2===0?'-':Turbinadio::where('id','=',$this->repair_kit_2)->value('cijena_as')/100,
            'repair_kit_cijena_2_ts'      =>$this->repair_kit_2===0?'-':Turbinadio::where('id','=',$this->repair_kit_2)->value('cijena_ts')/100,
            'repair_kit_slike_2' => JsonResource::collection($RK_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'repair_kit_ekvivalenti_2' => JsonResource::collection($repair_kit_ekvivalenti_2),

            'repair_kit_3'             =>$this->repair_kit_3,                                                 
            'RK_napomena_3'            =>$this->RK_napomena_3, 
            'repair_kit_oznaka_3'      =>$this->repair_kit_3===0?'-':Turbinadio::where('id','=',$this->repair_kit_3)->value('oznaka'),
            'repair_kit_tip_3'         =>$this->repair_kit_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->repair_kit_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'repair_kit_na_stanju_3'   =>$this->repair_kit_3===0? 0 :Turbinadio::where('id','=',$this->repair_kit_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'repair_kit_u_servisu_3'   =>Turbinadio::where('id','=',$this->repair_kit_2)->sum(\DB::raw('na_stanju_s')),
            'repair_kit_u_radnji_3'    =>Turbinadio::where('id','=',$this->repair_kit_3)->sum(\DB::raw('na_stanju_r')),
            'repair_kit_cijena_3'      =>$this->repair_kit_3===0?'-':Turbinadio::where('id','=',$this->repair_kit_3)->value('cijena')/100,
            'repair_kit_cijena_3_as'      =>$this->repair_kit_3===0?'-':Turbinadio::where('id','=',$this->repair_kit_3)->value('cijena_as')/100,
            'repair_kit_cijena_3_ts'      =>$this->repair_kit_3===0?'-':Turbinadio::where('id','=',$this->repair_kit_3)->value('cijena_ts')/100,
            'repair_kit_slike_3' => JsonResource::collection($RK_slike_3),
            // niz ekvivalentnih dijelova (može biti prazan)
            'repair_kit_ekvivalenti_3' => JsonResource::collection($repair_kit_ekvivalenti_3),
            // _________________________________________________________________________________________________________________________________________________
           
            // ### 15.1.2023 ######################################################################################################################################
            'turbine_housing'           =>$this->turbine_housing,  
            'TH_napomena'               =>$this->TH_napomena, 
            'turbine_housing_oznaka'    =>$this->turbine_housing===0?'-':Turbinadio::where('id','=',$this->turbine_housing)->value('oznaka'),
            'turbine_housing_tip'       =>$this->turbine_housing===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->turbine_housing)->value('turbinadiotip_id'))->value('naziv_2'),
            'turbine_housing_na_stanju' =>$this->turbine_housing===0? 0 :Turbinadio::where('id','=',$this->turbine_housing)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'turbine_housing_u_servisu' =>Turbinadio::where('id','=',$this->turbine_housing)->sum(\DB::raw('na_stanju_s')),
            'turbine_housing_u_radnji'  =>Turbinadio::where('id','=',$this->turbine_housing)->sum(\DB::raw('na_stanju_r')),
            'turbine_housing_cijena'    =>$this->turbine_housing===0?'-':Turbinadio::where('id','=',$this->turbine_housing)->value('cijena')/100,
            'turbine_housing_cijena_as'    =>$this->turbine_housing===0?'-':Turbinadio::where('id','=',$this->turbine_housing)->value('cijena_as')/100,
            'turbine_housing_cijena_ts'    =>$this->turbine_housing===0?'-':Turbinadio::where('id','=',$this->turbine_housing)->value('cijena_ts')/100,
            'turbine_housing_slike' => JsonResource::collection($TH_slike),


            // niz ekvivalentnih dijelova (može biti prazan)
            'turbine_housing_ekvivalenti' => JsonResource::collection($turbine_housing_ekvivalenti),

            'turbine_housing_2'           =>$this->turbine_housing_2,  
            'TH_napomena_2'               =>$this->TH_napomena_2, 
            'turbine_housing_oznaka_2'    =>$this->turbine_housing_2===0?'-':Turbinadio::where('id','=',$this->turbine_housing_2)->value('oznaka'),
            'turbine_housing_tip_2'       =>$this->turbine_housing_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->turbine_housing_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'turbine_housing_na_stanju_2' =>$this->turbine_housing_2===0? 0 :Turbinadio::where('id','=',$this->turbine_housing_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'turbine_housing_u_servisu_2' =>Turbinadio::where('id','=',$this->turbine_housing_2)->sum(\DB::raw('na_stanju_s')),
            'turbine_housing_u_radnji_2'  =>Turbinadio::where('id','=',$this->turbine_housing_2)->sum(\DB::raw('na_stanju_r')),
            'turbine_housing_cijena_2'    =>$this->turbine_housing_2===0?'-':Turbinadio::where('id','=',$this->turbine_housing_2)->value('cijena')/100,
            'turbine_housing_cijena_2_as'    =>$this->turbine_housing_2===0?'-':Turbinadio::where('id','=',$this->turbine_housing_2)->value('cijena_as')/100,
            'turbine_housing_cijena_2_ts'    =>$this->turbine_housing_2===0?'-':Turbinadio::where('id','=',$this->turbine_housing_2)->value('cijena_ts')/100,
            'turbine_housing_slike_2' => JsonResource::collection($TH_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'turbine_housing_ekvivalenti_2' => JsonResource::collection($turbine_housing_ekvivalenti_2),

            'turbine_housing_3'           =>$this->turbine_housing_3,  
            'TH_napomena_3'               =>$this->TH_napomena_3, 
            'turbine_housing_oznaka_3'    =>$this->turbine_housing_3===0?'-':Turbinadio::where('id','=',$this->turbine_housing_3)->value('oznaka'),
            'turbine_housing_tip_3'       =>$this->turbine_housing_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->turbine_housing_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'turbine_housing_na_stanju_3' =>$this->turbine_housing_3===0? 0 :Turbinadio::where('id','=',$this->turbine_housing_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'turbine_housing_u_servisu_3' =>Turbinadio::where('id','=',$this->turbine_housing_3)->sum(\DB::raw('na_stanju_s')),
            'turbine_housing_u_radnji_3'  =>Turbinadio::where('id','=',$this->turbine_housing_3)->sum(\DB::raw('na_stanju_r')),
            'turbine_housing_cijena_3'    =>$this->turbine_housing_3===0?'-':Turbinadio::where('id','=',$this->turbine_housing_3)->value('cijena')/100,
            'turbine_housing_cijena_3_as'    =>$this->turbine_housing_3===0?'-':Turbinadio::where('id','=',$this->turbine_housing_3)->value('cijena_as')/100,
            'turbine_housing_cijena_3_ts'    =>$this->turbine_housing_3===0?'-':Turbinadio::where('id','=',$this->turbine_housing_3)->value('cijena_ts')/100,
            'turbine_housing_slike_3' => JsonResource::collection($TH_slike_3),
            // niz ekvivalentnih dijelova (može biti prazan)
            'turbine_housing_ekvivalenti_3' => JsonResource::collection($turbine_housing_ekvivalenti_3),
            // _________________________________________________________________________________________________________________________________________________

            // ###################################################################################################################################################
            'chra_no'                =>$this->chra_no,    
            'CN_napomena'            =>$this->CN_napomena,       
            'chra_no_oznaka'         =>$this->chra_no===0?'-':Turbinadio::where('id','=',$this->chra_no)->value('oznaka'),
            'chra_no_tip'            =>$this->chra_no===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->chra_no)->value('turbinadiotip_id'))->value('naziv_2'),
            'chra_no_na_stanju'      =>$this->chra_no===0? 0 :Turbinadio::where('id','=',$this->chra_no)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'chra_no_u_servisu'      =>Turbinadio::where('id','=',$this->chra_no)->sum(\DB::raw('na_stanju_s')),
            'chra_no_u_radnji'       =>Turbinadio::where('id','=',$this->chra_no)->sum(\DB::raw('na_stanju_r')),
            'chra_no_cijena'         =>$this->chra_no===0?'-':Turbinadio::where('id','=',$this->chra_no)->value('cijena')/100,
            'chra_no_cijena_as'         =>$this->chra_no===0?'-':Turbinadio::where('id','=',$this->chra_no)->value('cijena_as')/100,
            'chra_no_cijena_ts'         =>$this->chra_no===0?'-':Turbinadio::where('id','=',$this->chra_no)->value('cijena_ts')/100,
            'chra_no_slike' => JsonResource::collection($CN_slike),



            // niz ekvivalentnih dijelova (može biti prazan)
            'chra_no_ekvivalenti' => JsonResource::collection($chra_no_ekvivalenti),

            'chra_no_2'                =>$this->chra_no_2,    
            'CN_napomena_2'            =>$this->CN_napomena_2,       
            'chra_no_oznaka_2'         =>$this->chra_no_2===0?'-':Turbinadio::where('id','=',$this->chra_no_2)->value('oznaka'),
            'chra_no_tip_2'            =>$this->chra_no_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->chra_no_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'chra_no_na_stanju_2'      =>$this->chra_no_2===0? 0 :Turbinadio::where('id','=',$this->chra_no_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'chra_no_u_servisu_2'      =>Turbinadio::where('id','=',$this->chra_no_2)->sum(\DB::raw('na_stanju_s')),
            'chra_no_u_radnji_2'       =>Turbinadio::where('id','=',$this->chra_no_2)->sum(\DB::raw('na_stanju_r')),
            'chra_no_cijena_2'         =>$this->chra_no_2===0?'-':Turbinadio::where('id','=',$this->chra_no_2)->value('cijena')/100,
            'chra_no_cijena_2_as'         =>$this->chra_no_2===0?'-':Turbinadio::where('id','=',$this->chra_no_2)->value('cijena_as')/100,
            'chra_no_cijena_2_ts'         =>$this->chra_no_2===0?'-':Turbinadio::where('id','=',$this->chra_no_2)->value('cijena_ts')/100,
            'chra_no_slike_2' => JsonResource::collection($CN_slike_2),
            // niz ekvivalentnih dijelova (može biti prazan)
            'chra_no_ekvivalenti_2' => JsonResource::collection($chra_no_ekvivalenti_2),

            'chra_no_3'                =>$this->chra_no_3,    
            'CN_napomena_3'            =>$this->CN_napomena_3,       
            'chra_no_oznaka_3'         =>$this->chra_no_3===0?'-':Turbinadio::where('id','=',$this->chra_no_3)->value('oznaka'),
            'chra_no_tip_3'            =>$this->chra_no_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->chra_no_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'chra_no_na_stanju_3'      =>$this->chra_no_3===0? 0 :Turbinadio::where('id','=',$this->chra_no_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'chra_no_u_servisu_3'      =>Turbinadio::where('id','=',$this->chra_no_3)->sum(\DB::raw('na_stanju_s')),
            'chra_no_u_radnji_3'       =>Turbinadio::where('id','=',$this->chra_no_3)->sum(\DB::raw('na_stanju_r')),
            'chra_no_cijena_3'         =>$this->chra_no_3===0?'-':Turbinadio::where('id','=',$this->chra_no_3)->value('cijena')/100,
            'chra_no_cijena_3_as'         =>$this->chra_no_3===0?'-':Turbinadio::where('id','=',$this->chra_no_3)->value('cijena_as')/100,
            'chra_no_cijena_3_ts'         =>$this->chra_no_3===0?'-':Turbinadio::where('id','=',$this->chra_no_3)->value('cijena_ts')/100,
            'chra_no_slike_3' => JsonResource::collection($CN_slike_3),
            // niz ekvivalentnih dijelova (može biti prazan)
            'chra_no_ekvivalenti_3' => JsonResource::collection($chra_no_ekvivalenti_3),                        
            // _________________________________________________________________________________________________________________________________________________


            'X01'=>$this->X01,  'X01_oznaka'=>$this->X01===0?'-':Turbinadio::where('id','=',$this->X01)->value('oznaka'),
            'X01_tip'      =>$this->X01===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X01)->value('turbinadiotip_id'))->value('naziv_2'),
            'X01_podtip'   =>$this->X01===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->X01)->value('turbinadiopodtip_id'))->value('naziv'),
            'X01_na_stanju'=>$this->X01===0?'-':Turbinadio::where('id','=',$this->X01)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'X01_u_servisu'=>$this->X01===0?'-':Turbinadio::where('id','=',$this->X01)->sum(\DB::raw('na_stanju_s')),
            'X01_u_radnji' =>$this->X01===0?'-':Turbinadio::where('id','=',$this->X01)->sum(\DB::raw('na_stanju_r')),
            'X01_na_cijena'=>$this->X01===0?'-':Turbinadio::where('id','=',$this->X01)->value('cijena')/100,
            'X01_na_cijena_as'=>$this->X01===0?'-':Turbinadio::where('id','=',$this->X01)->value('cijena_as')/100,
            'X01_na_cijena_ts'=>$this->X01===0?'-':Turbinadio::where('id','=',$this->X01)->value('cijena_ts')/100,
            'X01_slike' => JsonResource::collection($X01_slike),

            'X02'=>$this->X02,  'X02_oznaka'=>$this->X02===0?'-':Turbinadio::where('id','=',$this->X02)->value('oznaka'),
            'X02_tip'      =>$this->X02===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X02)->value('turbinadiotip_id'))->value('naziv_2'),
            'X02_na_stanju'=>$this->X02===0?'-':Turbinadio::where('id','=',$this->X02)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'X02_u_servisu'=>$this->X02===0?'-':Turbinadio::where('id','=',$this->X02)->sum(\DB::raw('na_stanju_s')),
            'X02_u_radnji' =>$this->X02===0?'-':Turbinadio::where('id','=',$this->X02)->sum(\DB::raw('na_stanju_r')),
            'X02_na_cijena'=>$this->X02===0?'-':Turbinadio::where('id','=',$this->X02)->value('cijena')/100,
            'X02_na_cijena_as'=>$this->X02===0?'-':Turbinadio::where('id','=',$this->X02)->value('cijena_as')/100,
            'X02_na_cijena_ts'=>$this->X02===0?'-':Turbinadio::where('id','=',$this->X02)->value('cijena_ts')/100,
            'X02_slike' => JsonResource::collection($X02_slike),

            'X03'=>$this->X03,  'X03_oznaka'=>$this->X03===0?'-':Turbinadio::where('id','=',$this->X03)->value('oznaka'),
            'X03_tip'      =>$this->X03===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X03)->value('turbinadiotip_id'))->value('naziv_2'),
            'X03_na_stanju'=>$this->X03===0?'-':Turbinadio::where('id','=',$this->X03)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'X03_u_servisu'=>$this->X03===0?'-':Turbinadio::where('id','=',$this->X03)->sum(\DB::raw('na_stanju_s')),
            'X03_u_radnji' =>$this->X03===0?'-':Turbinadio::where('id','=',$this->X03)->sum(\DB::raw('na_stanju_r')),
            'X03_na_cijena'=>$this->X03===0?'-':Turbinadio::where('id','=',$this->X03)->value('cijena')/100,
            'X03_na_cijena_as'=>$this->X03===0?'-':Turbinadio::where('id','=',$this->X03)->value('cijena_as')/100,
            'X03_na_cijena_ts'=>$this->X03===0?'-':Turbinadio::where('id','=',$this->X03)->value('cijena_ts')/100,   
            'X03_slike' => JsonResource::collection($X03_slike),

            'X03_2'=>$this->X03_2,  'X03_oznaka_2'=>$this->X03_2===0?'-':Turbinadio::where('id','=',$this->X03_2)->value('oznaka'),
            'X03_tip_2'      =>$this->X03_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X03_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X03_na_stanju_2'=>$this->X03_2===0?'-':Turbinadio::where('id','=',$this->X03_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X03_u_servisu_2'=>$this->X03_2===0?'-':Turbinadio::where('id','=',$this->X03_2)->sum(\DB::raw('na_stanju_s')), 
            'X03_u_radnji_2' =>$this->X03_2===0?'-':Turbinadio::where('id','=',$this->X03_2)->sum(\DB::raw('na_stanju_r')),
            'X03_na_cijena_2'=>$this->X03_2===0?'-':Turbinadio::where('id','=',$this->X03_2)->value('cijena')/100,
            'X03_na_cijena_2_as'=>$this->X03_2===0?'-':Turbinadio::where('id','=',$this->X03_2)->value('cijena_as')/100,
            'X03_na_cijena_2_ts'=>$this->X03_2===0?'-':Turbinadio::where('id','=',$this->X03_2)->value('cijena_ts')/100,
            'X03_slike_2' => JsonResource::collection($X03_slike_2),
            
            'X03_3'=>$this->X03_3,  'X03_oznaka_3'=>$this->X03_3===0?'-':Turbinadio::where('id','=',$this->X03_3)->value('oznaka'),
            'X03_tip_3'      =>$this->X03_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X03_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X03_na_stanju_3'=>$this->X03_3===0?'-':Turbinadio::where('id','=',$this->X03_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X03_u_servisu_3'=>$this->X03_3===0?'-':Turbinadio::where('id','=',$this->X03_3)->sum(\DB::raw('na_stanju_s')), 
            'X03_u_radnji_3' =>$this->X03_3===0?'-':Turbinadio::where('id','=',$this->X03_3)->sum(\DB::raw('na_stanju_r')),
            'X03_na_cijena_3'=>$this->X03_3===0?'-':Turbinadio::where('id','=',$this->X03_3)->value('cijena')/100,
            'X03_na_cijena_3_as'=>$this->X03_3===0?'-':Turbinadio::where('id','=',$this->X03_3)->value('cijena_as')/100,
            'X03_na_cijena_3_ts'=>$this->X03_3===0?'-':Turbinadio::where('id','=',$this->X03_3)->value('cijena_ts')/100, 
            'X03_slike_3' => JsonResource::collection($X03_slike_3),            

            //Karike
            'X04'=>$this->X04,  'X04_oznaka'=>$this->X04===0?'-':Turbinadio::where('id','=',$this->X04)->value('oznaka'),
            'X04_tip'      =>$this->X04===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X04)->value('turbinadiotip_id'))->value('naziv_2'),
            'X04_na_stanju'  =>$this->X04===0?  '-':Turbinadio::where('id','=',$this->X04  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X04_u_servisu'  =>$this->X04===0?  '-':Turbinadio::where('id','=',$this->X04  )->sum(\DB::raw('na_stanju_s')), 
            'X04_u_radnji'   =>$this->X04===0?  '-':Turbinadio::where('id','=',$this->X04  )->sum(\DB::raw('na_stanju_r')),
            'X04_na_cijena'=>$this->X04===0?'-':Turbinadio::where('id','=',$this->X04)->value('cijena')/100,
            'X04_na_cijena_as'=>$this->X04===0?'-':Turbinadio::where('id','=',$this->X04)->value('cijena_as')/100,
            'X04_na_cijena_ts'=>$this->X04===0?'-':Turbinadio::where('id','=',$this->X04)->value('cijena_ts')/100,
            'X04_slike' => JsonResource::collection($X04_slike),
            
            'X04_2'=>$this->X04_2,  'X04_oznaka_2'=>$this->X04_2===0?'-':Turbinadio::where('id','=',$this->X04_2)->value('oznaka'),
            'X04_tip_2'      =>$this->X04_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X04_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X04_na_stanju_2'=>$this->X04_2===0?'-':Turbinadio::where('id','=',$this->X04_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X04_u_servisu_2'=>$this->X04_2===0?'-':Turbinadio::where('id','=',$this->X04_2)->sum(\DB::raw('na_stanju_s')), 
            'X04_u_radnji_2' =>$this->X04_2===0?'-':Turbinadio::where('id','=',$this->X04_2)->sum(\DB::raw('na_stanju_r')),
            'X04_na_cijena_2'=>$this->X04_2===0?'-':Turbinadio::where('id','=',$this->X04_2)->value('cijena')/100,
            'X04_na_cijena_2_as'=>$this->X04_2===0?'-':Turbinadio::where('id','=',$this->X04_2)->value('cijena_as')/100,
            'X04_na_cijena_2_ts'=>$this->X04_2===0?'-':Turbinadio::where('id','=',$this->X04_2)->value('cijena_ts')/100,
            'X04_slike_2' => JsonResource::collection($X04_slike_2),
            
            'X04_3'=>$this->X04_3,  'X04_oznaka_3'=>$this->X04_3===0?'-':Turbinadio::where('id','=',$this->X04_3)->value('oznaka'),
            'X04_tip_3'      =>$this->X04_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X04_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X04_na_stanju_3'=>$this->X04_3===0?'-':Turbinadio::where('id','=',$this->X04_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X04_u_servisu_3'=>$this->X04_3===0?'-':Turbinadio::where('id','=',$this->X04_3)->sum(\DB::raw('na_stanju_s')), 
            'X04_u_radnji_3' =>$this->X04_3===0?'-':Turbinadio::where('id','=',$this->X04_3)->sum(\DB::raw('na_stanju_r')),
            'X04_na_cijena_3'=>$this->X04_3===0?'-':Turbinadio::where('id','=',$this->X04_3)->value('cijena')/100,
            'X04_na_cijena_3_as'=>$this->X04_3===0?'-':Turbinadio::where('id','=',$this->X04_3)->value('cijena_as')/100,
            'X04_na_cijena_3_ts'=>$this->X04_3===0?'-':Turbinadio::where('id','=',$this->X04_3)->value('cijena_ts')/100, 
            'X04_slike_3' => JsonResource::collection($X04_slike_3),
            
            //Gumica
            'X05'=>$this->X05,  'X05_oznaka'=>$this->X05===0?'-':Turbinadio::where('id','=',$this->X05)->value('oznaka'),
            'X05_tip'      =>$this->X05===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X05)->value('turbinadiotip_id'))->value('naziv_2'),
            'X05_na_stanju'  =>$this->X05===0?  '-':Turbinadio::where('id','=',$this->X05  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X05_u_servisu'  =>$this->X05===0?  '-':Turbinadio::where('id','=',$this->X05  )->sum(\DB::raw('na_stanju_s')), 
            'X05_u_radnji'   =>$this->X05===0?  '-':Turbinadio::where('id','=',$this->X05  )->sum(\DB::raw('na_stanju_r')),
            'X05_na_cijena'=>$this->X05===0?'-':Turbinadio::where('id','=',$this->X05)->value('cijena')/100,
            'X05_na_cijena_as'=>$this->X05===0?'-':Turbinadio::where('id','=',$this->X05)->value('cijena_as')/100,
            'X05_na_cijena_ts'=>$this->X05===0?'-':Turbinadio::where('id','=',$this->X05)->value('cijena_ts')/100,
            'X05_slike' => JsonResource::collection($X05_slike),
            
            'X05_2'=>$this->X05_2,  'X05_oznaka_2'=>$this->X05_2===0?'-':Turbinadio::where('id','=',$this->X05_2)->value('oznaka'),
            'X05_tip_2'      =>$this->X05_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X05_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X05_na_stanju_2'=>$this->X05_2===0?'-':Turbinadio::where('id','=',$this->X05_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X05_u_servisu_2'=>$this->X05_2===0?'-':Turbinadio::where('id','=',$this->X05_2)->sum(\DB::raw('na_stanju_s')), 
            'X05_u_radnji_2' =>$this->X05_2===0?'-':Turbinadio::where('id','=',$this->X05_2)->sum(\DB::raw('na_stanju_r')),
            'X05_na_cijena_2'=>$this->X05_2===0?'-':Turbinadio::where('id','=',$this->X05_2)->value('cijena')/100,
            'X05_na_cijena_2_as'=>$this->X05_2===0?'-':Turbinadio::where('id','=',$this->X05_2)->value('cijena_as')/100,
            'X05_na_cijena_2_ts'=>$this->X05_2===0?'-':Turbinadio::where('id','=',$this->X05_2)->value('cijena_ts')/100,
            'X05_slike_2' => JsonResource::collection($X05_slike_2),
            
            'X05_3'=>$this->X05_3,  'X05_oznaka_3'=>$this->X05_3===0?'-':Turbinadio::where('id','=',$this->X05_3)->value('oznaka'),
            'X05_tip_3'      =>$this->X05_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X05_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X05_na_stanju_3'=>$this->X05_3===0?'-':Turbinadio::where('id','=',$this->X05_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X05_u_servisu_3'=>$this->X05_3===0?'-':Turbinadio::where('id','=',$this->X05_3)->sum(\DB::raw('na_stanju_s')), 
            'X05_u_radnji_3' =>$this->X05_3===0?'-':Turbinadio::where('id','=',$this->X05_3)->sum(\DB::raw('na_stanju_r')),
            'X05_na_cijena_3'=>$this->X05_3===0?'-':Turbinadio::where('id','=',$this->X05_3)->value('cijena')/100,
            'X05_na_cijena_3_as'=>$this->X05_3===0?'-':Turbinadio::where('id','=',$this->X05_3)->value('cijena_as')/100,
            'X05_na_cijena_3_ts'=>$this->X05_3===0?'-':Turbinadio::where('id','=',$this->X05_3)->value('cijena_ts')/100,  
            'X05_slike_3' => JsonResource::collection($X05_slike_3),
                        
            'X06'=>$this->X06,  'X06_oznaka'=>$this->X06===0?'-':Turbinadio::where('id','=',$this->X06)->value('oznaka'),
            'X06_tip'      =>$this->X06===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X06)->value('turbinadiotip_id'))->value('naziv_2'),
            'X06_na_stanju'  =>$this->X06===0?  '-':Turbinadio::where('id','=',$this->X06  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X06_u_servisu'  =>$this->X06===0?  '-':Turbinadio::where('id','=',$this->X06  )->sum(\DB::raw('na_stanju_s')), 
            'X06_u_radnji'   =>$this->X06===0?  '-':Turbinadio::where('id','=',$this->X06  )->sum(\DB::raw('na_stanju_r')),
            'X06_na_cijena'=>$this->X06===0?'-':Turbinadio::where('id','=',$this->X06)->value('cijena')/100,
            'X06_na_cijena_as'=>$this->X06===0?'-':Turbinadio::where('id','=',$this->X06)->value('cijena_as')/100,
            'X06_na_cijena_ts'=>$this->X06===0?'-':Turbinadio::where('id','=',$this->X06)->value('cijena_ts')/100,
            'X06_slike' => JsonResource::collection($X06_slike),

            'X06_2'=>$this->X06_2,  'X06_oznaka_2'=>$this->X06_2===0?'-':Turbinadio::where('id','=',$this->X06_2)->value('oznaka'),
            'X06_tip_2'      =>$this->X06_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X06_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X06_na_stanju_2'=>$this->X06_2===0?'-':Turbinadio::where('id','=',$this->X06_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X06_u_servisu_2'=>$this->X06_2===0?'-':Turbinadio::where('id','=',$this->X06_2)->sum(\DB::raw('na_stanju_s')), 
            'X06_u_radnji_2' =>$this->X06_2===0?'-':Turbinadio::where('id','=',$this->X06_2)->sum(\DB::raw('na_stanju_r')),
            'X06_na_cijena_2'=>$this->X06_2===0?'-':Turbinadio::where('id','=',$this->X06_2)->value('cijena')/100,
            'X06_na_cijena_2_as'=>$this->X06_2===0?'-':Turbinadio::where('id','=',$this->X06_2)->value('cijena_as')/100,
            'X06_na_cijena_2_ts'=>$this->X06_2===0?'-':Turbinadio::where('id','=',$this->X06_2)->value('cijena_ts')/100,
            'X06_slike_2' => JsonResource::collection($X06_slike_2),
            
            'X06_3'=>$this->X06_3,  'X06_oznaka_3'=>$this->X06_3===0?'-':Turbinadio::where('id','=',$this->X06_3)->value('oznaka'),
            'X06_tip_3'      =>$this->X06_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X06_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X06_na_stanju_3'=>$this->X06_3===0?'-':Turbinadio::where('id','=',$this->X06_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X06_u_servisu_3'=>$this->X06_3===0?'-':Turbinadio::where('id','=',$this->X06_3)->sum(\DB::raw('na_stanju_s')), 
            'X06_u_radnji_3' =>$this->X06_3===0?'-':Turbinadio::where('id','=',$this->X06_3)->sum(\DB::raw('na_stanju_r')),
            'X06_na_cijena_3'=>$this->X06_3===0?'-':Turbinadio::where('id','=',$this->X06_3)->value('cijena')/100,
            'X06_na_cijena_3_as'=>$this->X06_3===0?'-':Turbinadio::where('id','=',$this->X06_3)->value('cijena_as')/100,
            'X06_na_cijena_3_ts'=>$this->X06_3===0?'-':Turbinadio::where('id','=',$this->X06_3)->value('cijena_ts')/100, 
            'X06_slike_3' => JsonResource::collection($X06_slike_3),

            'X07'=>$this->X07,  'X07_oznaka'=>$this->X07===0?'-':Turbinadio::where('id','=',$this->X07)->value('oznaka'),
            'X07_tip'      =>$this->X07===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X07)->value('turbinadiotip_id'))->value('naziv_2'),
            'X07_na_stanju'  =>$this->X07===0?  '-':Turbinadio::where('id','=',$this->X07  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X07_u_servisu'  =>$this->X07===0?  '-':Turbinadio::where('id','=',$this->X07  )->sum(\DB::raw('na_stanju_s')), 
            'X07_u_radnji'   =>$this->X07===0?  '-':Turbinadio::where('id','=',$this->X07  )->sum(\DB::raw('na_stanju_r')),
            'X07_na_cijena'=>$this->X07===0?'-':Turbinadio::where('id','=',$this->X07)->value('cijena')/100,
            'X07_na_cijena_as'=>$this->X07===0?'-':Turbinadio::where('id','=',$this->X07)->value('cijena_as')/100,
            'X07_na_cijena_ts'=>$this->X07===0?'-':Turbinadio::where('id','=',$this->X07)->value('cijena_ts')/100,
            'X07_slike' => JsonResource::collection($X07_slike),

            'X07_2'=>$this->X07_2,  'X07_oznaka_2'=>$this->X07_2===0?'-':Turbinadio::where('id','=',$this->X07_2)->value('oznaka'),
            'X07_tip_2'      =>$this->X07_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X07_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X07_na_stanju_2'=>$this->X07_2===0?'-':Turbinadio::where('id','=',$this->X07_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X07_u_servisu_2'=>$this->X07_2===0?'-':Turbinadio::where('id','=',$this->X07_2)->sum(\DB::raw('na_stanju_s')), 
            'X07_u_radnji_2' =>$this->X07_2===0?'-':Turbinadio::where('id','=',$this->X07_2)->sum(\DB::raw('na_stanju_r')),
            'X07_na_cijena_2'=>$this->X07_2===0?'-':Turbinadio::where('id','=',$this->X07_2)->value('cijena')/100,
            'X07_na_cijena_2_as'=>$this->X07_2===0?'-':Turbinadio::where('id','=',$this->X07_2)->value('cijena_as')/100,
            'X07_na_cijena_2_ts'=>$this->X07_2===0?'-':Turbinadio::where('id','=',$this->X07_2)->value('cijena_ts')/100,
            'X07_slike_2' => JsonResource::collection($X07_slike_2),
            
            'X07_3'=>$this->X07_3,  'X07_oznaka_3'=>$this->X07_3===0?'-':Turbinadio::where('id','=',$this->X07_3)->value('oznaka'),
            'X07_tip_3'      =>$this->X07_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X07_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X07_na_stanju_3'=>$this->X07_3===0?'-':Turbinadio::where('id','=',$this->X07_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X07_u_servisu_3'=>$this->X07_3===0?'-':Turbinadio::where('id','=',$this->X07_3)->sum(\DB::raw('na_stanju_s')), 
            'X07_u_radnji_3' =>$this->X07_3===0?'-':Turbinadio::where('id','=',$this->X07_3)->sum(\DB::raw('na_stanju_r')),
            'X07_na_cijena_3'=>$this->X07_3===0?'-':Turbinadio::where('id','=',$this->X07_3)->value('cijena')/100,
            'X07_na_cijena_3_as'=>$this->X07_3===0?'-':Turbinadio::where('id','=',$this->X07_3)->value('cijena_as')/100,
            'X07_na_cijena_3_ts'=>$this->X07_3===0?'-':Turbinadio::where('id','=',$this->X07_3)->value('cijena_ts')/100, 
            'X07_slike_3' => JsonResource::collection($X07_slike_3),

            'X08'=>$this->X08,  'X08_oznaka'=>$this->X08===0?'-':Turbinadio::where('id','=',$this->X08)->value('oznaka'),
            'X08_tip'      =>$this->X08===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X08)->value('turbinadiotip_id'))->value('naziv_2'),
            'X08_na_stanju'  =>$this->X08===0?  '-':Turbinadio::where('id','=',$this->X08  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X08_u_servisu'  =>$this->X08===0?  '-':Turbinadio::where('id','=',$this->X08  )->sum(\DB::raw('na_stanju_s')), 
            'X08_u_radnji'   =>$this->X08===0?  '-':Turbinadio::where('id','=',$this->X08  )->sum(\DB::raw('na_stanju_r')),
            'X08_na_cijena'=>$this->X08===0?'-':Turbinadio::where('id','=',$this->X08)->value('cijena')/100,
            'X08_na_cijena_as'=>$this->X08===0?'-':Turbinadio::where('id','=',$this->X08)->value('cijena_as')/100,
            'X08_na_cijena_ts'=>$this->X08===0?'-':Turbinadio::where('id','=',$this->X08)->value('cijena_ts')/100,
            'X08_slike' => JsonResource::collection($X08_slike),

            'X08_2'=>$this->X08_2,  'X08_oznaka_2'=>$this->X08_2===0?'-':Turbinadio::where('id','=',$this->X08_2)->value('oznaka'),
            'X08_tip_2'      =>$this->X08_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X08_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X08_na_stanju_2'=>$this->X08_2===0?'-':Turbinadio::where('id','=',$this->X08_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X08_u_servisu_2'=>$this->X08_2===0?'-':Turbinadio::where('id','=',$this->X08_2)->sum(\DB::raw('na_stanju_s')), 
            'X08_u_radnji_2' =>$this->X08_2===0?'-':Turbinadio::where('id','=',$this->X08_2)->sum(\DB::raw('na_stanju_r')),
            'X08_na_cijena_2'=>$this->X08_2===0?'-':Turbinadio::where('id','=',$this->X08_2)->value('cijena')/100,
            'X08_na_cijena_2_as'=>$this->X08_2===0?'-':Turbinadio::where('id','=',$this->X08_2)->value('cijena_as')/100,
            'X08_na_cijena_2_ts'=>$this->X08_2===0?'-':Turbinadio::where('id','=',$this->X08_2)->value('cijena_ts')/100,
            'X08_slike_2' => JsonResource::collection($X08_slike_2),
            
            'X08_3'=>$this->X08_3,  'X08_oznaka_3'=>$this->X08_3===0?'-':Turbinadio::where('id','=',$this->X08_3)->value('oznaka'),
            'X08_tip_3'      =>$this->X08_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X08_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X08_na_stanju_3'=>$this->X08_3===0?'-':Turbinadio::where('id','=',$this->X08_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X08_u_servisu_3'=>$this->X08_3===0?'-':Turbinadio::where('id','=',$this->X08_3)->sum(\DB::raw('na_stanju_s')), 
            'X08_u_radnji_3' =>$this->X08_3===0?'-':Turbinadio::where('id','=',$this->X08_3)->sum(\DB::raw('na_stanju_r')),
            'X08_na_cijena_3'=>$this->X08_3===0?'-':Turbinadio::where('id','=',$this->X08_3)->value('cijena')/100,
            'X08_na_cijena_3_as'=>$this->X08_3===0?'-':Turbinadio::where('id','=',$this->X08_3)->value('cijena_as')/100,
            'X08_na_cijena_3_ts'=>$this->X08_3===0?'-':Turbinadio::where('id','=',$this->X08_3)->value('cijena_ts')/100, 
            'X08_slike_3' => JsonResource::collection($X08_slike_3),            

            'X09'=>$this->X09,  'X09_oznaka'=>$this->X09===0?'-':Turbinadio::where('id','=',$this->X09)->value('oznaka'),
            'X09_tip'      =>$this->X09===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X09)->value('turbinadiotip_id'))->value('naziv_2'),
            'X09_na_stanju'  =>$this->X09===0?  '-':Turbinadio::where('id','=',$this->X09  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X09_u_servisu'  =>$this->X09===0?  '-':Turbinadio::where('id','=',$this->X09  )->sum(\DB::raw('na_stanju_s')), 
            'X09_u_radnji'   =>$this->X09===0?  '-':Turbinadio::where('id','=',$this->X09  )->sum(\DB::raw('na_stanju_r')),
            'X09_na_cijena'=>$this->X09===0?'-':Turbinadio::where('id','=',$this->X09)->value('cijena')/100,
            'X09_na_cijena_as'=>$this->X09===0?'-':Turbinadio::where('id','=',$this->X09)->value('cijena_as')/100,
            'X09_na_cijena_ts'=>$this->X09===0?'-':Turbinadio::where('id','=',$this->X09)->value('cijena_ts')/100,
            'X09_slike' => JsonResource::collection($X09_slike),

            'X09_2'=>$this->X09_2,  'X09_oznaka_2'=>$this->X09_2===0?'-':Turbinadio::where('id','=',$this->X09_2)->value('oznaka'),
            'X09_tip_2'      =>$this->X09_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X09_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X09_na_stanju_2'=>$this->X09_2===0?'-':Turbinadio::where('id','=',$this->X09_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X09_u_servisu_2'=>$this->X09_2===0?'-':Turbinadio::where('id','=',$this->X09_2)->sum(\DB::raw('na_stanju_s')), 
            'X09_u_radnji_2' =>$this->X09_2===0?'-':Turbinadio::where('id','=',$this->X09_2)->sum(\DB::raw('na_stanju_r')),
            'X09_na_cijena_2'=>$this->X09_2===0?'-':Turbinadio::where('id','=',$this->X09_2)->value('cijena')/100,
            'X09_na_cijena_2_as'=>$this->X09_2===0?'-':Turbinadio::where('id','=',$this->X09_2)->value('cijena_as')/100,
            'X09_na_cijena_2_ts'=>$this->X09_2===0?'-':Turbinadio::where('id','=',$this->X09_2)->value('cijena_ts')/100,
            'X09_slike_2' => JsonResource::collection($X09_slike_2),
            
            'X09_3'=>$this->X09_3,  'X09_oznaka_3'=>$this->X09_3===0?'-':Turbinadio::where('id','=',$this->X09_3)->value('oznaka'),
            'X09_tip_3'      =>$this->X09_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X09_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X09_na_stanju_3'=>$this->X09_3===0?'-':Turbinadio::where('id','=',$this->X09_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X09_u_servisu_3'=>$this->X09_3===0?'-':Turbinadio::where('id','=',$this->X09_3)->sum(\DB::raw('na_stanju_s')), 
            'X09_u_radnji_3' =>$this->X09_3===0?'-':Turbinadio::where('id','=',$this->X09_3)->sum(\DB::raw('na_stanju_r')),
            'X09_na_cijena_3'=>$this->X09_3===0?'-':Turbinadio::where('id','=',$this->X09_3)->value('cijena')/100,
            'X09_na_cijena_3_as'=>$this->X09_3===0?'-':Turbinadio::where('id','=',$this->X09_3)->value('cijena_as')/100,
            'X09_na_cijena_3_ts'=>$this->X09_3===0?'-':Turbinadio::where('id','=',$this->X09_3)->value('cijena_ts')/100, 
            'X09_slike_3' => JsonResource::collection($X09_slike_3),

            'X10'=>$this->X10,  'X10_oznaka'=>$this->X10===0?'-':Turbinadio::where('id','=',$this->X10)->value('oznaka'),
            'X10_tip'      =>$this->X10===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X10)->value('turbinadiotip_id'))->value('naziv_2'),
            'X10_na_stanju'  =>$this->X10===0?  '-':Turbinadio::where('id','=',$this->X10  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X10_u_servisu'  =>$this->X10===0?  '-':Turbinadio::where('id','=',$this->X10  )->sum(\DB::raw('na_stanju_s')), 
            'X10_u_radnji'   =>$this->X10===0?  '-':Turbinadio::where('id','=',$this->X10  )->sum(\DB::raw('na_stanju_r')),
            'X10_na_cijena'=>$this->X10===0?'-':Turbinadio::where('id','=',$this->X10)->value('cijena')/100,
            'X10_na_cijena_as'=>$this->X10===0?'-':Turbinadio::where('id','=',$this->X10)->value('cijena_as')/100,
            'X10_na_cijena_ts'=>$this->X10===0?'-':Turbinadio::where('id','=',$this->X10)->value('cijena_ts')/100,
            'X10_slike' => JsonResource::collection($X10_slike),

            'X10_2'=>$this->X10_2,  'X10_oznaka_2'=>$this->X10_2===0?'-':Turbinadio::where('id','=',$this->X10_2)->value('oznaka'),
            'X10_tip_2'      =>$this->X10_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X10_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X10_na_stanju_2'=>$this->X10_2===0?'-':Turbinadio::where('id','=',$this->X10_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X10_u_servisu_2'=>$this->X10_2===0?'-':Turbinadio::where('id','=',$this->X10_2)->sum(\DB::raw('na_stanju_s')), 
            'X10_u_radnji_2' =>$this->X10_2===0?'-':Turbinadio::where('id','=',$this->X10_2)->sum(\DB::raw('na_stanju_r')),
            'X10_na_cijena_2'=>$this->X10_2===0?'-':Turbinadio::where('id','=',$this->X10_2)->value('cijena')/100,
            'X10_na_cijena_2_as'=>$this->X10_2===0?'-':Turbinadio::where('id','=',$this->X10_2)->value('cijena_as')/100,
            'X10_na_cijena_2_ts'=>$this->X10_2===0?'-':Turbinadio::where('id','=',$this->X10_2)->value('cijena_ts')/100,
            'X10_slike_2' => JsonResource::collection($X10_slike_2),
            
            'X10_3'=>$this->X10_3,  'X10_oznaka_3'=>$this->X10_3===0?'-':Turbinadio::where('id','=',$this->X10_3)->value('oznaka'),
            'X10_tip_3'      =>$this->X10_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X10_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X10_na_stanju_3'=>$this->X10_3===0?'-':Turbinadio::where('id','=',$this->X10_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X10_u_servisu_3'=>$this->X10_3===0?'-':Turbinadio::where('id','=',$this->X10_3)->sum(\DB::raw('na_stanju_s')), 
            'X10_u_radnji_3' =>$this->X10_3===0?'-':Turbinadio::where('id','=',$this->X10_3)->sum(\DB::raw('na_stanju_r')),
            'X10_na_cijena_3'=>$this->X10_3===0?'-':Turbinadio::where('id','=',$this->X10_3)->value('cijena')/100,
            'X10_na_cijena_3_as'=>$this->X10_3===0?'-':Turbinadio::where('id','=',$this->X10_3)->value('cijena_as')/100,
            'X10_na_cijena_3_ts'=>$this->X10_3===0?'-':Turbinadio::where('id','=',$this->X10_3)->value('cijena_ts')/100, 
            'X10_slike_3' => JsonResource::collection($X10_slike_3),

            'X11'=>$this->X11,  'X11_oznaka'=>$this->X11===0?'-':Turbinadio::where('id','=',$this->X11)->value('oznaka'),
            'X11_tip'      =>$this->X11===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X11)->value('turbinadiotip_id'))->value('naziv_2'),
            'X11_na_stanju'  =>$this->X11===0?  '-':Turbinadio::where('id','=',$this->X11  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X11_u_servisu'  =>$this->X11===0?  '-':Turbinadio::where('id','=',$this->X11  )->sum(\DB::raw('na_stanju_s')), 
            'X11_u_radnji'   =>$this->X11===0?  '-':Turbinadio::where('id','=',$this->X11  )->sum(\DB::raw('na_stanju_r')),
            'X11_na_cijena'  =>$this->X11===0?'-':Turbinadio::where('id','=',$this->X11)->value('cijena')/100,
            'X11_na_cijena_as'=>$this->X11===0?'-':Turbinadio::where('id','=',$this->X11)->value('cijena_as')/100,
            'X11_na_cijena_ts'=>$this->X11===0?'-':Turbinadio::where('id','=',$this->X11)->value('cijena_ts')/100, 
            'X11_slike' => JsonResource::collection($X11_slike),

            'X11_2'=>$this->X11_2,  'X11_oznaka_2'=>$this->X11_2===0?'-':Turbinadio::where('id','=',$this->X11_2)->value('oznaka'),
            'X11_tip_2'      =>$this->X11_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X11_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X11_na_stanju_2'=>$this->X11_2===0?'-':Turbinadio::where('id','=',$this->X11_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X11_u_servisu_2'=>$this->X11_2===0?'-':Turbinadio::where('id','=',$this->X11_2)->sum(\DB::raw('na_stanju_s')), 
            'X11_u_radnji_2' =>$this->X11_2===0?'-':Turbinadio::where('id','=',$this->X11_2)->sum(\DB::raw('na_stanju_r')),
            'X11_na_cijena_2'=>$this->X11_2===0?'-':Turbinadio::where('id','=',$this->X11_2)->value('cijena')/100,
            'X11_na_cijena_2_as'=>$this->X11_2===0?'-':Turbinadio::where('id','=',$this->X11_2)->value('cijena_as')/100,
            'X11_na_cijena_2_ts'=>$this->X11_2===0?'-':Turbinadio::where('id','=',$this->X11_2)->value('cijena_ts')/100,
            'X11_slike_2' => JsonResource::collection($X11_slike_2),
            
            'X11_3'=>$this->X11_3,  'X11_oznaka_3'=>$this->X11_3===0?'-':Turbinadio::where('id','=',$this->X11_3)->value('oznaka'),
            'X11_tip_3'      =>$this->X11_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X11_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X11_na_stanju_3'=>$this->X11_3===0?'-':Turbinadio::where('id','=',$this->X11_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X11_u_servisu_3'=>$this->X11_3===0?'-':Turbinadio::where('id','=',$this->X11_3)->sum(\DB::raw('na_stanju_s')), 
            'X11_u_radnji_3' =>$this->X11_3===0?'-':Turbinadio::where('id','=',$this->X11_3)->sum(\DB::raw('na_stanju_r')),
            'X11_na_cijena_3'=>$this->X11_3===0?'-':Turbinadio::where('id','=',$this->X11_3)->value('cijena')/100,
            'X11_na_cijena_3_as'=>$this->X11_3===0?'-':Turbinadio::where('id','=',$this->X11_3)->value('cijena_as')/100,
            'X11_na_cijena_3_ts'=>$this->X11_3===0?'-':Turbinadio::where('id','=',$this->X11_3)->value('cijena_ts')/100, 
            'X11_slike_3' => JsonResource::collection($X11_slike_3),            

            //Klapna
            'X12'=>$this->X12,  'X12_oznaka'=>$this->X12===0?'-':Turbinadio::where('id','=',$this->X12)->value('oznaka'),
            'X12_tip'      =>$this->X12===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X12)->value('turbinadiotip_id'))->value('naziv_2'),
            'X12_na_stanju'  =>$this->X12===0?  '-':Turbinadio::where('id','=',$this->X12  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X12_u_servisu'  =>$this->X12===0?  '-':Turbinadio::where('id','=',$this->X12  )->sum(\DB::raw('na_stanju_s')), 
            'X12_u_radnji'   =>$this->X12===0?  '-':Turbinadio::where('id','=',$this->X12  )->sum(\DB::raw('na_stanju_r')),
            'X12_na_cijena'=>$this->X12===0?'-':Turbinadio::where('id','=',$this->X12)->value('cijena')/100,
            'X12_na_cijena_as'=>$this->X12===0?'-':Turbinadio::where('id','=',$this->X12)->value('cijena_as')/100,
            'X12_na_cijena_ts'=>$this->X12===0?'-':Turbinadio::where('id','=',$this->X12)->value('cijena_ts')/100,
            'X12_slike' => JsonResource::collection($X12_slike),
            
            'X12_2'=>$this->X12_2,  'X12_oznaka_2'=>$this->X12_2===0?'-':Turbinadio::where('id','=',$this->X12_2)->value('oznaka'),
            'X12_tip_2'      =>$this->X12_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X12_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X12_na_stanju_2'=>$this->X12_2===0?'-':Turbinadio::where('id','=',$this->X12_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X12_u_servisu_2'=>$this->X12_2===0?'-':Turbinadio::where('id','=',$this->X12_2)->sum(\DB::raw('na_stanju_s')), 
            'X12_u_radnji_2' =>$this->X12_2===0?'-':Turbinadio::where('id','=',$this->X12_2)->sum(\DB::raw('na_stanju_r')),
            'X12_na_cijena_2'=>$this->X12_2===0?'-':Turbinadio::where('id','=',$this->X12_2)->value('cijena'),
            'X12_na_cijena_2_as'=>$this->X12_2===0?'-':Turbinadio::where('id','=',$this->X12_2)->value('cijena_as'),
            'X12_na_cijena_2_ts'=>$this->X12_2===0?'-':Turbinadio::where('id','=',$this->X12_2)->value('cijena_ts'),
            'X12_slike_2' => JsonResource::collection($X12_slike_2),
            
            'X12_3'=>$this->X12_3,  'X12_oznaka_3'=>$this->X12_3===0?'-':Turbinadio::where('id','=',$this->X12_3)->value('oznaka'),
            'X12_tip_3'      =>$this->X12_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X12_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X12_na_stanju_3'=>$this->X12_3===0?'-':Turbinadio::where('id','=',$this->X12_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X12_u_servisu_3'=>$this->X12_3===0?'-':Turbinadio::where('id','=',$this->X12_3)->sum(\DB::raw('na_stanju_s')), 
            'X12_u_radnji_3' =>$this->X12_3===0?'-':Turbinadio::where('id','=',$this->X12_3)->sum(\DB::raw('na_stanju_r')),
            'X12_na_cijena_3'=>$this->X12_3===0?'-':Turbinadio::where('id','=',$this->X12_3)->value('cijena')/100,
            'X12_na_cijena_3_as'=>$this->X12_3===0?'-':Turbinadio::where('id','=',$this->X12_3)->value('cijena_as')/100,
            'X12_na_cijena_3_ts'=>$this->X12_3===0?'-':Turbinadio::where('id','=',$this->X12_3)->value('cijena_ts')/100,   
            'X12_slike_3' => JsonResource::collection($X12_slike_3),
            
            //Limeni obruč
            'X13'=>$this->X13,  'X13_oznaka'=>$this->X13===0?'-':Turbinadio::where('id','=',$this->X13)->value('oznaka'),
            'X13_tip'      =>$this->X13===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X13)->value('turbinadiotip_id'))->value('naziv_2'),
            'X13_podtip'   =>$this->X13===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->X13)->value('turbinadiopodtip_id'))->value('naziv'),
            'X13_na_stanju'  =>$this->X13===0?  '-':Turbinadio::where('id','=',$this->X13  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X13_u_servisu'  =>$this->X13===0?  '-':Turbinadio::where('id','=',$this->X13  )->sum(\DB::raw('na_stanju_s')), 
            'X13_u_radnji'   =>$this->X13===0?  '-':Turbinadio::where('id','=',$this->X13  )->sum(\DB::raw('na_stanju_r')),
            'X13_na_cijena'=>$this->X13===0?'-':Turbinadio::where('id','=',$this->X13)->value('cijena')/100,
            'X13_na_cijena_as'=>$this->X13===0?'-':Turbinadio::where('id','=',$this->X13)->value('cijena_as')/100,
            'X13_na_cijena_ts'=>$this->X13===0?'-':Turbinadio::where('id','=',$this->X13)->value('cijena_ts')/100,  
            'X13_slike' => JsonResource::collection($X13_slike),
            
            'X13_2'=>$this->X13_2,  'X13_oznaka_2'=>$this->X13_2===0?'-':Turbinadio::where('id','=',$this->X13_2)->value('oznaka'),
            'X13_tip_2'      =>$this->X13_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X13_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X13_podtip_2'   =>$this->X13_2===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->X13_2)->value('turbinadiopodtip_id'))->value('naziv'),
            'X13_na_stanju_2'=>$this->X13_2===0?'-':Turbinadio::where('id','=',$this->X13_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X13_u_servisu_2'=>$this->X13_2===0?'-':Turbinadio::where('id','=',$this->X13_2)->sum(\DB::raw('na_stanju_s')), 
            'X13_u_radnji_2' =>$this->X13_2===0?'-':Turbinadio::where('id','=',$this->X13_2)->sum(\DB::raw('na_stanju_r')),
            'X13_na_cijena_2'=>$this->X13_2===0?'-':Turbinadio::where('id','=',$this->X13_2)->value('cijena')/100,
            'X13_na_cijena_2_as'=>$this->X13_2===0?'-':Turbinadio::where('id','=',$this->X13_2)->value('cijena_as')/100,
            'X13_na_cijena_2_ts'=>$this->X13_2===0?'-':Turbinadio::where('id','=',$this->X13_2)->value('cijena_ts')/100,
            'X13_slike_2' => JsonResource::collection($X13_slike_2),

            'X13_3'=>$this->X13_3,  'X13_oznaka_3'=>$this->X13_3===0?'-':Turbinadio::where('id','=',$this->X13_3)->value('oznaka'),
            'X13_tip_3'      =>$this->X13_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X13_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X13_podtip_3'   =>$this->X13_3===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->X13_3)->value('turbinadiopodtip_id'))->value('naziv'),
            'X13_na_stanju_3'=>$this->X13_3===0?'-':Turbinadio::where('id','=',$this->X13_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X13_u_servisu_3'=>$this->X13_3===0?'-':Turbinadio::where('id','=',$this->X13_3)->sum(\DB::raw('na_stanju_s')), 
            'X13_u_radnji_3' =>$this->X13_3===0?'-':Turbinadio::where('id','=',$this->X13_3)->sum(\DB::raw('na_stanju_r')),
            'X13_na_cijena_3'=>$this->X13_3===0?'-':Turbinadio::where('id','=',$this->X13_3)->value('cijena')/100,
            'X13_na_cijena_3_as'=>$this->X13_3===0?'-':Turbinadio::where('id','=',$this->X13_3)->value('cijena_as')/100,
            'X13_na_cijena_3_ts'=>$this->X13_3===0?'-':Turbinadio::where('id','=',$this->X13_3)->value('cijena_ts')/100,  
            'X13_slike_3' => JsonResource::collection($X13_slike_3),

            //Deklo turbine
            'X14'=>$this->X14,  'X14_oznaka'=>$this->X14===0?'-':Turbinadio::where('id','=',$this->X14)->value('oznaka'),
            'X14_tip'      =>$this->X14===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X14)->value('turbinadiotip_id'))->value('naziv_2'),
            'X14_na_stanju'  =>$this->X14===0?  '-':Turbinadio::where('id','=',$this->X14  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X14_u_servisu'  =>$this->X14===0?  '-':Turbinadio::where('id','=',$this->X14  )->sum(\DB::raw('na_stanju_s')), 
            'X14_u_radnji'   =>$this->X14===0?  '-':Turbinadio::where('id','=',$this->X14  )->sum(\DB::raw('na_stanju_r')),
            'X14_na_cijena'   =>$this->X14===0?'-':Turbinadio::where('id','=',$this->X14)->value('cijena')/100,
            'X14_na_cijena_as'=>$this->X14===0?'-':Turbinadio::where('id','=',$this->X14)->value('cijena_as')/100,
            'X14_na_cijena_ts'=>$this->X14===0?'-':Turbinadio::where('id','=',$this->X14)->value('cijena_ts')/100, 
            'X14_slike' => JsonResource::collection($X14_slike),
           
            //Holender nipl
            'X15'=>$this->X15,  'X15_oznaka'=>$this->X15===0?'-':Turbinadio::where('id','=',$this->X15)->value('oznaka'),
            'X15_tip'      =>$this->X15===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X15)->value('turbinadiotip_id'))->value('naziv_2'),
            'X15_na_stanju'  =>$this->X15===0?  '-':Turbinadio::where('id','=',$this->X15  )->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X15_u_servisu'  =>$this->X15===0?  '-':Turbinadio::where('id','=',$this->X15  )->sum(\DB::raw('na_stanju_s')), 
            'X15_u_radnji'   =>$this->X15===0?  '-':Turbinadio::where('id','=',$this->X15  )->sum(\DB::raw('na_stanju_r')),
            'X15_na_cijena'   =>$this->X15===0?'-':Turbinadio::where('id','=',$this->X15)->value('cijena')/100,
            'X15_na_cijena_as'=>$this->X15===0?'-':Turbinadio::where('id','=',$this->X15)->value('cijena_as')/100,
            'X15_na_cijena_ts'=>$this->X15===0?'-':Turbinadio::where('id','=',$this->X15)->value('cijena_ts')/100,
            'X15_slike' => JsonResource::collection($X15_slike),

            'X15_2'=>$this->X15_2,  'X15_oznaka_2'=>$this->X15_2===0?'-':Turbinadio::where('id','=',$this->X15_2)->value('oznaka'),
            'X15_tip_2'      =>$this->X15_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X15_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X15_na_stanju_2'=>$this->X15_2===0?'-':Turbinadio::where('id','=',$this->X15_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X15_u_servisu_2'=>$this->X15_2===0?'-':Turbinadio::where('id','=',$this->X15_2)->sum(\DB::raw('na_stanju_s')), 
            'X15_u_radnji_2' =>$this->X15_2===0?'-':Turbinadio::where('id','=',$this->X15_2)->sum(\DB::raw('na_stanju_r')),
            'X15_na_cijena_2'=>$this->X15_2===0?'-':Turbinadio::where('id','=',$this->X15_2)->value('cijena')/100,
            'X15_na_cijena_2_as'=>$this->X15_2===0?'-':Turbinadio::where('id','=',$this->X15_2)->value('cijena_as')/100,
            'X15_na_cijena_2_ts'=>$this->X15_2===0?'-':Turbinadio::where('id','=',$this->X15_2)->value('cijena_ts')/100,
            'X15_slike_2' => JsonResource::collection($X15_slike_2),
            
            'X15_3'=>$this->X15_3,  'X15_oznaka_3'=>$this->X15_3===0?'-':Turbinadio::where('id','=',$this->X15_3)->value('oznaka'),
            'X15_tip_3'      =>$this->X15_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X15_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X15_na_stanju_3'=>$this->X15_3===0?'-':Turbinadio::where('id','=',$this->X15_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')), 
            'X15_u_servisu_3'=>$this->X15_3===0?'-':Turbinadio::where('id','=',$this->X15_3)->sum(\DB::raw('na_stanju_s')), 
            'X15_u_radnji_3' =>$this->X15_3===0?'-':Turbinadio::where('id','=',$this->X15_3)->sum(\DB::raw('na_stanju_r')),
            'X15_na_cijena_3'=>$this->X15_3===0?'-':Turbinadio::where('id','=',$this->X15_3)->value('cijena')/100,
            'X15_na_cijena_3_as'=>$this->X15_3===0?'-':Turbinadio::where('id','=',$this->X15_3)->value('cijena_as')/100,
            'X15_na_cijena_3_ts'=>$this->X15_3===0?'-':Turbinadio::where('id','=',$this->X15_3)->value('cijena_ts')/100, 
            'X15_slike_3' => JsonResource::collection($X15_slike_3),
         
            // Turbina kao "dio"
            'X16'=>$this->X16,  'X16_oznaka'=>$this->X16===0?'-':Turbinadio::where('id','=',$this->X16)->value('oznaka'),
            'X16_tip'      =>$this->X16===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X16)->value('turbinadiotip_id'))->value('naziv_2'),
            'X16_podtip'   =>$this->X16===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->X16)->value('turbinadiopodtip_id'))->value('naziv'),
            'X16_na_stanju'=>$this->X16===0?'-':Turbinadio::where('id','=',$this->X16)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'X16_u_servisu'=>Turbinadio::where('id','=',$this->X16)->sum(\DB::raw('na_stanju_s')),
            'X16_u_radnji'=>Turbinadio::where('id','=',$this->X16)->sum(\DB::raw('na_stanju_r')),
            'X16_na_cijena'   =>$this->X16===0?'-':Turbinadio::where('id','=',$this->X16)->value('cijena')/100,
            'X16_na_cijena_as'=>$this->X16===0?'-':Turbinadio::where('id','=',$this->X16)->value('cijena_as')/100,
            'X16_na_cijena_ts'=>$this->X16===0?'-':Turbinadio::where('id','=',$this->X16)->value('cijena_ts')/100,
            'X16_slike' => JsonResource::collection($X16_slike),                
            'X16_polica_s'   =>Turbinadio::where('id','=',$this->X16)->value('polica_s'),

            'X16_2'=>$this->X16_2,  'X16_oznaka'=>$this->X16_2===0?'-':Turbinadio::where('id','=',$this->X16_2)->value('oznaka'),
            'X16_tip_2'      =>$this->X16_2===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X16_2)->value('turbinadiotip_id'))->value('naziv_2'),
            'X16_podtip_2'   =>$this->X16_2===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->X16_2)->value('turbinadiopodtip_id'))->value('naziv'),
            'X16_na_stanju_2'=>$this->X16_2===0?'-':Turbinadio::where('id','=',$this->X16_2)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'X16_u_servisu_2'=>Turbinadio::where('id','=',$this->X16_2)->sum(\DB::raw('na_stanju_s')),
            'X16_u_radnji_2'=>Turbinadio::where('id','=',$this->X16_2)->sum(\DB::raw('na_stanju_r')),
            'X16_na_cijena_2'   =>$this->X16_2===0?'-':Turbinadio::where('id','=',$this->X16_2)->value('cijena')/100,
            'X16_na_cijena_2_as'=>$this->X16_2===0?'-':Turbinadio::where('id','=',$this->X16_2)->value('cijena_as')/100,
            'X16_na_cijena_2_ts'=>$this->X16_2===0?'-':Turbinadio::where('id','=',$this->X16_2)->value('cijena_ts')/100,
            'X16_slike_2' => JsonResource::collection($X16_slike_2),                
            'X16_polica_s_2'   =>Turbinadio::where('id','=',$this->X16_2)->value('polica_s'),

            'X16_3'=>$this->X16_3,  'X16_oznaka'=>$this->X16_3===0?'-':Turbinadio::where('id','=',$this->X16_3)->value('oznaka'),
            'X16_tip_3'      =>$this->X16_3===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X16_3)->value('turbinadiotip_id'))->value('naziv_2'),
            'X16_podtip_3'   =>$this->X16_3===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->X16_3)->value('turbinadiopodtip_id'))->value('naziv'),
            'X16_na_stanju_3'=>$this->X16_3===0?'-':Turbinadio::where('id','=',$this->X16_3)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'X16_u_servisu_3'=>Turbinadio::where('id','=',$this->X16_3)->sum(\DB::raw('na_stanju_s')),
            'X16_u_radnji_3'=>Turbinadio::where('id','=',$this->X16_3)->sum(\DB::raw('na_stanju_r')),
            'X16_na_cijena_3'   =>$this->X16_3===0?'-':Turbinadio::where('id','=',$this->X16_3)->value('cijena')/100,
            'X16_na_cijena_3_as'=>$this->X16_3===0?'-':Turbinadio::where('id','=',$this->X16_3)->value('cijena_as')/100,
            'X16_na_cijena_3_ts'=>$this->X16_3===0?'-':Turbinadio::where('id','=',$this->X16_3)->value('cijena_ts')/100,
            'X16_slike_3' => JsonResource::collection($X16_slike_3),                
            'X16_polica_s_3'   =>Turbinadio::where('id','=',$this->X16_3)->value('polica_s'),

            'X16_4'=>$this->X16_4,  'X16_oznaka'=>$this->X16_4===0?'-':Turbinadio::where('id','=',$this->X16_4)->value('oznaka'),
            'X16_tip_4'      =>$this->X16_4===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X16_4)->value('turbinadiotip_id'))->value('naziv_2'),
            'X16_podtip_4'   =>$this->X16_4===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->X16_4)->value('turbinadiopodtip_id'))->value('naziv'),
            'X16_na_stanju_4'=>$this->X16_4===0?'-':Turbinadio::where('id','=',$this->X16_4)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'X16_u_servisu_4'=>Turbinadio::where('id','=',$this->X16_4)->sum(\DB::raw('na_stanju_s')),
            'X16_u_radnji_4'=>Turbinadio::where('id','=',$this->X16_4)->sum(\DB::raw('na_stanju_r')),
            'X16_na_cijena_4'   =>$this->X16_4===0?'-':Turbinadio::where('id','=',$this->X16_4)->value('cijena')/100,
            'X16_na_cijena_4_as'=>$this->X16_4===0?'-':Turbinadio::where('id','=',$this->X16_4)->value('cijena_as')/100,
            'X16_na_cijena_4_ts'=>$this->X16_4===0?'-':Turbinadio::where('id','=',$this->X16_4)->value('cijena_ts')/100,
            'X16_slike_4' => JsonResource::collection($X16_slike_4),                
            'X16_polica_s_4'   =>Turbinadio::where('id','=',$this->X16_4)->value('polica_s'),
            
            'X16_5'=>$this->X16_5,  'X16_oznaka'=>$this->X16_5===0?'-':Turbinadio::where('id','=',$this->X16_5)->value('oznaka'),
            'X16_tip_5'      =>$this->X16_5===0?'-':Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->X16_5)->value('turbinadiotip_id'))->value('naziv_2'),
            'X16_podtip_5'   =>$this->X16_5===0?'-':Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->X16_5)->value('turbinadiopodtip_id'))->value('naziv'),
            'X16_na_stanju_5'=>$this->X16_5===0?'-':Turbinadio::where('id','=',$this->X16_5)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'X16_u_servisu_5'=>Turbinadio::where('id','=',$this->X16_5)->sum(\DB::raw('na_stanju_s')),
            'X16_u_radnji_5'=>Turbinadio::where('id','=',$this->X16_5)->sum(\DB::raw('na_stanju_r')),
            'X16_na_cijena_5'   =>$this->X16_5===0?'-':Turbinadio::where('id','=',$this->X16_5)->value('cijena')/100,
            'X16_na_cijena_5_as'=>$this->X16_5===0?'-':Turbinadio::where('id','=',$this->X16_5)->value('cijena_as')/100,
            'X16_na_cijena_5_ts'=>$this->X16_5===0?'-':Turbinadio::where('id','=',$this->X16_5)->value('cijena_ts')/100,
            'X16_slike_5' => JsonResource::collection($X16_slike_5),                
            'X16_polica_s_5'   =>Turbinadio::where('id','=',$this->X16_5)->value('polica_s')


/// možda je ovo višak????
/*
            'polica'                 =>$this->polica,  
            'na_stanju'              =>$this->na_stanju      ,  //?$this->na_stanju      :0,
            'limit'                  =>$this->limit           ,  //?$this->limit          :0,
            'oem_cijena'             =>$this->cijena/100      ,  //?$this->cijena/100     :0, 
            'nab_cijena'             =>$this->nab_cijena/100     //?$this->nab_cijena/100 :0, 
*/
        ];
    }
}
