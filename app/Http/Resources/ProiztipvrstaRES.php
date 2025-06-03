<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ProiztipvrstaRES extends JsonResource
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
            'naziv'=>$this->naziv,
            'naziv_2'=>substr($this->naziv, 16,20),
            'naziv_3'=>substr($this->naziv, 32,20)

        ];
    }
}
