@extends('layouts.app', ['activePage' => 'alati', 'menuParent' => 'sifrarnici', 'titlePage' => __('Alati - ažuriranje')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" enctype="multipart/form-data" action="{{ route('alat.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Unos novog alata') }}</h4>
              </div>
              <div class="card-body ">


                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('alat.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad') }}</a>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Vrsta/namjena - naziv') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('alatnaziv_id') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-12 pl-0 pr-0" name="alatnaziv_id" data-style="select-with-transition" title="" data-size="100">
                        
                        @foreach ($alatnaziv as $al_naz)
                        <option value="{{ $al_naz->id }}">{{ $al_naz->vrsta_namjena.' - '.$al_naz->naziv }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'alatnaziv_id'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Proizvođač') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-12 pl-0 pr-0" name="proizvodjac_id" data-style="select-with-transition" title="" data-size="100">
                        @foreach ($proizvodjac as $proiz)
                        <option value="{{ $proiz->id }}">{{ $proiz->naziv }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'proizvodjac_id'])
                    </div>
                  </div>
                </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Kataloški broj') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('kataloski_br') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('kataloski_br') ? ' is-invalid' : '' }}" name="kataloski_br" id="input-kataloski_br" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                          @include('alerts.feedback', ['field' => 'kataloski_br'])
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Dimenzija/opis') }}</label>
                      <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('dimenzija_opis') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('dimenzija_opis') ? ' is-invalid' : '' }}" name="dimenzija_opis" id="input-dimenzija_opis" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                          @include('alerts.feedback', ['field' => 'dimenzija_opis'])
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Prečnik osovine/drške (mm)') }}</label>
                      <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('precnik') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('precnik') ? ' is-invalid' : '' }}" name="precnik" id="input-precnik" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                          @include('alerts.feedback', ['field' => 'precnik'])
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Vrsta reznog materijala') }}</label>
                      <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('vrsta_rez_mat') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-3 pl-0 pr-0" name="vrsta_rez_mat" data-style="select-with-transition" title="" data-size="100">
                            @foreach (config('alati.vrsta_rez_mat') as $value => $vrsta_rez_mat)
                            <option value="{{ $value }}" >{{ $vrsta_rez_mat }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'vrsta_rez_mat'])
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Broj zuba/pera') }}</label>
                      <div class="col-sm-1">
                        <div class="form-group{{ $errors->has('br_zuba_pera') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('br_zuba_pera') ? ' is-invalid' : '' }}" name="br_zuba_pera" id="input-br_zuba_pera" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                          @include('alerts.feedback', ['field' => 'br_zuba_pera'])
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Širina reza/prečnik rupe (mm)') }}</label>
                      <div class="col-sm-1">
                        <div class="form-group{{ $errors->has('s_reza_p_rupe') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('s_reza_p_rupe') ? ' is-invalid' : '' }}" name="s_reza_p_rupe" id="input-s_reza_p_rupe" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                          @include('alerts.feedback', ['field' => 's_reza_p_rupe'])
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Smjer obrtanja/rezanja') }}</label>
                      <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('smjer') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-3 pl-0 pr-0" name="smjer" data-style="select-with-transition" title="" data-size="100">
                            @foreach (config('alati.smjer') as $value => $smjer)
                            <option value="{{ $value }}" >{{ $smjer }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'smjer'])
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

@push('js')
<script>
  $(document).ready(function() {
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
      format: 'YYYY-MM-DD'
    });
  });
</script>
@endpush