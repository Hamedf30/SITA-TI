@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
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
                  <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box bg-info">
                      <span class="info-box-icon"><i class="far fa-user"></i></span>
          
                      <div class="info-box-content">
                        <span class="info-box-text">Dosen</span>
                        <span class="info-box-number">{{ $dosen }}</span>
          
                        <div class="progress">
                          <div class="progress-bar">{{ $dosen }}</div>
                        </div>
                        <span class="progress-description">
                          Dosen Terdaftar
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

            </div>
        </div>
    </section>
@endsection
