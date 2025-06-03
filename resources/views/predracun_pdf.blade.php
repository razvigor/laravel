<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
    
        <title>Pregled prije štampe</title>
    
 
        <!--
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        -->
        <style>
            .header,
            .footer {
                width: 100%;
                text-align: center;
                position: fixed;
            }
            .header{
                top: 0px;
            }
            .footer{
                bottom: 0px;
            }
            .pagenum:before {
                content: counter(page);
            }

            .page-break {
                page-break-after: always;
            } 

            .text-unos {
                border: 1px solid #c0d7ec;
            }
            .text-suma {
                border: 1px solid #bddaf5;
            }

            .text-right {
                text-align: right;
                border-bottom: 1px solid;
            }

            .text-left {
                text-align: left;
                border-bottom: 1px solid;
            }

            .text-center {
                text-align: center;
                border-bottom: 1px solid;
            }

            .text-center_2 {
                text-align: center;
                font-size: 10px;
            }

            .td_usluga {
                border-bottom: 1px solid;
            }            

            *{ font-family: DejaVu Sans !important;
                font-size: 12px;
                }
        </style>
            <script>
                function zaokruzi(broj, dec) {
                    return broj.toFixed(dec);
                }
            </script>   
    </head>
    <body class="login-page" style="background: white">
    <div class="footer">
        strana br. <span class="pagenum"></span>{{--, vrijeme štampe: {{Carbon\Carbon::now()->format('d-m-Y H:i:s')}} --}}
    </div>

        <div>
            <div class="row">
                <div class="col-xs-6">
                    <table style="width: 100%;">
                                                                             <!--material/img/TURBO_logo.png-->
                        <tr><td width="60%" style="padding:0 25px 0 0"><img src="{{storage_path('app\public\pictures\TURBO_logo.jpg')}}" width="70%"></td>
                        {{--<tr><td width="60%" style="padding:0 25px 0 0"><img src="http://nasestanje.com/material/img/TURBO_logo.png" width="70%"></td>--}}
                        
                            <td style="font-size: 10px;"><?php storage_path('app\public\pictures\TURBO_logo.jpg')?>
                                TURBO SERVIS SAVIĆ s.p. VANESA SAVIĆ<br>
                                Dubička 49b, 78000 Banja Luka, BiH<br>
                                JIB:4512129590004, PDV: 512129590004<br>
                                
                                Tel: 066 871-322, +387 66 871-322<br>
                                email: turbosavic@gmail.com <br>

                                Ž.R. KM:  555-100-00546236-75 Nova Banka <br>
                                Ž.R. EUR: 555-000-00546238-22 Nova Banka <br>
    
                          </td>
                        </tr>
                        <tr><td colspan="2" class="text-center_2"><hr>Remont, čišćenje, testiranje, podašavanje, balansiranje turbina za sva putnička i teretna vozila, industrijske i poljoprivredne mašine<br>
                                            Testiranje, popravka, programiranje, podešavanje elektronika turbina kao i vakuma sa elektronskim senzorom položaja
                                            <hr><br>
                            </td>
                        </tr> 
                    </table>
                </div>

            </div>

    

            @foreach ($predracun as $podatak)   

            <div class="row">
                <div class="col-xs-7">
                    <table style="width: 100%;">
                        @foreach ($kupac as $detalji_kupca)  

                        <tr>
                            <td style="text-align: left; width: 20%;">
                                <strong> Kontakt osoba:</strong> 
                            </td>
                            <td style="text-align: left; width: 40%;">
                                {{$detalji_kupca->kontakt_osoba}}
                            </td>
                            <td  style="text-align: left; width: 20%;">
                                <strong> Datum:  </strong>
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($podatak->datum)->format('d-m-Y')}}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; width: 20%;">
                                <strong> Kupac:</strong> 
                            </td>
                            <td style="text-align: left; width: 40%;">
                                {{$detalji_kupca->naziv}}
                            </td>
                            <td  style="text-align: left; width: 20%;">
                                <strong> </strong>
                            </td>
                            <td>
                                 
                            </td>
                        </tr>                        
                        <tr>
                            <td style="text-align: left; width: 20%;">
                                <strong> Ulica i broj:</strong> 
                            </td>
                            <td style="text-align: left; width: 40%;">
                                {{$detalji_kupca->ulica_i_broj}}
                            </td>
                            <td  style="text-align: left; width: 20%;">
                                <strong> Objekat: </strong>
                            </td>
                            <td>
                                {{$podatak->lokacija_naziv}}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; width: 20%;">
                                <strong> Mjesto:</strong> 
                            </td>
                            <td style="text-align: left; width: 40%;">
                                {{$detalji_kupca->post_br_mjesto}}
                            </td>
                            <td  style="text-align: left; width: 20%;">
                                <strong> Mjesto: </strong>
                            </td>
                            <td>Banja Luka
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; width: 20%;">
                                <strong> Država:</strong> 
                            </td>
                            <td style="text-align: left; width: 40%;">
                                {{$detalji_kupca->drzava}}
                            </td>
                            <td  style="text-align: left; width: 20%;">
                                <strong> Način plaćanja: </strong>
                            </td>
                            <td>
                                {{$podatak->nacin_placanja_naziv}}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; width: 20%;">
                                <strong> IB/PDV/JMB:</strong> 
                            </td>
                            <td style="text-align: left; width: 40%;">
                                {{$detalji_kupca->jmb_jib}}
                            </td>
                            <td  style="text-align: left; width: 20%;">
                                <strong> Valuta: </strong>
                            </td>
                            <td>
                                Konvertibilna marka
                            </td>
                        </tr>                        

                        @endforeach
                                       

                           
                                
                            


                        </table>
                    

                </div>
    

            </div>            
            

            <div class="row">
                <div class="col-xs-6">
                    
                    <h4  style="text-align: center; font-size: 20px;">
                        @if($podatak->racun_nota=='N')N O T A -   @endif @if($podatak->status==0)P R E D @endif R A Č U N br. {{$podatak->broj}} <br>
                        {{--<strong>Status: {{$podatak->opis_statusa}}</strong>--}}
                    </h4>

                    <h4  style="text-align: left; font-size: 14px;">
                        Kataloški broj turbine: {{$podatak->oem}} <br>
                        {{--<strong>Status: {{$podatak->opis_statusa}}</strong>--}}
                    </h4>
                </div>
    

            </div>

            <table style="width: 100%;">
                <thead style="background: #c9dbec;">
                    <tr>
                        <th class="text-center" >R.br.</th>
                        <th class="text-left" style="padding: 5px;" >Šifra</th>
                        <th class="text-left" style="padding: 5px;" >Naziv</th>
                        <th class="text-center" >Količina</th>
                        <th class="text-center" >MJ</th>
                        <th class="text-right" style="padding: 5px;">Cijena</th>
                        @if($podatak->status==0)
                            <th class="text-right" style="padding: 5px;">Rabat</th>
                        @endif
                        <th class="text-right" style="padding: 5px;">PDV</th>
                        <th class="text-right" style="padding: 5px;">Cijena sa PDV</th>

                    </tr>


                </thead>

                <tbody>



                    {{-- KOMPLET REMONT --}}
                    @if($podatak->komplet_remont=='1') 
                    <tr width="100%">                 
                        <td class="text-center">{{$rb=1}}</td>
                        <td class="text-left" style="padding: 5px;"><div>{{$podatak->oem}}</div></td>
                        <td class="text-left" style="padding: 5px;">Remont turbine</td>
                        <td class="text-center">1</td>
                        <td class="text-center">kom</td>
                        <td class="text-right">{{number_format((float)$podatak->ukupna_cijena/117, 2, '.', '')}}</td>
                        @if($podatak->status==0)
                            <td class="text-center">{{number_format((float)$podatak->rabat, 2, '.', '')}}%</td>
                        @endif
                        <td class="text-center">17 %</td>
                        <td class="text-right" style="padding: 5px;">{{number_format((float)$podatak->ukupna_cijena/100, 2, '.', '')}}</td>
                        

                    </tr>
                    @endif

                        {{-- USLUGA --}}
                        {{-- prikaži samo ako je servis - predračun --}}
                        @if($podatak->komplet_remont=='2' && $podatak->status==0)
                        
                        <tr width="100%" >                 
                            <td class="text-center">{{$rb=1}}</td>
                            
                            <td class="text-left" style="padding: 5px;">Usluga</td>
                            
                            <td class="text-left" colspan="3" style="padding: 5px;">{{$podatak->usluga_naziv}}</td>
                            

                            
                            <td class="text-right">{{number_format((float)$podatak->oem_cijena/117, 2, '.', '')}}</td>
                            @if($podatak->status==0)     
                                <td class="text-center">{{number_format((float)$podatak->rabat, 2, '.', '')}}% </td>
                            @endif
                            <td class="text-center">17 %</td>
                            <td class="text-right" style="padding: 5px;">{{number_format((float)$podatak->oem_cijena/100, 2, '.', '')}}</td>
                            
    
                        </tr>
                        @endif
                         

                        {{-- prikaži samo ako je servis - račun --}}
                        @if($podatak->komplet_remont=='2' && $podatak->status==1)
                        <tr width="100%" >                 
                            <td class="text-center">{{$rb=1}}</td>
                            <td class="text-left" style="padding: 5px;">Usluga</td>
                            <td class="text-left" colspan="3" style="padding: 5px;">{{$podatak->usluga_naziv}}</td>

                            <td class="text-right">{{number_format((float)$podatak->ukupna_cijena/117, 2, '.', '')}}</td>
                            @if($podatak->status==0)    
                                <td class="text-center">{{number_format((float)$podatak->rabat, 2, '.', '')}}% </td>
                            @endif
                            <td class="text-center">17 %</td>
                            <td class="text-right" style="padding: 5px;">{{number_format((float)$podatak->ukupna_cijena/100, 2, '.', '')}}</td>
                            
    
                        </tr>
                        @endif    


                        {{-- DIJELOVI --}}
                        {{-- prikaži samo ako je predračun i servis turbine --}}
                        @if($podatak->status==0  && $podatak->komplet_remont=='2') 
                            @foreach ($tipovi as $tip)
                                @foreach ($dijelovi as $dio)
                                    @if($tip->oznaka==$dio->tip_oznaka && $dio->komada>0)
                                        <tr width="100%">
                                        
                                            <td class="text-center">{{$rb+=1}}</td>

                                            <td class="text-left" style="padding: 5px;"><div>{{$tip->oznaka}}</div></td>
                                            <td class="text-left" style="padding: 5px;">{{$tip->naziv_2.' ('.$dio->dio_oznaka.')'}}</td>
                                            
                                            <td class="text-center">{{$dio->komada}}</td>
                                            <td class="text-center">kom</td>

                                            <td class="text-right">{{number_format((float)$dio->cijena/117, 2, '.', '')}}</td>
                                            <td class="text-center">{{number_format((float)$dio->rabat, 2, '.', '')}}%</td>
                                            <td class="text-center">17 %</td>
                                            
                                            <td class="text-right" style="padding: 5px;">{{number_format((float)$dio->komada*$dio->cijena/100, 2, '.', '')}}</td>

                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif

                    


                        {{-- UKUPNO --}}
                        
                        <tr>
                            
                            <th @if($podatak->status==1) colspan="4" @else colspan="5" @endif></th>
                            <th class="text-left" colspan="3" style="padding: 5px;">Ukupno bez PDV</th>
                            <th class="text-right" style="padding: 5px;">{{number_format((float)$podatak->ukupna_cijena/117, 2, '.', '')}}</th>
                        </tr>                        
                        <tr>
                            <th @if($podatak->status==1) colspan="4" @else colspan="5" @endif></th>
                            <th class="text-left" colspan="3" style="padding: 5px;">PDV</th>
                            <th class="text-right" style="padding: 5px;">{{number_format((float)$podatak->ukupna_cijena*(1-1/1.17)/100, 2, '.', '')}}</th>
                        </tr>                        
                        <tr>
                            <th @if($podatak->status==1) colspan="4" @else colspan="5" @endif></th>
                            <th class="text-left" colspan="3" style="padding: 5px; background: #c9dbec;">Ukupno sa PDV</th>
                            <th class="text-right" style="padding: 5px; background: #c9dbec;">{{number_format((float)$podatak->ukupna_cijena/100, 2, '.', '')}}</th>
                        </tr>                        
       
                </tbody>

            </table>

                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-5">
                        <table style="width: 100%">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            
            <!-- NOVA STRANA  
                <div style="margin-bottom: 0px">&nbsp;</div>
                <div class="page-break"></div>
            -->



<!--  DODATNE NAPOMENE -->
    
                <div class="row">
                    <div class="col-xs-8 invbody-terms">
                        <br>
                        <br>
                        <h4>Dodatne napomene</h4>
                        <p>{{$podatak->napomena}}</p>
                    </div>
                </div>

                <!-- potpis  (IZRADIO, ODOBRIO) --> 
                  
                <div class="row">
                    <div class="col-xs-12">
                        
                            <table style="width: 100%;">
                                <tr><td colspan="2">&nbsp;</td></tr>
                                <tr><td colspan="2">&nbsp;</td></tr>
                                <tr><td colspan="2">&nbsp;</td></tr>


                                <tr><td class="text-center_2" width="70%"><strong>&nbsp;</strong></td> <td class="text-center_2"><strong>Fakturisao:</strong></tr>
                                <tr><td colspan="2"></td></tr>
                                <tr><td class="text-center_2" width="70%"><strong>&nbsp;</strong></td> <td class="text-center_2"><strong>_______________</strong></tr>

                            </table>   
                    
                    </div>
                </div>    



                @endforeach 
            </div>





        
        </body>



</html>