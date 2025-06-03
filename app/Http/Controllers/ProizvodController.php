<?php
/*

=========================================================
* Argon Dashboard PRO - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro-laravel
* Copyright 2018 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)

* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/
namespace App\Http\Controllers;

use DB;
use App\User;
use App\Proizvod;
use App\Proizvrstamodel;
use App\Element;
use App\Operacija;
use App\Http\Requests\ProizvodRequest;

class ProizvodController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Proizvod::class);
    }

    /**
     * Display a listing of the proizvodi
     *
     * @param \App\Proizvod  $model
     * @return \Illuminate\View\View
     */
    public function index(Proizvod $model)
    {
        $this->authorize('manage-proizvodi', User::class);

        $proiz_modeli = DB::table('proizvrstamodeli')
        ->join('proiztipvrste', 'proiztipvrste.id', '=', 'proizvrstamodeli.proiztipvrsta_id')
        ->select(DB::raw('proizvrstamodeli.id as id, CONCAT(proiztipvrste.naziv, ": ", proizvrstamodeli.naziv) as naziv'))
        ->orderBy('proiztipvrste.naziv')
        ->orderBy('proizvrstamodeli.naziv')
        ->get();

        $oznake_lakova = DB::table('mattipoznake')
        ->where('mattip_id', '=', 10)
        ->where('internasifra', '>', 0)
        ->select(DB::raw('mattipoznake.id as id, mattipoznake.oznaka  as naziv'))
        ->orderBy('mattipoznake.oznaka')
        ->get();

        $oznake_presvlaka = DB::table('mattipoznake')
        ->where('mattip_id', '=', 7)
        ->select(DB::raw('mattipoznake.id as id, mattipoznake.oznaka  as naziv'))
        ->orderBy('mattipoznake.oznaka')
        ->get();        

        return view('proizvodi.index', [
                                        'proizvodi' => $model->get(),
                                        'proiz_modeli' => $proiz_modeli,
                                        'oznake_lakova' => $oznake_lakova,
                                        'oznake_presvlaka' => $oznake_presvlaka
                                       ]);
//        return view('masine.index', ['masine' => $model->with(['mtags', 'masinvrsta', 'masinlokacija'])->get()]);
      

    }

    /**
     * Show the form for creating a new proizvod
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('proizvodi.create');



    }

    /**
     * Store a newly created proizvod in storage
     *
     * @param  \App\Http\Requests\ProizvodRequest  $request
     * @param  \App\Proizvod  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProizvodRequest $request, Proizvod $model)
    {
        //$model->create($request->all());
        
        
        // samo ako je unesena sifra duzine 9
        if (strlen($request->sifra_proizvoda)==9){



            // ako ne postoji, kreiraj ga
                
            if (Proizvod::where('sifra_proizvoda', '=', $request->sifra_proizvoda)->count() > 0) {
                return redirect()->route('proizvod.index')->withStatus(__('Proizvod '.$request->naziv.' već postoji.'));
            }else{
                    $proizvod = $model->create($request->merge([
                        'aktivan' => $request->aktivan ? 1 : 0
                        //'naziv' => $request->naziv_slozen,
                        //'sifra_proizvoda' => $sifra_proizvoda_slozena
                    ])->all());  



                    /// ako smo kreirali duplikat proizvoda, treba još:
                    if ($request->id_original_p!=0){
                        
                        // odrediti id_novog i starog
                        $id_novog  = $proizvod->id;
                        $id_starog = $request->id_original_p;

                        // u  novi proizvod dodati sve elemente koje ima stari
                        $elementi=Element::where('proizvod_id', $id_starog)->get();
                        
                        foreach ($elementi as $element){

                            $unos = new Element;

                            $unos->proizvod_id    = $id_novog; // id novonastalog proizvoda  
                            $unos->naziv          = $element->naziv;         
                            $unos->mattip_id      = $element->mattip_id;     
                            $unos->materijal_id   = $element->materijal_id;  
                            $unos->sklop          = $element->sklop;         
                            $unos->id_nadredjenog = $element->id_nadredjenog; //// OVO JE PROBLEM
                            $unos->elint_01       = $element->elint_01;      
                            $unos->elint_02       = $element->elint_02;      
                            $unos->elint_03       = $element->elint_03;      
                            $unos->elint_04       = $element->elint_04;      
                            $unos->elint_05       = $element->elint_05;      
                            $unos->elint_06       = $element->elint_06;      
                            $unos->elint_07       = $element->elint_07;      
                            $unos->eltxt_31       = $element->eltxt_31; 

                            $unos->izvorni_id     = $element->id; 

                            // snimi novi element                    
                            $unos->save();
                    
                            // u svaki element dodati operacije koje ima originalni element          
                            $operacije=Operacija::where('element_id', $element->id)->get();
                            
                            foreach ($operacije as $operacija){

                                $unos_o = new Operacija;
                                
                                $unos_o->element_id     = $unos->id; // id novonastalog elementa
                                $unos_o->redni_broj     = $operacija->redni_broj;
                                $unos_o->masina_id      = $operacija->masina_id;
                                $unos_o->br_rr          = $operacija->br_rr;
                                $unos_o->br_pr          = $operacija->br_pr;
                                $unos_o->br_us          = $operacija->br_us;
                                $unos_o->opis           = $operacija->opis;
                                $unos_o->parametri      = $operacija->parametri;
                                $unos_o->alat_id        = $operacija->alat_id;
                                $unos_o->vrijeme        = $operacija->vrijeme;
                                // snimi novu operaciju
                                $unos_o->save();
                            }


                        }

                        // koriguj id_nadredjenog za sve elemete novog proizvoda
                    

                        $elementi_n = DB::table('elementi')
                            ->where('proizvod_id', '=', $id_novog)
                            ->where('id_nadredjenog', '>', 0)
                            ->get();

                        foreach ($elementi_n as $element_n){

                            $result=DB::table('elementi')
                            ->select('id')
                            ->where('izvorni_id', $element_n->id_nadredjenog)
                            ->where('proizvod_id', $element_n->proizvod_id)
                            ->first();
                            $novi_id_nad=$result->id;


                            DB::statement("UPDATE elementi u 
                                            SET u.id_nadredjenog = ".$novi_id_nad."
                                            WHERE u.id = ".$element_n->id
                                        );

                            DB::statement("UPDATE elementi u 
                                            SET u.id_nadredjenog = 0

                                            where u.proizvod_id = ".$id_novog."
                                            and u.id_nadredjenog is null"
                                            );

                        }

                        // prikaži formu za izmjenu novog proizovda
                        return redirect()->route('proizvod.edit', $proizvod)->withStatus(__('Kreiran duplikat proizvoda'));

                    }else{

                        /// ako se radi o običnom kreiranju novog proizvoda
                        return redirect()->route('proizvod.index')->withStatus(__('Proizvod uspješno kreiran.'));
                                        
                    }
                
            }    

        }

    }



    /**
     * Show the form for editing the specified proizvod
     *
     * @param  \App\Proizvod  $proizvod
     * @return \Illuminate\View\View
     */
    public function edit(Proizvod $proizvod)
    {

        $proiz_modeli = DB::table('proizvrstamodeli')
        ->join('proiztipvrste', 'proiztipvrste.id', '=', 'proizvrstamodeli.proiztipvrsta_id')
        ->select(DB::raw('proizvrstamodeli.id as id, CONCAT(proiztipvrste.naziv, ": ", proizvrstamodeli.naziv) as naziv'))
        ->orderBy('proiztipvrste.naziv')
        ->orderBy('proizvrstamodeli.naziv')
        ->get();

        $oznake_lakova = DB::table('mattipoznake')
        ->where('mattip_id', '=', 10)
        ->where('internasifra', '>', 0)
        ->select(DB::raw('mattipoznake.id as id, mattipoznake.oznaka  as naziv'))
        ->orderBy('mattipoznake.oznaka')
        ->get();

        $oznake_presvlaka = DB::table('mattipoznake')
        ->where('mattip_id', '=', 7)
        ->select(DB::raw('mattipoznake.id as id, mattipoznake.oznaka  as naziv'))
        ->orderBy('mattipoznake.oznaka')
        ->get();        

        return view('proizvodi.edit', [
                                        'proizvod' => $proizvod,
                                        'proiz_modeli' => $proiz_modeli,
                                        'oznake_lakova' => $oznake_lakova,
                                        'oznake_presvlaka' => $oznake_presvlaka
                                       ]);

        //return view('proizvodi.edit',   compact('proizvod')
        //);



    }
        //return view('materijali.index', ['materijali' => $model->with(['mattip', 'mattipvrsta', 'mattipoznaka'])->get()]);
    /**
     * Update the specified proizvod in storage
     *
     * @param  \App\Http\Requests\ProizvodRequest  $request
     * @param  \App\Proizvod  $proizvod
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProizvodRequest $request, Proizvod $proizvod)
    {
        //$proizvod->update($request->all());
        $proizvod->update(
            $request->merge([
                'aktivan' => $request->aktivan ? 1 : 0

            ])->all()
        );


        return redirect()->route('proizvod.index')->withStatus(__('Proizvod je uspješno ažuriran.'));
                           
    
    }

    /**
     * Remove the specified proizvod from storage
     *
     * @param  \App\Proizvod  $proizvod
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Proizvod $proizvod)
    {
        if (!$proizvod->elementi->isEmpty()) {
            return redirect()->route('proizvod.index')->withErrors(__('Proizvod ima elemente i ne može se brisati.'));
        }

        $proizvod->delete();

        return redirect()->route('proizvod.index')->withStatus(__('Proizvod uspješno izbrisan.'));
        
    }
}
