<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
// 10.11.2020
use App\Mattip;
use App\Mattipvrsta;
use App\Materijal;
use App\Proizvod;
use App\Element;

class ElementRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

//if ($this->sklop===0){
  //  $mattip ->naziv='--';
  //  $materijal ->naziv='--';

//}else{
        $mattip = Mattip::find($this->mattip_id);// 10.11.2020

        $materijal = Materijal::find($this->materijal_id);// 10.11.2020

        if ($mattip){
                $naziv_tipa_materijala=$mattip->naziv;
        }else{
            $naziv_tipa_materijala='-';
        }

    
        if ($materijal){
            $naziv_materijala=$materijal->naziv;
            $mattipvrsta = Mattipvrsta::find($materijal->mattipvrsta_id);// 10.11.2020
            $jedinica_mjere=$mattipvrsta->jed_mjere;
        }else{
            $naziv_materijala='-';
            $jedinica_mjere='-';
        }


        //}   
        $proizvod = Proizvod::find($this->proizvod_id);// 10.11.2020

        /// podaci o nadređenom elementu koji mora biti iz istog proizvoda
        //$nad_element = Element::find($this->id_nadredjenog)

        $nad_element = Element::where([
            ['id',$this->id_nadredjenog],
            ['proizvod_id',$this->proizvod_id]
        ])->first();// očekujemo samo jedan element ili null

        
        if($nad_element){
            $nad_element_naziv = $this->id_nadredjenog !== $this->id ? $nad_element->naziv: $nad_element->naziv.' GREŠKA: mora biti neki drugi element ili sam proizvod ('.$proizvod->naziv.')';//$nad_element->naziv :

        }else{ // ako nije definisan nadređeni element, onda je to sam proizvod
            $nad_element_naziv = $this->id_nadredjenog===0 ? $proizvod->naziv :'mora se definisati, npr. proizvod ('.$proizvod->naziv.')';

        }
        

        return [
            'id'=>$this->id,
            'proizvod_id'=>$this->proizvod_id,
            'naziv'=>$this->naziv,
            'mattip_id'=>$this->mattip_id,
            'mattip_naziv'=> $this->sklop===0 ? $naziv_tipa_materijala : '-', // 10.11.2020
            'materijal_id'=>$this->materijal_id,
            'materijal_naziv'=> $this->sklop===0 ? $naziv_materijala : '-', // 10.11.2020
            'sklop'=>$this->sklop,
            //'sklop'=>$this->sklop===1?true:false,
            
            'id_nadredjenog'   => $this->id_nadredjenog !== $this->id ? $this->id_nadredjenog : 0,
            'naziv_nadredjenog'=> $nad_element_naziv,

            'jed_mjere'=>$jedinica_mjere,



    ////  OSOBINE MATERIJALA  ////////////////////////////
            'el_lab_01'=> $this->sklop===0 ? $mattip->elab01 : '',         
            'el_int_01'=> $this->elint_01/1000, // podatak
            'el_jm_01' => $this->sklop===0 ? $mattip->ejed01 : '',
    
            'el_lab_02'=> $this->sklop===0 ? $mattip->elab02 : '',         
            'el_int_02'=> $this->elint_02/1000, // podatak
            'el_jm_02' => $this->sklop===0 ? $mattip->ejed02 : '',
            
            'el_lab_03'=> $this->sklop===0 ? $mattip->elab03 : '',         
            'el_int_03'=> $this->elint_03/1000, // podatak
            'el_jm_03' => $this->sklop===0 ? $mattip->ejed03 : '',
      
            'el_lab_04'=> $this->sklop===0 ? $mattip->elab04 : '',         
            'el_int_04'=> $this->elint_04/1000, // podatak
            'el_jm_04' => $this->sklop===0 ? $mattip->ejed04 : '',
      
            'el_lab_05'=> $this->sklop===0 ? $mattip->elab05 : '',         
            'el_int_05'=> $this->elint_05/1000, // podatak
            'el_jm_05' => $this->sklop===0 ? $mattip->ejed05 : '',
      
            'el_lab_06'=> $this->sklop===0 ? $mattip->elab06 : '',         
            'el_int_06'=> $this->elint_06/1000, // podatak
            'el_jm_06' => $this->sklop===0 ? $mattip->ejed06 : '',
       
            'el_lab_07'=> $this->sklop===0 ? $mattip->elab07 : '',         
            'el_int_07'=> $this->elint_07/1000, // podatak
            'el_jm_07' => $this->sklop===0 ? $mattip->ejed07 : '',

      /*
    ////  SELECT LISTE  ////////////////////////////
            'el_lab_21'=> $this->sklop===0 ? $mattip->elab21 : '',         
            'el_var_21'=> $this->elvar_21, // podatak iz liste
            'el_jm_21' => $this->sklop===0 ? $mattip->ejed21 : '',
      
            'el_lab_22'=> $this->sklop===0 ? $mattip->elab22 : '',         
            'el_var_22'=> $this->elvar_22, // podatak iz liste
            'el_jm_22' => $this->sklop===0 ? $mattip->ejed22 : '',
      
            'el_lab_23'=> $this->sklop===0 ? $mattip->elab23 : '',         
            'el_var_23'=> $this->elvar_23, // podatak iz liste
            'el_jm_23' => $this->sklop===0 ? $mattip->ejed23 : '',
       
*/            
    ////  AREA POLJA  ////////////////////////////
            'el_lab_31'=> $this->sklop===0 ? $mattip->elab31 : '',         
            'el_txt_31'=> $this->eltxt_31 // podatak iz area polja

        ];

        
    }
}
