<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fa-duotone fa-shirt" style="--fa-primary-color: #9ca5b4; --fa-secondary-color: #ffffff;"></i>
                </div>
                <div class="sidebar-brand-text mx-3">APP Laundry</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="welcome">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (Auth::User()->role=='admin')
                  <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="user">
                    
                    <span>User</span></a>
            </li>

          
             <!-- Nav Item - Charts -->
             <li class="nav-item">
                <a class="nav-link" href="outlet">
                    
                    <span>Outlet</span></a>
            </li>
 
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="paket">
                    
                    <span>Paket/Produk</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="member">
                    <span>Pelanggan</span></a>
            </li>

             <!-- Nav Item - Charts -->
             <li class="nav-item">
                <a class="nav-link" href="transaksi">
                    <span>Transaksi</span></a>
            </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="laporan">
                    <span>Laporan</span></a>
            </li>

            @endif
            @if (Auth::User()->role=='kasir')
                <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="member">
                    <span>Pelanggan</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="transaksi">
                    <span>Transaksi</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="laporan">
                    <span>Laporan</span></a>
            </li>
            @endif
            @if (Auth::User()->role=='owner')
                <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="member">
                    <span>Pelanggan</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="laporan">
                    <span>Laporan</span></a>
            </li>
            @endif
          
    

        </ul>
        <!-- End of Sidebar -->