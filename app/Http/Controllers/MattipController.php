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
use App\Mattip;
use App\Http\Requests\MattipRequest;

class MattipController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Mattip::class);
    }

    /**
     * Display a listing of the tipova materijala
     *
     * @param \App\Mattip  $model
     * @return \Illuminate\View\View
     */
    public function index(Mattip $model)
    {
        $this->authorize('manage-materijali', User::class);

        return view('mattipovi.index', ['mattipovi' => $model->where('aktivan','=','1')->get()]);
    }

    /**
     * Show the form for creating a new mattip
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mattipovi.create');
    }

    /**
     * Store a newly created mattip in storage
     *
     * @param  \App\Http\Requests\MattipRequest  $request
     * @param  \App\Mattip  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MattipRequest $request, Mattip $model)
    {
        $model->create($request->all());

        return redirect()->route('mattip.index')->withStatus(__('Mattip successfully created.'));
    }

    /**
     * Show the form for editing the specified mattip
     *
     * @param  \App\Mattip  $mattip
     * @return \Illuminate\View\View
     */
    public function edit(Mattip $mattip)
    {
        return view('mattipovi.edit', compact('mattip'));
    }

    /**
     * Update the specified mattip in storage
     *
     * @param  \App\Http\Requests\MattipRequest  $request
     * @param  \App\Mattip  $mattip
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MattipRequest $request, Mattip $mattip)
    {
    
        $mattip->update(
            $request->merge([
                'kdef01' => $request->kdef01 ? $request->kdef01*$mattip->kdec01 : 0,
                'kdef02' => $request->kdef02 ? $request->kdef02*$mattip->kdec02 : 0,
                'kdef03' => $request->kdef03 ? $request->kdef03*$mattip->kdec03 : 0,
                'kdef04' => $request->kdef04 ? $request->kdef04*$mattip->kdec04 : 0,
                'kdef05' => $request->kdef05 ? $request->kdef05*$mattip->kdec05 : 0,
                'kdef06' => $request->kdef06 ? $request->kdef06*$mattip->kdec06 : 0,
                'kdef07' => $request->kdef06 ? $request->kdef07*$mattip->kdec07 : 0

                ])->all()
        );
    
        //$mattip->update($request->all());

        return redirect()->route('mattip.index')->withStatus(__('Tip materijala uspješno izmjenjen.'));
    }

    /**
     * Remove the specified mattip from storage
     *
     * @param  \App\Mattip  $mattip
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Mattip $mattip)
    {
        if (!$mattip->materijali->isEmpty()) {
            return redirect()->route('mattip.index')->withErrors(__('This mattip has items attached and can\'t be deleted.'));
        }

        $mattip->delete();

        return redirect()->route('mattip.index')->withStatus(__('Mattip successfully deleted.'));
    }
}
