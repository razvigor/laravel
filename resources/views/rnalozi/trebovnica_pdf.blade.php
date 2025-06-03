<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
    
        <title>Trebovnica</title>
    
 
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
                    <h4  style="text-align: center; font-size: 16px;">TREBOVNICA MATERIJALA</h4>
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
                        <th class="text-center">R.br.</th>
                        <th class="text-left">Materijal</th>
                        <th class="text-center">Jedinica mjere</th>
                        <th class="text-center">Količina</th>
                        <th class="text-right">Cijena</th>
                        <th class="text-right">Vrijednost</th>

                    </tr>
                </thead>
                <tbody>



                    <div style="display:none">
                        {{$total = 0}}{{$r_br = 0}}
                    </div>

                    @foreach ($mattipovi as $tip)
 
                    
                    <div style="display:none">
                        {{$total_m = 0}}
                    </div>
                    @foreach ($result as $stavke)

                    @if($tip->mattip_id==$stavke->mattip_id)
                    <tr width="100%" {{--style="{{ $tip->mattip_id==$stavke->mattip_id ? '' : 'display:none'}}"--}}>
                        <td class="text-center"><div>{{$r_br+=$tip->mattip_id==$stavke->mattip_id ? 1 :0}}</div></td>
                        <td><div>{{$stavke->materijal_naziv}}</div></td>
                        <td class="text-center">{{$stavke->jed_mjere}}</td>
                        <td class="text-center">{{number_format((float)$stavke->potrosnja, 4, '.', '')}}</td>
                        <td class="text-right">{{$stavke->cijena}}</td>
                        <td class="text-right">{{number_format((float)$stavke->potrosnja*$stavke->cijena, 2, '.', '')}}</td>
                    </tr>
                    @endif

                    @if($tip->mattip_id==$stavke->mattip_id && $stavke->ima_kontakt!='0')
                    <tr width="100%" {{--style="{{ $tip->mattip_id==$stavke->mattip_id && $stavke->ima_kontakt!='0' ? '' : 'display:none'}}"--}}>
                        <td class="text-center"><div></div></td>
                        <td><div>kontakt</div></td>
                        <td class="text-center">{{$stavke->jed_mjere}}</td>
                        <td class="text-center">{{number_format((float)$stavke->potrosnja*$stavke->k_koef, 4, '.', '')}}</td>
                        <td class="text-right">{{$stavke->k_cijena}}</td>
                        <td class="text-right">{{number_format((float)$stavke->potrosnja*$stavke->k_koef*$stavke->k_cijena, 2, '.', '')}}</td>
                    </tr>
                    @endif

                    @if($tip->mattip_id==$stavke->mattip_id && $stavke->ima_razredjivac!='0')
                    <tr width="100%" {{--style="{{ $tip->mattip_id==$stavke->mattip_id && $stavke->ima_razredjivac!='0' ? '' : 'display:none'}}"--}}>
                        <td class="text-center"><div></div></td>
                        <td><div>razređivač</div></td>
                        <td class="text-center">{{$stavke->jed_mjere}}</td>
                        <td class="text-center">{{number_format((float)$stavke->potrosnja*$stavke->r_koef, 4, '.', '')}}</td>
                        <td class="text-right">{{$stavke->r_cijena}}</td>
                        <td class="text-right">{{number_format((float)$stavke->potrosnja*$stavke->r_koef*$stavke->r_cijena, 2, '.', '')}}</td>
                    </tr>
                    @endif


                    <div style="display:none">{{ $total_m+=$tip->mattip_id==$stavke->mattip_id ?  (
                                                                                                  number_format((float)$stavke->potrosnja*$stavke->cijena, 2, '.', '')
                                                                                               +  ($stavke->ima_kontakt!='0'     ? number_format((float)$stavke->potrosnja*$stavke->k_koef*$stavke->k_cijena, 2, '.', '') : 0)
                                                                                               +  ($stavke->ima_razredjivac!='0' ? number_format((float)$stavke->potrosnja*$stavke->r_koef*$stavke->r_cijena, 2, '.', '') : 0)
                                                                                                  )  
                                                                                               : 0}}</div>

                    @endforeach
                    <tr class="well" style="background: #e1edf8; padding: 5px">
                        <th colspan="5" style="padding: 5px;" class="text-right"><div> Ukupno {{$tip->mattip_naziv}}</div></th>
                        <td style="padding: 5px" class="text-right"><strong> {{$total_m}}</strong></td>
                    </tr> 
                    <div style="display:none">{{ $total+=$total_m}}</div>

                    @endforeach
                        <tr class="well">
                            <th colspan="2"></th>
                            <th colspan="3" style="background: #c9dbec; padding: 5px;" class="text-right"><div> Ukupno - troškovi materijala</div></th>
                            <td style="background: #c9dbec; padding: 5px" class="text-right"><strong> {{number_format((float)$total, 2, '.', '')}}</strong></td>
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
         

            </div>

         

        </body>



</html>