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

use App\User;
use App\Mattipvrsta;
use App\Http\Requests\MattipvrstaRequest;

class MattipvrstaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Mattipvrsta::class);
    }

    /**
     * Display a listing of the vrsta materijala
     *
     * @param \App\Mattipvrsta  $model
     * @return \Illuminate\View\View
     */
    public function index(Mattipvrsta $model)
    {
        $this->authorize('manage-materijali', User::class);

        return view('mattipvrste.index');
    }

    
}
