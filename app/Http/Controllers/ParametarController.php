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
use App\Parametar;
use App\Http\Resources\ParametarRES;
use App\Http\Requests\ParametarRequest;

class ParametarController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Parametar::class);
    }

    /**
     * Display a listing of the tipova materijala
     *
     * @param \App\Parametar  $model
     * @return \Illuminate\View\View
     */
    public function index(Parametar $model)
    {
        $this->authorize('manage-materijali', User::class);

        return view('parametri.index', ['parametri' => $model->get()]);
        
    }

    /**
     * Show the form for creating a new parametar
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('parametri.create');
    }

    /**
     * Store a newly created parametar in storage
     *
     * @param  \App\Http\Requests\ParametarRequest  $request
     * @param  \App\Parametar  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ParametarRequest $request, Parametar $model)
    {
        //$model->create($request->all());

        $model->create(
            $request->merge([
                'vrijednost' => $request->vrijednost*100

                ])->all()
        );


        return redirect()->route('parametar.index')->withStatus(__('Parametar uspješno kreiran.'));
    }

    /**
     * Show the form for editing the specified parametar
     *
     * @param  \App\Parametar  $parametar
     * @return \Illuminate\View\View
     */
    public function edit(Parametar $parametar)
    {
        return view('parametri.edit', compact('parametar'));
    }

    /**
     * Update the specified parametar in storage
     *
     * @param  \App\Http\Requests\ParametarRequest  $request
     * @param  \App\Parametar  $parametar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ParametarRequest $request, Parametar $parametar)
    {
    
        $parametar->update(
            $request->merge([
                'vrijednost' => $request->vrijednost*100

                ])->all()
        );
    
        //$parametar->update($request->all());

        return redirect()->route('parametar.index')->withStatus(__('Parametar uspješno izmjenjen.'));
    }

    /**
     * Remove the specified parametar from storage
     *
     * @param  \App\Parametar  $parametar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Parametar $parametar)
    {


        $parametar->delete();

        return redirect()->route('parametar.index')->withStatus(__('Parametar uspješno izbrisan.'));
    }
}
