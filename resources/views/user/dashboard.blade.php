@extends('layoutsiswa.sidebar')
@section('container')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <div class="row">
        <div class="container">
            <div class="logo-container">
                <img src="/img/smk.png" alt="Logo Sekolah" class="logo">
            </div>

            <h1>Absensi</h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Form absen datang dengan batas waktu 07:00 - 08:00 -->
            <form action="{{ route('absen.datang') }}" method="POST" onsubmit="return checkAbsenDatang()">
                @csrf
                <button type="submit" class="btn btn-primary" id="btn-absen-datang">Absen Datang</button>
            </form>

            <!-- Form absen pulang dengan batas waktu 16:00 - 17:00 -->
            <form action="{{ route('absen.pulang') }}" method="POST" class="mt-3" onsubmit="return checkAbsenPulang()">
                @csrf
                <button type="submit" class="btn btn-secondary" id="btn-absen-pulang">Absen Pulang</button>
            </form>

            <!-- Tabel Data Absensi -->
            <div class="mt-5">
                <h2>Data Absensi</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Tanggal</th>
                            <th>Waktu Datang</th>
                            <th>Waktu Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($absensi as $absen)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $absen->user_id ?? 'Belum Tersedia' }}</td>
                            <td>{{ $absen->tanggal ?? 'Belum Tersedia' }}</td>
                            <td>{{ $absen->waktu_datang ?? 'Belum Datang' }}</td>
                            <td>{{ $absen->waktu_pulang ?? 'Belum Pulang' }}</td> 
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data absensi.</td>
                        </tr> 
                        @endforelse
                    </tbody>    
                </table>
            </div>
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

    // Update jam setiap detik
    updateClock();
    setInterval(updateClock, 1000);
</script>

<script>
    function checkTimeRestrictions() {
        const now = new Date();
        const hour = now.getHours();

        // Disable tombol absen datang jika jam 12
        if (hour === 12) {
            document.getElementById('btn-absen-datang').disabled = true;
        }

        // Disable tombol absen pulang jika sebelum jam 15
        if (hour < 15) {
            document.getElementById('btn-absen-pulang').disabled = true;
        } else {
            document.getElementById('btn-absen-pulang').disabled = false;
        }
    }

    // Panggil fungsi saat halaman dimuat
    checkTimeRestrictions();

    // Periksa kembali setiap menit
    setInterval(checkTimeRestrictions, 60000);
</script>
@endsection
