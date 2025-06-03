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
use App\User;
use App\Http\Requests\MtagRequest;

class MtagController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Mtag::class);
    }

    /**
     * Display a listing of the tags
     *
     * @param \App\Mtag  $model
     * @return \Illuminate\View\View
     */
    public function index(Mtag $model)
    {
        $this->authorize('manage-masine', User::class);

        return view('mtags.index', ['mtags' => $model->all()]);
    }

    /**
     * Show the form for creating a new tag
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mtags.create');
    }

    /**
     * Store a newly created tag in storage
     *
     * @param  \App\Http\Requests\MtagRequest  $request
     * @param  \App\Mtag  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MtagRequest $request, Mtag $model)
    {
        $model->create($request->all());

        return redirect()->route('mtag.index')->withStatus(__('Tag mašina uspješno kreiran.'));
    }

    /**
     * Show the form for editing the specified tag
     *
     * @param  \App\Mtag  $mtag
     * @return \Illuminate\View\View
     */
    public function edit(Mtag  $mtag)
    {
        return view('mtags.edit', compact('mtag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MtagRequest  $request
     * @param  \App\Mtag  $mtag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MtagRequest $request, Mtag $mtag)
    {
        $mtag->update($request->all());

        return redirect()->route('mtag.index')->withStatus(__('Tag mašina uspješno izmjenjen.'));
    }

    /**
     * Remove the specified tag from storage
     *
     * @param  \App\Mtag  $mtag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Mtag $mtag)
    {
        if (!$mtag->masine->isEmpty()) {
            return redirect()->route('mtag.index')->withErrors(__('Ovaj tag mašina je dodijeljen nekim mašinama i ne može biti obrisan.'));
        }

        $mtag->delete();

        return redirect()->route('mtag.index')->withStatus(__('Tag mašina uspješno izbrisan.'));
    }
}
