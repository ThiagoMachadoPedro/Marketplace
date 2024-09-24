@if(session('success'))

    <script>
          document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire('Pronto!',"{{ session('success') }}",'success' );

          })
    </script>


@endif


@if(session('error'))
    <script>
          document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire('Error!',"{{ session('error') }}",'error' );

          })
    </script>


@endif
