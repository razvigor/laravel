<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Turbinadio;
use App\Turbinadiotip;
use App\Turbinadiopodtip;
use App\Turbinadiophoto;

class TurbinadioRES_WS_x extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        /// SLIKE ////////////////////////////////////////

        $slike=Turbinadiophoto::selectRaw('
                photo
        ') 
        ->where('turbinadio_id', '=',      $this->id)->get();


        $ekvivalent  = Turbinadio::where('id','=',$this->id)->value('ekvivalent_za_id');


        return [
            'id'=>$this->id,
            'opis'=>$this->opis,
            'oznaka'=>$this->oznaka,
            'tip_id'=>$this->turbinadiotip_id,
            'tip_naziv'         => Turbinadiotip::where('id','=',Turbinadio::where('id','=',$this->id)->value('turbinadiotip_id'))->value('naziv_2'),
            
            'podtip_id'=>$this->turbinadiopodtip_id,
            'podtip_naziv'      => Turbinadiopodtip::where('id','=',Turbinadio::where('id','=',$this->id)->value('turbinadiopodtip_id'))->value('naziv'),
            
            //'ekvivalent_za_id'=>$this->ekvivalent_za_id,

   
            
            'na_stanju'   =>$this->id===0? 0 :Turbinadio::where('id','=',$this->id)->sum(\DB::raw('na_stanju_s + na_stanju_r')),
            'u_servisu'   =>Turbinadio::where('id','=',$this->id)->sum(\DB::raw('na_stanju_s')),
            'u_radnji'    =>Turbinadio::where('id','=',$this->id)->sum(\DB::raw('na_stanju_r')),
            'cijena'      =>$this->id===0?'-':Turbinadio::where('id','=',$this->id)->value('cijena')/100,
            'cijena_as'   =>$this->id===0?'-':Turbinadio::where('id','=',$this->id)->value('cijena_as')/100,
            'cijena_ts'   =>$this->id===0?'-':Turbinadio::where('id','=',$this->id)->value('cijena_ts')/100,
            
            'slike' => JsonResource::collection($slike),
    
            // niz ekvivalentnih dijelova (može biti prazan)
            //'ekvivalenti_old' => JsonResource::collection($ekvivalenti),
            'ekvivalenti' => Turbinadio::leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
            ->selectRaw('
                            turbinadijelovi.id as id_ekvivalenta,
                            turbinadijelovi.opis,
                            turbinadijelovi.oznaka,
                            round(turbinadijelovi.cijena/100, 2) as cijena,
                            round(turbinadijelovi.cijena_as/100, 2) as cijena_as,
                            round(turbinadijelovi.cijena_ts/100, 2) as cijena_ts,
                            turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                            turbinadijelovi.na_stanju_s,
                            turbinadijelovi.na_stanju_r,
                            GROUP_CONCAT(turbinadiophotos.photo) as slike
                            
                        ') 
            ->where('turbinadijelovi.id', '<>', $this->id)
            ->Where('ekvivalent_za_id', '=', $ekvivalent)
            ->groupby(  'turbinadijelovi.id',
                        'turbinadijelovi.opis',
                        'turbinadijelovi.oznaka',
                        'turbinadijelovi.cijena',
                        'turbinadijelovi.cijena_as',
                        'turbinadijelovi.cijena_ts',
                        'turbinadijelovi.na_stanju_s',
                        'turbinadijelovi.na_stanju_r',
                        'turbinadijelovi.ekvivalent_za_id')
            ->get()

        ];
    }
}
