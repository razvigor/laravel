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
use App\Rnalog;
use Carbon\Carbon;
use App\Http\Requests\RnalogRequest;

class RnalogController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Rnalog::class);
    }

    /**
     * Display a listing of the rnalogi
     *
     * @param \App\Rnalog  $model
     * @return \Illuminate\View\View
     */
    public function index(Rnalog $model)
    {
        $this->authorize('manage-rnalozi', User::class);

        return view('rnalozi.index', ['rnalozi' => $model->all()]);
        
        

    }

    /**
     * Show the form for creating a new rnalog
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rnalozi.create');
    }

    /**
     * Store a newly created rnalog in storage
     *
     * @param  \App\Http\Requests\RnalogRequest  $request
     * @param  \App\Rnalog  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RnalogRequest $request, Rnalog $model)
    {
        //$model->create($request->all());

        $rnalog = $model->create($request->merge([
            'datum_montaze' => $request->datum_montaze ? Carbon::parse($request->datum_montaze)->format('Y-m-d') : null,
            'datum_isporuke' => $request->datum_isporuke ? Carbon::parse($request->datum_isporuke)->format('Y-m-d') : null
        ])->all());

        return redirect()->route('rnalog.index')->withStatus(__('Radni nalog uspješno kreiran.'));
    }

    /**
     * Show the form for editing the specified rnalog
     *
     * @param  \App\Rnalog  $rnalog
     * @return \Illuminate\View\View
     */
    public function edit(Rnalog $rnalog)
    {
        return view('rnalozi.edit',   compact('rnalog')
        );
    }
        //return view('materijali.index', ['materijali' => $model->with(['mattip', 'mattipvrsta', 'mattipoznaka'])->get()]);
    /**
     * Update the specified rnalog in storage
     *
     * @param  \App\Http\Requests\RnalogRequest  $request
     * @param  \App\Rnalog  $rnalog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RnalogRequest $request, Rnalog $rnalog)
    {
        //$rnalog->update($request->all());
        $rnalog->update(
            $request->merge([
                'datum_montaze' => $request->datum_montaze ? Carbon::parse($request->datum_montaze)->format('Y-m-d') : null,
                'datum_isporuke' => $request->datum_isporuke ? Carbon::parse($request->datum_isporuke)->format('Y-m-d') : null

            ])->all()
        );


        return redirect()->route('rnalog.index')->withStatus(__('Radni nalog uspješno ažuriran.'));
    }

    /**
     * Remove the specified rnalog from storage
     *
     * @param  \App\Rnalog  $rnalog
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Rnalog $rnalog)
    {
        if (!$rnalog->stavkeRN->isEmpty()) {
            return redirect()->route('rnalog.index')->withErrors(__('Radni nalog ima stavke i ne može se brisati.'));
        }

        $rnalog->delete();

        return redirect()->route('rnalog.index')->withStatus(__('Radni nalog uspješno izbrisan.'));
    }
}
