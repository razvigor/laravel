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
use App\Masinlokacija;
use App\Http\Requests\MasinlokacijaRequest;

class MasinlokacijaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Masinlokacija::class);
    }

    /**
     * Display a listing of the categories
     *
     * @param \App\Masinlokacija  $model
     * @return \Illuminate\View\View
     */
    public function index(Masinlokacija $model)
    {
        $this->authorize('manage-masine', User::class);

        return view('masinlokacije.index', ['masinlokacije' => $model->all()]);
    }

    /**
     * Show the form for creating a new category
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('masinlokacije.create');
    }

    /**
     * Store a newly created category in storage
     *
     * @param  \App\Http\Requests\MasinlokacijaRequest  $request
     * @param  \App\Masinlokacija  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MasinlokacijaRequest $request, Masinlokacija $model)
    {
        $model->create(
            $request->merge([
                'teh_koef' => $request->teh_koef ? $request->teh_koef *100 : 1
            ])->all()
        );

        return redirect()->route('masinlokacija.index')->withStatus(__('Uspješno kreirana lokacija mašina.'));
    }

    /**
     * Show the form for editing the specified category
     *
     * @param  \App\Masinlokacija  $masinlokacija
     * @return \Illuminate\View\View
     */
    public function edit(Masinlokacija $masinlokacija)
    {
        return view('masinlokacije.edit', compact('masinlokacija'));
    }

    /**
     * Update the specified category in storage
     *
     * @param  \App\Http\Requests\MasinlokacijaRequest  $request
     * @param  \App\Masinlokacija  $masinlokacija
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MasinlokacijaRequest $request, Masinlokacija $masinlokacija)
    {
        $masinlokacija->update(
            $request->merge([
                'teh_koef' => $request->teh_koef ? $request->teh_koef *100 : 1
            ])->all()
        );

        return redirect()->route('masinlokacija.index')->withStatus(__('Uspješno izmjenjena lokacija mašina.'));



    }

    /**
     * Remove the specified category from storage
     *
     * @param  \App\Masinlokacija  $masinlokacija
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Masinlokacija $masinlokacija)
    {
        if (!$masinlokacija->masine->isEmpty()) {
            return redirect()->route('masinlokacija.index')->withErrors(__('Postoje mašine na ovoj lokaciji. Brisanje lokacije nije moguće'));
        }

        $masinlokacija->delete();

        return redirect()->route('masinlokacija.index')->withStatus(__('Lokacija mašina izbrisana.'));
    }
}
