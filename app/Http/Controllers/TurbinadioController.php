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


use App\Turbinadio;
use App\Turbinadiophoto;

use Carbon\Carbon;
use App\Http\Requests\TurbinadioRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;




class TurbinadioController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Turbinadio::class);
    }

    /**
     * Display a listing of the items
     *
     * @param \App\Turbinadio  $model
     * @return \Illuminate\View\View
     */
    public function index(Turbinadio $model)
    {
        return view('turbinadijelovi.index', ['turbinadijelovi' => $model->get()]);
    }


    // kreiranje i ažuriranje turbinadijelova
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	$imageName = time().'.'.$request->image->getClientOriginalExtension();
        //$putanja='storage/pictures/23';// +  $turbinadio_id; //$turbinadio_id;
        
        $turbinadio_id=$request->turbinadio_id;

        $putanja="storage/pictures/".$turbinadio_id."/";
        $putanja2="storage/pictures/".$turbinadio_id;

        if(!File::exists($putanja)){
            File::makeDirectory($putanja, 0755, true, true);
        }
//public_path($putanja2)

/*
$resize_image->resize(150, 150, function($constraint){
    $constraint->aspectRatio();
   })->save($destinationPath . '/' . $image_name);
   */
/*
   $resize_image = Image::make($request->image->getRealPath());

            if (!$request->image->resize(150, 150, function($constraint){
                $constraint->aspectRatio();
               })->move($putanja2, $imageName)){
*/
            if (!$request->image->move($putanja2, $imageName)){

                return response()->json(['success'=>'Greška']);
            }else{
 
            
    /*
                $image = $request->file('file');
                if (!$image->move($putanja2, $imageName)) {
                    return response()->json(['danger'=>'Greška']);
                }
    */          
                $slika=new Turbinadiophoto;

                
                $slika->turbinadio_id      = $turbinadio_id;
                $slika->photo              = $imageName;
                
        
                if($slika->save()){
    	           return response()->json(['success'=>'Uspješno snimljena slika'.$imageName.' za artikl ID: '.$turbinadio_id]);
                }
            }
    }

}
