<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
    
        <title>Export faktura/nota</title>
    
 
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
                font-size: 8px;
            }

            .td_usluga {
                border-bottom: 1px solid;
            }            

            *{ font-family: DejaVu Sans !important;
                font-size: 10px;
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
                <div class="col-xs-7">
                    
                    <h3  style="text-align: center; font-size: 14px;">
                        Evidencija izdatih {{$ZGR=='SVI'?'računa i faktura':($ZGR=='N'?'NOTA računa':($ZGR=='G'?'GOTOVINSKIH faktura':'ŽIRALNIH (VIRMAN) faktura'))}} <br>
                        u periodu: {{\Carbon\Carbon::parse($datum_od)->format('d.m.Y')}} - {{\Carbon\Carbon::parse($datum_do)->format('d.m.Y')}}<br><br>
                    </h3>

                </div>
            </div>


            <div class="row">
                <div class="col-xs-7">
                    <table style="width: 100%;">
                        <tr>
                            <td @if($format=='portrait') style="text-align: left; width: 20%;" @else style="text-align: left; width: 10%;" @endif>
                                Tip računa: 
                            </td>
                            <td @if($format=='portrait') style="text-align: left; width: 80%;" @else style="text-align: left; width: 90%;" @endif>
                                <strong> {{$ZGR=='N'?'NOTA':'FAKTURA'}}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td @if($format=='portrait') style="text-align: left; width: 20%;" @else style="text-align: left; width: 10%;" @endif>
                                Način plaćanja: 
                            </td>
                            <td @if($format=='portrait') style="text-align: left; width: 80%;" @else style="text-align: left; width: 90%;" @endif>
                                <strong> {{$ZGR=='Z'?'ŽIRALNO (VIRMAN)':'GOTOVINSKI'}}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                 &nbsp;
                            </td>
                        </tr>
                    </table>
                </div>
            </div>            

            <table style="width: 100%;">

                {{-- ZAGLAVLJE TABELE --}}
                <thead style="background: #c9dbec;">
                    <tr>
                        <th class="text-center" >Broj <br>računa</th>
                        <th class="text-center" style="padding: 5px;" >Datum</th>
                        <th class="text-left" style="padding: 5px;" >Kupac</th>
                        <th class="text-left" >Usluga</th>
                        <th class="text-right" style="padding: 5px;">Cijena <br>bez PDV<</th>
                        <th class="text-right" style="padding: 5px;">PDV</th>
                        <th class="text-right" style="padding: 5px;">Iznos <br>sa PDV</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($export_racuna as $racun)   
                    {{-- RAČUNI --}}
                    <tr width="100%">
                    
                        <td class="text-center">{{$racun->broj}}</td>
                        <td class="text-center">{{\Carbon\Carbon::parse($racun->datum)->format('d-m-Y')}}</td>

                        <td class="text-left" style="padding-left: 5px;">{{$racun->kupac_naziv}}</td>
                        <td class="text-left" style="padding-left: 5px;">{{$racun->usluga}}</td>

                        <td class="text-right">{{number_format((float)$racun->cijena_bez_PDV, 2, '.', '')}}</td>
                        <td class="text-right">{{number_format((float)$racun->PDV, 2, '.', '')}}</td>
                        <td class="text-right">{{number_format((float)$racun->cijena, 2, '.', '')}}</td>
                    </tr>
                    @endforeach 


                    {{-- UKUPNO --}}
                    
                    <tr style="background: #c9dbec;">
                        
                        
                        <th colspan="4" class="text-right" style="padding-right: 5px;" >Ukupno</th>
                        <th class="text-right" style="padding: 5px;">{{number_format((float)$cijena_bez_PDV, 2, '.', '')}}</th>
                        <th class="text-right" style="padding: 5px;">{{number_format((float)$PDV, 2, '.', '')}}</th>
                        <th class="text-right" style="padding: 5px;">{{number_format((float)$iznos_sa_PDV, 2, '.', '')}}</th>
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
            
        </div>
    </body>
</html>