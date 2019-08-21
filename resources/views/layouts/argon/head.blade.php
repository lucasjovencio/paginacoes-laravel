<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Paginações</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('AdobeStock_257861309_Preview.jpeg')}}">
  <link rel="icon" type="image/png" href="{{asset('AdobeStock_257861309_Preview.jpeg')}}">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('argon-dashboard-master/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('argon-dashboard-master/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link type="text/css" href="{{asset('argon-dashboard-master/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
   <link href="{{asset('argon-dashboard-master/assets/js/plugins/DataTables/datatables.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('argon-dashboard-master/assets/js/plugins/DataTables/yadcf/jquery.dataTables.yadcf.css')}}" rel="stylesheet" type="text/css">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link href="{{asset('argon-dashboard-master/assets/css/datatable.custom.css')}}" rel="stylesheet" type="text/css">
  
  <style type="text/css">
        .foto,.image,.image>img{
            max-width: 100%;
            text-align: center;
        }
        .collapse-submenu{
            padding-left: 3em;
        }
        a {
          text-decoration: none !important;
          color: #374767 !important;
        }
        a:hover {
          color: #374767 !important;
          text-decoration: none !important;
        }
  </style>
  @yield('css')
</head>