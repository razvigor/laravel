<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Proiztipvrsta;

class ProizvrstamodeliRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        $proiztipvrsta = Proiztipvrsta::find($this->proiztipvrsta_id);// 26.01.2021
        

        return [
            'vrsta_id'        =>$this->proiztipvrsta_id,
            'vrsta_naziv'     =>$proiztipvrsta->naziv, // izvedeno polje

            'model_id'        =>$this->id,
            'model_naziv'     =>$this->naziv,
            'model_label'     =>$proiztipvrsta->naziv.': '.$this->naziv,            
            
            'aktivan'         =>$this->aktivan
            
            

            
            
            


        ];
    }
}
