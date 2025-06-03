<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class TurbinadioslikeRES extends JsonResource
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
            'turbinadio_id'=>$this->turbinadio_id,
            'naziv_fajla'=>$this->photo,
            'url'=>'storage/pictures/'.$this->turbinadio_id.'/'.$this->photo

        ];
    }
}
