<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Mattipvrsta;
use App\Mattip;
use App\Mattipoznaka;

class MaterijaliRES extends JsonResource
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
        $matvrsta = Mattipvrsta::find($this->mattipvrsta_id);// 26.01.2021
        
        $mattipoznaka = Mattipoznaka::find($this->mattipoznaka_id);// 18.08.2021


        return [
            'id'             =>$this->id,
            'naziv'          =>$this->naziv,
            'dodatni_opis'   =>$this->dodatni_opis,
            'slozeni_naziv'  =>$this->naziv,
            'mattip_id'      =>$this->mattip_id,
            'mattipvrsta_id' =>$this->mattipvrsta_id,
            
            // izvedena polja
            'naziv_tipa'     =>$mattip->naziv,
            'naziv_vrste'    =>$matvrsta->naziv,
            'jed_mjere'      =>$matvrsta->jed_mjere,

            
            'vrsta_podloge'  =>$this->vrsta_podloge,
            'vrsta_okova'    =>$this->vrsta_okova,       // slobodan unos
            'proizvodjac'    =>$this->proizvodjac,
            'namjena'        =>$this->namjena,
            'forma_oblik'    =>$this->forma_oblik,

            'sp_tezina'      =>$this->sp_tezina,  
            'gustina'        =>$this->gustina, 
            'tvrdoca'        =>$this->tvrdoca,      

            'klasa'          =>$this->klasa,     
            'br_linija'      =>$this->br_linija,
            'br_slojeva'     =>$this->br_slojeva,           
            'debljina'       =>$this->debljina,
            'sirina'         =>$this->sirina,                        
            'duz_razred'     =>$this->duz_razred,       

            'cijena'         =>$this->cijena/10000,  //želimo 4 decimale      
            'mattipoznaka_id'=>$this->mattipoznaka_id,
            'oznaka'         =>$this->mattipoznaka_id!==0 ? $mattipoznaka->oznaka : '',

            'lokacija_id'    => $this->lokacija_id,

            'kmat_01'        => $this->kmat_01/$mattip->kdec01,
            'kmat_02'        => $this->kmat_02/$mattip->kdec02,
            'kmat_03'        => $this->kmat_03/$mattip->kdec03,
            'kmat_04'        => $this->kmat_04/$mattip->kdec04,
            'kmat_05'        => $this->kmat_05/$mattip->kdec05,
            'kmat_06'        => $this->kmat_06/$mattip->kdec06,
            'kmat_07'        => $this->kmat_07/$mattip->kdec07
            
            


        ];
    }
}
