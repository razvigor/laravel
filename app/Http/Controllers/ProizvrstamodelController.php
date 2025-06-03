<?php

namespace App\Http\Controllers;

use App\User;
use App\Proizvrstamodel;
use App\Http\Requests\ProizvrstamodelRequest;

class ProizvrstamodelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Proizvrstamodel::class);
    }

    /**
     * Display a listing of the categories
     *
     * @param \App\Proizvrstamodel  $model
     * @return \Illuminate\View\View
     */
    public function index(Proizvrstamodel $model)
    {
        $this->authorize('manage-rnalozi', User::class);

        return view('proizvrstamodeli.index', ['Proizvrstamodeli' => $model->all()]);
    }



 
}
