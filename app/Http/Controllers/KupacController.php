<?php

namespace App\Http\Controllers;

use App\User;
use App\Kupac;
use App\Http\Requests\KupacRequest;

class KupacController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Kupac::class);
    }

    /**
     * Display a listing of the categories
     *
     * @param \App\Kupac  $model
     * @return \Illuminate\View\View
     */
    public function index(Kupac $model)
    {
        $this->authorize('manage-rnalozi', User::class);

        return view('kupci.index', ['kupci' => $model->all()]);
    }



 
}
