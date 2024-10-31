@extends('layoutsiswa.sidebar')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="container">
            <div class="logo-container">
                <img src="img/smk.png" alt="Logo Perusahaan" class="logo">
            </div>
            <h1>Absensi</h1>
            {{-- @extends('layouts.app') --}}

@section('content')
    <div class="container">
        <h1>Absensi</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Form absen datang -->
        <form action="{{ route('absen.datang') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Absen Datang</button>
        </form>

        <!-- Form absen pulang -->
        <form action="{{ route('absen.pulang') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-secondary">Absen Pulang</button>
        </form>
        
    </div>
@endsection

            <div id="clock"></div>
            <div class="button-group">
                <button type="button" onclick="absen('datang')">Datang</button>
                <button type="button" onclick="absen('pulang')">Pulang</button>
            </div>
        </div>
        </div>
        

        <script>
            function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        
        const timeString = `${hours}:${minutes}:${seconds}`;
        
        document.getElementById('clock').textContent = timeString;
        }
    
        // Update clock immediately and set an interval to update it every second
        updateClock();
        setInterval(updateClock, 1000);
        </script>
@endsection



