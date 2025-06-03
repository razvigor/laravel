<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

use App\Materijal;


class MattipRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $materijali=Materijal::select('id', 'naziv')->where('mattip_id', $this->id)->get();

        return [
            'id'=>$this->id,
            'naziv'=>$this->naziv,

            'elab_01'=>$this->elab01,
            'ejed_01'=>$this->ejed01,
            'elab_02'=>$this->elab02,
            'ejed_02'=>$this->ejed02,
            'elab_03'=>$this->elab03,
            'ejed_03'=>$this->ejed03,
            'elab_04'=>$this->elab04,
            'ejed_04'=>$this->ejed04,
            'elab_05'=>$this->elab05,
            'ejed_05'=>$this->ejed05,
            'elab_06'=>$this->elab06,
            'ejed_06'=>$this->ejed06,
            'elab_07'=>$this->elab07,
            'ejed_07'=>$this->ejed07,
            'elab_21'=>$this->elab21,
            'ejed_21'=>$this->ejed21,
            'elab_22'=>$this->elab22,
            'ejed_22'=>$this->ejed22,
            'elab_23'=>$this->elab23,
            'ejed_23'=>$this->ejed23,
            'elab_31'=>$this->elab31,


            'materijali'=>$materijali
           
        ];
    }
}
