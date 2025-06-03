@extends('layouts.app', ['activePage' => 'turbine', 'menuParent' => 'turbine', 'titlePage' => __('OEM turbine - pregled')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info card-header-text">
                <div class="card-text">
                  <h4 class="card-title">{{ __('Pregled podataka o OEM turbinama') }}</h4>
                </div>
                
              </div>
              
             
              <div id="app">
                <turbine></turbine>
              </div>

            </div>
        </div>
      </div>
    </div>
  </div>
@endsection


