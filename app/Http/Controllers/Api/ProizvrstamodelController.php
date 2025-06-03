<?php

namespace App\Http\Controllers\Api;


//use App\Http\Requests\MattipRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StavkaRN;
use App\Proizvrstamodel;
use App\Http\Resources\ProizvrstamodeliRES;

//use App\Http\Resources\Mattip_koef_RES;




class ProizvrstamodelController extends Controller
{

	// primjer zaštite API
	// 15.10.2020
	//public function __construct()
    //{
    //    $this->authorizeResource(Mattip::class);
    //}
	// 15.10.2020



    
    /// prikaz svih modela
    public function index()
    {
       $modeli=Proizvrstamodel::get();//paginate(15);
       //where('aktivan','=','1')
       
       return ProizvrstamodeliRES::collection($modeli);
        

    }


    // kreiranje i ažuriranje modela
    public function store(Request $request)
    {
        // nađi model
        $model=$request->isMethod('put') ? Proizvrstamodel::findOrFail($request->id) : new Proizvrstamodel;



        if($request->input('naziv')!==''){

            //$mattip = Mattip::find($request->input('mattip_id'));// 24.01.2021

            $model->id             = $request->input('id');
            //$model->proiztip_id 
            $model->proiztipvrsta_id = $request->input('vrsta');
            $model->naziv          = $request->input('naziv');   
            $model->aktivan        = $request->input('aktivan')?1:0;
 


            if($model->save()){
                return new ProizvrstamodeliRES($model);
            }

        }


    }

    /// prikaz svih modela koji se pojavljuju u radnom nalogu
    public function modeli_rn($rnalog_id)
    {


            $svi = StavkaRN::selectraw('0 as model_id, "-svi modeli-" as model_naziv');
            $modeli_rn =  StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')
            ->leftJoin('proizvrstamodeli', 'proizvodi.model_id', '=', 'proizvrstamodeli.id')
            ->selectRaw('
                        proizvrstamodeli.id as model_id,
                        proizvrstamodeli.naziv as model_naziv
                    ')
            ->where('stavkern.rnalog_id','=',$rnalog_id)
            ->union($svi)
            ->orderBy('model_naziv', 'asc')
            ->get();

            return  $modeli_rn;
    }    




}
