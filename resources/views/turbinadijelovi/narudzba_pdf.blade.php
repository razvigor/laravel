<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
    
        <title>Order parts</title>
    
 
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
                border-color: #79a0c4
            }



            .text-left {
                text-align: left;
                font-size:9px;
                border-bottom: 1px solid;
                border-color: #79a0c4
            }

            .text-left_1 {
                text-align: left;
                border-bottom: 1px solid;
                border-left: 1px solid;
                border-color: #79a0c4

            }            

            .text-center {
                text-align: center;
                border-bottom: 1px solid;
                border-color: #79a0c4
            }

            .text-center_1 {
                text-align: center;
                font-size: 9px;
                border-bottom: 1px solid;
                border-right: 1px solid;
                border-color: #79a0c4
            } 

            .text-center_2 {
                text-align: center;
                font-size: 10px;
            }            

            *{ font-family: DejaVu Sans !important;
                font-size: 11px;
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
        page <span class="pagenum"></span>{{--, vrijeme štampe: {{Carbon\Carbon::now()->format('d-m-Y H:i:s')}} --}}
    </div>
        <div>
            <div class="row">
                <div class="col-xs-6">
                    <table style="width: 100%;">

                                                                                <!--
                                                                                    material/img/TURBO_logo.png-->

                        {{--<tr><td width="60%" style="padding:0 25px 0 0"><img src="{{storage_path('app\public\pictures\TURBO_logo.jpg')}}" width="70%"></td>--}}
                        <tr><td width="60%" style="padding:0 25px 0 0"><img src="https://nasestanje.com/material/img/TURBO_logo.png" width="70%"></td>

                            <td style="font-size: 10px;">
                                TURBO SERVIS SAVIĆ s.p. VANESA SAVIĆ<br>
                                Dubička 49b, 78000 Banja Luka, BiH<br>
                                JIB:4512129590004, PDV: 512129590004<br><br>
                                
                                Tel: 066 871-322, +387 66 871-322<br>
                                email: turbosavic@gmail.com <br><br>

                                Ž.R. KM:  555-100-00546236-75 Nova Banka <br>
                                Ž.R. EUR: 555-000-00546238-22 Nova Banka <br>
    
                          </td>
                        </tr>
                     {{--
                        <tr><td colspan="2" class="text-center_2"><hr>Remont, čišćenje, testiranje, podašavanje, balansiranje turbina za sva putnička i teretna vozila, industrijske i poljoprivredne mašine<br>
                                            Testiranje, popravka, programiranje, podešavanje elektronika turbina kao i vakuma sa elektronskim senzorom položaja
                                            <hr><br>
                            </td>
                        </tr> 
                    --}}
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-7">

                    Date: {{Carbon\Carbon::now()->format('d-m-Y')}}
                </div>
    

            </div>
    
            <div style="margin-bottom: 0px">&nbsp;</div>
    
            <div class="row">
                <div class="col-xs-6">
                    
                    <h4  style="text-align: center; font-size: 16px;">Order parts</h4>
{{--
                    <address>
                        @foreach ($rnalog as $nalog)
                        <table style="width: 100%;">
                           <tr><td class="text-right"><strong>RN broj:</strong></td> <td class="text-left">{{$nalog->broj_RN}}</tr>
                           <tr><td class="text-right"><strong>Opis:</strong></td> <td class="text-left">{{$nalog->opis}}</tr>
                           <tr valign="top"><td class="text-right"><strong>Datum montaže:</strong></td> <td class="text-left">{{\Carbon\Carbon::parse($nalog->datum_montaze)->format('d-m-Y')}}</tr>
                           <tr valign="top"><td class="text-right"><strong>Datum isporuke:</strong></td> <td class="text-left">{{\Carbon\Carbon::parse($nalog->datum_isporuke)->format('d-m-Y')}}</tr>
                           <tr><td class="text-right"><strong>Broj smjena:</strong></td> <td class="text-left">{{$nalog->broj_dana}}</tr>
                           <tr><td class="text-right"><strong>Status:</strong></td> <td class="text-left">{{$nalog->opis_statusa}}</tr>             
                           </tr>
                        </table>
                        @endforeach   
                    </address>
--}}    
                </div>
    
                <div class="col-xs-5">

    
                    <div style="margin-bottom: 0px">&nbsp;</div>
    

                </div>
            </div>

            <table style="width: 100%;">
                <thead style="background: #c9dbec;">
                    <tr>

                        <th class="text-left"  style="padding: 1px;" >Items</th>
                        <th class="text-left"  style="padding: 1px;" >Code</th>
                        <th class="text-center"  style="padding: 1px;" >Quantity</th>
                        {{--
                        <th class="text-left"  style="padding: 1px;" >Items</th>
                        <th class="text-left"  style="padding: 1px;" >Code</th>
                        <th class="text-center"  style="padding: 1px;" >Quantity</th>
                        --}}
                    </tr>
                </thead>

                <tbody>
                    {{$kolona=0}}    
                        @foreach ($result as $stavke)
                        
                            @if ($stavke->limit>$stavke->na_stanju)
                            {{--
                                {{$kolona++}}
                                @if ($kolona==1)
                                <tr width="100%">
                                @endif    
                            --}}
                            <tr width="100%">
                                
                                <td class="text-left" style="padding: 0px 5px 0px 5px ;"><div>{{$stavke->tip}}</div></td>
                                <td class="text-left" style="padding: 0px 5px 0px 5px ;">{{$stavke->oznaka}}</td>
                                <td class="text-center_1" style="padding: 0px 5px 0px 5px ;">{{$stavke->limit-$stavke->na_stanju}}</td>
                            
                            </tr>
                            {{--    
                                @if($kolona==2)
                                </tr>
                                {{$kolona=0}}
                                @endif
                            --}}    
                            @endif


                        @endforeach
    
                </tbody>

            </table>
{{--   
                <div class="row">
                    <div class="col-xs-6"></div>
                    <div class="col-xs-5">
                        <table style="width: 100%">
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
    
                <div style="margin-bottom: 0px">&nbsp;</div>
                <div class="page-break"></div>
 --}}
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
</div>    
--}}

    {{--
                <div class="row">
                    <div class="col-xs-8 invbody-terms">
                        Neki tekst ako treba ovde.... <br>
                        <br>
                        <h4>Dodatne napomene</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eius quia, aut doloremque, voluptatibus quam ipsa sit sed enim nam dicta. Soluta eaque rem necessitatibus commodi, autem facilis iusto impedit!</p>
                    </div>
                </div>
            </div>
    --}}
         

        </body>



</html>