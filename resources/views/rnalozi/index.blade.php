@extends('layouts.app', ['activePage' => 'rnalog-management', 'menuParent' => 'laravel', 'titlePage' => __('Radni nalozi - pregled')])

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
                <h4 class="card-title">{{ __('Radni nalozi') }}</h4>

              </div>
              <div class="card-body">
                @can('create', App\Proizvod::class)
                  <div class="row">
                    <!-- Button trigger modal -->
                    <div class="col-12 text-right">
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#noviProizvod" data-backdrop="static" data-keyboard="false">
                        Novi RN
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
                                    <form method="post" action="{{ route('rnalog.store') }}" autocomplete="off" class="form-horizontal">
                                      @csrf
                                      @method('post')
                          
                                      <div class="card ">
                                        <div class="card-header card-header-info card-header-icon">
                                          <div class="card-icon">
                                            <i class="material-icons">category</i>
                                          </div>
                                          <h4 class="card-title">{{ __('Novi RN') }}</h4>
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
                                            <label class="col-sm-2 col-form-label">{{ __('Broj RN') }}</label>
                                            <div class="col-sm-7">
                                              <div class="form-group{{ $errors->has('broj_RN') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('broj_RN') ? ' is-invalid' : '' }}" name="broj_RN" id="input-broj_RN" type="text" placeholder="{{ __('') }}" value="" required="true" aria-required="true"/>
                                                @include('alerts.feedback', ['field' => 'broj_RN'])
                                              </div>
                                            </div>
                                          </div>


                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Opis') }}</label>
                                            <div class="col-sm-7">
                                              <div class="form-group{{ $errors->has('opis') ? ' has-danger' : '' }}">
                                                <textarea cols="30" rows="3" class="form-control{{ $errors->has('opis') ? ' is-invalid' : '' }}" name="opis" id="input-opis" type="text" placeholder="{{ __('unesite kratak opis radnog naloga (napomenu)') }}" required="true" aria-required="true"></textarea>
                                                @include('alerts.feedback', ['field' => 'opis'])
                                              </div>
                                            </div>
                                          </div> 
                                          
                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Planirani datum montaže') }}</label>
                                            <div class="col-sm-4">
                                              <div class="form-group{{ $errors->has('datum_montaze') ? ' has-danger' : '' }}">
                                                <input type="text"  name="datum_montaze" id="datum_montaze"
                                                placeholder="{{ __('izaberite datum') }}" class="form-control datetimepicker" value="2000-01-01"/>
                                                @include('alerts.feedback', ['field' => 'datum_montaze'])
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Planirani datum isporuke') }}</label>
                                            <div class="col-sm-4">
                                              <div class="form-group{{ $errors->has('datum_isporuke') ? ' has-danger' : '' }}">
                                                <input type="text"  name="datum_isporuke" id="datum_isporuke"
                                                placeholder="{{ __('izaberite datum') }}" class="form-control datetimepicker" value="2000-01-01"/>
                                                @include('alerts.feedback', ['field' => 'datum_isporuke'])
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <label class="col-sm-2 col-form-label">{{ __('Broj smjena') }}</label>
                                            <div class="col-sm-7">
                                              <div class="form-group{{ $errors->has('broj_dana') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('broj_dana') ? ' is-invalid' : '' }}" name="broj_dana" id="input-broj_dana" type="text" placeholder="{{ __('') }}" value="1" required="true" aria-required="true"/>
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
                                                    <input name="status" class="form-check-input" id="{{ $value }}" value="{{ $value }}" type="radio" {{ 1 == $value ? ' checked' : '' }}> {{ $status }}
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
                        {{ __('Broj RN') }}
                      </th>
                      <th>
                        {{ __('Datum otvaranja') }}
                      </th>
                      <th>
                        {{ __('Datum montaže') }}
                      </th>
                      <th>
                        {{ __('Datum isporuke') }}
                      </th>                                            
                      <th>
                        {{ __('Opis') }}
                      </th>
                      <th>
                        {{ __('Broj smjena') }}
                      </th>
                      <th>
                        {{ __('Status') }}
                      </th>
                      @can('manage-rnalozi', App\User::class)
                        <th class="text-right">
                          {{ __('Obrade') }}
                        </th>
                      @endcan
                    </thead>
                    <tbody>



                      

                      @foreach($rnalozi as $rnalog)
                        <tr>
                          <td>
                            {{ $rnalog->broj_RN }}
                          </td>
                          <td>
                            {{ $rnalog->created_at->format('d-m-Y') }}
                          </td>
                          <td>
                            {{ \Carbon\Carbon::parse($rnalog->datum_montaze)->format('d-m-Y')}} 
                          </td>
                          <td>
                            {{ \Carbon\Carbon::parse($rnalog->datum_isporuke)->format('d-m-Y')}} 
                          </td>                                                    
                          <td>
                            {{ $rnalog->opis }}
                          </td>
                          <td>
                            {{ $rnalog->broj_dana }}
                          </td>
                          <td>
                            @foreach (config('rnalozi.statusi') as $value => $status)
                            {{ $value==$rnalog->status ? $status : '' }}
                            @endforeach
                          </td>
                          @can('manage-rnalozi', App\User::class)
                            <td class="td-actions text-right">
                              <form action="{{ route('rnalog.destroy', $rnalog) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                @can('update', $rnalog)
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('rnalog.edit', $rnalog) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                @endcan
                                @if ($rnalog->stavkern->isEmpty() && auth()->user()->can('delete', $rnalog))
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Da li želite obrisati ovaj rnalog?") }}') ? this.parentElement.submit() : ''">
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

// pretraga po poljima      
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
