@extends('layouts.app', ['activePage' => 'mat_vrste', 'menuParent' => 'sifrarnici', 'titlePage' => __('Vrste materijala - pregled')])

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
                <h4 class="card-title">{{ __('Vrste materijala') }}</h4>
              </div>

                <div id="app">

                      <vrste-materijala></vrste-materijala>
                  
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
      //REinit();

    });

    function REinit() {
        /// PLACE HERE ALL YOUR DOC.READY SCRIPTS
      alert('reinit radi 2');
    
      $('#datatables').fadeIn(1100);
      $('#datatables').DataTable({

        
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "svi"]
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
    		sLengthMenu:     "Broj redova: _MENU_ ",
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

    }

    
    function RefreshTable() {


      let row = this.datatables.row('#row-' + data.id);

//and then update the whole row successfully with

row.data(data).draw(true);

 



      /*
      var tableId='#datatables';
//      var urlData='./../../api/mattipvrste';
      var urlData='api/mattipvrste';

    
      $.getJSON(urlData, null, function(json) {
        table = $(tableId).dataTable();
        oSettings = table.fnSettings();
        
        alert('obriši sve');
        table.fnClearTable(this);

        for (var i = 0; i < json.aaData.length; i++) {
            table.oApi._fnAddData(oSettings, json.aaData[i]);
        }
        alert('napunio json');
        oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
        table.fnDraw();
      });
      */
    }
    
  </script>

@endpush