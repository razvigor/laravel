<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class RnalogRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {



        return [
            'id'=>$this->id,
            'broj_RN'=>$this->broj_RN,
            'opis'=>$this->opis,
            'broj_dana'=>$this->broj_dana,
            'datum_kreiranja'=>Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'datum_montaze'=>Carbon::createFromFormat('Y-m-d', $this->datum_montaze)->format('d-m-Y'),
            'datum_isporuke'=>Carbon::createFromFormat('Y-m-d', $this->datum_isporuke)->format('d-m-Y')
            
        ];
    }
}
