@extends('layouts.app', ['activePage' => 'proizvrstamodeli', 'menuParent' => 'sifrarnici', 'titlePage' => __('Modeli proizvoda - pregled')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Pregled podataka o modelima proizvoda') }}</h4>
              </div>

              <div id="app">
                <proizvrstamodeli></proizvrstamodeli>
              </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
