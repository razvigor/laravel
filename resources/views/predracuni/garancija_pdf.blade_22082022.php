<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
            }

            .text-left {
                text-align: left;
            }

            .text-center {
                text-align: center;
            }

            .text-center_2 {
                text-align: center;
                font-size: 10px;
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
    <body class="login-page" style="background: rgb(255, 255, 255)">
    <div class="footer">
        strana br. <span class="pagenum"></span>{{--, vrijeme štampe: {{Carbon\Carbon::now()->format('d-m-Y H:i:s')}} --}}
    </div>

        <div>
            <div class="row">
                <div class="col-xs-6">
                    <table style="width: 100%;">
                        <!--material/img/TURBO_logo.png-->
                                                                             <!--material/img/TURBO_logo.png-->
                        {{--<tr><td width="60%" style="padding:0 25px 0 0"><img src="{{storage_path('app\public\pictures\TURBO_logo.jpg')}}" width="70%"></td>--}}
                            <tr><td width="60%" style="padding:0 25px 0 0"><img src="https://nasestanje.com/material/img/TURBO_logo.png" width="70%"></td>

                            <td style="font-size: 10px;">
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
                        <tr>
                            <td style="text-align: right; width: 10%;">
                                <strong> Kupac:</strong> 
                            </td>
                            <td  style="width: 60%;">
                            </td>
                            <td>
                                <strong> Datum: </strong>{{\Carbon\Carbon::parse($podatak->datum)->format('d-m-Y')}} 
                            </td>
    
                        </tr>
                        <tr>
                            <td>    
                            </td>
                            <td  style="width: 60%;">
                                       
                                @foreach ($kupac as $detalji_kupca)  
                                {{$detalji_kupca->naziv}}<br>
                                {{$detalji_kupca->ulica_i_broj}}<br>
                                {{$detalji_kupca->post_br_mjesto}}<br>
                                {{$detalji_kupca->drzava}}<br>
                                {{$detalji_kupca->jmb_jib}}<br>
                                @endforeach
                                
                            
                            <td>    
                            </td>
                        </tr>

                        </table>
                    

                </div>
    

            </div>            
            

            <div class="row">
                <div class="col-xs-6">
                    
                    <h4  style="text-align: center; font-size: 20px; color: #ff0000">
                        GARANTNI LIST<br>
                        <span  style="font-size: 16px; color: #000000">-GARANCIJA-</span>
                    </h4>
                    
BROJ TURBINE: {{$podatak->oem}}
<BR><BR>
GARANCIJA: {{$podatak->garancija_naziv}}     

<h4  style="text-align: center; font-size: 16px;">
    USLOVI GARANCIJE
    
</h4>

                </div>
    

            </div>



                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-5">
                        <table style="width: 100%">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        GARANCIJA VRIJEDI OD DATUMA IZADAVANJA<BR><BR>
                                        {{$podatak->garancija_elektronike}}     <BR><BR>
                                        GARANCIJA NE VRIJEDI AKO JE TURBINA FIZIČKI OŠTEĆENA:    
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%"></td>
                                    <td>
                                        1. Zbog nepravilnog postavljanja na vozilo<BR>
                                        2. Zbog nedostatka ulja, začepljenja dovoda ulja<BR>
                                        3. Zbog ostataka opiljaka u sistemu podmazivanja<BR>
                                        4. Zbog upada stranog tijela u usisni kompresor turbine<BR>
                                        5. Zbog upada stranog tijela u izduvni dio turbine<BR>
                                        6. Pucanje rotora zbog nedostatka podmazivanja<BR>
                                        7. Pregrijavanje rotora zbog začepljenja izduva
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            
            <!-- NOVA STRANA  
                <div style="margin-bottom: 0px">&nbsp;</div>
                <div class="page-break"></div>
            -->

<!-- potpis  (IZRADIO, ODOBRIO) --> 
{{--  
<div class="row">
    <div class="col-xs-12">
        
            <table style="width: 100%;">
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr><td colspan="2">&nbsp;</td></tr>


                <tr><td class="text-center"><strong>Izradio:</strong></td> <td class="text-center"><strong>Odobrio:</strong></tr>
                <tr><td colspan="2"></td></tr>
                <tr><td class="text-center"><strong>_______________</strong></td> <td class="text-center"><strong>_______________</strong></tr>

            </table>   
    
    </div>
</div>  --}}  

<!--  DODATNE NAPOMENE -->

<table>
    <tr>
        <td class="text-center">
            <BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>
            Molimo Vas da se pridržavate navedenih uputa iz uputstva za pravilnu ugradnju turbine 
            kako bi izbjegli dodatne <BR> 
            troškove ponovnog remonta turbine, troškove ponovnog skidanja i ugradnje turbine i troškove dostave.
        <hr>
        <span  style="text-align: center; font-size: 16px; color: #ff0000">
            U SLUČAJU REKLAMACIJE, OBAVEZAN JE RAČUN I I GARANTNI LIST BEZ IZUZETAKA
            <BR><BR>

        </span>    
        </td>
    </tr> 
</table>

                @endforeach 
            </div>
        </body>



</html>