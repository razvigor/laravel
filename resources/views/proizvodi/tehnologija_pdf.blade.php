<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
    
        <title>Tehnologija proizvoda</title>
    
 
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
            strana br. <span class="pagenum"></span>, vrijeme štampe: {{Carbon\Carbon::now()->format('d-m-Y H:i:s')}} 
        </div>
             
        <div>
            <div class="row">
                <div class="col-xs-7">
                    
                    <strong>Karpenteri Vitorog d.o.o.</strong><br>
                    Jaruge bb <br>
                    79101 Prijedor, RS<br>
                    tel: 00 387 52 482 502 <br>
                    email: office@karpenteri-vitorog.com <br>
    
                    <br><br>
                    Datum: {{Carbon\Carbon::now()->format('d-m-Y')}}
                </div>
    

            </div>
    
            <div style="margin-bottom: 0px">&nbsp;</div>
    
            <div class="row">
                <div class="col-xs-12">
                    
                    <h4  style="text-align: center; font-size: 16px;">TEHNOLOGIJA PROIZVODA</h4>
                    <address>
                        <table style="width: 100%;">
                           <tr><td class="text-right" style="width: 50%;"><strong>Šifra:</strong></td> <td class="text-left">{{$proizvod->sifra_proizvoda}}</tr>
                           <tr><td class="text-right" style="width: 50%;"><strong>Naziv:</strong></td> <td class="text-left">{{$proizvod->naziv}}</tr>
                                        
                           </tr>
                        </table>   
                    </address>
                </div>
    
                <div class="col-xs-12">

    
                    <div style="margin-bottom: 0px">&nbsp;</div>
    

                </div>
            </div>
    
            <table style="width: 100%;">
                


                
                <tbody>

                    <div style="display:none">
                        {{$r_br = 0}}
                    </div>
                    
                    @foreach ($mattipovi_elementi as $element)

                        <tr class="well" style="background: #e1edf8; padding: 5px">
                                <th colspan="8" style="padding: 5px;" class="text-left"><div>Element: {{$element->element_naziv}}</div></th>
                        </tr> 
  
                        <tr style="background: #eff5fa;">
                            <th style="padding: 5px;" class="text-center">R.br.</th>
                            <th style="padding: 5px;" class="text-left">Mašina</th>
                            <th style="padding: 5px;" class="text-center">Broj<br>rukovalaca</th>
                            <th style="padding: 5px;" class="text-center">Broj<br>pomoćnika</th>
                            <th style="padding: 5px;" class="text-left">Opis operacije</th>
                            <th class="text-left" style="padding: 5px;">Parametri</th>
                            <th class="text-left" style="padding: 5px;">Alat</th>
                            <th style="padding: 5px;" class="text-center">Vrijeme<br>(min)</th>
    
                        </tr>                        

                    
                        @foreach ($result as $stavke)

                            @if ($element->element_id==$stavke->element_id)
                            
                            <tr width="100%">
                            
                                <td class="text-center"><div>{{$r_br+=$element->element_naziv==$stavke->element_naziv ? 1 :0}}</div></td>
                            
                                <td class="text-left" style="padding: 5px;">{{$stavke->masina_naziv}}</td>
                                <td class="text-center" style="padding: 5px;">{{$stavke->br_rr}}</td>
                                <td class="text-center" style="padding: 5px;">{{$stavke->br_pr}}</td>
                                <td class="text-left" style="padding: 5px;">{{$stavke->opis}}</td>
                                <td class="text-left">{{$stavke->parametri}}</td>
                                <td class="text-left">{{$stavke->alat_naziv}}</td>
                                <td class="text-center">{{number_format((float)$stavke->vrijeme, 3, '.', '')}}</td>

        
                            </tr>
                            
                            @endif

                        @endforeach


                    @endforeach

    
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
    
                <div style="margin-bottom: 0px">&nbsp;</div>
                <div class="page-break"></div>

<!-- potpis  (IZRADIO, ODOBRIO) -->   
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