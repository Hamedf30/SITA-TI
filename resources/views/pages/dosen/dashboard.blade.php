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
            </div>
        </div>
    </section>
@endsection
