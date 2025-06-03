<!DOCTYPE html>
<html>
    <head>
        <meta charset="windows-1250">
        <title>Kalkulacija</title>
        <style>
            *{ font-family: DejaVu Sans !important;
               font-size:3mm; 
            }
          </style>
    </head>
    
    <body>
        @foreach($result as $stavka)
        tip materijala: {{$stavka->mattip_naziv}}<br>
        materijala: {{$stavka->materijal_naziv}}<br><br>
        @endforeach
    </body>
</html>    