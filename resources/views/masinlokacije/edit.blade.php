@extends('layouts.app', ['activePage' => 'lokacije_masina', 'menuParent' => 'sifrarnici', 'titlePage' => __('Lokacije mašina - ažuriranje')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('masinlokacija.update', $masinlokacija) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Lokacija mašina - izmjena') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('masinlokacija.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('R.br.') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('r_br') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('r_br') ? ' is-invalid' : '' }}" name="r_br" id="input-r_br" type="text" placeholder="{{ __('') }}" value="{{ old('r_br', $masinlokacija->r_br) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'r_br'])
                    </div>
                  </div>
                </div>                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Naziv') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv" id="input-naziv" type="text" placeholder="{{ __('') }}" value="{{ old('naziv', $masinlokacija->naziv) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'naziv'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tehnološki koeficijent') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('teh_koef') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('teh_koef') ? ' is-invalid' : '' }}" name="teh_koef" id="input-teh_koef" type="text" placeholder="{{ __('') }}" value="{{ old('teh_koef', $masinlokacija->teh_koef/100) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'teh_koef'])
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning">{{ __('Snimi') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection