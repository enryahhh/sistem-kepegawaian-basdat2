<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{route('dashboard')}}">SIMPEG</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard')}}">SK</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Menu</li>
              
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-link">
                    <a href="{{ route('bagian.index') }}" class="nav-link"><span>Bagian</span></a>
                  </li>
                  <li class="nav-link">
                    <a href="{{ route('jabatan.index') }}" class="nav-link"><span>Jabatan</span></a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{ route('pegawai.index') }}" class="nav-link"><i class="fas fa-user-tie"></i></i><span>Data Pegawai</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('cuti.index') }}" class="nav-link"><i class="fas fa-id-card-alt"></i></i><span>Data Cuti</span></a>
              </li>
            </ul>           
        </aside>
      </div>