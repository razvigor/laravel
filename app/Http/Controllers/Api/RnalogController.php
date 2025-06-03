<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\RnalogRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rnalog;
use App\Http\Resources\RnalogRES;




class RnalogController extends Controller
{
    
    /// prikaz svih naloga
    public function index()
    {
       $rnalozi=Rnalog::paginate(15);

        return RnalogRES::collection($rnalozi);
        

    }

    /// prikaz jednog naloga
    public function show($id)
    {
        // nađi proizvod
        $rnalog=Rnalog::findOrFail($id);

        // vrati ga kao resource
        return new RnalogRES($rnalog);
    }



}
