<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Http\Requests\ElementRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Element;
use App\Http\Resources\ElementRES;

class ElementController extends Controller
{
    
    /// prikaz svih elemenata u proizvodu
    public function index($proizvod_id)
    {
       $element=Element::where('proizvod_id', $proizvod_id)->get();

        return ElementRES::collection($element);
        //return Element->all();
        //return view('elementi.index', ['elementi' => $model->all()]);
        
    }

    /// prikaz jednog elementa
    public function show($id)
    {
        // nađi element
        $element=Element::findOrFail($id);

        // vrati ga kao resource
        return new ElementRES($element);
    }

    // kreiranje i ažuriranje elementa
    public function store(Request $request)
    {
        // nađi element
        $element=$request->isMethod('put') ? Element::findOrFail($request->id) : new Element;

        //if($request->input('proizvod_id')*($request->input('mattip_id')+$request->input('sklop'))*($request->input('materijal_id')+$request->input('sklop'))){
        if($request->input('proizvod_id')!==0 && ($request->input('mattip_id')!==0 || $request->input('sklop'))){
            
            $element->id             = $request->input('id');
            $element->proizvod_id    = $request->input('proizvod_id');
            $element->naziv          = $request->input('naziv');
    
            $element->mattip_id      = $request->input('sklop')?0:$request->input('mattip_id');
            $element->materijal_id   = $request->input('sklop')?0:$request->input('materijal_id');

            $element->sklop          = $request->input('sklop')?1:0;

            $element->id_nadredjenog = $request->input('id_nadredjenog');

            $element->elint_01       = $request->input('el_int_01')?$request->input('el_int_01')*1000:0;
            $element->elint_02       = $request->input('el_int_02')?$request->input('el_int_02')*1000:0;
            $element->elint_03       = $request->input('el_int_03')?$request->input('el_int_03')*1000:0;
            $element->elint_04       = $request->input('el_int_04')?$request->input('el_int_04')*1000:0;
            $element->elint_05       = $request->input('el_int_05')?$request->input('el_int_05')*1000:0;
            $element->elint_06       = $request->input('el_int_06')?$request->input('el_int_06')*1000:0;
            $element->elint_07       = $request->input('el_int_07')?$request->input('el_int_07')*1000:0;
    
   
            $element->eltxt_31       = $request->input('el_txt_31')?$request->input('el_txt_31'):'-';
            
    
    
            if($element->save()){
                DB::statement("UPDATE elementi u 
                SET u.izvorni_id = u.id
                
              where u.id = ".$element->id);
    

                return new ElementRES($element);
            }
            

        }

    }

    // brisnje
    public function destroy($id)
    {
        // nađi proizvod
        $element=Element::findOrFail($id);

        if($element->delete()){
            return new ElementRES($element);

        }
    }


}
