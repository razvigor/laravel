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


use App\Alat;
use App\Alatnaziv;
use App\Proizvodjac;
use Carbon\Carbon;
use App\Http\Requests\AlatRequest;

class AlatController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Alat::class);
    }

    /**
     * Display a listing of the items
     *
     * @param \App\Alat  $model
     * @return \Illuminate\View\View
     */
    public function index(Alat $model)
    {
        return view('alati.index', ['alati' => $model->with(['proizvodjac', 'alatnaziv'])->get()]);
    }

    /**
     * Show the form for creating a new item
     * @param  \App\Proizvodjac $proizvodjacModel
     * @param  \App\Alatnaziv $alatnazivModel
     * @return \Illuminate\View\View
     */
    public function create(Proizvodjac $proizvodjacModel, Alatnaziv $alatnazivModel)
    {
        return view('alati.create', [
            'proizvodjac' => $proizvodjacModel->get(['id', 'naziv']),
            'alatnaziv' => $alatnazivModel->get(['id', 'naziv', 'vrsta_namjena'])
        ]);
    }

    /**
     * Store a newly created item in storage
     *
     * @param  \App\Http\Requests\AlatRequest  $request
     * @param  \App\Alat  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AlatRequest $request, Alat $model)
    {
        
        $alat = $model->create($request->merge([
            'aktivan' => $request->aktivan ? 1 : 0
        ])->all());
        
        //$model->create($request->all());

        return redirect()->route('alat.index')->withStatus(__('Uspješno evidentiran novi alat.'));
    }

    /**
     * Show the form for editing the specified item
     *
     * @param  \App\Alat  $alat
     * @param  \App\Proizvodjac $proizvodjacModel
     * @param  \App\Alatnaziv $alatnazivModel
     * @return \Illuminate\View\View
     */
    public function edit(Alat $alat, Proizvodjac $proizvodjacModel, Alatnaziv $alatnazivModel)
    {
        return view('alati.edit', 
        
        [ 
            'alat' => $alat, 
            'proizvodjac' => $proizvodjacModel->get(['id', 'naziv']),
            'alatnaziv' => $alatnazivModel->get(['id', 'naziv', 'vrsta_namjena'])          
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AlatRequest  $request
     * @param  \App\Alat  $alat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AlatRequest $request, Alat $alat)
    {
        
        $alat->update(
            $request->merge([
                'aktivan' => $request->aktivan ? 1 : 0
            ])->except([$request->hasFile('photo') ? '' : 'picture'])
        );
        
   

        return redirect()->route('alat.index')->withStatus(__('Izmjenjeni podaci o alatu.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alat  $alat
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Alat $alat)
    {
        $alat->delete();

        return redirect()->route('alat.index')->withStatus(__('Podaci o alatu su izbrisani.'));
    }
}
