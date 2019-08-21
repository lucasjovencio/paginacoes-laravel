<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{route('index')}}">
        <img src="{{asset('AdobeStock_257861309_Preview.jpeg')}}" class="navbar-brand-img" alt="CashFit" style="    max-height: 100% !important;">
      </a>
      
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{route('index')}}">
                <img  src="{{asset('AdobeStock_257861309_Preview.jpeg')}}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        

        
          <!-- Navigation -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{route('index')}}">
                <i class="ni ni-tv-2 text-blue"></i> Apresentação
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('paginacao.simples')}}">
                <i class="ni ni-tv-2 text-blue"></i> Paginação simples
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('paginacao.datatable.ajax')}}">
                <i class="ni ni-tv-2 text-blue"></i> Paginação datatable ajax
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('paginacao.table.ajax')}}">
                <i class="ni ni-tv-2 text-blue"></i> Paginate table ajax
              </a>
            </li>
            

          </ul>
          <!-- Divider -->
          <hr class="my-3 d-md-none">
          <!-- Heading -->
          <h6 class="navbar-heading text-muted d-md-none">Conta</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3 d-md-none">
            <li class="nav-item">
               <a class="nav-link" href="#"><i class="ni ni-single-02"></i>
                  <span>Perfil</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="ni ni-user-run"></i> <span>Sair</span></a>
            </li>
          </ul>
        
      </div>
    </div>
  </nav>
<!-- Main content -->
  <div class="main-content">