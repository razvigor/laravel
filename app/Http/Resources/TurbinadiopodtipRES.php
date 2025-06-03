<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class TurbinadiopodtipRES extends JsonResource
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
            'turbinadiotip_id'  =>$this->turbinadiotip_id,
            'naziv'             =>$this->naziv
           
        ];
    }
}
