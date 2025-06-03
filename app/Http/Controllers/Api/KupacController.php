<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\KupacRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kupac;
use App\StavkaRN;
use App\Http\Resources\KupacRES;
use App\Http\Resources\Kupac_WS_RES;


class KupacController extends Controller
{

    
    /// prikaz svih kupaca 
    public function index_all()
    {
       $kupci=Kupac::where('fiktivni', 0)
                   ->orderBy('naziv', 'asc')
                   ->get(); 
                            //->paginate(10);

        return KupacRES::collection($kupci);
        
    }

    /// provjera kupaca za Web Shop
    public function index_WS($user, $pass)
    {
       $kupci=Kupac::where('fiktivni', 0)
                   ->where('username', $user)
                   ->where('password', $pass)
                   ->orderBy('naziv', 'asc')
                   ->get(); 
                            //->paginate(10);

        return Kupac_WS_RES::collection($kupci);
        
    }

    /// prikaz svih kupaca za Web Shop
    public function index_WS_all()
    {
       $kupci=Kupac::where('fiktivni', 0)
                   ->whereNotNull('username')
                   ->orderBy('naziv', 'asc')
                   ->get(); 
                            //->paginate(10);

        return Kupac_WS_RES::collection($kupci);
        
    }


    /// prikaz svih kupaca u listi za izbor (uključujući i fiktivnog)
    public function index_lista()
    {
       $kupci=Kupac::orderBy('naziv', 'asc')
                   ->get(); 
                            //->paginate(10);

        return KupacRES::collection($kupci);
        
    }

    
    /// prikaz svih kupaca u statusu
    public function index($status)
    {
        $kupci=Kupac::where('status', $status)
                    ->where('fiktivni', 0)
                    ->get();

        return KupacRES::collection($kupci);
        //return Element->all();
        //return view('elementi.index', ['elementi' => $model->all()]);
        
    }

    // kreiranje i ažuriranje kupaca
    public function store(Request $request)
    {
        // nađi kupca
        $kupac=$request->isMethod('put') ? Kupac::findOrFail($request->id) : new Kupac;



        if($request->input('naziv')!==''){

            //$mattip = Mattip::find($request->input('mattip_id'));// 24.01.2021

            $kupac->id             = $request->input('id');


            $kupac->naziv          = $request->input('naziv'); 
            $kupac->jmb_jib        = $request->input('jmb_jib'); 
            $kupac->ulica_i_broj   = $request->input('ulica_i_broj'); 
            $kupac->post_br_mjesto = $request->input('post_br_mjesto'); 
            $kupac->drzava         = $request->input('drzava');
            $kupac->kontakt_osoba  = $request->input('kontakt_osoba');   
            $kupac->mail           = $request->input('mail');   
            $kupac->telefon        = $request->input('telefon');     
            $kupac->status         = $request->input('status');
            $kupac->username       = $request->input('username');
            $kupac->password       = $request->input('password');
 


            if($kupac->save()){
                return new KupacRES($kupac);
            }

        }


    }

    /// prikaz svih kupaca koji se pojavljuju u radnom nalogu
    public function kupci_rn($rnalog_id)
    {


            $svi = StavkaRN::selectraw('0 as kupac_id, "-svi kupci-" as kupac_naziv');
            $kupci_rn =  StavkaRN::join('kupci', 'stavkern.kupac_id', '=', 'kupci.id')
            ->selectRaw('
                        kupci.id as kupac_id,
                        kupci.naziv as kupac_naziv
                    ')
            ->where('stavkern.rnalog_id','=',$rnalog_id)
            ->union($svi)
            ->orderBy('kupac_naziv', 'asc')
            ->get();

            return  $kupci_rn;
    }


}
