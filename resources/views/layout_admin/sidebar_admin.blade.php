<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-2 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Halo, Selamat Datang</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Menu Customer -->
                <li class="nav-item">
                    <a href="{{ route('admin.customer') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>Customer</p>
                    </a>
                </li>
                <!-- Menu Transaksi -->
                <li class="nav-item">
                    <a href="{{ route('admin.transaksi') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>Buat Transaksi</p>
                    </a>
                </li>
                <!-- Menu Menunggu Konfirmasi -->
                <li class="nav-item">
                    <a href="{{ route('admin.transaksi.temp') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>Menunggu Konfirmasi</p>
                    </a>
                </li>
                <!-- Menu List Transaksi -->
                <li class="nav-item">
                    <a href="{{ route('admin.transaksi.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>List Transaksi</p>
                    </a>
                </li>
                <br>
                <!-- Button Keluar -->
                <li class="nav-item-logout">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link btn-danger">
                            <p>Keluar</p>
                        </button>

                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
