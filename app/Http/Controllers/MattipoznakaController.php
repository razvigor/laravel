<?php

namespace App\Http\Controllers;

use App\User;
use App\Mattipoznaka;
use App\Http\Requests\MattipoznakaRequest;

class MattipoznakaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Mattipoznaka::class);
    }

    /**
     * Display a listing of the categories
     *
     * @param \App\Mattipoznaka  $model
     * @return \Illuminate\View\View
     */
    public function index(Mattipoznaka $model)
    {
        $this->authorize('manage-rnalozi', User::class);

        return view('mattipoznake.index', ['mattipoznake' => $model->all()]);
    }

 
}
