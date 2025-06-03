@extends('layouts.app', ['activePage' => 'parametri', 'menuParent' => 'sifrarnici', 'titlePage' => __('Parametri - ažuriranje')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <form method="post"  action="{{ route('parametar.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Podaci o novom parametru') }}</h4>
              </div>
              <div class="card-body ">


                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('parametar.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Naziv parametra') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv" id="input-naziv" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                      @include('alerts.feedback', ['field' => 'naziv'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Vrijednost') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('vrijednost') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('vrijednost') ? ' is-invalid' : '' }}" name="vrijednost" id="input-vrijednost" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                      @include('alerts.feedback', ['field' => 'vrijednost'])
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
