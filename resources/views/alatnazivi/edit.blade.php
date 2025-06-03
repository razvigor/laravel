@extends('layouts.app', ['activePage' => 'grupe_alata', 'menuParent' => 'sifrarnici', 'titlePage' => __('Vrsta/namjena alata - ažuriranje')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('alatnaziv.update', $alatnaziv) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Vrsta/namjena - izmjena') }}</h4>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('alatnaziv.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Vrsta / namjena') }}</label>
                  <div class="col-sm-6">
                    <div class="form-group{{ $errors->has('vrsta_namjena') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-4 pl-0 pr-0" name="vrsta_namjena" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('alati.vrsta_namjena') as $value => $vrsta_namjena)
                        <option value="{{ $vrsta_namjena}}" {{ $vrsta_namjena == old('vrsta_namjena', $alatnaziv->vrsta_namjena) ? 'selected' : '' }}>{{ $vrsta_namjena }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'vrsta_namjena'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Naziv/Opis') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv" id="input-naziv" type="text" placeholder="{{ __('') }}" value="{{ old('naziv', $alatnaziv->naziv) }}" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'naziv'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label label-checkbox">{{ __('Aktivan') }}</label>
                  <div class="col-sm-10 checkbox-radios">
                    <div class="togglebutton">
                      <label>
                        <input type="checkbox" name="aktivan" value="1" {{ old('aktivan', $alatnaziv->aktivan) == 1 ? ' checked' : '' }}>
                        <span class="toggle"></span>
                      </label>
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