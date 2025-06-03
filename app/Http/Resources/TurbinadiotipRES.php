<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class TurbinadiotipRES extends JsonResource
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
            'id'                =>$this->id,
            'oznaka'            =>$this->oznaka,
            'naziv'             =>$this->naziv,
            'naziv_2'           =>$this->naziv_2,
            'dodatni_dijelovi'  =>$this->dodatni_dijelovi,
            'u_setu'            =>$this->u_setu
           
        ];
    }
}
