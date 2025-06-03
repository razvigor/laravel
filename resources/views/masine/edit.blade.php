@extends('layouts.app', ['activePage' => 'masine', 'menuParent' => 'sifrarnici', 'titlePage' => __('Mašine')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" enctype="multipart/form-data" action="{{ route('masina.update', $masina) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')
            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">filter_none</i>
                </div>
                <h4 class="card-title">{{ __('Ažuriranje podataka o mašini') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('masina.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad na pregled') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Slika') }}</label>
                  <div class="col-sm-7">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                      <div class="fileinput-new thumbnail">
                        @if ($masina->picture)
                          <img src="{{ $masina->path() }}" alt="...">
                        @else
                          <img src="{{ asset('material') }}/img/image_placeholder.jpg" alt="...">
                        @endif
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail"></div>
                      <div>
                        <span class="btn btn-warning btn-file">
                          <span class="fileinput-new">{{ __('Izaberi sliku') }}</span>
                          <span class="fileinput-exists">{{ __('Izmjeni') }}</span>
                          <input type="file" name="photo" id = "input-picture" />
                        </span>
                          <a href="#pablo" class="btn btn-warning fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('Ukloni') }}</a>
                      </div>
                      @include('alerts.feedback', ['field' => 'photo'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('R.br') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('r_br') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('r_br') ? ' is-invalid' : '' }}" name="r_br" id="input-r_br" type="text" placeholder="{{ __('') }}" value="{{ old('r_br', $masina->r_br) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'r_br'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Naziv') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('naziv mašine') }}" value="{{ old('name', $masina->name) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'name'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Vrsta mašine') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('masinvrsta_id') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-12 pl-0 pr-0" name="masinvrsta_id" data-style="select-with-transition" title="" data-size="100">
                        <option value="">-</option>
                        @foreach ($masinvrsta as $vrsta)
                        <option value="{{ $vrsta->id }}" {{ $vrsta->id == old('masinvrsta_id', $masina->masinvrsta_id) ? 'selected' : '' }}>{{ $vrsta->name }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'masinvrsta_id'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Opis/namjena') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <textarea name="description" id="input-description" cols="30" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('kratak opis mašine') }}">{{ old('description', $masina->description) }}</textarea>
                      @include('alerts.feedback', ['field' => 'description'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Lokacija') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('masinlokacija_id') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-4 pl-0 pr-0" name="masinlokacija_id" data-style="select-with-transition" title="" data-size="100">
                        <option value="">-</option>
                        @foreach ($masinlokacija as $lokacija)
                        <option value="{{ $lokacija->id }}" {{ $lokacija->id == old('masinlokacija_id', $masina->masinlokacija_id) ? 'selected' : '' }}>{{ $lokacija->naziv }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'masinlokacija_id'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label label-checkbox">{{ __('Bruto mjere') }}</label>
                  <div class="col-sm-10 checkbox-radios">
                    <div class="togglebutton">
                      <label>
                        <input type="checkbox" name="bruto_mjere" value="1" {{ old('bruto_mjere', $masina->bruto_mjere) == 1 ? ' checked' : '' }}>
                        <span class="toggle"></span>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Instalisana snaga (kW)') }}</label>
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('inst_ee_kw') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('inst_ee_kw') ? ' is-invalid' : '' }}" name="inst_ee_kw" id="input-inst_ee_kw" type="text" placeholder="{{ __('') }}" value="{{ old('inst_ee_kw', $masina->inst_ee_kw) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'inst_ee_kw'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-md-2 col-form-label">{{ __('Otpraš. / pneum. transport') }}</label>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                  <label class="col-sm-1 col-form-label">{{ __('Promjer (mm)') }}</label>
                  <label class="col-sm-1 col-form-label">{{ __('Broj komada') }}</label>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('opt_fi1') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('opt_fi1') ? ' is-invalid' : '' }}" name="opt_fi1" id="input-opt_fi1" type="text" placeholder="{{ __('') }}" value="{{ old('opt_fi1', $masina->opt_fi1) }}" />
                      @include('alerts.feedback', ['field' => 'opt_fi1'])
                    </div>
                    <div class="form-group{{ $errors->has('opt_fi2') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('opt_fi2') ? ' is-invalid' : '' }}" name="opt_fi2" id="input-opt_fi2" type="text" placeholder="{{ __('') }}" value="{{ old('opt_fi2', $masina->opt_fi2) }}" />
                      @include('alerts.feedback', ['field' => 'opt_fi2'])
                    </div>
                    <div class="form-group{{ $errors->has('opt_fi3') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('opt_fi3') ? ' is-invalid' : '' }}" name="opt_fi3" id="input-opt_fi3" type="text" placeholder="{{ __('') }}" value="{{ old('opt_fi3', $masina->opt_fi3) }}" />
                      @include('alerts.feedback', ['field' => 'opt_fi3'])
                    </div>
                  </div>

                  
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('opt_kom1') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('opt_kom1') ? ' is-invalid' : '' }}" name="opt_kom1" id="input-opt_kom1" type="text" placeholder="{{ __('') }}" value="{{ old('opt_kom1', $masina->opt_kom1) }}" />
                      @include('alerts.feedback', ['field' => 'opt_kom1'])
                    </div>
                    <div class="form-group{{ $errors->has('opt_kom1') ? ' has-danger' : '' }}">                      
                      <input class="form-control{{ $errors->has('opt_kom2') ? ' is-invalid' : '' }}" name="opt_kom2" id="input-opt_kom2" type="text" placeholder="{{ __('') }}" value="{{ old('opt_kom2', $masina->opt_kom2) }}" />
                      @include('alerts.feedback', ['field' => 'opt_kom2'])
                    </div>
                    <div class="form-group{{ $errors->has('opt_kom1') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('opt_kom1') ? ' is-invalid' : '' }}" name="opt_kom3" id="input-opt_kom3" type="text" placeholder="{{ __('') }}" value="{{ old('opt_kom3', $masina->opt_kom3) }}" />
                      @include('alerts.feedback', ['field' => 'opt_kom3'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label label-checkbox">{{ __('Komprimovani zrak') }}</label>
                  <div class="col-sm-10 checkbox-radios">
                    <div class="togglebutton">
                      <label>
                        <input type="checkbox" name="kz" value="1" {{ old('kz', $masina->kz) == 1 ? ' checked' : '' }}>
                        <span class="toggle"></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                  <label class="col-sm-1 col-form-label">{{ __('Radni pritisak min./max. (bar)') }}</label>
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('kz_p') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('kz_p') ? ' is-invalid' : '' }}" name="kz_p" id="input-kz_p" type="text" placeholder="{{ __('') }}" value="{{ old('kz_p', $masina->kz_p) }}" />
                      @include('alerts.feedback', ['field' => 'kz_p'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('') }}</label>
                  <label class="col-sm-1 col-form-label">{{ __('Potreban zrak max. (Lit./min)') }}</label>
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('kz_l') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('kz_l') ? ' is-invalid' : '' }}" name="kz_l" id="input-kz_l" type="text" placeholder="{{ __('') }}" value="{{ old('kz_l', $masina->kz_l) }}" />
                      @include('alerts.feedback', ['field' => 'kz_l'])
                    </div>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label label-checkbox">{{ __('Status') }}</label>
                  <div class="col-sm-10 checkbox-radios">
                    @foreach (config('masine.statuses') as $value => $status)
                      <div class="form-check">
                        <label class="form-check-label">
                          <input name="status" class="form-check-input" id="{{ $value }}" value="{{ $value }}" type="radio" {{ old('status', $masina->status) == $value ? ' checked' : '' }}> {{ $status }}
                          <span class="circle">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    @endforeach
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
      format: 'DD-MM-YYYY'
    });
  });
</script>
@endpush