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
use App\Masinvrsta;
use App\Http\Requests\MasinvrstaRequest;

class MasinvrstaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Masinvrsta::class);
    }

    /**
     * Display a listing of the categories
     *
     * @param \App\Masinvrsta  $model
     * @return \Illuminate\View\View
     */
    public function index(Masinvrsta $model)
    {
        $this->authorize('manage-masine', User::class);

        return view('masinvrste.index', ['masinvrste' => $model->all()]);
    }

    /**
     * Show the form for creating a new category
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('masinvrste.create');
    }

    /**
     * Store a newly created category in storage
     *
     * @param  \App\Http\Requests\MasinvrstaRequest  $request
     * @param  \App\Masinvrsta  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MasinvrstaRequest $request, Masinvrsta $model)
    {
        $model->create($request->all());

        return redirect()->route('masinvrsta.index')->withStatus(__('Uspješno kreirana vrsta mašine.'));
    }

    /**
     * Show the form for editing the specified category
     *
     * @param  \App\Masinvrsta  $masinvrsta
     * @return \Illuminate\View\View
     */
    public function edit(Masinvrsta $masinvrsta)
    {
        return view('masinvrste.edit', compact('masinvrsta'));
    }

    /**
     * Update the specified category in storage
     *
     * @param  \App\Http\Requests\MasinvrstaRequest  $request
     * @param  \App\Masinvrsta  $masinvrsta
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MasinvrstaRequest $request, Masinvrsta $masinvrsta)
    {
        $masinvrsta->update($request->all());

        return redirect()->route('masinvrsta.index')->withStatus(__('Uspješno izmjenjena vrsta mašine.'));
    }

    /**
     * Remove the specified category from storage
     *
     * @param  \App\Masinvrsta  $masinvrsta
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Masinvrsta $masinvrsta)
    {
        if (!$masinvrsta->masine->isEmpty()) {
            return redirect()->route('masinvrsta.index')->withErrors(__('Postoje mašine ove vrste. Brisanje vrste nije moguće'));
        }

        $masinvrsta->delete();

        return redirect()->route('masinvrsta.index')->withStatus(__('Vrsta mašine izbrisana.'));
    }
}
