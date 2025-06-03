<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Mattip;
use App\Mattipoznaka;
use App\Mattipvrsta;


class MattipoznakaRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $mattip = Mattip::find($this->mattip_id);// 5.09.2021
        if ($this->mattip_id==10){
            $mattipvrsta =Mattipvrsta::find($this->natpis);// 5.09.2021

        }
        
        return [
            'id'            =>$this->id,
            'mattip_id'     =>$this->mattip_id,
            'naziv_tipa'    =>$mattip->naziv,
            'naziv_podtipa' =>$this->mattip_id==10?$mattipvrsta->naziv:'',
            'natpis'        =>$this->natpis,
            'oznaka'        =>$this->oznaka,
            'oznaka_2'      =>substr($this->oznaka, 16,20),
            'oznaka_3'      =>substr($this->oznaka, 32,20),            
            'internasifra'  =>$this->internasifra
           
        ];
    }
}
