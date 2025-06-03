<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
// 10.11.2020
use App\Element;
use App\Masina;
use App\Alat;
use App\Alatnaziv;
use App\Operacija;

class OperacijaRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


  
        $masina = Masina::find($this->masina_id);// 10.11.2020
        $alat = Alat::find($this->alat_id);// 10.11.2020
        $alat_naziv = Alatnaziv::find($alat->alatnaziv_id);// 10.11.2020

        return [
            'id'=>$this->id,
            'element_id'=>$this->element_id,
            'redni_broj'=>$this->redni_broj,
            'masina_id'=>$this->masina_id,
            'masina_naziv'=> $masina->name, // 10.11.2020
            
            'br_rr'=>$this->br_rr, // podatak
            'br_pr'=>$this->br_pr, // podatak
            'opis'=>$this->opis, // podatak
            'parametri'=>$this->parametri, // podatak

            'alat_id'=>$this->alat_id,
            'alat_naziv'=> $alat_naziv->naziv, // 10.11.2020

            'vrijeme'=>$this->vrijeme/1000 // podatak // vrijeme se bilježi na 3 decimale

        ];
    }
}
