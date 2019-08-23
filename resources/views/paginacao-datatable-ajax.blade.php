@extends('layouts.argon.main')

@section('css')
<style type="text/css">
  
</style>
@endsection
@section('main_top')
  <div class="header-body">
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-12 col-lg-12">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-header">
                  <h1 class="card-title">Usuários</h1>
              </div>
          </div>
        </div>
      </div>
  </div>
@endsection
@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">

            <div class="card-body">
                <div class="row alinhar-filtro">

                        <div class="col-12">
                            <h3 class="text-center"> Filtros com yadcf </h3>
                        </div>

                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Filtro por Status</label>
                            <div id="filtroStatus"></div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Filtro por Tipo</label>
                            <div id="filtroTipo"></div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Filtro por Gênero</label>
                            <div id="filtroGenero"></div>
                        </div>  
                        <div class="col-sm-3 col-sm-offset-3">
                        </div>

                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Idade mínima</label>
                            <input class="form-control" placeholder="Idade mínima" type="number" id="min" name="min">
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Idade máxima</label>
                            <input class="form-control" placeholder="Idade máxima" type="number" id="max" name="max">
                        </div>
                        

                        <div class="col-sm-3 col-sm-offset-3">
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                        </div>

                        <div class="col-12">
                            <br>
                            <h3 class="text-center"> Filtros com request </h3>
                        </div>

                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Filtro por Status</label>
                            <select class="form-control filterstatus">
                                <option value="">Todos...</option>
                                <option value="ACTIVE">Ativo</option>
                                <option value="DISABLED">Desabilitado</option>
                                <option value="INACTIVE">Inativo</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Filtro por Tipo</label>
                            <select class="form-control filtertype">
                                <option value="">Limpar filtro</option>
                                <option value="MASTER">Administrador</option>
                                <option value="ADMIN">Gerente</option>
                                <option value="CLIENT">Client</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Filtro por Gênero</label>
                            <select class="form-control filtergenre">
                                <option value="">Limpar filtro</option>
                                <option value="FEMALE">Feminino</option>
                                <option value="MALE">Masculino</option>
                                <option value="OTHER">Outro</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Idade mínima</label>
                            <input class="form-control filterminage" placeholder="Idade mínima" type="number" name="min">
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Idade máxima</label>
                            <input class="form-control filtermaxage" placeholder="Idade máxima" type="number"  name="max">
                        </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
						<thead class=" text-primary">
							<th>
								Nome
							</th>
							<th>
								Status
							</th>
							<th>
								Tipo
							</th>
							<th>
								Idade
							</th>
							<th>
								Genêro
							</th>
                            <th>
                                Opcões
                            </th>
						</thead>
						<tbody>
							
						</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">

    var age_range;
    var table
    var search = {
        'start_date' : '',
        'end_date' : '',
        'status' : '',
        'genre' : '',
        'type' : '',
        'age_max': '',
        'age_min': '',
    };
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = parseFloat( $('#min').val(), 0);
            var max = parseFloat( $('#max').val(), 100);
            var col = parseFloat( data[3] ) || 0; // data[number] = column number
            if ( ( isNaN( min ) && isNaN( max ) ) ||
                ( isNaN( min ) && col <= max ) ||
                ( min <= col   && isNaN( max ) ) ||
                ( min <= col   && col <= max ) )
            {
            return true;
            }
            return false;
        }
    );


    function fetch_data()
    {
        table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            "ajax" : {
              url:"{{ route('paginacao.datatable.ajax') }}",
              type:"GET",
              data:search
            },
            columns: [
                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'tipo', name: 'tipo'},
                {data: 'idade', name: 'idade'},
                {data: 'genero', name: 'genero'},
                {data: 'action', name: 'action'},
            ],
            responsive: false,
            scrollY:        "100%",
            scrollCollapse: true,
            "order": [[ 0, "ASC" ]],
            "language": {
                "url": "{{asset('argon-dashboard-master/assets/js/plugins/DataTables/pt-br.json')}}"
            }
        });
        
        yadcf.init(table, [
            {
                column_number: 1,
                filter_container_id: "filtroStatus", 
                filter_default_label: "Todos...",
                filter_reset_button_text: false 
            },
            {
                column_number: 2,
                filter_container_id: "filtroTipo", 
                filter_default_label: "Todos...",
                filter_reset_button_text: false 
            },
            {
                column_number: 4,
                filter_container_id: "filtroGenero", 
                filter_default_label: "Todos...",
                filter_reset_button_text: false 
            },
        ]);
        
        $('#min, #max').keyup( function() {
            table.draw();
        } );
    }

    $(document).ready(function() {
        fetch_data();
    });


    $('.filterstatus').on('change',function(){
        search.status = $(this).val();
        table.destroy();
        fetch_data();
    });
    $('.filtertype').on('change',function(){
        search.type = $(this).val();
        table.destroy();
        fetch_data();
    });
    $('.filtergenre').on('change',function(){
        search.genre = $(this).val();
        table.destroy();
        fetch_data();
    });
    $('.filterminage').on('keyup',function(){
        search.age_min = $(this).val();
        table.destroy();
        fetch_data();
    });
    $('.filtermaxage').on('keyup',function(){
        search.age_max = $(this).val();
        table.destroy();
        fetch_data();
    });




    



    
</script>
@endsection