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


use App\Materijal;
use App\Mattip;
use App\Mattipvrsta;
use App\Mattipoznaka;
use Carbon\Carbon;
use App\Http\Requests\MaterijalRequest;

class MaterijalController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Materijal::class);
    }

    /**
     * Display a listing of the items
     *
     * @param \App\Materijal  $model
     * @return \Illuminate\View\View
     */
    public function index(Materijal $model)
    {
        return view('materijali.index', ['materijali' => $model->with(['mattip', 'mattipvrsta', 'mattipoznaka'])->get()]);
    }

    /**
     * Show the form for creating a new item
     * @param  \App\Mattip $mattipModel
     * @param  \App\Mattipvrsta $mattipvrstaModel
     * @param  \App\Mattipoznaka $mattipoznakaModel
     * @return \Illuminate\View\View
     */
    public function create(Mattip $mattipModel, Mattipvrsta $mattipvrstaModel, Mattipoznaka $mattipoznakaModel)
    {
        return view('materijali.create', [
            'mattip' => $mattipModel->get(['id', 'naziv']),
            'mattipvrsta' => $mattipvrstaModel->get(['id', 'mattip_id', 'naziv']),
            'mattipoznaka' => $mattipoznakaModel->get(['id', 'mattip_id', 'natpis', 'oznaka', 'internasifra'])
        ]);
    }

    /**
     * Store a newly created item in storage
     *
     * @param  \App\Http\Requests\MaterijalRequest  $request
     * @param  \App\Materijal  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MaterijalRequest $request, Materijal $model)
    {
        

        /*
        $alat = $model->create($request->merge([
            'aktivan' => $request->aktivan ? 1 : 0
        ])->all());
        */
        $model->create($request->all());

        return redirect()->route('materijal.index')->withStatus(__('Uspješno evidentiran novi materijal.'));
    }

    /**
     * Show the form for editing the specified item
     *
     * @param  \App\Materijal  $materijal      // osnovna tabela
     * @param  \App\Mattip $mattipModel
     * @param  \App\Mattipvrsta $mattipvrstaModel
     * @param  \App\Mattipoznaka $mattipoznakaModel
     * @return \Illuminate\View\View
     */
    public function edit(Materijal $materijal, Mattip $mattipModel, Mattipvrsta $mattipvrstaModel, Mattipoznaka $mattipoznakaModel)
    {
        return view('materijali.edit', 
        
        [ 
            'materijal' => $materijal, 

            'mattip' => $mattipModel->get(['id', 'naziv']),
            'mattipvrsta' => $mattipvrstaModel->get(['id', 'mattip_id', 'naziv']),
            'mattipoznaka' => $mattipoznakaModel->get(['id', 'mattip_id', 'natpis', 'oznaka', 'internasifra'])          
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MaterijalRequest  $request
     * @param  \App\Materijal  $materijal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MaterijalRequest $request, Materijal $materijal)
    {
        

        $materijal->update($request->all());
        
        /*
        $alat->update(
            $request->merge([
                'aktivan' => $request->aktivan ? 1 : 0
            ])->except([$request->hasFile('photo') ? '' : 'picture'])
        );
        */
   

        return redirect()->route('materijal.index')->withStatus(__('Izmjenjeni podaci o materijalu.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materijal  $materijal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Materijal $materijal)
    {
        $materijal->delete();

        return redirect()->route('materijal.index')->withStatus(__('Podaci o materijalu su izbrisani.'));
    }
}
