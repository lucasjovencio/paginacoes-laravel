<!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
          <div class="copyright d-flex flex-wrap">
            © Coded with
            <i class="fa fa-heart heart"></i> by
            <a href="https://github.com/cristijora" target="_blank"> &nbsp; Cristi Jora.</a>&nbsp;
            Designed by <a href="https://www.creative-tim.com/?ref=pdf-vuejs" target="_blank">&nbsp; Creative Tim.</a></div>
          </div>
          {{-- <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div> --}}
        </div>
      </footer>
    </div>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('argon-dashboard-master/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{asset('argon-dashboard-master/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{asset('argon-dashboard-master/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{asset('argon-dashboard-master/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{asset('argon-dashboard-master/assets/js/argon.js?v=1.0.0') }}"></script>

  <!--  Notifications Plugin    -->
  <script src="{{asset('argon-dashboard-master/assets/js/plugins/bootstrap-notify.js')}}"></script>

  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('argon-dashboard-master/assets/js/paper-dashboard.min.js?v=2.0.0')}}"></script>
  <script src="{{asset('argon-dashboard-master/assets/demo/demo.js')}}"></script>

  <script src="{{ asset('argon-dashboard-master/assets/js/plugins/DataTables/datatables.min.js') }}"></script>
  <script src="{{ asset('argon-dashboard-master/assets/js/plugins/DataTables/yadcf/jquery.dataTables.yadcf.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  
  @yield('js')
  @yield('loadjs')
  
</body>

</html>