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
use App\Alatnaziv;
use App\Http\Requests\AlatnazivRequest;

class AlatnazivController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Alatnaziv::class);
    }

    /**
     * Display a listing of the categories
     *
     * @param \App\Alatnaziv  $model
     * @return \Illuminate\View\View
     */
    public function index(Alatnaziv $model)
    {
        $this->authorize('manage-alati', User::class);

        return view('alatnazivi.index', ['alatnazivi' => $model->all()]);
    }

    /**
     * Show the form for creating a new category
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('alatnazivi.create');
    }

    /**
     * Store a newly created category in storage
     *
     * @param  \App\Http\Requests\AlatnazivRequest  $request
     * @param  \App\Alatnaziv  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AlatnazivRequest $request, Alatnaziv $model)
    {
        $proizvodjac = $model->create($request->merge([
            'aktivan' => $request->aktivan ? 1 : 0
        ])->all());        
        //$model->create($request->all());

        return redirect()->route('alatnaziv.index')->withStatus(__('Uspješno kreiran naziv grupe alata.'));
    }

    /**
     * Show the form for editing the specified category
     *
     * @param  \App\Alatnaziv  $alatnaziv
     * @return \Illuminate\View\View
     */
    public function edit(Alatnaziv $alatnaziv)
    {
        return view('alatnazivi.edit', compact('alatnaziv'));
    }

    /**
     * Update the specified category in storage
     *
     * @param  \App\Http\Requests\AlatnazivRequest  $request
     * @param  \App\Alatnaziv  $alatnaziv
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AlatnazivRequest $request, Alatnaziv $alatnaziv)
    {
        //$alatnaziv->update($request->all());
        $alatnaziv->update(
            $request->merge([
                'aktivan' => $request->aktivan ? 1 : 0

            ])->except([$request->hasFile('photo') ? '' : 'picture']) /// slike nama ali treba ovako
        );

        return redirect()->route('alatnaziv.index')->withStatus(__('Uspješno izmjenjen naziv grupe alata.'));
    }

    /**
     * Remove the specified category from storage
     *
     * @param  \App\Alatnaziv  $alatnaziv
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Alatnaziv $alatnaziv)
    {
        if (!$alatnaziv->alati->isEmpty()) {
            return redirect()->route('alatnaziv.index')->withErrors(__('Postoje alati iz ove grupe. Brisanje nije moguće'));
        }

        $alatnaziv->delete();

        return redirect()->route('alatnaziv.index')->withStatus(__('Naziv grupe alata izbrisan.'));
    }
}
