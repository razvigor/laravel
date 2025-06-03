@extends('layouts.app', ['activePage' => 'rnalog-management', 'menuParent' => 'laravel', 'titlePage' => __('Radni nalozi - ažuriranje')])

@section('content')
  <div class="content">
    <div class="container-fluid">



      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('rnalog.update', $rnalog) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Radni nalog - osnovni podaci') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('rnalog.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Broj RN') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('broj_RN') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('broj_RN') ? ' is-invalid' : '' }}" name="broj_RN" id="input-broj_RN" type="text" placeholder="{{ __('') }}" value="{{ old('broj_RN', $rnalog->broj_RN) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'broj_RN'])
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Opis') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('opis') ? ' has-danger' : '' }}">
                      <textarea cols="30" rows="3" class="form-control{{ $errors->has('opis') ? ' is-invalid' : '' }}" name="opis" id="input-opis" type="text" placeholder="{{ __('unesite kratak opis radnog naloga (napomenu)') }}" required="true" aria-required="true">{{ old('opis', $rnalog->opis) }}</textarea>
                      @include('alerts.feedback', ['field' => 'opis'])
                    </div>
                  </div>
                </div> 
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Planirani datum montaže') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('datum_montaze') ? ' has-danger' : '' }}">
                      <input type="text"  name="datum_montaze" id="datum_montaze"
                      placeholder="{{ __('Select date') }}" class="form-control datetimepicker" value="{{ old('datum_montaze', $rnalog->datum_montaze
                      ? \Carbon\Carbon::parse($rnalog->datum_montaze)->format('d-m-Y') : '') }}"/>
                      @include('alerts.feedback', ['field' => 'datum_montaze'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Planirani datum isporuke') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('datum_isporuke') ? ' has-danger' : '' }}">
                      <input type="text"  name="datum_isporuke" id="datum_isporuke"
                             placeholder="{{ __('Select date') }}" class="form-control datetimepicker" value="{{ old('datum_isporuke', $rnalog->datum_isporuke
                      ? \Carbon\Carbon::parse($rnalog->datum_isporuke)->format('d-m-Y') : '') }}"/>
                      @include('alerts.feedback', ['field' => 'datum_isporuke'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Broj smjena') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('broj_dana') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('broj_dana') ? ' is-invalid' : '' }}" name="broj_dana" id="input-broj_dana" type="text" placeholder="{{ __('') }}" value="{{ old('broj_dana', $rnalog->broj_dana) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'broj_dana'])
                    </div>
                  </div>
                </div> 

                <div class="row">
                  <label class="col-sm-2 col-form-label label-checkbox">{{ __('Status') }}</label>
                  <div class="col-sm-10 checkbox-radios">
                    @foreach (config('rnalozi.statusi') as $value => $status)
                      <div class="form-check">
                        <label class="form-check-label">
                          <input name="status" class="form-check-input" id="{{ $value }}" value="{{ $value }}" type="radio" {{ old('status', $rnalog->status) == $value ? ' checked' : '' }}> {{ $status }}
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    @endforeach
                  </div>
                </div>

              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning">{{ __('Snimi') }}</button>
                <input type="hidden" id="rnalog_id" value="{{ $rnalog->id }}"> 
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Radni nalog - detalji') }}</h4>
              </div>
              
              <div id="app">
                  <stavke-naloga></stavke-naloga>

              </div>



            </div>
        </div>
      </div>


    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {

// izbor datuma
      $('.datetimepicker').datetimepicker({
      icons: {
          time: "fa fa-clock-o",
          date: "fa fa-calendar",
          up: "fa fa-chevron-up",
          down: "fa fa-chevron-down",
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-screenshot',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
      },
      format: 'DD-MM-YYYY'
      });

    });
  </script>
@endpush

