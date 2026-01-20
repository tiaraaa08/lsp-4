<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $transaksi = Transaksi::all();
        $layanan = Layanan::all();
        $proses = Transaksi::where('keterangan', 'Proses')->get();
        $blmBayar = Transaksi::where('pembayaran', 'Belum Bayar')->get();

        return view('dashboard', compact('transaksi', 'layanan', 'proses', 'blmBayar'));
    }
}
