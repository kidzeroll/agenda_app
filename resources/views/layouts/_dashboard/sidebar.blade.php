<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">AA</a>
        </div>
        <ul class="sidebar-menu">
            <!--dashboard-->
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!--Agenda-->
            <li class="{{ request()->is('agenda*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('agenda.index') }}">
                    <i class="fas fa-address-book"></i>
                    <span>Agenda</span>
                </a>
            </li>

            <!--Pegawai-->
            <li class="{{ request()->is('pegawai*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pegawai.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Pegawai</span>
                </a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://wa.me/6282362568088" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Contact Me
            </a>
        </div>
    </aside>
</div>
