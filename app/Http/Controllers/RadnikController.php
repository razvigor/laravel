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


use App\Radnik;
use Carbon\Carbon;
use App\Http\Requests\RadnikRequest;

class RadnikController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Radnik::class);
    }

    /**
     * Display a listing of the items
     *
     * @param \App\Radnik  $model
     * @return \Illuminate\View\View
     */
    public function index(Radnik $model)
    {
        return view('radnici.index', ['radnici' => $model->all()]);
    }

    /**
     * Show the form for creating a new item
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('radnici.create');
    }

    /**
     * Store a newly created item in storage
     *
     * @param  \App\Http\Requests\RadnikRequest  $request
     * @param  \App\Radnik  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RadnikRequest $request, Radnik $model)
    {

        $model->create($request->all());

        return redirect()->route('radnik.index')->withStatus(__('Uspješno evidentirana novi radnik.'));
    }

    /**
     * Show the form for editing the specified item
     *
     * @param  \App\Radnik  $radnik
     * @return \Illuminate\View\View
     */
    public function edit(Radnik $radnik)
    {
        return view('radnici.edit', compact('radnik'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RadnikRequest  $request
     * @param  \App\Radnik  $radnik
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RadnikRequest $request, Radnik $radnik)
    {
      
        
        $radnik->update($request->all());
        

        return redirect()->route('radnik.index')->withStatus(__('Izmjenjeni podaci o radniku.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Masina  $masina
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Radnik $radnik)
    {
        $radnik->delete();

        return redirect()->route('radnik.index')->withStatus(__('Podaci o radniku su izbrisani.'));
    }
}
