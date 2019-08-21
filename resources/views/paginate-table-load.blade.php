<div class="row alinhar-filtro">
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
</div>
<div class="table-responsive">
    <table class="table">
        <thead class=" text-primary">
            <th>Nome</th>
            <th>Status</th>
            <th>Tipo</th>
            <th>Idade</th>
            <th>Genêro</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name ?? ''}}</td>
                    <td>{{$user->status_txt ?? ''}}</td>
                    <td>{{$user->tipo ?? ''}}</td>
                    <td>{{$user->idade ?? ''}}</td>
                    <td>{{$user->genero ?? ''}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row justify-content-md-center">
    {{ $users->links() }}
</div>

<script type="text/javascript">
    var age_range;
    var table;
    
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
    $(document).ready(function() {
        table = $('.table').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [6, 25, 50, -1],
                [6, 25, 50, "All"]
            ],
            responsive: false,
            "order": [[ 0, "asc" ]],
            "paging":   false,
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
    });
</script>
