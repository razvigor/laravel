@extends('layouts.app', ['activePage' => 'proizvod-management', 'menuParent' => 'laravel', 'titlePage' => __('Proizvodi - pregled')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">category</i>
                </div>
                <h4 class="card-title">{{ __('Proizvodi') }}</h4>

              </div>
              <div class="card-body">
                @can('create', App\Proizvod::class)
                  <div class="row">
                    <!-- Button trigger modal -->
                    <div class="col-12 text-right">
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#noviProizvod" data-backdrop="static" data-keyboard="false">
                        Novi proizvod
                      </button>
                    </div>
                    <!-- Modal -->
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
                                          <h4 class="card-title">{{ __('Novi proizvod') }}</h4>
                                        </div>
                                        <div class="card-body ">
                                          <div class="row">
                                            <div class="col-md-12 text-right">
                                              <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                Zatvori
                                              </button>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Naziv') }}</label>
                                            <div class="col-sm-8">
                                              <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv_old" id="input-naziv" type="text" placeholder="{{ __('obavezan unos izborom iz lista ispod') }}" value="" disabled  aria-required="true"/>
                                                <input type="hidden" name="naziv" id="naziv_slozen" value="">
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
                                                  <option value="{{ $model->id }}" {{ $model->id == old('model_id') ? 'selected' : '' }}>{{ $model->naziv }}</option>
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
                                                  <option value="{{ $boja1->id }}" {{ $boja1->id == old('boja1_id') ? 'selected' : '' }}>{{ $boja1->naziv }}</option>
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
                                                  <option value="{{ $boja2->id }}" {{ $boja2->id == old('boja2_id') ? 'selected' : '' }}>{{ $boja2->naziv }}</option>
                                                  @endforeach
                                                </select>
                                                @include('alerts.feedback', ['field' => 'boja2_id'])
                                              </div>  
                                            </div> 
                                          </div>                                           
                                          
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Šifra') }}</label>
                                            <div class="col-sm-7">
                                              <div class="form-group{{ $errors->has('sifra_proizvoda') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('sifra_proizvoda') ? ' is-invalid' : '' }}" name="sifra_proizvoda_old" id="input-sifra_proizvoda" type="text" placeholder="{{ __('definiše se izborom iz lista iznad') }}" value="" disabled  aria-required="true"/>
                                                <input type="hidden" name="sifra_proizvoda" id="sifra_proizvoda_slozena" value="">
                                                @include('alerts.feedback', ['field' => 'sifra_proizvoda'])
                                              </div>
                                            </div>
                                          </div>                                          
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Opis') }}</label>
                                            <div class="col-sm-7">
                                              <div class="form-group{{ $errors->has('opis') ? ' has-danger' : '' }}">
                                                <textarea cols="30" rows="10" class="form-control{{ $errors->has('opis') ? ' is-invalid' : '' }}" name="opis" id="input-opis" type="text" placeholder="{{ __('unesite kratak opis proizvoda') }}" required="true" aria-required="true"></textarea>
                                                @include('alerts.feedback', ['field' => 'opis'])
                                              </div>
                                            </div>
                                          </div> 
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label label-checkbox">{{ __('Aktivan') }}</label>
                                            <div class="col-sm-10 checkbox-radios">
                                              <div class="togglebutton">
                                                <label>
                                                  <input type="checkbox" name="aktivan" value="1"  checked>
                                                  <span class="toggle"></span>
                                                </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="card-footer ml-auto mr-auto">
                                          <input type="hidden" name="id_original_p" id="id_original_p" value="0"> 
                                          <button type="submit" id="btn-snimi" class="btn btn-warning">{{ __('Snimi') }}</button>
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


                  </div>
                @endcan
                <div class="table-responsive">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:none">
                    <thead class="text-warning">
                      <th>
                        {{ __('Naziv') }}
                      </th>
                      <th>
                        {{ __('Šifra') }}
                      </th>
                      <th>
                        {{ __('Opis') }}
                      </th>
                      <th>
                        {{ __('Aktivan') }}
                      </th>
                      <th>
                        {{ __('Datum kreiranja') }}
                      </th>
                      @can('manage-proizvodi', App\User::class)
                        <th class="text-right">
                          {{ __('Obrade') }}
                        </th>
                      @endcan
                    </thead>
                    <tbody>



                      

                      @foreach($proizvodi as $proizvod)
                        <tr>
                          <td>
                            {{ $proizvod->naziv }}
                          </td>
                          <td>
                            {{ $proizvod->sifra_proizvoda }}
                          </td>
                          <td>
                            {{ $proizvod->opis }}
                          </td>
                          <td class="{{ $proizvod->aktivan == 1 ? 'text-success' : 'text-danger' }}">
                            <i class="material-icons">{{ $proizvod->aktivan == 1 ? 'check_circle' : 'block' }}</i>
                          </td>
                          <td>
                            {{ $proizvod->created_at->format('d-m-Y') }}
                          </td>
                          @can('manage-proizvodi', App\User::class)
                            <td class="td-actions text-right">
                              <form action="{{ route('proizvod.destroy', $proizvod) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                @can('update', $proizvod)
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('proizvod.edit', $proizvod) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                @endcan
                                @if ($proizvod->elementi->isEmpty() && auth()->user()->can('delete', $proizvod))
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Da li želite obrisati ovaj proizvod?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">delete</i>
                                      <div class="ripple-container"></div>
                                  </button>
                                @endif
                              </form>
                            </td>
                          @endcan
                        </tr>
                      @endforeach
                  
                      

                    </tbody>


                  </table>
                </div>
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
      $('#datatables').fadeIn(1100);
      $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "Sve"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "kucaj za pretragu",
			
	    	sEmptyTable:     "Nema podataka u tabeli",
    		sInfo:           "Prikazano _START_ do _END_ od ukupno _TOTAL_ zapisa",
    		sInfoEmpty:      "Prikaz 0 do 0 od ukupno 0 zapisa",
    		sInfoFiltered:   "(filtrirano od ukupno _MAX_ zapisa)",
    		sInfoPostFix:    "",
    		sInfoThousands:  ".",
    		sLengthMenu:     "Prikaži _MENU_ zapisa",
    		sLoadingRecords: "Učitavanje...",
    		sProcessing:     "Obrada...",
    		sSearch:         "Pretraga:",
    		sZeroRecords:    "Nisu pronađeni odgovarajući zapisi",
    		oPaginate: {
        		sFirst:    "Početak",
        		sLast:     "Kraj",
        		sNext:     "Slijedeća",
        		sPrevious: "Predhodna"
    		},
    		oAria: {
        		sSortAscending:  ": aktivirajte da sortirate kolonu uzlazno",
        		sSortDescending: ": aktivirajte da sortirate kolonu silazno"
    		}			
			
        },
        "columnDefs": [
          { "orderable": false, "targets": 3 },
        ],
      });
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
            /*
            if (this.materijal.mattipvrsta_id!=0){
              v_naziv = v_naziv + ', '+$("#boja1_id option:selected").text().trim();
            }

            if (this.materijal.vrsta_podloge!=0){
              v_naziv = v_naziv + ', '+$("#boja2_id option:selected").text().trim();
            } 
            */

            //vue azuriranje
            //this.materijal.slozeni_naziv=v_naziv;

            // vidljiva disabled polja
            document.getElementById("input-naziv").value=v_naziv;
            document.getElementById("input-sifra_proizvoda").value=v_sifra;
            // nevidljiva pola koja idu u bazu
            document.getElementById("naziv_slozen").value=v_naziv;
            document.getElementById("sifra_proizvoda_slozena").value=v_sifra;
            
        }

  </script>
@endpush