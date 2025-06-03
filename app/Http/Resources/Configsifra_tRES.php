<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

use App\Configsifra;


class Configsifra_tRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $redovi=Configsifra::select('polje')->where('tabela', $this->tabela)->get();
        
return $redovi;
/*
        foreach ($red as $redovi) {
          $item = Configsifra::select('sifra', 'opis')
              ->WHERE('polje', $red->polje)
              ->get();
              
          
          return $item;
        }
*/
            
           
        
    }
}
