@extends('layouts.app', ['activePage' => 'mat_tipovi', 'menuParent' => 'sifrarnici', 'titlePage' => __('Tipovi materijala - ažuriranje')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('mattip.update', $mattip) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Tip materijala - izmjena') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('mattip.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Naziv') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv" id="input-naziv" type="text" placeholder="{{ __('') }}" value="{{ old('naziv', $mattip->naziv) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'naziv'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label label-checkbox">{{ __('Redni broj') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('redni_broj') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('redni_broj') ? ' is-invalid' : '' }}" name="redni_broj" id="input-redni_broj" type="text" placeholder="{{ __('') }}" value="{{ old('redni_broj', $mattip->redni_broj) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'redni_broj'])
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