<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Levinesz POS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('pages.dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('/home') }}">General Dashboard</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{route('user.index')}}">All user</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Product</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{route('product.index')}}">All product</a>
                    </li>
                </ul>
            </li> --}}

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>PenyewaanKomik</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{route('komik.index')}}">Komik</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{route('penyewaan.index')}}">Penyewaan</a>
                    </li>
                </ul>
            </li>
    </aside>
</div>