<?php

namespace App\Http\Controllers\Api;

use DB;
use PDF;

use App\Http\Requests\TurbinadioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;
use App\Turbinadio;
use App\Turbinadiotip;
use App\Turbinadiophoto;

use App\Http\Resources\TurbinadioRES;
use App\Http\Resources\TurbinadijeloviRES;
use App\Http\Resources\TurbinadijeloviRES_za_listu; // skraćena verzija prethodnog
use App\Http\Resources\Turbinadijelovi_WS_RES; // skraćena verzija za Web

use App\Http\Resources\TurbinadioslikeRES;
use App\Http\Resources\TurbinadioEC_RES;
use App\Http\Resources\TurbinadioRES_WS_x;

class TurbinadioController extends Controller
{

    
    /// prikaz svih turbinadijelova 
    public function index()
    {
       $turbinadio=Turbinadio::orderBy('turbinadiopodtip_id', 'asc')
                             ->orderBy('oznaka', 'asc')

                            ->get(); 
                            //->paginate(5);

        return TurbinadijeloviRES::collection($turbinadio);
    }
 
    /// prikaz svih turbinadijelova za listu (samo neophodna polja) 
    public function index_lista()
    {

                        /*
                                $turbinadio=Turbinadio::orderBy('turbinadiopodtip_id', 'asc')
                                                    ->orderBy('oznaka', 'asc')
                                                    ->get(); 
                        */
                            $turbinadio = DB::table('turbinadijelovi')
                            ->join('turbinadiotipovi', 'turbinadiotipovi.id', '=', 'turbinadijelovi.turbinadiotip_id')
                            //->leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
                            ->selectRaw('turbinadijelovi.id, 
                                         turbinadijelovi.oznaka, 
                                         turbinadijelovi.cijena, 
                                         turbinadijelovi.cijena_as, 
                                         turbinadijelovi.cijena_ts, 
                                         turbinadijelovi.na_stanju_s, 
                                         turbinadijelovi.na_stanju_r, 
                                         turbinadijelovi.na_stanju_p, 

                                         turbinadiotipovi.oznaka as oznaka_tipa')
                            ->orderBy('turbinadiopodtip_id', 'asc')
                            ->orderBy('oznaka', 'asc')
                            ->get();
                            
                            ;

        return TurbinadijeloviRES_za_listu::collection($turbinadio);
    }


    /// prikaz svih turbinadijelova za WEB (samo neophodna polja) 
    public function index_WS()
    {

                            $turbinadio = DB::table('turbinadijelovi')
                            ->join('turbinadiotipovi', 'turbinadiotipovi.id', '=', 'turbinadijelovi.turbinadiotip_id')
                            ->leftjoin('turbinadiopodtipovi', 'turbinadiopodtipovi.id', '=', 'turbinadijelovi.turbinadiopodtip_id')
                            //->leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
                            ->selectRaw('turbinadijelovi.id, 
                                         turbinadijelovi.oznaka,
                                         turbinadijelovi.opis,
                                          

                                         turbinadiotipovi.naziv as naziv_tipa,
                                         turbinadiotipovi.oznaka as oznaka_tipa,
                                         turbinadiopodtipovi.naziv naziv_podtipa
                                         '
                                         )
                            ->orderBy('turbinadiopodtip_id', 'asc')
                            ->orderBy('oznaka', 'asc')
                            ->get();
                            
                            ;

        return Turbinadijelovi_WS_RES::collection($turbinadio);
    }

    /// prikaz svih turbinadijelova određenog podtipa za WEB (samo neophodna polja) 
    public function index_WS_podtip($podtip_id)
    {

                            $turbinadio = DB::table('turbinadijelovi')
                            ->join('turbinadiotipovi', 'turbinadiotipovi.id', '=', 'turbinadijelovi.turbinadiotip_id')
                            ->leftjoin('turbinadiopodtipovi', 'turbinadiopodtipovi.id', '=', 'turbinadijelovi.turbinadiopodtip_id')
                            //->leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
                            ->selectRaw('turbinadijelovi.id, 
                                         turbinadijelovi.oznaka,
                                         turbinadijelovi.opis,
                                          

                                         turbinadiotipovi.naziv as naziv_tipa,
                                         turbinadiotipovi.oznaka as oznaka_tipa,
                                         turbinadiopodtipovi.naziv naziv_podtipa
                                         ')
                            ->where('turbinadijelovi.turbinadiopodtip_id'    , '=', $podtip_id ) 
                            ->orderBy('turbinadiopodtip_id', 'asc')
                            ->orderBy('oznaka', 'asc')
                            ->get();
                            
                            ;

        return Turbinadijelovi_WS_RES::collection($turbinadio);
    }


    public function index_2($duzina_stranice, $tip_naziv, $opis, $oznaka)
    {
       //$turbinadio=Turbinadio::orderBy('oznaka', 'asc')

                            //->where([['opis','LIKE',"%".$opis."%"]])
                            //->where([['oznaka','LIKE',"%".$oznaka."%"]])
                            //->paginate(5);

                            $tip_naziv    = $tip_naziv  =='_' ? '%' :$tip_naziv;
                            $opis         = $opis       =='_' ? '%' :$opis;
                            
                            $oznaka       = $oznaka     =='_' ? '%' :$oznaka;
                            
                            $turbinadio = DB::table('turbinadijelovi')
                            ->join('turbinadiotipovi', 'turbinadiotipovi.id', '=', 'turbinadijelovi.turbinadiotip_id')
                            //->leftjoin('turbinadiophotos', 'turbinadiophotos.turbinadio_id', '=', 'turbinadijelovi.id')
                            ->selectRaw('turbinadijelovi.*')///////////
                            ->where('turbinadiotipovi.naziv_2'    , 'like', '%'.$tip_naziv.'%' )   
                            ->where('turbinadijelovi.opis'        , 'like', '%'.$opis.'%' )
                            
                            ->where('turbinadijelovi.oznaka'      , 'like', '%'.$oznaka.'%' )
                            
                            
                            ->paginate($duzina_stranice);
        return TurbinadijeloviRES::collection($turbinadio);
    }

/*
    DB::table('reviews')
    ->select('*', DB::raw('COUNT(*) as review_count'))
    ->groupBy('user_id')
    ->having('review_count', '>' , 10)
    ->get();
    */


    /// prikaz svih turbina dijelova u tipu
    public function index_t($turbinadiotip_id)
    {
        $turbinadio=Turbinadio::where('turbinadiotip_id', $turbinadiotip_id)->get();

        return TurbinadioRES::collection($turbinadio);
        //return Element->all();
        //return view('elementi.index', ['elementi' => $model->all()]);
        
    }


    public function turbinadio_detalji_WS_x($id)
    {
       // nađi turbinu
       $turbinadio=Turbinadio::where('id', $id)->get();
 

             //return new Turbina_WS_RES_x($turbina);
             return TurbinadioRES_WS_x::collection($turbinadio);
 

    }

    public function index_slika($turbinadio_id)
    {
        $turbinadioslike=Turbinadiophoto::where('turbinadio_id', $turbinadio_id)->get();

        return TurbinadioslikeRES::collection($turbinadioslike);
        //return Element->all();
        //return view('elementi.index', ['elementi' => $model->all()]);
        
    }
 
    // brisanje slike
    public function destroy_photo($id){
          // nađi predracun
          $slika=Turbinadiophoto::findOrFail($id);
          
          //$slika->id;
          $id_dijela=$slika->turbinadio_id;
          $ime_fajla=$slika->photo;
          
          $fajl_za_brisanje="storage/pictures/".$id_dijela."/".$ime_fajla;

          //briši fajl
          File::delete($fajl_za_brisanje);

          // brisi iz tabele
          if($slika->delete()){
            return response()->json(['success'=>'Uspješno obrisana slika: '.$ime_fajla.' za artikl ID: '.$id_dijela]);

          }
          
    
        }
    // kreiranje i ažuriranje turbinadijelova
    public function store(Request $request)
    {
        // nađi turbinadio
        $turbinadio=$request->isMethod('put') ? Turbinadio::findOrFail($request->id) : new Turbinadio;


        // ako je           zadan tip               I   (                   tip nije aktuator    ili    mora biti zadan podtip )    
        if($request->input('turbinadiotip_id')!==0  && ($request->input('turbinadiotip_id')!==1 || $request->input('turbinadiopodtip_id')!==0)){



            $turbinadio->id                = $request->input('id');

            $turbinadio->ekvivalent_za_id  = $request->input('ekvivalent_za_id')==0?$request->input('id'):$request->input('ekvivalent_za_id');

            $turbinadio->opis              = $request->input('opis')?$request->input('opis'):'-'; 
            $turbinadio->oznaka            = $request->input('oznaka');  
            $turbinadio->turbinadiotip_id  = $request->input('turbinadiotip_id');
            $turbinadio->turbinadiopodtip_id  = $request->input('turbinadiopodtip_id');     
             
            $turbinadio->cijena             = $request->input('cijena')*100;  // dvije decimale 
            $turbinadio->cijena_as          = $request->input('cijena_as')*100;  // dvije decimale 
            $turbinadio->cijena_ts          = $request->input('cijena_ts')*100;  // dvije decimale 
            $turbinadio->nab_cijena         = $request->input('nab_cijena')*100;  // dvije decimale 
            $turbinadio->nab_c_fix          = $request->input('nab_c_fix'); 
            $turbinadio->na_stanju_s        = $request->input('na_stanju_s'); 
            $turbinadio->na_stanju_r        = $request->input('na_stanju_r'); 
            $turbinadio->na_stanju_p        = $request->input('na_stanju_p'); 
            $turbinadio->limit_s            = $request->input('limit_s');
            $turbinadio->limit_r            = $request->input('limit_r');   
            $turbinadio->polica_s           = $request->input('polica_s');
            $turbinadio->polica_r           = $request->input('polica_r');
            $turbinadio->polica_p           = $request->input('polica_p'); 

            if($turbinadio->save()){
                
                $turbinadio->ekvivalent_za_id=$turbinadio->ekvivalent_za_id?$turbinadio->ekvivalent_za_id:$turbinadio->id;
                $turbinadio->save();
                return new TurbinadioRES($turbinadio);
            }

        }


    }

    // kreiranje i ažuriranje turbinadijelova
    public function store_EC($id, $cijena, $stanje)
    {
        
        
        $dio = Turbinadio::where('id', '=', $id)->get();
        $broj = $dio->count();
        if ($broj>0) {
                // nađi turbinadio
                //$turbinadio=$request->isMethod('put') ? Turbinadio::findOrFail($request->id) : new Turbinadio;
                $turbinadio= Turbinadio::findOrFail($id);


                // ako je           zadan tip               I   (                   tip nije aktuator    ili    mora biti zadan podtip )    
                //if($request->input('turbinadiotip_id')!==0  && ($request->input('turbinadiotip_id')!==1 || $request->input('turbinadiopodtip_id')!==0)){



                    //$turbinadio->id                = $request->input('id');

                    //$turbinadio->ekvivalent_za_id  = $request->input('ekvivalent_za_id')==0?$request->input('id'):$request->input('ekvivalent_za_id');

                    //$turbinadio->opis              = $request->input('opis')?$request->input('opis'):'-'; 
                    //$turbinadio->oznaka            = $request->input('oznaka');  
                    //$turbinadio->turbinadiotip_id  = $request->input('turbinadiotip_id');
                    //$turbinadio->turbinadiopodtip_id  = $request->input('turbinadiopodtip_id');     
                    
                    $turbinadio->cijena             = $cijena*100; //$request->input('cijena')*100;  // dvije decimale 
                    //$turbinadio->nab_cijena         = $request->input('nab_cijena')*100;  // dvije decimale 
                    //$turbinadio->nab_c_fix          = $request->input('nab_c_fix'); 
                    //$turbinadio->na_stanju_s        = $request->input('na_stanju_s'); 
                    $turbinadio->na_stanju_r        = $stanje;//$request->input('na_stanju_r'); 
                    //$turbinadio->na_stanju_p        = $request->input('na_stanju_p'); 
                    //$turbinadio->limit_s              = $request->input('limit_s');
                    //$turbinadio->limit_r              = $request->input('limit_r');   
                    //$turbinadio->polica_s           = $request->input('polica_s');
                    //$turbinadio->polica_r           = $request->input('polica_r');
                    //$turbinadio->polica_p           = $request->input('polica_p'); 

                    //if($turbinadio->save()){
                        
                    // $turbinadio->ekvivalent_za_id=$turbinadio->ekvivalent_za_id?$turbinadio->ekvivalent_za_id:$turbinadio->id;
                        $turbinadio->save();
                        return new TurbinadioEC_RES($turbinadio);
                    //}

                    
                //}
            }else{
                return "Nema dijela ID=".$id;
            }

    }


    public function store_EC_2($id, $cijena, $cijena_as, $cijena_ts, $stanje)
    {
        
        
        $dio = Turbinadio::where('id', '=', $id)->get();
        $broj = $dio->count();
        if ($broj>0) {
                // nađi turbinadio
                //$turbinadio=$request->isMethod('put') ? Turbinadio::findOrFail($request->id) : new Turbinadio;
                $turbinadio= Turbinadio::findOrFail($id);


                        $turbinadio->cijena             = $cijena*100; //$request->input('cijena')*100;  // dvije decimale 
                        $turbinadio->cijena_as          = $cijena_as*100; //$request->input('cijena')*100;  // dvije decimale 
                        $turbinadio->cijena_ts          = $cijena_ts*100; //$request->input('cijena')*100;  // dvije decimale 

                        $turbinadio->na_stanju_r        = $stanje;//$request->input('na_stanju_r'); 

                        $turbinadio->save();
                        return new TurbinadioEC_RES($turbinadio);
                    //}

                    
                //}
            }else{
                return "Nema dijela ID=".$id;
            }

    }


    public function stampa_zaliha($filter_stampa_tip)
    {

        if ($filter_stampa_tip==0){

            $result = Turbinadio::join('turbinadiotipovi', 'turbinadijelovi.turbinadiotip_id', '=', 'turbinadiotipovi.id')

                        ->selectRaw('
                        turbinadiotipovi.naziv_2 tip,
                        turbinadijelovi.oznaka as oznaka,
                        turbinadijelovi.cijena,
                        turbinadijelovi.nab_cijena,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        (turbinadijelovi.limit_s + turbinadijelovi.limit_r) as "limit",
                        turbinadijelovi.limit_s,
                        turbinadijelovi.limit_r
                                    ') 
            
            ->orderBy('turbinadiotipovi.naziv_2', 'asc')
            ->orderBy('turbinadijelovi.oznaka', 'asc')
            ->get();
        
        }else{

            $result = Turbinadio::join('turbinadiotipovi', 'turbinadijelovi.turbinadiotip_id', '=', 'turbinadiotipovi.id')

                        ->selectRaw('
                        turbinadiotipovi.naziv_2 tip,
                        turbinadijelovi.oznaka as oznaka,
                        turbinadijelovi.cijena,
                        turbinadijelovi.nab_cijena,
                        turbinadijelovi.na_stanju_s+turbinadijelovi.na_stanju_r as na_stanju,
                        turbinadijelovi.na_stanju_s,
                        turbinadijelovi.na_stanju_r,
                        (turbinadijelovi.limit_s + turbinadijelovi.limit_r) as "limit",
                        turbinadijelovi.limit_s,
                        turbinadijelovi.limit_r
                                    ') 

            ->where('turbinadiotipovi.id','=', $filter_stampa_tip)
            ->orderBy('turbinadiotipovi.naziv_2', 'asc')
            ->orderBy('turbinadijelovi.oznaka', 'asc')
            ->get();

        }
       //return  $result;
       //$pdf=PDF::loadView('turbinadijelovi.zalihe_pdf', compact('result'))->setPaper('a4', 'portrait');
       //return $pdf->stream();

       return view('turbinadijelovi.zalihe_pdf', compact('result'));

    }    

    public function stampa_narudzbe($lokacija, $filter_stampa_tip)
    {

        if ($filter_stampa_tip==0){

            if ($lokacija=='S'){
                $result = Turbinadio::join('turbinadiotipovi', 'turbinadijelovi.turbinadiotip_id', '=', 'turbinadiotipovi.id')

                ->selectRaw('
                turbinadiotipovi.naziv tip,
                turbinadijelovi.oznaka,
                turbinadijelovi.na_stanju_s as na_stanju,
                turbinadijelovi.limit_s as "limit"
                            ') 
                
                ->orderBy('turbinadiotipovi.naziv_2', 'asc')
                ->orderBy('turbinadijelovi.oznaka', 'asc')
                ->get();

            }

            if ($lokacija=='R'){
                $result = Turbinadio::join('turbinadiotipovi', 'turbinadijelovi.turbinadiotip_id', '=', 'turbinadiotipovi.id')

                ->selectRaw('
                turbinadiotipovi.naziv tip,
                turbinadijelovi.oznaka,
                turbinadijelovi.na_stanju_r as na_stanju,
                turbinadijelovi.limit_r as "limit"
                            ') 

                ->orderBy('turbinadiotipovi.naziv_2', 'asc')
                ->orderBy('turbinadijelovi.oznaka', 'asc')
                ->get();

            }

        }else{

            if ($lokacija=='S'){
                $result = Turbinadio::join('turbinadiotipovi', 'turbinadijelovi.turbinadiotip_id', '=', 'turbinadiotipovi.id')

                ->selectRaw('
                turbinadiotipovi.naziv tip,
                turbinadijelovi.oznaka,
                turbinadijelovi.na_stanju_s as na_stanju,
                turbinadijelovi.limit_s as "limit"
                            ') 

                ->where('turbinadiotipovi.id','=', $filter_stampa_tip)
                ->orderBy('turbinadiotipovi.naziv_2', 'asc')
                ->orderBy('turbinadijelovi.oznaka', 'asc')
                ->get();

            }

            if ($lokacija=='R'){
                $result = Turbinadio::join('turbinadiotipovi', 'turbinadijelovi.turbinadiotip_id', '=', 'turbinadiotipovi.id')

                ->selectRaw('
                turbinadiotipovi.naziv tip,
                turbinadijelovi.oznaka,
                turbinadijelovi.na_stanju_r as na_stanju,
                turbinadijelovi.limit_r as "limit"
                            ') 

                ->where('turbinadiotipovi.id','=', $filter_stampa_tip)
                ->orderBy('turbinadiotipovi.naziv_2', 'asc')
                ->orderBy('turbinadijelovi.oznaka', 'asc')
                ->get();

            }


        }



       //return  $result;
       $pdf=PDF::loadView('turbinadijelovi.narudzba_pdf', compact('result'))->setPaper('a4', 'portrait');
       return $pdf->stream();

    }        




}
