@extends('layouts.app', ['activePage' => 'vrste_masina', 'menuParent' => 'sifrarnici', 'titlePage' => __('Vrste mašina - pregled')])

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
                <h4 class="card-title">{{ __('Vrste mašina') }}</h4>
              </div>
              <div class="card-body">
                @can('create', App\Masinvrsta::class)
                  <div class="row">
                    <div class="col-12 text-right">
                      <a href="{{ route('masinvrsta.create') }}" class="btn btn-sm btn-warning">{{ __('Dodaj') }}</a>
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
                        {{ __('Opis') }}
                      </th>
                      <th>
                        {{ __('Datum kreiranja') }}
                      </th>
                      @can('manage-masine', App\User::class)
                        <th class="text-right">
                          {{ __('Obrade') }}
                        </th>
                      @endcan
                    </thead>
                    <tbody>

                      @foreach($masinvrste as $masinvrstum)
                        <tr>
                          <td>
                            {{ $masinvrstum->name }}
                          </td>
                          <td>
                            {{ $masinvrstum->description }}
                          </td>
                          <td>
                            {{ $masinvrstum->created_at->format('Y-m-d') }}
                          </td>
                          @can('manage-masine', App\User::class)
                            <td class="td-actions text-right">
                              <form action="{{ route('masinvrsta.destroy', $masinvrstum) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                @can('update', $masinvrstum)
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('masinvrsta.edit', $masinvrstum) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                @endcan
                                @if ($masinvrstum->masine->isEmpty() && auth()->user()->can('delete', $masinvrstum))
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Da li želite obrisati ovu vrstu mašina?") }}') ? this.parentElement.submit() : ''">
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