<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Turbinadio;
use App\Turbinadiotip;
use App\Turbinadiopodtip;
use App\Turbinadiophoto;

use DB;

class TurbinadijeloviRES_za_listu extends JsonResource
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
            'id'                     =>$this->id,
            
            //'opis'                   =>$this->opis? $this->opis: '-',
            'oznaka'                 =>$this->oznaka,
            'oznaka_list'            =>$this->oznaka,   //   15.11.2023 izbaceno: =>$this->turbinadiopodtip_id?$podvrsta_djela->naziv.': '.$this->oznaka:$this->oznaka,

            //'oznaka_list_2'=>substr($this->turbinadiopodtip_id?$podvrsta_djela->naziv.': '.$this->oznaka:$this->oznaka, 16,20),
            //'oznaka_list_3'=>substr($this->turbinadiopodtip_id?$podvrsta_djela->naziv.': '.$this->oznaka:$this->oznaka, 32,20),


            'turbinadiotip_oznaka'             =>$this->oznaka_tipa,

            'cijena'                 =>$this->cijena/100,  //želimo 2 decimale      
            'cijena_as'                 =>$this->cijena_as/100,  //želimo 2 decimale  
            'cijena_ts'                 =>$this->cijena_ts/100,  //želimo 2 decimale  
            'na_stanju_s'            =>$this->na_stanju_s? $this->na_stanju_s :0,
            'na_stanju_r'            =>$this->na_stanju_r? $this->na_stanju_r :0,
            'na_stanju_p'            =>$this->na_stanju_p? $this->na_stanju_p :0


        ];
    }
}
