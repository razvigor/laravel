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


use App\Predracun;

use Carbon\Carbon;
use App\Http\Requests\PredracunRequest;

class PredracunController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Predracun::class);
    }

    /**
     * Display a listing of the items
     *
     * @param \App\Predracun  $model
     * @return \Illuminate\View\View
     */
    public function index(Predracun $model)
    {
        return view('predracuni.index', ['predracuni' => $model->get()]);
    }


}
