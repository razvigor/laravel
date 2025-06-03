@extends('errors.layout', ['classPage' => 'error-page', 'activePage' => '403', 'title' => __('Material Dashboard'), 'pageBackground' => asset("material").'/img/azul_river_l.png'])

@section('content')
  <div class="container text-center">
    <div class="row">
      <div class="col-md-12">
        <h1 class="title">403</h1>
        <h2>{{ __('Nemate pristup :') }}(</h2>
        <h4>{{ __('Hmmm, izgleda da nemate dovoljno privlegija.') }}</h4>
      </div>
    </div>
  </div>
@endsection
