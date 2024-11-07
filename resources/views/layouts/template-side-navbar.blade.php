<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">MENU PENGGUNA</div>
            <a class="nav-link" href="{{ route('name.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Aduan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('name.aduan.index') }}">Senarai Aduan</a>
                    <a class="nav-link" href="{{ route('name.aduan.create') }}">Aduan Baru</a>
                </nav>
            </div>

            @role('role_admin')
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJenisAduan" aria-expanded="false" aria-controls="collapseJenisAduan">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Jenis Aduan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseJenisAduan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('jenis-aduan.index') }}">Senarai Jenis Aduan</a>
                    <a class="nav-link" href="{{ route('jenis-aduan.create') }}">Jenis Aduan Baru</a>
                </nav>
            </div>
            @endrole

            <div class="sb-sidenav-menu-heading">Akaun</div>
            <a class="nav-link" href="{{ route('name.profile.edit') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Profile
            </a>
            <a class="nav-link" href="{{ route('name.logout') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Logout
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ auth()->user()->name }}
    </div>
</nav>
