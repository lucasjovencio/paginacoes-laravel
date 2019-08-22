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
                <div id="app">
                    <example-component></example-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
