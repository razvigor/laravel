<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Configsifra;
use Carbon\Carbon;
use DB;


class Kupac_WS_RES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $naziv_statusa=DB::table('configsifre')
        ->where('tabela', '=', 'kupci')
        ->where('sifra', '=', $this->status)
        ->pluck('opis')->first();  // "5"


        return [
            'id'            =>$this->id,
            'naziv'         =>$this->naziv,
            'jmb_jib'       =>$this->jmb_jib,
            'ulica_i_broj'  =>$this->ulica_i_broj ? $this->ulica_i_broj : '-',
            'post_br_mjesto'=>$this->post_br_mjesto ? $this->post_br_mjesto : '-',
            'drzava'        =>$this->drzava ? $this->drzava : '-',
            'kontakt_osoba' =>$this->kontakt_osoba ? $this->kontakt_osoba : '-',
            'mail'          =>$this->mail ? $this->mail : '-',
            'telefon'       =>$this->telefon ? $this->telefon : '-',
            'status'        =>$this->status,
            'naziv_statusa' =>$naziv_statusa, 
            'username'      =>$this->username
            //'password'      =>$this->password

        ];
    }
}
