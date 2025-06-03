<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Alatnaziv;


class AlatRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $alat_naziv = Alatnaziv::find($this->alatnaziv_id);// 10.11.2020

        return [
            'id'=>$this->id,
            'alat_naziv'=>$alat_naziv->naziv

        ];
    }
}
