<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

use App\Parametar;

class ProizvodRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

$parametar=Parametar::findOrFail(1);;

        return [
            'id'=>$this->id,
            'naziv'=>$this->naziv,
            'naziv_2'=>substr($this->naziv, 16,20),
            'naziv_3'=>substr($this->naziv, 32,20),
            'naziv_4'=>substr($this->naziv, 48,20),
            'sifra_proizvoda'=>$this->sifra_proizvoda,
            'proizvoda_u_smjeni'=>$this->proizvoda_u_smjeni,
            'opis'=>$this->opis,
            'datum'=>Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d-m-Y'),
            'parametar_naziv'=>$parametar->naziv,
            'parametar_vrijednost'=>$parametar->vrijednost/100
            
        ];
    }
}
