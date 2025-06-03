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
use App\Proizvodjac;
use App\Http\Requests\ProizvodjacRequest;

class ProizvodjacController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Proizvodjac::class);
    }

    /**
     * Display a listing of the categories
     *
     * @param \App\Proizvodjac  $model
     * @return \Illuminate\View\View
     */
    public function index(Proizvodjac $model)
    {
        $this->authorize('manage-alati', User::class);

        return view('proizvodjaci.index', ['proizvodjaci' => $model->all()]);
    }

    /**
     * Show the form for creating a new category
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('proizvodjaci.create');
    }

    /**
     * Store a newly created category in storage
     *
     * @param  \App\Http\Requests\ProizvodjacRequest  $request
     * @param  \App\Proizvodjac  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProizvodjacRequest $request, Proizvodjac $model)
    {

        $proizvodjac = $model->create($request->merge([
            'aktivan' => $request->aktivan ? 1 : 0
        ])->all());        
        //$model->create($request->all());

        return redirect()->route('proizvodjac.index')->withStatus(__('Uspješno kreirana vrsta mašine.'));
    }

    /**
     * Show the form for editing the specified category
     *
     * @param  \App\Proizvodjac  $proizvodjac
     * @return \Illuminate\View\View
     */
    public function edit(Proizvodjac $proizvodjac)
    {
        return view('proizvodjaci.edit', compact('proizvodjac'));
    }

    /**
     * Update the specified category in storage
     *
     * @param  \App\Http\Requests\ProizvodjacRequest  $request
     * @param  \App\Proizvodjac  $proizvodjac
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProizvodjacRequest $request, Proizvodjac $proizvodjac)
    {
        //$proizvodjac->update($request->all());

        $proizvodjac->update(
            $request->merge([
                'aktivan' => $request->aktivan ? 1 : 0

            ])->except([$request->hasFile('photo') ? '' : 'picture'])
        );


        return redirect()->route('proizvodjac.index')->withStatus(__('Uspješno izmjenjen proizvođač.'));
    }

    /**
     * Remove the specified category from storage
     *
     * @param  \App\Proizvodjac  $proizvodjac
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Proizvodjac $proizvodjac)
    {
        if (!$proizvodjac->alati->isEmpty()) {
            return redirect()->route('proizvodjac.index')->withErrors(__('Postoje alati ovog  proizvođača. Brisanje nije moguće'));
        }

        $proizvodjac->delete();

        return redirect()->route('proizvodjac.index')->withStatus(__('Proizvođač izbrisan.'));
    }
}
