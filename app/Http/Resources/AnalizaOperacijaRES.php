<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
// 10.11.2020
//use App\Element;
//use App\Masina;
//use App\Alat;
//use App\Alatnaziv;
use App\Operacija;

class AnalizaOperacijaRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


  
        //$masina = Masina::find($this->masina_id);// 10.11.2020
        //$alat = Alat::find($this->alat_id);// 10.11.2020
        //$alat_naziv = Alatnaziv::find($alat->alatnaziv_id);// 10.11.2020

        return [
            'id'=>$this->id,
            'br_us'=>$this->br_us // podatak

        ];
    }
}
