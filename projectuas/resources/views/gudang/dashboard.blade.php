@include('layout_gudang.header_gudang')

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>

    @include('layout_gudang.sidebar_gudang')

    <div class="content-wrapper">
        @yield('content')
      {{-- @include('gudang/barang') --}}
    </div>
    @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: "Success",
                        text: "{{ session('success') }}",
                        icon: "success",
                        timer: 3000
                    });
                });
            </script>
        @endif
  @include('layout_gudang.footer_gudang')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  @yield('extra-js')
  <script>
      $(document).ready(function() {
          $('#dataTable').DataTable();
      });
  </script>
</body>
