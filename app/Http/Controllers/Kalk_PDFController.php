<?php
/*

=========================================================
* Argon Dashboard PRO - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro-laravel
* Copyright 2018 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)

* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/
namespace App\Http\Controllers;

use DB;
use PDF;
use App\User;
use App\Proizvod;
use App\Element;
use App\Operacija;
use App\Http\Requests\ProizvodRequest;

class Kalk_PDFController extends Controller
{
    public function show()
    {
            //return view('proizvodi.kalkulacija_pdf');
            $pdf=PDF::loadView('proizvodi.index');
            return $pdf->stream();//download('kalkulacija.pdf');
    }


}
