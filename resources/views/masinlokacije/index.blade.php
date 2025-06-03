@extends('layouts.app', ['activePage' => 'lokacije_masina', 'menuParent' => 'sifrarnici', 'titlePage' => __('Lokacije mašina - pregled')])

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
                <h4 class="card-title">{{ __('Lokacije mašina / Radnih mjesta / Utrošaka materijala') }}</h4>
              </div>
              <div class="card-body">
                @can('create', App\Masinlokacija::class)
                  <div class="row">
                    <div class="col-12 text-right">
                      <a href="{{ route('masinlokacija.create') }}" class="btn btn-sm btn-warning">{{ __('Dodaj') }}</a>
                    </div>
                  </div>
                @endcan
                <div class="table-responsive">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:none">
                    <thead class="text-warning">
                      <th>
                        {{ __('R.b.') }}
                      </th>
                      <th>
                        {{ __('Naziv') }}
                      </th>
                      <th>
                        {{ __('Tehnološki koeficijent') }}
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

                      @foreach($masinlokacije as $lokacija)
                        <tr>
                          <td>
                            {{ $lokacija->r_br }}
                          </td>                          
                          <td>
                            {{ $lokacija->naziv }}
                          </td>
                          <td>
                            {{ $lokacija->teh_koef/100 }}
                          </td>
                          <td>
                            {{ $lokacija->created_at->format('Y-m-d') }}
                          </td>
                          @can('manage-masine', App\User::class)
                            <td class="td-actions text-right">
                              <form action="{{ route('masinlokacija.destroy', $lokacija) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                @can('update', $lokacija)
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('masinlokacija.edit', $lokacija) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                @endcan
                                @if ($lokacija->masine->isEmpty() && auth()->user()->can('delete', $lokacija))
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Da li želite obrisati ovu lokaciju mašina?") }}') ? this.parentElement.submit() : ''">
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