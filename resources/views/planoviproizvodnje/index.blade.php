@extends('layouts.app', ['activePage' => 'planproizvodnje-management', 'menuParent' => 'laravel', 'titlePage' => __('Planovi proizvodnje - pregled')])

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
                <h4 class="card-title">{{ __('Planovi proizvodnje') }}</h4>

              </div>
              <div class="card-body">
                @can('create', App\Proizvod::class)
                  <div class="row">
                    <!-- Button trigger modal -->
                    <div class="col-12 text-right">
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#noviProizvod" data-backdrop="static" data-keyboard="false">
                        Novi plan
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
                                            <div class="col-sm-7">
                                              <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv" id="input-naziv" type="text" placeholder="{{ __('') }}" value="" required="true" aria-required="true"/>
                                                @include('alerts.feedback', ['field' => 'naziv'])
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Šifra') }}</label>
                                            <div class="col-sm-7">
                                              <div class="form-group{{ $errors->has('sifra_proizvoda') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('sifra_proizvoda') ? ' is-invalid' : '' }}" name="sifra_proizvoda" id="input-sifra_proizvoda" type="text" placeholder="{{ __('interna Vitorog') }}" value="" required="true" aria-required="true"/>
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
                                          <button type="submit" class="btn btn-warning">{{ __('Snimi') }}</button>
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
  </script>
@endpush