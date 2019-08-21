{{-- showNotification: function(from, align, msg , color , icon)  --}}
@if(session('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                demo.showNotification('top','center','{{session('success')}}', 'success' ,' fas fa-check-circle')
            });
        </script>
@endif
@if(session('danger'))
        <script type="text/javascript">
            $(document).ready(function() {
                demo.showNotification('top','center','{{session('danger')}}', 'danger' ,' fas fa-times')
            });
        </script>
@endif