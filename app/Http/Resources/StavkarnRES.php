<?php

namespace App\Http\Resources;



use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Kupac;
use App\Proizvod;



class StavkarnRES extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


        $kupac = Kupac::find($this->kupac_id);
        $proizvod = Proizvod::find($this->proizvod_id);

        return [
            'id'=>$this->id,
            'r_br'=>$this->r_br,
            'rnalog_id'=>$this->rnalog_id,
            'kupac_id'=>$this->kupac_id,
            'kupac_naziv'=>$kupac->naziv,
            'proizvod_id'=>$this->proizvod_id,
            'proizvod_naziv'=>$proizvod->naziv,
            'proizvoda_u_smjeni'=>$proizvod->proizvoda_u_smjeni,
            'napomena'=>$this->napomena,
            'kolicina'=>$this->kolicina            
        ];
    }
}
