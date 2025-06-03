<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Config;
use DB;

class PredracunRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        $naziv_kupca=DB::table('kupci')
        ->where('id', '=', $this->kupac_id)
        ->pluck('naziv')->first();  // "5"

        $usluga_opis=DB::table('usluge')
        ->where('id', '=', $this->usluga_id)
        ->pluck('opis', 'cijena')->first();  // "5"
        $usluga_cijena=DB::table('usluge')
        ->where('id', '=', $this->usluga_id)
        ->pluck('cijena')->first();  // "5"


        return [
            'id'                =>$this->id,
            'broj'              =>$this->broj,
            
            'datum'             =>$this->datum,//=>Carbon::createFromFormat('Y-m-d', $this->datum)->format('d-m-Y'),
            'datum_list'        =>Carbon::createFromFormat('Y-m-d', $this->datum)->format('d-m-Y'),
            'kupac_id'          =>$this->kupac_id,
            'kupac_ime'         =>$this->kupac_ime,
            'kupac_naziv'       =>$this->kupac_id==0 ? $this->kupac_ime : $naziv_kupca,  // 22.8.2022 dodato polje kupac_ime koje nija prazno ako je kupac_id=0
            'komplet_remont'    =>$this->komplet_remont,
            'rabat'             =>$this->rabat,
            'oem'               =>$this->oem,
            'oem_cijena'        =>round($this->oem_cijena/100,2),
            'napomena'          =>$this->napomena,

            'CW_id' => $this->CW_id,      'CW_cijena' => round($this->CW_cijena/100,2),     'CW_kolicina' => $this->CW_kolicina,  'CW_rabat' => $this->CW_rabat,
            'CW_id_2' => $this->CW_id_2,      'CW_cijena_2' => round($this->CW_cijena_2/100,2),     'CW_kolicina_2' => $this->CW_kolicina_2,  'CW_rabat_2' => $this->CW_rabat_2,
            'CW_id_3' => $this->CW_id_3,      'CW_cijena_3' => round($this->CW_cijena_3/100,2),     'CW_kolicina_3' => $this->CW_kolicina_3,  'CW_rabat_3' => $this->CW_rabat_3,

            'TW_id' => $this->TW_id,      'TW_cijena' => round($this->TW_cijena/100,2),     'TW_kolicina' => $this->TW_kolicina,  'TW_rabat' => $this->TW_rabat,            
            'TW_id_2' => $this->TW_id_2,      'TW_cijena_2' => round($this->TW_cijena_2/100,2),     'TW_kolicina_2' => $this->TW_kolicina_2,  'TW_rabat_2' => $this->TW_rabat_2,            
            'TW_id_3' => $this->TW_id_3,      'TW_cijena_3' => round($this->TW_cijena_3/100,2),     'TW_kolicina_3' => $this->TW_kolicina_3,  'TW_rabat_3' => $this->TW_rabat_3,            

            'BH_id' => $this->BH_id,      'BH_cijena' => round($this->BH_cijena/100,2),     'BH_kolicina' => $this->BH_kolicina,  'BH_rabat' => $this->BH_rabat,  
            'BH_id_2' => $this->BH_id_2,      'BH_cijena_2' => round($this->BH_cijena_2/100,2),     'BH_kolicina_2' => $this->BH_kolicina_2,  'BH_rabat_2' => $this->BH_rabat_2,  
            'BH_id_3' => $this->BH_id_3,      'BH_cijena_3' => round($this->BH_cijena_3/100,2),     'BH_kolicina_3' => $this->BH_kolicina_3,  'BH_rabat_3' => $this->BH_rabat_3,  

            'BP_id' => $this->BP_id,      'BP_cijena' => round($this->BP_cijena/100,2),     'BP_kolicina' => $this->BP_kolicina,  'BP_rabat' => $this->BP_rabat,  
            'BP_id_2' => $this->BP_id_2,      'BP_cijena_2' => round($this->BP_cijena_2/100,2),     'BP_kolicina_2' => $this->BP_kolicina_2,  'BP_rabat_2' => $this->BP_rabat_2,  
            'BP_id_3' => $this->BP_id_3,      'BP_cijena_3' => round($this->BP_cijena_3/100,2),     'BP_kolicina_3' => $this->BP_kolicina_3,  'BP_rabat_3' => $this->BP_rabat_3,  

            'HS_id' => $this->HS_id,      'HS_cijena' => round($this->HS_cijena/100,2),     'HS_kolicina' => $this->HS_kolicina,  'HS_rabat' => $this->HS_rabat,  
            'HS_id_2' => $this->HS_id_2,      'HS_cijena_2' => round($this->HS_cijena_2/100,2),     'HS_kolicina_2' => $this->HS_kolicina_2,  'HS_rabat_2' => $this->HS_rabat_2,  
            'HS_id_3' => $this->HS_id_3,      'HS_cijena_3' => round($this->HS_cijena_3/100,2),     'HS_kolicina_3' => $this->HS_kolicina_3,  'HS_rabat_3' => $this->HS_rabat_3,  

            'AC_id' => $this->AC_id,      'AC_cijena' => round($this->AC_cijena/100,2),     'AC_kolicina' => $this->AC_kolicina,  'AC_rabat' => $this->AC_rabat,  
            'AC_id_2' => $this->AC_id_2,      'AC_cijena_2' => round($this->AC_cijena_2/100,2),     'AC_kolicina_2' => $this->AC_kolicina_2,  'AC_rabat_2' => $this->AC_rabat_2,  
            'AC_id_3' => $this->AC_id_3,      'AC_cijena_3' => round($this->AC_cijena_3/100,2),     'AC_kolicina_3' => $this->AC_kolicina_3,  'AC_rabat_3' => $this->AC_rabat_3,  

            'NZ_id' => $this->NZ_id,      'NZ_cijena' => round($this->NZ_cijena/100,2),     'NZ_kolicina' => $this->NZ_kolicina,  'NZ_rabat' => $this->NZ_rabat,  
            'NZ_id_2' => $this->NZ_id_2,      'NZ_cijena_2' => round($this->NZ_cijena_2/100,2),     'NZ_kolicina_2' => $this->NZ_kolicina_2,  'NZ_rabat_2' => $this->NZ_rabat_2,  
            'NZ_id_3' => $this->NZ_id_3,      'NZ_cijena_3' => round($this->NZ_cijena_3/100,2),     'NZ_kolicina_3' => $this->NZ_kolicina_3,  'NZ_rabat_3' => $this->NZ_rabat_3,  

            'GK_id' => $this->GK_id,      'GK_cijena' => round($this->GK_cijena/100,2),     'GK_kolicina' => $this->GK_kolicina,  'GK_rabat' => $this->GK_rabat,  
            'GK_id_2' => $this->GK_id_2,      'GK_cijena_2' => round($this->GK_cijena_2/100,2),     'GK_kolicina_2' => $this->GK_kolicina_2,  'GK_rabat_2' => $this->GK_rabat_2,  
            'GK_id_3' => $this->GK_id_3,      'GK_cijena_3' => round($this->GK_cijena_3/100,2),     'GK_kolicina_3' => $this->GK_kolicina_3,  'GK_rabat_3' => $this->GK_rabat_3,  

            'RK_id' => $this->RK_id,      'RK_cijena' => round($this->RK_cijena/100,2),     'RK_kolicina' => $this->RK_kolicina,  'RK_rabat' => $this->RK_rabat,  
            'RK_id_2' => $this->RK_id_2,      'RK_cijena_2' => round($this->RK_cijena_2/100,2),     'RK_kolicina_2' => $this->RK_kolicina_2,  'RK_rabat_2' => $this->RK_rabat_2,  
            'RK_id_3' => $this->RK_id_3,      'RK_cijena_3' => round($this->RK_cijena_3/100,2),     'RK_kolicina_3' => $this->RK_kolicina_3,  'RK_rabat_3' => $this->RK_rabat_3,  

            'TH_id' => $this->TH_id,      'TH_cijena' => round($this->TH_cijena/100,2),     'TH_kolicina' => $this->TH_kolicina,  'TH_rabat' => $this->TH_rabat,  
            'TH_id_2' => $this->TH_id_2,      'TH_cijena_2' => round($this->TH_cijena_2/100,2),     'TH_kolicina_2' => $this->TH_kolicina_2,  'TH_rabat_2' => $this->TH_rabat_2,  
            'TH_id_3' => $this->TH_id_3,      'TH_cijena_3' => round($this->TH_cijena_3/100,2),     'TH_kolicina_3' => $this->TH_kolicina_3,  'TH_rabat_3' => $this->TH_rabat_3,  

            'CN_id' => $this->CN_id,      'CN_cijena' => round($this->CN_cijena/100,2),     'CN_kolicina' => $this->CN_kolicina,  'CN_rabat' => $this->CN_rabat,  
            'CN_id_2' => $this->CN_id_2,      'CN_cijena_2' => round($this->CN_cijena_2/100,2),     'CN_kolicina_2' => $this->CN_kolicina_2,  'CN_rabat_2' => $this->CN_rabat_2,  
            'CN_id_3' => $this->CN_id_3,      'CN_cijena_3' => round($this->CN_cijena_3/100,2),     'CN_kolicina_3' => $this->CN_kolicina_3,  'CN_rabat_3' => $this->CN_rabat_3,  

            'X01_id' => $this->X01_id,    'X01_cijena' => round($this->X01_cijena/100,2),   'X01_kolicina' => $this->X01_kolicina,  'X01_rabat' => $this->X01_rabat,  
            'X02_id' => $this->X02_id,    'X02_cijena' => round($this->X02_cijena/100,2),   'X02_kolicina' => $this->X02_kolicina,  'X02_rabat' => $this->X02_rabat,  
            'X03_id' => $this->X03_id,    'X03_cijena' => round($this->X03_cijena/100,2),   'X03_kolicina' => $this->X03_kolicina,  'X03_rabat' => $this->X03_rabat,  

            'X04_id' => $this->X04_id,    'X04_cijena' => round($this->X04_cijena/100,2),   'X04_kolicina' => $this->X04_kolicina,  'X04_rabat' => $this->X04_rabat,  
            'X04_id_2' => $this->X04_id_2,    'X04_cijena_2' => round($this->X04_cijena_2/100,2),   'X04_kolicina_2' => $this->X04_kolicina_2,  'X04_rabat_2' => $this->X04_rabat_2,  
            'X04_id_3' => $this->X04_id_3,    'X04_cijena_3' => round($this->X04_cijena_3/100,2),   'X04_kolicina_3' => $this->X04_kolicina_3,  'X04_rabat_3' => $this->X04_rabat_3,  

            'X05_id' => $this->X05_id,    'X05_cijena' => round($this->X05_cijena/100,2),   'X05_kolicina' => $this->X05_kolicina,  'X05_rabat' => $this->X05_rabat,  
            'X05_id_2' => $this->X05_id_2,    'X05_cijena_2' => round($this->X05_cijena_2/100,2),   'X05_kolicina_2' => $this->X05_kolicina_2,  'X05_rabat_2' => $this->X05_rabat_2,  
            'X05_id_3' => $this->X05_id_3,    'X05_cijena_3' => round($this->X05_cijena_3/100,2),   'X05_kolicina_3' => $this->X05_kolicina_3,  'X05_rabat_3' => $this->X05_rabat_3,  

            'X06_id' => $this->X06_id,    'X06_cijena' => round($this->X06_cijena/100,2),   'X06_kolicina' => $this->X06_kolicina,  'X06_rabat' => $this->X06_rabat,  
            'X07_id' => $this->X07_id,    'X07_cijena' => round($this->X07_cijena/100,2),   'X07_kolicina' => $this->X07_kolicina,  'X07_rabat' => $this->X07_rabat,  
            'X08_id' => $this->X08_id,    'X08_cijena' => round($this->X08_cijena/100,2),   'X08_kolicina' => $this->X08_kolicina,  'X08_rabat' => $this->X08_rabat,  
            'X09_id' => $this->X09_id,    'X09_cijena' => round($this->X09_cijena/100,2),   'X09_kolicina' => $this->X09_kolicina,  'X09_rabat' => $this->X09_rabat,  
            'X10_id' => $this->X10_id,    'X10_cijena' => round($this->X10_cijena/100,2),   'X10_kolicina' => $this->X10_kolicina,  'X10_rabat' => $this->X10_rabat,  
            'X11_id' => $this->X11_id,    'X11_cijena' => round($this->X11_cijena/100,2),   'X11_kolicina' => $this->X11_kolicina,  'X11_rabat' => $this->X11_rabat,  

            'X12_id' => $this->X12_id,    'X12_cijena' => round($this->X12_cijena/100,2),   'X12_kolicina' => $this->X12_kolicina,  'X12_rabat' => $this->X12_rabat,  
            'X12_id_2' => $this->X12_id_2,    'X12_cijena_2' => round($this->X12_cijena_2/100,2),   'X12_kolicina_2' => $this->X12_kolicina_2,  'X12_rabat_2' => $this->X12_rabat_2,  
            'X12_id_3' => $this->X12_id_3,    'X12_cijena_3' => round($this->X12_cijena_3/100,2),   'X12_kolicina_3' => $this->X12_kolicina_3,  'X12_rabat_3' => $this->X12_rabat_3,  

            'X13_id' => $this->X13_id,    'X13_cijena' => round($this->X13_cijena/100,2),   'X13_kolicina' => $this->X13_kolicina,  'X13_rabat' => $this->X13_rabat,  
            'X13_id_2' => $this->X13_id_2,    'X13_cijena_2' => round($this->X13_cijena_2/100,2),   'X13_kolicina_2' => $this->X13_kolicina_2,  'X13_rabat_2' => $this->X13_rabat_2,  
            'X13_id_3' => $this->X13_id_3,    'X13_cijena_3' => round($this->X13_cijena_3/100,2),   'X13_kolicina_3' => $this->X13_kolicina_3,  'X13_rabat_3' => $this->X13_rabat_3,  
            
            'X14_id' => $this->X14_id,    'X14_cijena' => round($this->X14_cijena/100,2),   'X14_kolicina' => $this->X14_kolicina,  'X14_rabat' => $this->X14_rabat,  
            'X15_id' => $this->X15_id,    'X15_cijena' => round($this->X15_cijena/100,2),   'X15_kolicina' => $this->X15_kolicina,  'X15_rabat' => $this->X15_rabat,  

            'X16_id' => $this->X16_id,    'X16_cijena' => round($this->X16_cijena/100,2),   'X16_kolicina' => $this->X16_kolicina,  'X16_rabat' => $this->X16_rabat, 
            'X16_id_2' => $this->X16_id_2,    'X16_cijena_2' => round($this->X16_cijena_2/100,2),   'X16_kolicina_2' => $this->X16_kolicina_2,  'X16_rabat_2' => $this->X16_rabat_2, 
            'X16_id_3' => $this->X16_id_3,    'X16_cijena_3' => round($this->X16_cijena_3/100,2),   'X16_kolicina_3' => $this->X16_kolicina_3,  'X16_rabat_3' => $this->X16_rabat_3, 
            'X16_id_4' => $this->X16_id_4,    'X16_cijena_4' => round($this->X16_cijena_4/100,2),   'X16_kolicina_4' => $this->X16_kolicina_4,  'X16_rabat_4' => $this->X16_rabat_4, 
            'X16_id_5' => $this->X16_id_5,    'X16_cijena_5' => round($this->X16_cijena_5/100,2),   'X16_kolicina_5' => $this->X16_kolicina_5,  'X16_rabat_5' => $this->X16_rabat_5, 
            

            'usluga_id'             =>$this->usluga_id,
            'usluga_naziv'          =>$usluga_opis,
            'usluga_cijena'         =>round($usluga_cijena/100,2),

            'ukupna_cijena'         =>round($this->ukupna_cijena/100,2),
            
            'nacin_placanja'        =>$this->nacin_placanja,
            'nacin_placanja_naziv'  =>$this->nacin_placanja==1?'Gotovina':'Žiralno',
            
            'status'                =>$this->status,
            'status_naziv'          => Config::get('turbine.statusi_predracuna.'.$this->status),
            
            'garancija'             =>$this->garancija,
            'garancija_naziv'       => Config::get('turbine.garancije.'.$this->garancija),

            'garancija_el'             =>$this->garancija_el,
            'garancija_el_naziv'       => Config::get('turbine.garancije_el.'.$this->garancija_el),
            
            
            'lokacija'             =>$this->lokacija,
            'lokacija_naziv'       =>$this->lokacija=='S'?'Servis':'Radnja',
            
            'racun_nota'           =>$this->racun_nota,
            'skinuto_sa_stanja'    =>$this->skinuto_sa_stanja
 
           
        ];
    }
}
