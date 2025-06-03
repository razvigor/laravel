@extends('layouts.app', ['activePage' => 'kupci', 'menuParent' => 'sifrarnici', 'titlePage' => __('Kupci - pregled')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-text">
                  <h4 class="card-title">{{ __('Pregled podataka o kupcima') }}</h4>
                </div>
                
              </div>

              <div id="app">
                <kupci></kupci>
              </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
