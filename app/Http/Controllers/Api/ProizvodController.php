<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\ProizvodRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Proizvod;
use App\Http\Resources\ProizvodRES;




class ProizvodController extends Controller
{

    
    /// prikaz svih proizvoda 
    public function index_all()
    {
       $proizvodi=Proizvod::orderBy('naziv', 'asc')
                            ->get(); 
                            //->paginate(10);

        return ProizvodRES::collection($proizvodi);

        
    }

    /// prikaz svih proizvoda sa paginacijom
    public function index()
    {
       $proizvodi=Proizvod::paginate(15);

        return ProizvodRES::collection($proizvodi);
        

    }

    /// prikaz jednog proizvoda
    public function show($id)
    {
        // nađi proizvod
        $proizvod=Proizvod::findOrFail($id);

        // vrati ga kao resource
        return new ProizvodRES($proizvod);
    }

    // kreiranje i ažuriranje
    public function store(Request $request)
    {
        // nađi proizvod
        $proizvod=$request->isMethod('put') ? Proizvod::findOrFail($request->id) : new Proizvod;

        $proizvod->id = $request->input('id');
        $proizvod->naziv = $request->input('naziv');
        $proizvod->sifra_proizvoda = $request->input('sifra_proizvoda');
        $proizvod->proizvoda_u_smjeni = $request->input('proizvoda_u_smjeni');
        $proizvod->opis = $request->input('opis');
        
        

        if($proizvod->save()){
            return new ProizvodRES($proizvod);
        }
    }

    // brisnje
    public function destroy($id)
    {
        // nađi proizvod
        $proizvod=Proizvod::findOrFail($id);

        if($proizvod->delete()){
            return new ProizvodRES($proizvod);

        }
    }


}
