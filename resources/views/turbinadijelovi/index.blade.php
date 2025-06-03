@extends('layouts.app', ['activePage' => 'turbinadijelovi', 'menuParent' => 'sifrarnici', 'titlePage' => __('Dijelovi za turbine - pregled')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info card-header-text">
                <div class="card-text">
                  <h4 class="card-title">{{ __('Pregled podataka o dijelovima za turbine') }}</h4>
                </div>
                
              </div>

              <div id="app">
                <turbinadijelovi></turbinadijelovi>
              </div>
            
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection


