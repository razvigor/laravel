<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
    
        <title>Radni listovi</title>
    
 
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
                <div class="col-xs-6">
                    
                    <h4  style="text-align: center; font-size: 16px;">RADNI LISTOVI</h4>
                    <address>
                        <table style="width: 100%;">
                           <tr><td class="text-right"><strong>RN broj:</strong></td> <td class="text-left">{{$rnalog->broj_RN}}</tr>
                           <tr><td class="text-right"><strong>Opis:</strong></td> <td class="text-left">{{$rnalog->opis}}</tr>
                           <tr valign="top"><td class="text-right"><strong>Datum montaže:</strong></td> <td class="text-left">{{\Carbon\Carbon::parse($rnalog->datum_montaze)->format('d-m-Y')}}</tr>
                           <tr valign="top"><td class="text-right"><strong>Datum isporuke:</strong></td> <td class="text-left">{{\Carbon\Carbon::parse($rnalog->datum_isporuka)->format('d-m-Y')}}</tr>
                                        
                           </tr>
                        </table>   
                    </address>
                </div>
    
                <div class="col-xs-5">

    
                    <div style="margin-bottom: 0px">&nbsp;</div>
    

                </div>
            </div>
    
            <table style="width: 100%;">
                <thead style="background: #c9dbec;">
                    <tr>
                        <th class="text-center" rowspan="2">R.br.</th>
                        <th style="padding: 5px;" class="text-left"  rowspan="2">Proizvod</th>
                        <th style="padding: 5px;" class="text-left"  rowspan="2">Materijal</th>
                        <th class="text-center"  rowspan="2">Klasa</th>
                        <th style="padding: 5px;" class="text-left"  rowspan="2">Naziv dijela proizvoda</th>
                        <th class="text-center"  rowspan="2">Dužina</th>
                        <th class="text-center"  rowspan="2">Širina</th>
                        <th class="text-center"  rowspan="2">Debljina</th>
                        <th class="text-center"  rowspan="2">Komada<br>(kom. u proizvodu x broj proizvoda)</th>
                        <th class="text-center" colspan="2">Datum: ___ / ___ / ___</th>
                        <th class="text-center" colspan="2">Datum: ___ / ___ / ___</th>
                        <th class="text-center" colspan="2">Datum: ___ / ___ / ___</th>

                    </tr>

                    <tr>
                        <th class="text-center" >Izrađeno</th><th>Potpis</th>
                        <th class="text-center" >Izrađeno</th><th>Potpis</th>
                        <th class="text-center" >Izrađeno</th><th>Potpis</th>

                    </tr>

                </thead>
                <tbody>

                    <div style="display:none">
                        {{$r_br = 0}}
                    </div>
                    
                    @foreach ($masine as $masina)

                        <tr class="well" style="background: #e1edf8; padding: 5px">
                                <th colspan="15" style="padding: 5px;" class="text-left"><div> {{$masina->masina_naziv}}</div></th>
                        </tr> 
    

                    
                        @foreach ($result as $stavke)

                            @if ($masina->masina_id==$stavke->masina_id)
                            <tr width="100%">
                            
                                <td class="text-center"><div>{{$r_br+=$masina->masina_id==$stavke->masina_id ? 1 :0}}</div></td>
                                <td class="text-left" style="padding: 5px;"><div>{{$stavke->proizvod_naziv}}</div></td>
                                <td class="text-left" style="padding: 5px;">{{$stavke->mat_naziv_kratki}}</td>
                                <td class="text-center">{{$stavke->klasa}}</td>
                                <td class="text-left" style="padding: 5px;">{{$stavke->element_naziv}}</td>
                                <td class="text-center">{{number_format((float)$stavke->duzina, 0, '.', '')}}</td>
                                <td class="text-center">{{number_format((float)$stavke->sirina, 0, '.', '')}}</td>
                                <td class="text-center">{{number_format((float)$stavke->debljina, 0, '.', '')}}</td>
                                <td class="text-center">{{number_format((float)$stavke->broj_komada*$stavke->teh_k, 0, '.', '')}}</td>
                                <td class="text-unos"></td>
                                <td class="text-unos"></td>
                                <td class="text-unos"></td>
                                <td class="text-unos"></td>
                                <td class="text-unos"></td>
                                <td class="text-suma"></td>
        
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