<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

use App\Parametar;


class ParametarRES extends JsonResource
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

            'vrijednost'=>$this->vrijednost/100

           
        ];
    }
}
