@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-info">
            <span class="info-box-icon"><i class="far fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mahasiswa</span>
              <span class="info-box-number">{{ $mahasiswa }}</span>

              <div class="progress">
                <div class="progress-bar">{{ $mahasiswa }}</div>
              </div>
              <span class="progress-description">
                Mahasiswa Terdaftar
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-success">
            <span class="info-box-icon"><i class="far fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dosen</span>
              <span class="info-box-number">{{ $dosen }}</span>

              <div class="progress">
                <div class="progress-bar">{{ $dosen }}</div>
              </div>
              <span class="progress-description">
                Dosen terdaftar
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-info">
            <span class="info-box-icon"><i class="far fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kaprodi</span>
              <span class="info-box-number">{{ $kaprodi }}</span>

              <div class="progress">
                <div class="progress-bar">{{ $kaprodi }}</div>
              </div>
              <span class="progress-description">
                Kaprodi Terdaftar
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        {{-- <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-success">
            <span class="info-box-icon"><i class="far fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kajur</span>
              <span class="info-box-number">{{ $kajur }}</span>

              <div class="progress">
                <div class="progress-bar">{{ $kajur }}</div>
              </div>
              <span class="progress-description">
                Kajur terdaftar
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div> --}}
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ruangan</span>
              <span class="info-box-number">{{ $ruangan }}</span>

              <div class="progress">
                <div class="progress-bar">{{ $ruangan }}</div>
              </div>
              <span class="progress-description">
                Ruangan yang tersedia
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Prodi</span>
              <span class="info-box-number">{{ $prodi }}</span>

              <div class="progress">
                <div class="progress-bar">{{ $prodi }}</div>
              </div>
              <span class="progress-description">
                Prodi terdaftar
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-info">
            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sidang Berlangsung</span>
              <span class="info-box-number">{{ $sidangTerjadwal }}</span>

              <div class="progress">
                <div class="progress-bar">{{ $sidangTerjadwal }}</div>
              </div>
              <span class="progress-description">
                Sidang yang sedang berlangsung
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-success">
            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sidang Selesai</span>
              <span class="info-box-number">{{ $sidangSelesai }}</span>

              <div class="progress">
                <div class="progress-bar">{{ $sidangSelesai }}</div>
              </div>
              <span class="progress-description">
                Sidang yang sudah selesai
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
<!-- /.content -->
</div>
      <!-- /.row (main row) -->
@endsection
