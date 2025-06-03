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
use App\Proizvod;
use App\Http\Requests\ProizvodRequest;

class PlanproizvodnjeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Proizvod::class);
    }

    /**
     * Display a listing of the proizvodi
     *
     * @param \App\Proizvod  $model
     * @return \Illuminate\View\View
     */
    public function index(Proizvod $model)
    {
        $this->authorize('manage-planoviproizvodnje', User::class);

        return view('planoviproizvodnje.index', ['proizvodi' => $model->all()]);
        
        

    }

    /**
     * Show the form for creating a new proizvod
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('proizvodi.create');
    }

    /**
     * Store a newly created proizvod in storage
     *
     * @param  \App\Http\Requests\ProizvodRequest  $request
     * @param  \App\Proizvod  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProizvodRequest $request, Proizvod $model)
    {
        //$model->create($request->all());

        $proizvod = $model->create($request->merge([
            'aktivan' => $request->aktivan ? 1 : 0
        ])->all());  

        return redirect()->route('proizvod.index')->withStatus(__('Proizvod uspješno kreiran.'));
    }

    /**
     * Show the form for editing the specified proizvod
     *
     * @param  \App\Proizvod  $proizvod
     * @return \Illuminate\View\View
     */
    public function edit(Proizvod $proizvod)
    {
        return view('proizvodi.edit',   compact('proizvod')
        );
    }
        //return view('materijali.index', ['materijali' => $model->with(['mattip', 'mattipvrsta', 'mattipoznaka'])->get()]);
    /**
     * Update the specified proizvod in storage
     *
     * @param  \App\Http\Requests\ProizvodRequest  $request
     * @param  \App\Proizvod  $proizvod
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProizvodRequest $request, Proizvod $proizvod)
    {
        //$proizvod->update($request->all());
        $proizvod->update(
            $request->merge([
                'aktivan' => $request->aktivan ? 1 : 0

            ])->all()
        );


        return redirect()->route('proizvod.index')->withStatus(__('Proizvod uspješno ažuriran.'));
    }

    /**
     * Remove the specified proizvod from storage
     *
     * @param  \App\Proizvod  $proizvod
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Proizvod $proizvod)
    {
        if (!$proizvod->elementi->isEmpty()) {
            return redirect()->route('proizvod.index')->withErrors(__('Proizvod ima elemente i ne može se brisati.'));
        }

        $proizvod->delete();

        return redirect()->route('proizvod.index')->withStatus(__('Proizvod uspješno izbrisan.'));
    }
}
