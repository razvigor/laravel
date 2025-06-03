<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Configsifra;
use Carbon\Carbon;
use DB;


class UslugaRES extends JsonResource
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
            'id'           =>$this->id,
            'naziv'         =>$this->naziv,
            'opis'         =>$this->opis,
            'cijena'       =>$this->cijena,
            'aktivna'      =>$this->aktivna

        ];
    }
}
