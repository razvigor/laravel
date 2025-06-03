<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Turbinadio;
use App\Turbinadiotip;
use App\Turbinadiopodtip;
use App\Turbinadiophoto;

use DB;

class TurbinadijeloviRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {



        $vrsta_djela = Turbinadiotip::find($this->turbinadiotip_id);// 26.01.2021
        if ($this->turbinadiopodtip_id){
            $podvrsta_djela = Turbinadiopodtip::find($this->turbinadiopodtip_id);// 22.06.2022
        }


        $broj_slika=Turbinadiophoto::where('turbinadio_id', '=', $this->id)->count();

        $ekvivalenti = Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
        ->selectRaw('
        turbinadijelovi.id as id_ekvivalenta,
        turbinadijelovi.oznaka,
        turbinadijelovi.opis,
        turbinadijelovi.cijena/100 as cijena,
        turbinadijelovi.cijena_as/100 as cijena_as,
        turbinadijelovi.cijena_ts/100 as cijena_ts,
        turbinadijelovi.nab_cijena/100 as nab_cijena,
        turbinadijelovi.nab_c_fix,
        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
        turbinadijelovi.na_stanju_s,
        turbinadijelovi.na_stanju_r,
        (turbinadijelovi.limit_s + turbinadijelovi.limit_r) as "limit",
        turbinadijelovi.limit_s,
        turbinadijelovi.limit_r,
        count(turbinadiophotos.turbinadio_id) as "broj_slika"
                    ') 
->where('ekvivalent_za_id', '=', $this->ekvivalent_za_id)
->where('turbinadijelovi.id', '<>', $this->id)
->groupby(  'turbinadijelovi.id',
            'turbinadijelovi.oznaka',
            'turbinadijelovi.opis',
            'turbinadijelovi.cijena',//100 as cijena,
            'turbinadijelovi.cijena_as',//100 as cijena_as,
            'turbinadijelovi.cijena_ts',//100 as cijena_ts,
            'turbinadijelovi.nab_cijena',//100 as nab_cijena,
            'turbinadijelovi.nab_c_fix',
            'turbinadijelovi.na_stanju_s',
            'turbinadijelovi.na_stanju_r',
            'turbinadijelovi.limit_s',
            'turbinadijelovi.limit_r'
)
->get();



        return [
            'id'                     =>$this->id,
            
            'opis'                   =>$this->opis? $this->opis: '-',
            'oznaka'                 =>$this->oznaka,
            'oznaka_list'            =>$this->turbinadiopodtip_id?$podvrsta_djela->naziv.': '.$this->oznaka:$this->oznaka,

            'oznaka_list_2'=>substr($this->turbinadiopodtip_id?$podvrsta_djela->naziv.': '.$this->oznaka:$this->oznaka, 16,20),
            'oznaka_list_3'=>substr($this->turbinadiopodtip_id?$podvrsta_djela->naziv.': '.$this->oznaka:$this->oznaka, 32,20),

            'broj_slika'             =>$broj_slika,

            'turbinadiotip_id'       =>$this->turbinadiotip_id,

            'turbinadiopodtip_id'    =>$this->turbinadiopodtip_id,


            // niz ekvivalentnih dijelova (može biti prazan)
            'ekvivalenti' => JsonResource::collection($ekvivalenti),
            
            
            // izvedena polja

            'turbinadiotip_naziv'            =>$vrsta_djela->naziv_2,
            'turbinadiotip_oznaka'           =>$vrsta_djela->oznaka,
            'turbinadiotip_dodatni'          =>$vrsta_djela->dodatni_dijelovi,
            'turbinadiotip_u_setu'           =>$vrsta_djela->u_setu,


            'turbinadiopodtip_naziv'         =>$this->turbinadiopodtip_id?$podvrsta_djela->naziv:'-',
       

            'cijena'                 =>$this->cijena/100,  //želimo 2 decimale      
            'cijena_as'                 =>$this->cijena_as/100,  //želimo 2 decimale  
            'cijena_ts'                 =>$this->cijena_ts/100,  //želimo 2 decimale  
            'nab_cijena'             =>$this->nab_cijena/100,
            'nab_c_fix'              =>$this->nab_c_fix,
            'na_stanju_s'            =>$this->na_stanju_s? $this->na_stanju_s :0,
            'na_stanju_r'            =>$this->na_stanju_r? $this->na_stanju_r :0,
            'na_stanju_p'            =>$this->na_stanju_p? $this->na_stanju_p :0,
            'limit_s'                =>$this->limit_s,
            'limit_r'                =>$this->limit_r,
            'polica_s'               =>$this->polica_s? $this->polica_s : '-',
            'polica_r'               =>$this->polica_r? $this->polica_r : '-',
            'polica_p'               =>$this->polica_p? $this->polica_p : '-',
            'ekvivalent_za_id'       =>$this->ekvivalent_za_id


        ];
    }
}
