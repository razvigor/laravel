@extends('layouts.app', ['activePage' => 'proizvod-management', 'menuParent' => 'laravel', 'titlePage' => __('Proizvodi - ažuriranje')])

@section('content')
  <div class="content">
    <div class="container-fluid">

                    <!-- Modal - duplikat proizvoda -POCETAK-->
                    <div class="modal fade" id="noviProizvod" tabindex="-1" role="dialog" aria-labelledby="noviProizvod" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="content">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-md-12">
                                    <form method="post" action="{{ route('proizvod.store') }}" autocomplete="off" class="form-horizontal">
                                      @csrf
                                      @method('post')
                          
                                      <div class="card ">
                                        <div class="card-header card-header-info card-header-icon">
                                          <div class="card-icon">
                                            <i class="material-icons">category</i>
                                          </div>
                                          <h4 class="card-title">{{ __('Duplikat postojećeg proizvoda') }}</h4>
                                        </div>
                                        <div class="card-body ">
                                          <div class="row">
                                            <div class="col-md-12 text-right">
                                              <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                Odustani
                                              </button>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Naziv') }}</label>
                                            <div class="col-sm-7">
                                              <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv_old" id="input-naziv_D" type="text" placeholder="{{ __('definiše se izborom iz lista iznad') }}" disabled value="{{ old('naziv', $proizvod->naziv) }}" required="true" aria-required="true"/>
                                                <input type="hidden" name="naziv" id="naziv_slozen_D" value="{{ old('naziv', $proizvod->naziv) }}">
                                                @include('alerts.feedback', ['field' => 'naziv'])
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Vrsta/model') }}</label>
                                            <div class="col-sm-4">
                                              <div class="form-group{{ $errors->has('model_id') ? ' has-danger' : '' }}">
                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="model_id" id="model_id_D" onchange="f_azuriraj_slozeni_naziv_D()" data-style="select-with-transition" title="" data-size="10">
                                                  <option value="0" >obavezan izbor</option>
                                                  @foreach ($proiz_modeli as $model)
                                                  <option value="{{ $model->id }}" {{ $model->id == $proizvod->model_id ? 'selected' : '' }}>{{ $model->naziv }}</option>
                                                  @endforeach
                                                </select>
                                                @include('alerts.feedback', ['field' => 'model_id'])
                                              </div>  
                                            </div> 
                                          </div>    
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Boja laka') }}</label>
                                            <div class="col-sm-4">
                                              <div class="form-group{{ $errors->has('boja1_id') ? ' has-danger' : '' }}">
                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="boja1_id" id="boja1_id_D" onchange="f_azuriraj_slozeni_naziv_D()" data-style="select-with-transition" title="" data-size="10">
                                                  <option value="0" >obavezan izbor</option>
                                                  @foreach ($oznake_lakova as $boja1)
                                                  <option value="{{ $boja1->id }}" {{ $boja1->id == $proizvod->boja1_id ? 'selected' : '' }}>{{ $boja1->naziv }}</option>
                                                  @endforeach
                                                </select>
                                                @include('alerts.feedback', ['field' => 'boja1_id'])
                                              </div>  
                                            </div> 
                                          </div> 
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Boja presvlake') }}</label>
                                            <div class="col-sm-4">
                                              <div class="form-group{{ $errors->has('boja2_id') ? ' has-danger' : '' }}">
                                                <select class="selectpicker col-sm-12 pl-0 pr-0" name="boja2_id" id="boja2_id_D" onchange="f_azuriraj_slozeni_naziv_D()" data-style="select-with-transition" title="" data-size="10">
                                                  <option value="0" >obavezan izbor</option>
                                                  @foreach ($oznake_presvlaka as $boja2)
                                                  <option value="{{ $boja2->id }}" {{ $boja2->id == $proizvod->boja2_id ? 'selected' : '' }}>{{ $boja2->naziv }}</option>
                                                  @endforeach
                                                </select>
                                                @include('alerts.feedback', ['field' => 'boja2_id'])
                                              </div>  
                                            </div> 
                                          </div>   

                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Šifra') }}</label>
                                            <div class="col-sm-4">
                                              <div class="form-group{{ $errors->has('sifra_proizvoda') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('sifra_proizvoda') ? ' is-invalid' : '' }}" name="sifra_proizvoda_old" id="input-sifra_proizvoda_D" type="text"  placeholder="{{ __('definiše se izborom iz lista iznad') }}"  disabled value="{{ old('sifra_proizvoda', $proizvod->sifra_proizvoda) }}" required="true" aria-required="true"/>
                                                <input type="hidden" name="sifra_proizvoda" id="sifra_proizvoda_slozena_D" value="{{ old('sifra_proizvoda', $proizvod->sifra_proizvoda) }}">
                                                @include('alerts.feedback', ['field' => 'sifra_proizvoda'])
                                              </div>
                                            </div>
                                          </div>                                          
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Opis') }}</label>
                                            <div class="col-sm-7">
                                              <div class="form-group{{ $errors->has('opis') ? ' has-danger' : '' }}">
                                                <textarea cols="30" rows="10" class="form-control{{ $errors->has('opis') ? ' is-invalid' : '' }}" name="opis" id="input-opis" type="text" placeholder="{{ __('unesite kratak opis proizvoda') }}" required="true" aria-required="true">{{ old('opis', $proizvod->opis) }}</textarea>
                                                @include('alerts.feedback', ['field' => 'opis'])
                                              </div>
                                            </div>
                                          </div> 
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label label-checkbox">{{ __('Aktivan') }}</label>
                                            <div class="col-sm-10 checkbox-radios">
                                              <div class="togglebutton">
                                                <label>
                                                  <input type="checkbox" name="aktivan" value="1" {{ old('aktivan', $proizvod->aktivan) == 1 ? ' checked' : '' }}>
                                                  <span class="toggle"></span>
                                                </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="card-footer ml-auto mr-auto">
                                          <button type="submit" id="btn-nastavi" class="btn btn-warning">{{ __('Nastavi dalje') }}</button>
                                          <input type="hidden" name="id_original_p" id="id_original_p" value="{{ $proizvod->id }}"> 
                                          <input type="hidden" name="proizvoda_u_smjeni" id="proizvoda_u_smjeni" value="{{ $proizvod->proizvoda_u_smjeni }}"> 
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal - duplikat proizvoda -KRAJ-->

      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('proizvod.update', $proizvod) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Proizvod - osnovni podaci') }}</h4>
              </div>
              <div class="card-body ">

                <div class="row">
                  @can('create', App\Proizvod::class)
                    <!-- Button trigger modal -->
                    <div class="col-6 text-left">
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#noviProizvod" data-backdrop="static" data-keyboard="false">
                        Kreiraj duplikat
                      </button>
                    </div>

                  @endcan

                  <div class="col-md-6 text-right">
                      <a href="{{ route('proizvod.index') }}" class="btn btn-sm btn-warning">{{ __('Nazad') }}</a>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Naziv') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv_old" id="input-naziv" type="text" placeholder="{{ __('obavezan unos izborom iz lista ispod') }}" value="{{ $proizvod->naziv }}" disabled  aria-required="true"/>
                      <input type="hidden" name="naziv" id="naziv_slozen" value="{{ $proizvod->naziv }}">
                      @include('alerts.feedback', ['field' => 'naziv'])
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Vrsta/model') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('model_id') ? ' has-danger' : '' }}">
                      <select class="selectpicker col-sm-12 pl-0 pr-0" name="model_id" id="model_id" onchange="f_azuriraj_slozeni_naziv()" data-style="select-with-transition" title="" data-size="10">
                        <option value="0" >obavezan izbor</option>
                        @foreach ($proiz_modeli as $model)
                        <option value="{{ $model->id }}" {{ $model->id == $proizvod->model_id ? 'selected' : '' }}>{{ $model->naziv }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'model_id'])
                    </div>  
                  </div> 
                </div>    
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Boja laka') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('boja1_id') ? ' has-danger' : '' }}">
                      <select class="selectpicker col-sm-12 pl-0 pr-0" name="boja1_id" id="boja1_id" onchange="f_azuriraj_slozeni_naziv()" data-style="select-with-transition" title="" data-size="10">
                        <option value="0" >obavezan izbor</option>
                        @foreach ($oznake_lakova as $boja1)
                        <option value="{{ $boja1->id }}" {{ $boja1->id == $proizvod->boja1_id ? 'selected' : '' }}>{{ $boja1->naziv }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'boja1_id'])
                    </div>  
                  </div> 
                </div> 
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Boja presvlake') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('boja2_id') ? ' has-danger' : '' }}">
                      <select class="selectpicker col-sm-12 pl-0 pr-0" name="boja2_id" id="boja2_id" onchange="f_azuriraj_slozeni_naziv()" data-style="select-with-transition" title="" data-size="10">
                        <option value="0" >obavezan izbor</option>
                        @foreach ($oznake_presvlaka as $boja2)
                        <option value="{{ $boja2->id }}" {{ $boja2->id == $proizvod->boja2_id ? 'selected' : '' }}>{{ $boja2->naziv }}</option>
                        @endforeach
                      </select>
                      @include('alerts.feedback', ['field' => 'boja2_id'])
                    </div>  
                  </div> 
                </div> 

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Šifra') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('sifra_proizvoda') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('sifra_proizvoda') ? ' is-invalid' : '' }}" name="sifra_proizvoda_old" id="input-sifra_proizvoda" type="text"  placeholder="{{ __('definiše se izborom iz lista iznad') }}"  disabled value="{{ old('sifra_proizvoda', $proizvod->sifra_proizvoda) }}" required="true" aria-required="true"/>
                      <input type="hidden" name="sifra_proizvoda" id="sifra_proizvoda_slozena" value="{{ old('sifra_proizvoda', $proizvod->sifra_proizvoda) }}">
                      @include('alerts.feedback', ['field' => 'sifra_proizvoda'])
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Opis') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('opis') ? ' has-danger' : '' }}">
                      <textarea name="opis" id="input-opis" cols="30" rows="4" class="form-control{{ $errors->has('opis') ? ' is-invalid' : '' }}" placeholder="{{ __('kratak opis proizvoda') }}">{{ old('opis', $proizvod->opis) }}</textarea>
                      @include('alerts.feedback', ['field' => 'opis'])
                    </div>
                  </div>
                </div> 
                <div class="row">

                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label label-checkbox">{{ __('Aktivan') }}</label>
                  <div class="col-sm-2 checkbox-radios">
                    <div class="togglebutton">
                      <label>
                        <input type="checkbox" name="aktivan" value="1" {{ old('aktivan', $proizvod->aktivan) == 1 ? ' checked' : '' }}>
                        <span class="toggle"></span>
                      </label>
                    </div>
                  </div>
                  <label class="col-sm-3 col-form-label">{{ __('Planirani broj proizvoda u smjeni') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('proizvoda_u_smjeni') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('proizvoda_u_smjeni') ? ' is-invalid' : '' }}" hidden name="proizvoda_u_smjeni" id="input-proizvoda_u_smjeni" type="text" placeholder="{{ __('') }}" value="{{ old('proizvoda_u_smjeni', $proizvod->proizvoda_u_smjeni) }}" required="true" aria-required="true"/>
                      <input class="form-control{{ $errors->has('proizvoda_u_smjeni') ? ' is-invalid' : '' }}" disabled name="prikaz-proizvoda_u_smjeni" id="prikaz-proizvoda_u_smjeni" type="text" placeholder="{{ __('') }}" value="{{ old('proizvoda_u_smjeni', $proizvod->proizvoda_u_smjeni) }}" />
                      @include('alerts.feedback', ['field' => 'proizvoda_u_smjeni'])
                    </div>
                  </div>
                </div>


              </div>
              <div class="card-footer ml-auto mr-auto">
               <button type="submit" id="btn-snimi" class="btn btn-warning">{{ __('Snimi izmjene') }}</button>

                <input type="hidden" id="proizvod_id"  value="{{ $proizvod->id }}"> 
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
                <h4 class="card-title">{{ __('Proizvod - detalji') }}</h4>
              </div>
              
              <div id="app">
                  <tehnologija-proizvoda></tehnologija-proizvoda>

              </div>



            </div>
        </div>
      </div>


    </div>
  </div>
@endsection


<!-- ####   rješenje problema sa scrolbarom kod višestrukih modala -->
@push('js')
  <script>
    $('#novaOperacijaElementa').on('hidden.bs.modal', function (e) {
    // ovde ide id "gornjeg" modala
    
        $('body').addClass('modal-open');

    });

    function f_azuriraj_slozeni_naziv() {
            var v_naziv = '';
            var v_sifra = '';

            // vue
            /*
            v_naziv=$("#model_id option:selected").text().trim();
            v_sifra=$("#model_id option:selected").value();
            */

            // omogućimo snimanje
            document.getElementById("btn-snimi").disabled=false;

            var e = document.getElementById("model_id");
            if (e.value!=0){
                v_naziv=e.options[e.selectedIndex].text; //pocetak naziva
                v_sifra=e.value.padStart(3, '0');
            }else{
              document.getElementById("btn-snimi").disabled=true;

            }


            var e = document.getElementById("boja1_id");
            if (e.value!=0){
                v_naziv=v_naziv+', '+e.options[e.selectedIndex].text; //nastavak naziva
                v_sifra=v_sifra+e.value.padStart(3, '0');
            }else{
              document.getElementById("btn-snimi").disabled=true;

            }

            var e = document.getElementById("boja2_id");
            if (e.value!=0){
            
                v_naziv=v_naziv+', '+e.options[e.selectedIndex].text; //nastavak naziva
                v_sifra=v_sifra+e.value.padStart(3, '0'); 
            }else{
              document.getElementById("btn-snimi").disabled=true;

            }


            //alert(v_naziv+v_sifra);
            // za izmjenu
                // vidljiva disabled polja
                document.getElementById("input-naziv").value=v_naziv;
                document.getElementById("input-sifra_proizvoda").value=v_sifra;
                // nevidljiva pola koja idu u bazu
                document.getElementById("naziv_slozen").value=v_naziv;
                document.getElementById("sifra_proizvoda_slozena").value=v_sifra;
            
            
        }

        function f_azuriraj_slozeni_naziv_D() {
            var v_naziv = '';
            var v_sifra = '';

            // vue
            /*
            v_naziv=$("#model_id option:selected").text().trim();
            v_sifra=$("#model_id option:selected").value();
            */

            // omogućimo nastavak dupliranja
            document.getElementById("btn-nastavi").disabled=false;

            var e = document.getElementById("model_id_D");
            if (e.value!=0){
                v_naziv=e.options[e.selectedIndex].text; //pocetak naziva
                v_sifra=e.value.padStart(3, '0');
            }else{
              document.getElementById("btn-nastavi").disabled=true;
            }


            var e = document.getElementById("boja1_id_D");
            if (e.value!=0){
                v_naziv=v_naziv+', '+e.options[e.selectedIndex].text; //nastavak naziva
                v_sifra=v_sifra+e.value.padStart(3, '0');
            }else{

              document.getElementById("btn-nastavi").disabled=true;
            }

            var e = document.getElementById("boja2_id_D");
            if (e.value!=0){
            
                v_naziv=v_naziv+', '+e.options[e.selectedIndex].text; //nastavak naziva
                v_sifra=v_sifra+e.value.padStart(3, '0'); 
            }else{

              document.getElementById("btn-nastavi").disabled=true;
            }

            
            // za modal duplikat
                // vidljiva disabled polja
                document.getElementById("input-naziv_D").value=v_naziv;
                document.getElementById("input-sifra_proizvoda_D").value=v_sifra;
                // nevidljiva pola koja idu u bazu
                document.getElementById("naziv_slozen_D").value=v_naziv;
                document.getElementById("sifra_proizvoda_slozena_D").value=v_sifra;
            
        }

  </script>
@endpush
<!-- ####   rješenje problema sa scrolbarom kod višestrukih modala -->
