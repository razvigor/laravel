@extends('layouts.app', ['activePage' => 'tagovi_masina', 'menuParent' => 'sifrarnici', 'titlePage' => __('Tagovi mašina')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">label</i>
                </div>
                <h4 class="card-title">{{ __('Tagovi mašina - pregled') }}</h4>
              </div>
              <div class="card-body">
                @can('create', App\Tag::class)
                  <div class="row">
                    <div class="col-12 text-right">
                      <a href="{{ route('mtag.create') }}" class="btn btn-sm btn-rose">{{ __('Dodaj') }}</a>
                    </div>
                  </div>
                @endcan
                <div class="table-responsive">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" style="display:none">
                    <thead class="text-primary">
                      <th>
                          {{ __('Naziv') }}
                      </th>
                      <th>
                        {{ __('Boja') }}
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
                      @foreach($mtags as $tag)
                        <tr>
                          <td>
                            {{ $tag->name }}
                          </td>
                          <td>
                            <span class="badge badge-default" style="background-color:{{ $tag->color }}">{{ $tag->name }}</span>
                          </td>
                          <td>
                            {{ $tag->created_at->format('Y-m-d') }}
                          </td>
                          @can('manage-items', App\User::class)
                            <td class="td-actions text-right">
                              <form action="{{ route('mtag.destroy', $tag) }}" method="post">
                                @csrf
                                @method('delete')
                                
                                @can('update', $tag)
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('mtag.edit', $tag) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                @endcan
                                @if ($tag->masine->isEmpty() && auth()->user()->can('delete', $tag))
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Da li ste sigurni da želite izbrisati ovaj tag?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
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
        [10, 25, 50, "All"]
      ],
      responsive: true,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "kucaj za pretragu",
      },
      "columnDefs": [
        { "orderable": false, "targets": 3 },
      ],
    });
  });
</script>
@endpush