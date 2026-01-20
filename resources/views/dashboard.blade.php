@extends('master')
{{-- @section('title', 'Dashboard') --}}
@section('content')
    {{-- <div class="container"> --}}
    <div class="row g-6 mb-5">
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-none bg-transparent border border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary">Jumlah Layanan</h5>
                    <p class="card-text text-primary">
                        {{ $layanan->count() }}
                    </p>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-none bg-transparent border border-secondary">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Transaksi</h5>
                    <p class="card-text text-secondary">
                        {{ $transaksi->count() }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-none bg-transparent border border-success">
                <div class="card-body">
                    <h5 class="card-title text-success">Sedang Diproses</h5>
                    <p class="card-text text-success">
                        {{ $proses->count() }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-none bg-transparent border border-danger">
                <div class="card-body">
                    <h5 class="card-title text-danger">Belum Dibayar</h5>
                    <p class="card-text text-danger">
                        {{ $blmBayar->count() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Transaksi Terbaru</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="tableDashboard">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Layanan</th>
                            <th>Berat</th>
                            <th>Tanggal Transaksi</th>
                            <th>Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->nama_pelanggan }}</td>
                                <td>{{ $t->layanan->nama_layanan }}</td>
                                <td>{{ $t->berat }}</td>
                                <td>{{ $t->waktu_transaksi }}</td>
                                <td>
                                    @if ($t->pembayaran == 'Lunas')
                                        <span class="text-success"> {{ $t->pembayaran }}</span>
                                        @elseif ($t->pembayaran == 'Belum Bayar')
                                        <span class="text-danger"> {{ $t->pembayaran }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection

@push('scripts')
    <script>
        $('document').ready(function() {
            $('#tableDashboard').DataTable({
                language: {
                    emptyTable: '<span class="text-danger"> Data transaksi tidak tersedia</span>'
                }
            });
        });
    </script>
@endpush
