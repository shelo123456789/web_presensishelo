@extends('layoutadmin.footer')
@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    {{-- <div class="row">
        <p>Welcome, {{ Auth::user()->name }}. You are an Admin.</p> --}}

        <!-- Earnings (Monthly) Card Example -->
        <div class="row justify-content-center">
            <!-- Card Hadir -->
            <div class="col-md-2 mb-4">
                <div class="card shadow h-100 py-2 border-primary">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar fa-2x text-gray-300 mb-2"></i>
                        <h6 class="font-weight-bold text-primary text-uppercase mb-1">Present (Hadir)</h6>
                        <h5 class="font-weight-bold text-gray-800">400</h5>
                        <small class="text-uppercase">Siswa</small>
                    </div>
                </div>
            </div>
        
            <!-- Card Izin -->
            <div class="col-md-2 mb-4">
                <div class="card shadow h-100 py-2 border-info">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar fa-2x text-gray-300 mb-2"></i>
                        <h6 class="font-weight-bold text-primary text-uppercase mb-1">Permission (Izin)</h6>
                        <h5 class="font-weight-bold text-gray-800">400</h5>
                        <small class="text-uppercase">Siswa</small>
                    </div>
                </div>
            </div>
        
            <!-- Card Sakit -->
            <div class="col-md-2 mb-4">
                <div class="card shadow h-100 py-2 border-warning">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar fa-2x text-gray-300 mb-2"></i>
                        <h6 class="font-weight-bold text-primary text-uppercase mb-1">Sick (Sakit)</h6>
                        <h5 class="font-weight-bold text-gray-800">400</h5>
                        <small class="text-uppercase">Siswa</small>
                    </div>
                </div>
            </div>
        
            <!-- Card Alpha -->
            <div class="col-md-2 mb-4">
                <div class="card shadow h-100 py-2 border-danger">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar fa-2x text-gray-300 mb-2"></i>
                        <h6 class="font-weight-bold text-primary text-uppercase mb-1">Not Present (Alpha)</h6>
                        <h5 class="font-weight-bold text-gray-800">400</h5>
                        <small class="text-uppercase">Siswa</small>
                    </div>
                </div>
            </div>
        </div>
        

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Kelas</th>
                                                <th scope="col">Jurusan</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Datang</th>
                                                <th scope="col">Pulang</th>
                                              </tr>
                                            </thead>

                                                {{-- @foreach ($student as $siswa)
   
                                                <tbody>
                                                  <tr>
                                                    <td scope="row">1</td>
                                                    <td>{{ $siswa->nama}}</td>
                                                    <td>{{ $siswa->kelas}}</td>
                                                    <td>{{ $siswa->jurusan}}</td>
                                                    <td>{{ $siswa->tanggal}}</td>
                                                    <td>{{ $siswa->datang}}</td>
                                                    <td>{{ $siswa->pulang}}</td>
                                                  </tr>
                                                  
                                                </tbody> --}}
                                                   
                                                {{-- @endforeach --}}
                                               
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Content Row -->
@endsection
                