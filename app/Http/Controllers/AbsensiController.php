<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // Tampilkan halaman absensi
    public function showAbsensi()
    {
        $absensi = Absensi::where('user_id', Auth::id())->get();  
        return view('user.dashboard', [
            'absensi' => $absensi
        ]);
    }

    // Fungsi untuk absen datang
    public function absenDatang()
    {
        $now = Carbon::now();

        // Cek apakah waktu sekarang adalah jam 12
        if ($now->hour === 12) {
            return back()->with('error', 'Anda tidak bisa absen datang pada jam 12.');
        }

        // Cek apakah user sudah absen datang hari ini
        $absensi = Absensi::where('user_id', Auth::id())
            ->whereDate('waktu_datang', $now->toDateString())
            ->first();

        if ($absensi) {
            return back()->with('error', 'Anda sudah absen datang hari ini.');
        }

        Absensi::create([
            'user_id' => Auth::id(),
            'waktu_datang' => $now,
        ]);

        return back()->with('success', 'Absensi datang berhasil.');
    }

    // Fungsi untuk absen pulang
    public function absenPulang()
    {
        $now = Carbon::now();

        // Cek apakah waktu sekarang sebelum jam 15:00
        if ($now->hour < 15) {
            return back()->with('error', 'Anda hanya bisa absen pulang setelah jam 15:00.');
        }

        $absensi = Absensi::where('user_id', Auth::id())
            ->where('tanggal', $currentDate)
            ->whereDate('waktu_datang', $now->toDateString())
            ->whereNull('waktu_pulang')
            ->first();

        if (!$absensi) {
            return back()->with('error', 'Anda belum absen datang atau sudah absen pulang.');
        }

        $absensi->update([
            'waktu_pulang' => $now,
        ]);

        return back()->with('success', 'Absensi pulang berhasil.');
    }
}
