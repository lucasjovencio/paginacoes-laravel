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
                <div id="ajaxload">
                    @include('paginate-table-load',['users'=>$users,'js'=>true])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    var age_range;
    var table;
    var search = {
        'start_date' : '',
        'end_date' : '',
        'status' : '',
        'genre' : '',
        'type' : '',
        'age_max': '',
        'age_min': '',
        'page':0,
        'search':''
    };
    var url_;
    $(function() {

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            $('#load a').css('color', '#dfecf6');
            let url_string = $(this).attr('href');  
            let url = new URL(url_string);
            url_ = url;
            search.page = url.searchParams.get("page");
            fetch_data();
        });

        function fetch_data() {
            $.ajax({
                url: "{{route('paginacao.table.ajax')}}",
                type: 'GET',
                data:search,
                success: async function(data){
                    let search_params = new URLSearchParams(url_.search); 
                    search_params.set('page', search.page);
                    url_.search = search_params.toString();
                    $("#ajaxload").empty().html(data);
                    await sleep(500);
                    window.history.pushState("object or string", "Usuarios", url_.toString());
                    Swal.close();
                },
                error:function(data){
                    console.log(data);
                    Swal.close();
                },
                beforeSend:function(data){
                    Swal.fire({
                        title: '',
                        text: 'Carregando',
                        showCancelButton: false,
                        showConfirmButton:false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });
                }
            });
        }  

    });
</script>

@endsection
