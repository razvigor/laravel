<?php

namespace App\Http\Controllers\Api;

//use App\Http\Requests\MattipvrstaRequest; 
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;  // 24.1.2021
//use App\Http\Resources\MattipvrstaRES;

class MojConfigController extends Controller
{
    


    
    /// prikaz svih sifara iz config/naziv_fajla
    public function index($naziv_fajla)
    {

       //$myValue = Config::get('file1.MASTER_KEY.SUB_KEY1');
       $rezultat=Config::get($naziv_fajla);

        return $rezultat;

        
    }


}
