@extends('layouts.app', ['activePage' => 'parametri', 'menuParent' => 'sifrarnici', 'titlePage' => __('Opšti parametri - pregled')])

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
                <h4 class="card-title">{{ __('Opšti parametri') }}</h4>
              </div>
              <div class="card-body">
                
                @can('create', App\Parametar::class)
                  <div class="row">
                    <div class="col-12 text-right">
                      <a href="{{ route('parametar.create') }}" class="btn btn-sm btn-warning">{{ __('Dodaj') }}</a>
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
                        {{ __('Vrijednost') }}
                      </th>
                      <th>
                        {{ __('Datum kreiranja') }}
                      </th>
                      @can('manage-materijali', App\User::class)
                        <th class="text-right">
                          {{ __('Obrade') }}
                        </th>
                      @endcan
                    </thead>
                    <tbody>

                      @foreach($parametri as $parametar)
                              <!-- Modal -->
                              <div class="modal fade modal{{ $parametar->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-body">
                                      <div class="content">
                                        <div class="container-fluid">
                                          <div class="row">
                                            <div class="col-md-12">
                                              
                                              <form method="post" action="{{ route('parametar.update', $parametar) }}" autocomplete="off" class="form-horizontal">
                                                @csrf
                                                @method('put')
                                    
                                                <div class="card ">
                                                  <div class="card-header card-header-info card-header-icon">
                                                    <div class="card-icon">
                                                      <i class="material-icons">category</i>
                                                    </div>
                                                    <h4 class="card-title">{{ __('Opšti parametar - izmjena') }}</h4>
                                                  </div>
                                                  <div class="card-body ">
                                                    <div class="row">
                                                      <div class="col-md-12 text-right">
                                                        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Zatvori</button>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <label class="col-sm-4 col-form-label">{{ __('Naziv') }}</label>
                                                      <div class="col-sm-8">
                                                        <div class="form-group{{ $errors->has('naziv') ? ' has-danger' : '' }}">
                                                          <input class="form-control{{ $errors->has('naziv') ? ' is-invalid' : '' }}" name="naziv" id="input-naziv" type="text" placeholder="{{ __('') }}" value="{{ old('naziv', $parametar->naziv) }}" required="true" aria-required="true"/>
                                                          @include('alerts.feedback', ['field' => 'naziv'])
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                      <label class="col-sm-4 col-form-label">{{ __('Vrijednost') }}</label>
                                                      <div class="col-sm-2">
                                                        <div class="form-group{{ $errors->has('vrijednost') ? ' has-danger' : '' }}">
                                                          <input class="form-control{{ $errors->has('vrijednost') ? ' is-invalid' : '' }}" name="vrijednost" id="input-vrijednost" type="text" placeholder="{{ __('') }}" value="{{ old('vrijednost', $parametar->vrijednost/100) }}" required="true" aria-required="true"/>
                                                          @include('alerts.feedback', ['field' => 'vrijednost'])
                                                        </div>
                                                      </div>
                                                    </div>

<div id="app"> <!-- ovo je samo da ne iskače greška--></div>

                                         
                                                  </div>
                                                  <div class="card-footer ml-auto mr-auto">
                                                    <button type="submit" class="btn btn-warning">{{ __('Snimi izmjene') }}</button>
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
							  <!-- Modal - kraj -->
						<tr>
                          <td>
                            {{ $parametar->naziv }}
                          </td>
                          <td>
                            {{ $parametar->vrijednost/100 }}
                          </td>
                          <td>
                            {{ $parametar->created_at->format('d-m-Y') }}
                          </td>
                          @can('manage-materijali', App\User::class)
                            <td class="td-actions text-right">
                              <!-- Button trigger modal -->
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modal{{ $parametar->id }}" data-backdrop="static" data-keyboard="false">
                                <i class="material-icons">edit</i>
                              </button>
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