<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Turbinadio;
use App\Turbinadiotip;
use App\Turbinadiopodtip;
use App\Turbinadiophoto;

use DB;

class Turbinadijelovi_WS_RES extends JsonResource
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
            'id'                     =>$this->id,
            'oznaka'                 =>$this->oznaka,
            'opis'                   =>$this->opis, 


            'oznaka_tipa'             =>$this->oznaka_tipa,
            'naziv_tipa'              =>$this->naziv_tipa,
            'naziv_podtipa'             =>$this->naziv_podtipa


        ];
    }
}
