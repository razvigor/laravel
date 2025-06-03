@extends('layouts.app', ['activePage' => 'materijali', 'menuParent' => 'sifrarnici', 'titlePage' => __('Materijali - pregled')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">filter_none</i>
                </div>
                <h4 class="card-title">{{ __('Pregled podataka o materijalima') }}</h4>
              </div>

              <div id="app">
                <materijali></materijali>
              </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection


