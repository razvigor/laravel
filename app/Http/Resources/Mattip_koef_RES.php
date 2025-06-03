<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;


class Mattip_koef_RES extends JsonResource
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
            'id'=>$this->id,
            'naziv'=>$this->naziv,

            'klab01'=>$this->klab01,  'kdef01'=>$this->kdef01,  'kdec01'=>$this->kdec01,  'kjed01'=>$this->kjed01,
            'klab02'=>$this->klab02,  'kdef02'=>$this->kdef02,  'kdec02'=>$this->kdec02,  'kjed02'=>$this->kjed02,
            'klab03'=>$this->klab03,  'kdef03'=>$this->kdef03,  'kdec03'=>$this->kdec03,  'kjed03'=>$this->kjed03,
            'klab04'=>$this->klab04,  'kdef04'=>$this->kdef04,  'kdec04'=>$this->kdec04,  'kjed04'=>$this->kjed04,
            'klab05'=>$this->klab05,  'kdef05'=>$this->kdef05,  'kdec05'=>$this->kdec05,  'kjed05'=>$this->kjed05,
            'klab06'=>$this->klab06,  'kdef06'=>$this->kdef06,  'kdec06'=>$this->kdec06,  'kjed06'=>$this->kjed06,
            'klab07'=>$this->klab07,  'kdef07'=>$this->kdef07,  'kdec07'=>$this->kdec07,  'kjed07'=>$this->kjed07


           
        ];
    }
}
