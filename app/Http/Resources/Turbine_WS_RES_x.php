<?php

namespace App\Http\Resources;

use DB;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Turbinadio;
use App\Turbinadiopodtip;
use App\Turbinadiophoto;



class Turbine_WS_RES_x extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $slike_X16=Turbinadiophoto::selectRaw('
            turbinadio_id,    
            photo
        ') 
        ->where('turbinadio_id', '=',      $this->X16)
        ->orWhere('turbinadio_id', '=',      $this->X16_2)
        ->orWhere('turbinadio_id', '=',      $this->X16_3)
        ->get();

        return [

            'id'                     =>$this->id,
            'oem'                    =>$this->oem,
            'opis'                   =>$this->opis?$this->opis:'-',
            'kompatibilni_brojevi'   =>$this->oem_comp,

            'slike_X16'   => JsonResource::collection($slike_X16)

        ];
    }
}
