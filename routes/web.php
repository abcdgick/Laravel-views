<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $nama = "Jonathan Krisna";
    $npm = "2020130017";
    $jurusan = "<b>Teknik Informatika</b>";
    $ipk = 3.9;
    $status = 1;
    $transkripNilai = [
        ["namaMatkul" => "Dasar Pemrograman 1", "aa" => 95, "na" => "A"],
        ["namaMatkul" => "Pemrograman Basis Web", "aa" => 90, "na" => "A"],
        ["namaMatkul" => "Pemrograman Basis Data", "aa" => 85, "na" => "A-"],
        ["namaMatkul" => "Kalkulus", "aa" => 89, "na" => "A-"],
    ];
    $transkripNilaiPadat = [];
    #$transkripNilaiPadat = $transkripNilai;
    $transkripNilaiMengulang = [
        ["namaMatkul" => "Statistik", "aa" => 30, "na" => "E"],
        ["namaMatkul" => "Logika", "aa" => 56, "na" => "E"],
        ["namaMatkul" => "Pancasila", "aa" => 10, "na" => "E"],
        ["namaMatkul" => "Agama", "aa" => 25, "na" => "E"],
    ];
    return view('mahasiswa', compact('nama', 'npm', 'jurusan', 'ipk', 'status', 'transkripNilai', 'transkripNilaiPadat', 'transkripNilaiMengulang'));
});


Route::fallback(function() {
    return view('404');
});