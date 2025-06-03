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

use App\Mtag;
use App\Masina;
use App\Masinvrsta;
use App\Masinlokacija;
use Carbon\Carbon;
use App\Http\Requests\MasinaRequest;

class MasinaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Masina::class);
    }

    /**
     * Display a listing of the items
     *
     * @param \App\Masina  $model
     * @return \Illuminate\View\View
     */
    public function index(Masina $model)
    {
        return view('masine.index', ['masine' => $model->with(['mtags', 'masinvrsta', 'masinlokacija'])->get()]);
    }

    /**
     * Show the form for creating a new item
     *
     * @param  \App\Mtag $mtagModel
     * @param  \App\Masinvrsta $masinvrstaModel
     * @param  \App\Masinlokacija $masinlokacijaModel
     * @return \Illuminate\View\View
     */
    public function create(Mtag $mtagModel, Masinvrsta $masinvrstaModel, Masinlokacija $masinlokacijaModel)
    {
        return view('masine.create', [
            'mtags' => $mtagModel->get(['id', 'name']),
            'masinvrsta' => $masinvrstaModel->get(['id', 'name']),
            'masinlokacija' => $masinlokacijaModel->get(['id', 'naziv'])            
        ]);
    }

    /**
     * Store a newly created item in storage
     *
     * @param  \App\Http\Requests\MasinaRequest  $request
     * @param  \App\Masina  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MasinaRequest $request, Masina $model)
    {
        $masina = $model->create($request->merge([
            'picture' => $request->photo->store('pictures', 'public'),
            'show_on_homepage' => $request->show_on_homepage ? 1 : 0,
            'kz' => $request->kz ? 1 : 0,
            'bruto_mjere' => $request->bruto_mjere ? 1 : 0,
            'options' => $request->options ? $request->options : null,
            'date' => $request->date ? Carbon::parse($request->date)->format('Y-m-d') : null
        ])->all());
        $masina->mtags()->sync($request->get('mtags'));

        return redirect()->route('masina.index')->withStatus(__('Uspješno evidentirana nova mašina.'));
    }

    /**
     * Show the form for editing the specified item
     *
     * @param  \App\Masina  $masina
     * @param  \App\Mtag   $mtagModel
     * @param  \App\Masinvrsta $masinvrstaModel
     * @param  \App\Masinlokacija $masinlokacijaModel     
     * @return \Illuminate\View\View
     */
    public function edit(Masina $masina, Mtag $mtagModel, Masinvrsta $masinvrstaModel, Masinlokacija $masinlokacijaModel)
    {
        return view('masine.edit', [
            'masina' => $masina->load('mtags'),
            'mtags' => $mtagModel->get(['id', 'name']),
            'masinvrsta' => $masinvrstaModel->get(['id', 'name']),
            'masinlokacija' => $masinlokacijaModel->get(['id', 'naziv'])            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MasinaRequest  $request
     * @param  \App\Masina  $masina
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MasinaRequest $request, Masina $masina)
    {
 
        $masina->update(
            $request->merge([
                'picture' => $request->photo ? $request->photo->store('pictures', 'public') : null,
                'show_on_homepage' => $request->show_on_homepage ? 1 : 0,
                'kz' => $request->kz ? 1 : 0,
                'bruto_mjere' => $request->bruto_mjere ? 1 : 0,
                'options' => $request->options ? $request->options : null,
                'date' => $request->date ? Carbon::parse($request->date)->format('Y-m-d') : null
            ])->except([$request->hasFile('photo') ? '' : 'picture'])
        );

        $masina->mtags()->sync($request->get('mtags'));

        return redirect()->route('masina.index')->withStatus(__('Izmjenjeni podaci o mašini.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Masina  $masina
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Masina $masina)
    {
        $masina->delete();

        return redirect()->route('masina.index')->withStatus(__('Mašina izbrisana.'));
    }
}
