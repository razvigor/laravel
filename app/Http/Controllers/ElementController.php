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
use App\Element;
use App\Http\Requests\ElementRequest;

class ElementController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Element::class);
    }

    /**
     * Display a listing of the elementi
     *
     * @param \App\Element  $model
     * @return \Illuminate\View\View
     */
    public function index(Element $model)
    {
        $this->authorize('manage-proizvodi', User::class);

        return view('elementi.index', ['elementi' => $model->all()]);
    }

    /**
     * Show the form for creating a new element
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('elementi.create');
    }

    /**
     * Store a newly created element in storage
     *
     * @param  \App\Http\Requests\ElementRequest  $request
     * @param  \App\Element  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ElementRequest $request, Element $model)
    {
        //$model->create($request->all());

        $element = $model->create($request->merge([
            'aktivan' => $request->aktivan ? 1 : 0
        ])->all());  



        return redirect()->route('element.index')->withStatus(__('Element uspješno kreiran.'));
    }

    /**
     * Show the form for editing the specified element
     *
     * @param  \App\Element  $element
     * @return \Illuminate\View\View
     */
    public function edit(Element $element)
    {
        return view('elementi.edit',   compact('element')
        );
    }

    /**
     * Update the specified element in storage
     *
     * @param  \App\Http\Requests\ElementRequest  $request
     * @param  \App\Element  $element
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ElementRequest $request, Element $element)
    {
        //$element->update($request->all());
        $element->update(
            $request->merge([
                'aktivan' => $request->aktivan ? 1 : 0

            ])->all()
        );


        return redirect()->route('element.index')->withStatus(__('Element uspješno ažuriran.'));
    }

    /**
     * Remove the specified element from storage
     *
     * @param  \App\Element  $element
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Element $element)
    {
        if (!$element->operacije->isEmpty()) {
            return redirect()->route('element.index')->withErrors(__('Element ima operacije i ne može se brisati.'));
        }

        $element->delete();

        return redirect()->route('element.index')->withStatus(__('Element uspješno izbrisan.'));
    }
}
