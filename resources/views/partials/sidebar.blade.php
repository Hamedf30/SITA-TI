<aside class="main-sidebar sidebar-dark-orange elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('assets/dist/img/pnp.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SITA PNP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('profile') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if (Auth::check() && Auth::user()->roles == 'admin')
          <li class="nav-header">DATA MASTER</li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Data User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dosen.index') }}" class="nav-link {{ request()->routeIs('dosen.index') ? 'active' : '' }}">
                  <i class="nav-icon far fa-user"></i>
                  <p>Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mahasiswa.index') }}" class="nav-link {{ request()->routeIs('mahasiswa.index') ? 'active' : '' }}">
                  <i class="nav-icon far fa-user"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kaprodi.index') }}" class="nav-link {{ request()->routeIs('kaprodi.index') ? 'active' : '' }}">
                  <i class="nav-icon far fa-user"></i>
                  <p>Kaprodi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kajur.index') }}" class="nav-link {{ request()->routeIs('kajur.index') ? 'active' : '' }}">
                  <i class="nav-icon far fa-user"></i>
                  <p>Kajur</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('prodi.index') }}" class="nav-link {{ request()->routeIs('prodi.index') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Prodi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('jurusan.index') }}" class="nav-link {{ request()->routeIs('jurusan.index') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Jurusan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('ruangan.index') }}" class="nav-link {{ request()->routeIs('ruangan.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                Ruangan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sesi.index') }}" class="nav-link {{ request()->routeIs('sesi.index') ? 'active' : '' }}">
              <i class="nav-icon far fa-calendar"></i>
              <p>
                Sesi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('userAdmin.index') }}" class="nav-link {{ request()->routeIs('userAdmin.index') ? 'active' : '' }}">
              <i class="nav-icon far fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          
          <li class="nav-header">SIDANG TA</li>
          
          <li class="nav-item">
            <a href="{{ route('dokumenSidang.IndexForAdmin') }}" class="nav-link {{ request()->routeIs('dokumenSidang.IndexForAdmin') ? 'active' : '' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Daftar TA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('jadwalTa.IndexForAdmin') }}" class="nav-link {{ request()->routeIs('jadwalTa.IndexForAdmin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Jadwal Sidang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sidangTa.nilaiAdmin') }}" class="nav-link {{ request()->routeIs('sidangTa.nilaiAdmin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Nilai TA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('report.sidangAdmin') }}" class="nav-link {{ request()->routeIs('report.sidangAdmin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>

          @elseif (Auth::check() && Auth::user()->roles == 'kaprodi')
          <li class="nav-header">SEMPRO</li>          
          <li class="nav-item">
            <a href="{{ route('proposalTa.IndexForKaprodi') }}" class="nav-link {{ request()->routeIs('proposalTa.IndexForKaprodi') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Verifikasi Proposal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sidang_proposal.index') }}" class="nav-link {{ request()->routeIs('sidang_proposal.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Jadwal Seminar
              </p>
            </a>
          </li>
          <li class="nav-header">SIDANG TA</li>          
          <li class="nav-item">
            <a href="{{ route('dokumenSidang.IndexForKaprodi') }}" class="nav-link {{ request()->routeIs('dokumenSidang.IndexForKaprodi') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Verifikasi TA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sidang_ta.index') }}" class="nav-link {{ request()->routeIs('sidang_ta.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Jadwal Sidang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('sidangTa.nilaiKaprodi') }}" class="nav-link {{ request()->routeIs('sidangTa.nilaiKaprodi') ? 'active' : '' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Nilai TA
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('report.sidang') }}" class="nav-link {{ request()->routeIs('report.sidang') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-header">PKL</li>          
          <li class="nav-item">
            <a href="{{ route('tempat_pkl.index') }}" class="nav-link {{ request()->routeIs('tempat_pkl.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tempat PKL
              </p>
            </a>
          </li>

          @elseif (Auth::check() && Auth::user()->roles == 'dosen')
          <li class="nav-header">SEMPRO</li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->routeIs('proposal_ta.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Verifikasi Proposal
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('proposalTa.indexForDosen1') }}" class="nav-link {{ request()->routeIs('proposalTa.indexForDosen1') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembimbing 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('proposalTa.indexForDosen2') }}" class="nav-link {{ request()->routeIs('proposalTa.indexForDosen2') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembimbing 2</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item menu-open {{ request()->routeIs('bimbingan') ? 'active' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Bimbingan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('bimbingan.pem1') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Pembimbing 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bimbingan.pem2') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Pembimbing 2</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item menu-open {{ request()->routeIs('jadwal') ? 'active' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal Sidang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('jadwal.pem1') }}" class="nav-link {{ request()->routeIs('jadwal.pem1') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Pembimbing 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('jadwal.pem2') }}" class="nav-link {{ request()->routeIs('jadwal.pem2') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Pembimbing 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('jadwal.penguji') }}" class="nav-link {{ request()->routeIs('jadwal.penguji') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Penguji</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">SIDANG TA</li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->routeIs('proposal_ta.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Verifikasi Pendaftaran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dokumenSidang.indexForDosen1') }}" class="nav-link {{ request()->routeIs('dokumenSidang.indexForDosen1') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Pembimbing 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('dokumenSidang.indexForDosen2') }}" class="nav-link {{ request()->routeIs('dokumenSidang.indexForDosen2') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Pembimbing 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->routeIs('proposal_ta.*') ? 'active' : '' }}">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal Sidang TA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('jadwalTa.ketua') }}" class="nav-link {{ request()->routeIs('jadwalTa.ketua') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Ketua</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('jadwalTa.sekretaris') }}" class="nav-link {{ request()->routeIs('jadwalTa.sekretaris') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Sekretaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('jadwalTa.penguji1') }}" class="nav-link {{ request()->routeIs('jadwalTa.penguji1') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Penguji 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('jadwalTa.penguji2') }}" class="nav-link {{ request()->routeIs('jadwalTa.penguji2') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Penguji 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link {{ request()->routeIs('proposal_ta.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Input Nilai TA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sidangTa.pembimbing1') }}" class="nav-link {{ request()->routeIs('sidangTa.pembimbing1') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Pembimbing 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sidangTa.pembimbing2') }}" class="nav-link {{ request()->routeIs('sidangTa.pembimbing2') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Pembimbing 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sidangTa.ketua') }}" class="nav-link {{ request()->routeIs('sidangTa.ketua') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Ketua</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sidangTa.sekretaris') }}" class="nav-link {{ request()->routeIs('sidangTa.sekretaris') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Sekretaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sidangTa.penguji1') }}" class="nav-link {{ request()->routeIs('sidangTa.penguji1') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Penguji 1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sidangTa.penguji2') }}" class="nav-link {{ request()->routeIs('sidangTa.penguji2') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sebagai Penguji 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('sidangTa.nilaiDosen') }}" class="nav-link {{ request()->routeIs('sidangTa.nilaiDosen') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Rekap Nilai
              </p>
            </a>
          </li>

          @elseif (Auth::check() && Auth::user()->roles == 'mahasiswa')
          <li class="nav-header">SEMPRO</li>
          <li class="nav-item menu-open {{ request()->routeIs('proposal_ta.*') ? 'active' : '' }}">
            <a href="#" class="nav-link {{ request()->routeIs('proposalTa.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Proposal TA
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('proposalTa.index') }}" class="nav-link {{ request()->routeIs('proposal_ta.pengajuan') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('bimbingan.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bimbingan</p>
                </a>
              </li> --}}
              <li class="nav-item {{ request()->routeIs('proposal_ta.status') ? 'active' : '' }}">
                <a href="{{ route('statusProposalTa.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ request()->routeIs('proposal_ta.status') ? 'active' : '' }}">
            <a href="{{ route('jadwal.mahasiswa') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal Seminar
              </p>
            </a>
          </li>
          <li class="nav-header">Sidang TA</li>
          <li class="nav-item {{ request()->routeIs('dokumenSidang.index') ? 'active' : '' }}">
            <a href="{{ route('dokumenSidang.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pendaftaran
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('dokumenSidang.status') ? 'active' : '' }}">
            <a href="{{ route('dokumenSidang.status') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Status
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('jadwalTa.mahasiswa') ? 'active' : '' }}">
            <a href="{{ route('jadwalTa.mahasiswa') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal Sidang
              </p>
            </a>
          </li>
          <li class="nav-item {{ request()->routeIs('sidangTa.mahasiswa') ? 'active' : '' }}">
            <a href="{{ route('sidangTa.mahasiswa') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Nilai TA
              </p>
            </a>
          </li>
          {{-- <li class="nav-header">PKL</li>
          <li class="nav-item {{ request()->routeIs('mhs_pkl_usulan.index') ? 'active' : '' }}">
            <a href="{{ route('mhs_pkl_usulan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Usulan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('mhs_pkl.index') }}" class="nav-link {{ request()->routeIs('mhs_pkl.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Mahasiswa PKL
              </p>
            </a>
          </li> --}}
          @endif
          
          
          
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


