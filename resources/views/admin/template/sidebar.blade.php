<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('daftar-mahasiswa') }}">
                    <i class="fa fa-users"></i> <span>Daftar Mahasiswa</span>
                </a>
            </li>

            <li>
                <a href="{{ route('daftar-penerbit') }}">
                    <i class="fa fa-pencil"></i> <span>Daftar Penerbit</span>
                </a>
            </li>

            <li>
                <a href="{{ route('daftar-buku') }}">
                    <i class="fa fa-book"></i> <span>Daftar Buku</span>
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
