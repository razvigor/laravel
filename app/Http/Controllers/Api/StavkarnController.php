<?php

namespace App\Http\Controllers\Api;

use DB;
use PDF;
use App\Http\Requests\StavkarnRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rnalog;
use App\StavkaRN;
use App\Http\Resources\StavkarnRES;




class StavkarnController extends Controller
{
    


    /// prikaz svih stavki u nalogu
    public function index($rnalog_id)
    {
       $stavke=Stavkarn::where('rnalog_id', $rnalog_id)->get();




        return StavkarnRES::collection($stavke);
        //return Element->all();
        //return view('elementi.index', ['elementi' => $model->all()]);
        
    }

    public function stampa($rnalog_id)
    {

        $rnalog = DB::table('rnalozi')->select(
            DB::raw('broj_RN,
                     opis,
                     broj_dana,
                     datum_montaze,
                     datum_isporuke,
                     broj_dana,
                     CASE WHEN status=1 THEN "U pripremi"
                        WHEN status=2 THEN "U izradi" 
                        ELSE "Završen" 
                     END 
                     as opis_statusa')
        ) 
        ->where('id','=',$rnalog_id)->get();


        $result = StavkaRN::join('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')
        ->join('kupci', 'stavkern.kupac_id', '=', 'kupci.id')

                    ->selectRaw('
                    stavkern.rnalog_id,
                    stavkern.r_br,
                    proizvodi.proizvoda_u_smjeni,
                    stavkern.kolicina,
                    stavkern.napomena,
                    kupci.naziv naziv_kupca,
                    proizvodi.naziv naziv_proizvoda
                                 ') 
        ->where('stavkern.rnalog_id','=',$rnalog_id)

        

         
 
        ->orderBy('stavkern.r_br', 'asc')
        ->get();

       //return  $result;
       $pdf=PDF::loadView('rnalozi.rnalog_pdf', compact('result', 'rnalog'))->setPaper('a4', 'portrait');
       return $pdf->stream();

    }    

    public function proizvodi_rn($rnalog_id){
            $proizvodi_u_nalogu = StavkaRN::leftJoin('proizvodi', 'stavkern.proizvod_id', '=', 'proizvodi.id')

            ->selectRaw('proizvodi.id id_proizvoda, proizvodi.naziv naziv_proizvoda, sum(stavkern.kolicina) broj_proizvoda
                        ') 
            ->where('stavkern.rnalog_id','=',$rnalog_id)
            ->groupBy('proizvodi.id' ,'proizvodi.naziv')
            ->orderBy('proizvodi.naziv','asc')

            ->get();

            return $proizvodi_u_nalogu;
    }


    /// prikaz jednog stavkarna
    public function show($id)
    {
        // nađi stavkarn
        $stavkarn=Stavkarn::findOrFail($id);

        // vrati ga kao resource
        return new StavkarnRES($stavkarn);
    }

    // kreiranje i ažuriranje
    public function store(Request $request)
    {
        // nađi stavkarn
        $stavkarn=$request->isMethod('put') ? Stavkarn::findOrFail($request->id) : new Stavkarn;


        if($request->input('kupac_id')!==0 && $request->input('proizvod_id')!==0){
            $stavkarn->id = $request->input('id');
            $stavkarn->r_br = $request->input('r_br');
            $stavkarn->rnalog_id = $request->input('rnalog_id');
            $stavkarn->kupac_id = $request->input('kupac_id');
            $stavkarn->proizvod_id = $request->input('proizvod_id');
            $stavkarn->kolicina = $request->input('kolicina');
            $stavkarn->napomena = $request->input('napomena');
            

            if($stavkarn->save()){
                return new StavkarnRES($stavkarn);
            }

        }
    
    }
    // brisnje
    public function destroy($id)
    {
        // nađi stavkarn
        $stavkarn=Stavkarn::findOrFail($id);

        if($stavkarn->delete()){
            return new StavkarnRES($stavkarn);

        }
    }


}
