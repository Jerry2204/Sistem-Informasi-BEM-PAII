<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}" width="50" alt="" class="dark-logo">
            <img src="{{ asset('assets/images/Logo-BEM-IT-Del.png') }}" width="50" alt="" class="light-logo"> BEM IT DEL
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
                    </a>
                </li>
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'bph' || auth()->user()->role == 'kadep')
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-user1"></span><span class="mtext">User</span>
                    </a>
                    <ul class="submenu">
                        @if (auth()->user()->role == "admin")
                        <li><a href="{{ route('bph') }}">BPH</a></li>
                        <li><a href="{{ route('kemahasiswaan') }}">Kemahasiswaan</a></li>
                        @endif
                        @if (auth()->user()->role == "bph")
                        <li><a href="{{ route('kadep') }}">Kepala Departemen</a></li>
                        @endif
                        @if (auth()->user()->role == "kadep")
                        <li><a href="{{ route('anggotaDepartemen') }}">Anggota Departemen</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if (auth()->user()->role == 'bph')
                <li>
                    <a href="{{ route('departemen') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-notebook"></span><span class="mtext">Departemen</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role == 'bph' || auth()->user()->role == 'kadep')
                <li>
                    <a href="{{ route('calendar')}}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Kegiatan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin_prestasi') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-notepad-1"></span><span class="mtext">Prestasi</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->role == 'admin')
                <li>
                    <a href="{{ route('program_studi') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-notebook"></span><span class="mtext">Program Studi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('jabatan') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-bookmark"></span><span class="mtext">Jabatan</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar1"></span><span class="mtext">Forums</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('about_page') }}" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-notepad-1"></span><span class="mtext">About Page</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-newspaper-1"></span><span class="mtext">Blog</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('post')}}">Blog</a></li>
                        <li><a href="{{ route('kategori') }}">Kategori</a></li>
                    </ul>
                </li>
                @if (auth()->user()->role == 'bph')
                    @if (auth()->user()->bph->jabatan->jabatan == "Bendahara I")
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-money-2"></span><span class="mtext">Keuangan</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('keuangan.pemasukan')}}">Pemasukan</a></li>
                            <li><a href="{{ route('keuangan.pengeluaran') }}">Pengeluaran</a></li>
                        </ul>
                    </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>
