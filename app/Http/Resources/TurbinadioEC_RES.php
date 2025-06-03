<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class TurbinadioEC_RES extends JsonResource
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
            'opis'=>$this->opis,
            'oznaka'=>$this->oznaka,
            'cijena_fl'=>$this->cijena/100,
            'cijena_as'=>$this->cijena_as/100,
            'cijena_ts'=>$this->cijena_ts/100,
            'na_stanju'=>$this->na_stanju_r*1
        ];
    }
}
