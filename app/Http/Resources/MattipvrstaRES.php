<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Mattipvrsta;
use App\Mattip;
use App\Masinlokacija;

class MattipvrstaRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        $mattip = Mattip::find($this->mattip_id);// 24.01.2021
        $masinlokacija = Masinlokacija::find($this->lokacija_id);// 26.01.2021


        return [
            'id'            =>$this->id,
            'mattip_id'     =>$this->mattip_id,
            'dodatni_izbor' =>$this->dodatni_izbor,

            'naziv'    =>$this->naziv,
            'jed_mjere'=>$this->jed_mjere,

            'lokacija_id'  =>$this->lokacija_id,
            'teh_koef'     =>$masinlokacija->teh_koef/100,

            'k_vm_01'=>$this->k_vm_01/$mattip->kdec01,
            'k_vm_02'=>$this->k_vm_02/$mattip->kdec02,
            'k_vm_03'=>$this->k_vm_03/$mattip->kdec03,
            'k_vm_04'=>$this->k_vm_04/$mattip->kdec04,
            'k_vm_05'=>$this->k_vm_05/$mattip->kdec05,
            'k_vm_06'=>$this->k_vm_06/$mattip->kdec06,
            'k_vm_07'=>$this->k_vm_07/$mattip->kdec07

        ];
    }
}
