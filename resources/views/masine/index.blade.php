@extends('layouts.app', ['activePage' => 'masine', 'menuParent' => 'sifrarnici', 'titlePage' => __('Mašine')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">filter_none</i>
                </div>
                <h4 class="card-title">{{ __('Pregled podataka o mašinama') }}</h4>
              </div>
              <div class="card-body">
                @can('create', App\Masina::class)
                  <div class="row">
                    <div class="col-12 text-right">
                      <a href="{{ route('masina.create') }}" class="btn btn-sm btn-warning">{{ __('Dodaj') }}</a>
                    </div>
                  </div>
                @endcan
                <div class="table-responsive">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" style="display:none">
                    <thead class="text-warning">
                      <th>
                        {{ __('R.br.') }}
                      </th>
                      <th>
                        {{ __('Naziv') }}
                      </th>
                      <th>
                        {{ __('Vrsta mašine') }}
                      </th>
                      <th>
                        {{ __('Lokacija') }}
                      </th>                      
                      <th>
                        {{ __('Slika') }}
                      </th>
                      <th>
                        {{ __('Status') }}
                      </th>
                      <th>
                        {{ __('Datum unosa') }}
                      </th>
                      @can('manage-items', App\User::class)
                        <th class="text-right">
                          {{ __('Obrade') }}
                        </th>
                      @endcan
                    </thead>
                    <tbody>
                      @foreach($masine as $masina)
                        <tr>
                          <td>
                            {{ $masina->r_br }}
                          </td>                         
                          <td>
                            {{ $masina->name }}
                          </td>
                          <td>
                            {{ $masina->masinvrsta->name }}
                          </td>
                          <td>
                            {{ $masina->masinlokacija->naziv }}
                          </td>
                          <td>
                            <img src="{{ $masina->path() }}" alt="" style="max-width: 200px;">
                          </td>
                          <td>
                            {{ $masina->status }}
                          </td>
                          <td>
                            {{ $masina->created_at->format('Y-m-d') }}
                          </td>
                          @can('manage-masine', App\User::class)
                            @if (auth()->user()->can('update', $masina) || auth()->user()->can('delete', $masina))
                              <td class="td-actions text-right">
                                <form action="{{ route('masina.destroy', $masina) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    
                                    @can('update', $masina)
                                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('masina.edit', $masina) }}" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                        <div class="ripple-container"></div>
                                      </a>
                                    @endcan
                                    @can('delete', $masina)
                                      <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Da li želite izbrisati ovu mašinu?") }}') ? this.parentElement.submit() : ''">
                                          <i class="material-icons">close</i>
                                          <div class="ripple-container"></div>
                                      </button>
                                    @endcan
                                </form>
                              </td>
                            @endif
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
          [10, 25, 50, "sve"]
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
          { "orderable": false, "targets": 5 },
        ],
      });
    });
  </script>
@endpush