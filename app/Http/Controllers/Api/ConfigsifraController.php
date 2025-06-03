<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Requests\ConfigsifraRequest;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Configsifra;
    use App\Http\Resources\Configsifra_tRES;
    
    class ConfigsifraController extends Controller
    {
        
	// primjer zaštite API
	// 15.10.2020
	//public function __construct()
    //{
    //    $this->authorizeResource(Mattip::class);
    //}
	// 15.10.2020

        /// prikaz sifrarnika za tabelu
        public function index_t($tabela)
        {
           
            $sifrarnik=Configsifra::where('tabela','=',  $tabela)
                                 ->get();
            return $sifrarnik; 

            //return Configsifra_tRES::collection($sifrarnik);

            /*
                                 //$redovi=Configsifra::select('polje')->where('tabela', $tabela)->get();
        
                                 $redovi=Configsifra::distinct()->select('polje')
                                 ->where('tabela', $tabela)->get();
                                 return $redovi;
                                 
                                       //  foreach ($redovi as $red) {

                                            //return $red->polje;
                                       //     $item = Configsifra::select('sifra', 'opis')
                                        //    ->WHERE('polje', $red->polje)
                                        //    ->get();
                                            
                                        
                                      //  return $item;
                                             

                                         //}
                                 
            */
           
           
            
        }

        /// prikaz svih sifrarnika za tabelu i polje
        public function index_t_p($tabela, $polje)
        {
           $sifrarnik=Configsifra::where('tabela','=',  $tabela)
                                 ->where('polje', '=',  $polje)
                                 ->get();
    
           return $sifrarnik; 

            
        }

        
    }
