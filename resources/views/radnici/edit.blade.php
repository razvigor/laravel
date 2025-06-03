@extends('layouts.app', ['activePage' => 'radnici', 'menuParent' => 'sifrarnici', 'titlePage' => __('Radnici - ažuriranje')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post"  action="{{ route('radnik.update', $radnik) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Podaci o radniku - izmjena') }}</h4>
              </div>
              <div class="card-body ">


                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('radnik.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad') }}</a>
                  </div>
                </div>

                <ul class="nav nav-pills nav-pills-warning" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#link1" role="tablist">
                      Lični podaci
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                      Stručna/školska sprema
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                      Prethodno radno iskustvo
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#link4" role="tablist">
                      Trenutni angažman
                    </a>
                  </li>
                </ul>

                <div class="tab-content tab-space">
                  <div class="tab-pane active show" id="link1">

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Ime, ime oca, prezime') }}</label>
                      <div class="col-sm-6">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value="{{ old('name', $radnik->name) }}"/>
                          @include('alerts.feedback', ['field' => 'name'])
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('JMBG') }}</label>
                      <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('jmbg') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('jmbg') ? ' is-invalid' : '' }}" name="jmbg" id="input-jmbg" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value="{{ old('jmbg', $radnik->jmbg) }}"/>
                          @include('alerts.feedback', ['field' => 'jmbg'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Datum rođenja') }}</label>
                      <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('birthday') ? ' has-danger' : '' }}">
                          <input type="text"  name="birthday" id="birthday"
                          placeholder="{{ __('Select date') }}" class="form-control datetimepicker" value="{{ old('birthday', $radnik->birthday
                          ? \Carbon\Carbon::parse($radnik->birthday)->format('Y-m-d') : '') }}"/>
                          @include('alerts.feedback', ['field' => 'birthday'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Mjesto i opština rođenja') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('birthplace') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('birthplace') ? ' is-invalid' : '' }}" name="birthplace" id="input-birthplace" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value="{{ old('birthplace', $radnik->birthplace) }}"/>
                          @include('alerts.feedback', ['field' => 'birthplace'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Adresa stanovanja') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('adress') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" name="adress" id="input-adress" type="text" placeholder="{{ __('') }}"  value="{{ old('adress', $radnik->adress) }}"/>
                          @include('alerts.feedback', ['field' => 'adress'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Telefon') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('telefon') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('telefon') ? ' is-invalid' : '' }}" name="telefon" id="input-telefon" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value="{{ old('telefon', $radnik->telefon) }}"/>
                          @include('alerts.feedback', ['field' => 'telefon'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Državljanstvo') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('drzavljanstvo') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('drzavljanstvo') ? ' is-invalid' : '' }}" name="drzavljanstvo" id="input-drzavljanstvo" type="text" placeholder="{{ __('') }}"  value="{{ old('drzavljanstvo', $radnik->drzavljanstvo) }}"/>
                          @include('alerts.feedback', ['field' => 'drzavljanstvo'])
                        </div>
                      </div>
                    </div>
    
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Nacionalnost') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('nacionalnost') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-6 pl-0 pr-0" name="nacionalnost" data-style="select-with-transition" title="" data-size="100">
                            @foreach (config('radnici.nacionalnost') as $value => $nacionalnost)
                            <option value="{{ $value }}" {{ $value == old('nacionalnost', $radnik->nacionalnost) ? 'selected' : '' }}>{{ $nacionalnost }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'nacionalnost'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Vjeroispovjest') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('vjeroispovjest') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-6 pl-0 pr-0" name="vjeroispovjest" data-style="select-with-transition" title="" data-size="100">
                            @foreach (config('radnici.vjeroispovjest') as $value => $vjeroispovjest)
                            <option value="{{ $value }}" {{ $value == old('vjeroispovjest', $radnik->vjeroispovjest) ? 'selected' : '' }}>{{ $vjeroispovjest }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'vjeroispovjest'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Privatni vjerski praznik') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('vjerski_praznik') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('vjerski_praznik') ? ' is-invalid' : '' }}" name="vjerski_praznik" id="input-vjerski_praznik" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value="{{ old('vjerski_praznik', $radnik->vjerski_praznik) }}"/>
                          @include('alerts.feedback', ['field' => 'vjerski_praznik'])
                        </div>
                      </div>
                    </div>                
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Bračno stanje') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('bracno_stanje') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-6 pl-0 pr-0" name="bracno_stanje" data-style="select-with-transition" title="" data-size="100">
                            @foreach (config('radnici.bracno_stanje') as $value => $bracno_stanje)
                            <option value="{{ $value }}" {{ $value == old('bracno_stanje', $radnik->bracno_stanje) ? 'selected' : '' }}>{{ $bracno_stanje }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'bracno_stanje'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Djeca (broj, uzrast)') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('djeca') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('djeca') ? ' is-invalid' : '' }}" name="djeca" id="input-djeca" type="text" placeholder="{{ __('') }}" value="{{ old('djeca', $radnik->djeca) }}"/>
                          @include('alerts.feedback', ['field' => 'djeca'])
                        </div>
                      </div>
                    </div>        
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Stambeno pitanje') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('stambeno_pitanje') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-6 pl-0 pr-0" name="stambeno_pitanje" data-style="select-with-transition" title="" data-size="100">
                            @foreach (config('radnici.stambeno_pitanje') as $value => $stambeno_pitanje)
                            <option value="{{ $value }}" {{ $value == old('stambeno_pitanje', $radnik->stambeno_pitanje) ? 'selected' : '' }}>{{ $stambeno_pitanje }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'stambeno_pitanje'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Invalidnost') }}</label>
                      <div class="col-sm-3">
                        <div class="form-group{{ $errors->has('invalidnost') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-6 pl-0 pr-0" name="invalidnost" data-style="select-with-transition" title="" data-size="30">
                            @foreach (config('radnici.invalidnost') as $value => $invalidnost)
                            <option value="{{ $value }}" {{ $value == old('invalidnost', $radnik->invalidnost) ? 'selected' : '' }}>{{ $invalidnost }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'invalidnost'])
                        </div>
                      </div>
                    </div>
    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Pol') }}</label>
                      <div class="col-sm-3">
                        <div class="form-group{{ $errors->has('pol') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-6 pl-0 pr-0" name="pol" data-style="select-with-transition" title="" data-size="30">
                            @foreach (config('radnici.pol') as $value => $pol)
                            <option value="{{ $value }}" {{ $value == old('pol', $radnik->pol) ? 'selected' : '' }}>{{ $pol }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'pol'])
                        </div>
                      </div>
                    </div>                    

                  </div>
                  <div class="tab-pane" id="link2">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Stručna sprema') }}</label>
                      <div class="col-sm-3">
                        <div class="form-group{{ $errors->has('skolska_sprema') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-6 pl-0 pr-0" name="skolska_sprema" data-style="select-with-transition" title="" data-size="30">
                            @foreach (config('radnici.skolska_sprema') as $value => $skolska_sprema)
                            <option value="{{ $value }}" {{ $value == old('skolska_sprema', $radnik->skolska_sprema) ? 'selected' : '' }}>{{ $skolska_sprema }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'skolska_sprema'])
                        </div>
                      </div>                    
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Tačan naziv škole') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('naziv_ustanove') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('naziv_ustanove') ? ' is-invalid' : '' }}" name="naziv_ustanove" id="input-naziv_ustanove" type="text" placeholder="{{ __('') }}" value="{{ old('naziv_ustanove', $radnik->naziv_ustanove) }}"/>
                          @include('alerts.feedback', ['field' => 'naziv_ustanove'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Zanimanje') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('zanimanje') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('zanimanje') ? ' is-invalid' : '' }}" name="zanimanje" id="input-zanimanje" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value="{{ old('zanimanje', $radnik->zanimanje) }}"/>
                          @include('alerts.feedback', ['field' => 'zanimanje'])
                        </div>
                      </div>
                    </div>
                  
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Posebna znanja') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('posebna_znanja') ? ' has-danger' : '' }}">
                          <textarea name="posebna_znanja" id="input-posebna_znanja" cols="30" rows="10" class="form-control{{ $errors->has('posebna_znanja') ? ' is-invalid' : '' }}" placeholder="{{ __('kratak opis posebnih zananja') }}">{{ old('posebna_znanja', $radnik->posebna_znanja) }}</textarea>
                          @include('alerts.feedback', ['field' => 'posebna_znanja'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Vrste stručnih ispita') }}</label>
                      <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('strucni_ispiti') ? ' has-danger' : '' }}">
                          <textarea name="strucni_ispiti" id="input-strucni_ispiti" cols="30" rows="10" class="form-control{{ $errors->has('strucni_ispiti') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}">{{ old('strucni_ispiti', $radnik->strucni_ispiti) }}</textarea>
                          @include('alerts.feedback', ['field' => 'strucni_ispiti'])
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="link3">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Radno mjesto') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('p_radna_mjesta') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('p_radna_mjesta') ? ' is-invalid' : '' }}" name="p_radna_mjesta" id="input-p_radna_mjesta" type="text" placeholder="{{ __('') }}"  value="{{ old('p_radna_mjesta', $radnik->p_radna_mjesta) }}"/>
                          @include('alerts.feedback', ['field' => 'p_radna_mjesta'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Opis posla') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('p_opis_posla') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('p_opis_posla') ? ' is-invalid' : '' }}" name="p_opis_posla" id="input-p_opis_posla" type="text" placeholder="{{ __('') }}"  value="{{ old('p_opis_posla', $radnik->p_opis_posla) }}"/>
                          @include('alerts.feedback', ['field' => 'p_opis_posla'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Trajanje (prethodni radni staž)') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('p_trajanje') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('p_trajanje') ? ' is-invalid' : '' }}" name="p_trajanje" id="input-p_trajanje" type="text" placeholder="{{ __('') }}"  value="{{ old('p_trajanje', $radnik->p_trajanje) }}"/>
                          @include('alerts.feedback', ['field' => 'p_trajanje'])
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="link4">

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Datum zaposlenja') }}</label>
                      <div class="col-sm-4">
                        <div class="form-group{{ $errors->has('z_datum') ? ' has-danger' : '' }}">
                          <input type="text"  name="z_datum" id="z_datum"
                          placeholder="{{ __('unesite datum zaposlenja') }}" class="form-control datetimepicker" value="{{ old('z_datum', $radnik->z_datum
                          ? \Carbon\Carbon::parse($radnik->z_datum)->format('Y-m-d') : '') }}"/>
                          @include('alerts.feedback', ['field' => 'z_datum'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Radni staž - ukupno G,M,D') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('z_staz') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('z_staz') ? ' is-invalid' : '' }}" name="z_staz" id="input-z_staz" type="text" placeholder="{{ __('') }}" value="{{ old('z_staz', $radnik->z_staz) }}"/>
                          @include('alerts.feedback', ['field' => 'z_staz'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Status radnika') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('z_status') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-6 pl-0 pr-0" name="z_status" data-style="select-with-transition" title="" data-size="30">
                            @foreach (config('radnici.z_status') as $value => $z_status)
                            <option value="{{ $value }}" {{ $value == old('z_status', $radnik->z_status) ? 'selected' : '' }}>{{ $z_status }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'z_status'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Vrsta radnog odnosa') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('z_vrsta_RO') ? ' has-danger' : '' }}">
                            <select class="selectpicker col-sm-6 pl-0 pr-0" name="z_vrsta_RO" data-style="select-with-transition" title="" data-size="30">
                            @foreach (config('radnici.z_vrsta_RO') as $value => $z_vrsta_RO)
                            <option value="{{ $value }}" {{ $value == old('z_vrsta_RO', $radnik->z_vrsta_RO) ? 'selected' : '' }}>{{ $z_vrsta_RO }}</option>
                            @endforeach
                          </select>
                          @include('alerts.feedback', ['field' => 'z_vrsta_RO'])
                        </div>
                      </div>
                    </div>                      
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Organizaciona jedinica') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('z_org_cjelina') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('z_org_cjelina') ? ' is-invalid' : '' }}" name="z_org_cjelina" id="input-z_org_cjelina" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value="{{ old('z_org_cjelina', $radnik->z_org_cjelina) }}"/>
                          @include('alerts.feedback', ['field' => 'z_org_cjelina'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Naziv radnog mjesta') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('z_radno_mjesto') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('z_radno_mjesto') ? ' is-invalid' : '' }}" name="z_radno_mjesto" id="input-z_radno_mjesto" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value="{{ old('z_radno_mjesto', $radnik->z_radno_mjesto) }}"/>
                          @include('alerts.feedback', ['field' => 'z_radno_mjesto'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Radna angažovanja') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('z_angazovanja') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('z_angazovanja') ? ' is-invalid' : '' }}" name="z_angazovanja" id="input-z_angazovanja" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value="{{ old('z_angazovanja', $radnik->z_angazovanja) }}"/>
                          @include('alerts.feedback', ['field' => 'z_angazovanja'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Broj ormarića') }}</label>
                      <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('br_ormarica') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('br_ormarica') ? ' is-invalid' : '' }}" name="br_ormarica" id="input-br_ormarica" type="text" placeholder="{{ __('') }}"  value="{{ old('br_ormarica', $radnik->br_ormarica) }}"/>
                          @include('alerts.feedback', ['field' => 'br_ormarica'])
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Ugovoreni lični dohodak (KM)') }}</label>
                      <div class="col-sm-1">
                        <div class="form-group{{ $errors->has('z_licni_dohodak') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('z_licni_dohodak') ? ' is-invalid' : '' }}" name="z_licni_dohodak" id="input-z_licni_dohodak" type="text" placeholder="{{ __('') }}" value="{{ old('z_licni_dohodak', $radnik->z_licni_dohodak) }}" />
                          @include('alerts.feedback', ['field' => 'z_licni_dohodak'])
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('Vrijednost radnog sata (KM/h)') }}</label>
                      <div class="col-sm-1">
                        <div class="form-group{{ $errors->has('z_radni_sat') ? ' has-danger' : '' }}">
                          <input class="form-control{{ $errors->has('z_radni_sat') ? ' is-invalid' : '' }}" name="z_radni_sat" id="input-z_radni_sat" type="text" placeholder="{{ __('') }}" value="{{ old('z_radni_sat', $radnik->z_radni_sat) }}" />
                          @include('alerts.feedback', ['field' => 'z_radni_sat'])
                        </div>
                      </div>
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