@extends('layouts.app', ['activePage' => 'materijali', 'menuParent' => 'sifrarnici', 'titlePage' => __('Materijali - dodavanje')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" enctype="multipart/form-data" action="{{ route('materijal.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Dodavanje novog materijala') }}</h4>
              </div>
              <div class="card-body ">


                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('materijal.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad') }}</a>
                  </div>
                </div>


                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Naziv') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv" id="input-naziv" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                      @include('alerts.feedback', ['field' => 'naziv'])
                    </div>
                  </div>
                </div>                

                <div id="app">
                  <materijali-dodavanje pocetni_mattip_id=0 
                                        pocetni_mattipvrsta_id=0
                                        pocetni_vrsta_podloge=""
                                        pocetni_vrsta_okova="" 
                                        />
                </div>
                
                <input type="hidden" name="mattip_id" id="mattip_id"  value="0">
                <input type="hidden" name="mattipvrsta_id" id="mattipvrsta_id"  value="0">
                <input type="hidden" name="vrsta_podloge" id="vrsta_podloge"  value="0">
                <input type="hidden" name="vrsta_okova" id="vrsta_okova"  value="">


                

               

                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Naziv/Proizvođač') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('proizvodjac') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="proizvodjac" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.proizvodjac') as $value => $proizvodjac)
                        <option value="{{ $value }}" >{{ $proizvodjac }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'proizvodjac'])
                    </div>
                  </div>
                </div>
                

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Namjena') }}</label>
                  <div class="col-sm-8">
                    <div class="form-group{{ $errors->has('namjena') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="namjena" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.namjena') as $value => $namjena)
                        <option value="{{ $value }}" >{{ $namjena }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'namjena'])
                    </div>
                  </div>
                </div>
               

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Forma/oblik') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('forma_oblik') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="forma_oblik" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.forma_oblik') as $value => $forma_oblik)
                        <option value="{{ $value }}" >{{ $forma_oblik }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'forma_oblik'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Specifična težina') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('sp_tezina') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="sp_tezina" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.sp_tezina') as $value => $sp_tezina)
                        <option value="{{ $value }}">{{ $sp_tezina }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'sp_tezina'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Gustina') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('gustina') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="gustina" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.gustina') as $value => $gustina)
                        <option value="{{ $value }}" >{{ $gustina }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'gustina'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Tvrdoća') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('tvrdoca') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="tvrdoca" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.tvrdoca') as $value => $tvrdoca)
                        <option value="{{ $value }}" >{{ $tvrdoca }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'tvrdoca'])
                    </div>
                  </div>
                </div>
               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Klasa kvaliteta') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('klasa') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="klasa" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.klasa') as $value => $klasa)
                        <option value="{{ $value }}">{{ $klasa }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'klasa'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Broj linija') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('br_linija') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="br_linija" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.br_linija') as $value => $br_linija)
                        <option value="{{ $value }}" >{{ $br_linija }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'br_linija'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Broj slojeva/debljina') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('br_slojeva') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="br_slojeva" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.br_slojeva') as $value => $br_slojeva)
                        <option value="{{ $value }}">{{ $br_slojeva }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'br_slojeva'])
                    </div>
                  </div>
                </div>
                
                 <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Debljina') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('debljina') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('debljina') ? ' is-invalid' : '' }}" name="debljina" id="input-debljina" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                      @include('alerts.feedback', ['field' => 'debljina'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Dužina trake') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('duz_trake') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('duz_trake') ? ' is-invalid' : '' }}" name="duz_trake" id="input-duz_trake" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                      @include('alerts.feedback', ['field' => 'duz_trake'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Širina trake') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('sir_trake') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('sir_trake') ? ' is-invalid' : '' }}" name="sir_trake" id="input-sir_trake" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                      @include('alerts.feedback', ['field' => 'sir_trake'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Širina') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('sirina') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="sirina" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.sirina') as $value => $sirina)
                        <option value="{{ $value }}">{{ $sirina }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'sirina'])
                    </div>
                  </div>
                </div>
               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Dužnski razred') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('duz_razred') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="duz_razred" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.duz_razred') as $value => $duz_razred)
                        <option value="{{ $value }}">{{ $duz_razred }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'duz_razred'])
                    </div>
                  </div>
                </div>
               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Granulacija') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('br_slojeva') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-3 pl-0 pr-0" name="br_slojeva" data-style="select-with-transition" title="" data-size="100">
                        @foreach (config('materijali.br_slojeva') as $value => $br_slojeva)
                        <option value="{{ $value }}">{{ $br_slojeva }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'br_slojeva'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Kataloška oznaka') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('mattipoznaka_id') ? ' has-danger' : '' }}">
                        <select class="selectpicker col-sm-6 pl-0 pr-0" name="mattipoznaka_id" data-style="select-with-transition" title="" data-size="100">
                        
                        @foreach ($mattipoznaka as $mto)
                        <option value="{{ $mto->id }}">{{ $mto->oznaka }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'mattipoznaka_id'])
                    </div>
                  </div>
                </div>
               
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Jed. mjere') }}</label>
                  <div class="col-sm-5">
                    <div class="form-group{{ $errors->has('jed_mjere') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('jed_mjere') ? ' is-invalid' : '' }}" name="jed_mjere" id="input-jed_mjere" type="text" placeholder="{{ __('') }}" required="true" aria-required="true" value=""/>
                      @include('alerts.feedback', ['field' => 'jed_mjere'])
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Cijena') }}</label>
                  <div class="col-sm-1">
                    <div class="form-group{{ $errors->has('cijena') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('cijena') ? ' is-invalid' : '' }}" name="cijena" id="input-cijena" type="text" placeholder="{{ __('') }}" value="" required="true" aria-required="true"/>
                      @include('alerts.feedback', ['field' => 'cijena'])
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

