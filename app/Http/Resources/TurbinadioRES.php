<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class TurbinadioRES extends JsonResource
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
            'turbinadiotip_id'=>$this->turbinadiotip_id,
            'turbinadiopodtip_id'=>$this->turbinadiopodtip_id,
            'ekvivalent_za_id'=>$this->ekvivalent_za_id
        ];
    }
}
