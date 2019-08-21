@extends('layouts.argon.main')

@section('css')
<style type="text/css">
  /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
    .modal {
        display:    none;
        position:   fixed;
        z-index:    1000;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        background: rgba( 255, 255, 255, .8 ) 
                    url('http://i.stack.imgur.com/FhHRx.gif') 
                    50% 50% 
                    no-repeat;
    }

    /* When the body has the loading class, we turn
    the scrollbar off with overflow:hidden */
    body.loading .modal {
        overflow: hidden;   
    }

    /* Anytime the body has the loading class, our
    modal element will be visible */
    body.loading .modal {
        display: block;
    }
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
                    @include('paginate-table-load',['users'=>$users])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    var search = {
        'start_date' : '',
        'end_date' : '',
        'status' : '',
        'genre' : '',
        'type' : '',
        'age_max': '',
        'age_min': '',
        'page':0,
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