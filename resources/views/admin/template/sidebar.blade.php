<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            {{-- <div class="pull-left image">
                <img src="{{ asset('template') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            
            <div class="pull-left info">
                <p>Admin</p>
                <p>Imbar</p>
            </div> --}}
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('daftar-buku') }}">
                    <i class="fa fa-book"></i> <span>Daftar Buku</span>
                </a>
            </li>
            <li>
                <a href="{{ route('daftar-penerbit') }}">
                    <i class="fa fa-pencil"></i> <span>Daftar Penerbit</span>
                </a>
            </li>
            <li>
                <a href="{{ route('daftar-mahasiswa') }}">
                    <i class="fa fa-users"></i> <span>Daftar Mahasiswa</span>
                </a>
            </li>
            <li>
                <a href="{{ route('daftar-peminjaman') }}">
                    <i class="fa fa-list-alt"></i> <span>Daftar Peminjaman</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
