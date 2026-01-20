@extends('master')
@section('title', 'Transaksi')
@section('content')
    {{-- <div class="container"> --}}
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between my-3">
                <h5 class="">Transaksi</h5>
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambahTransaksi"
                    class="btn btn-sm btn-outline-success"><i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="tableTransaksi">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Layanan</th>
                            <th>Berat</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah Bayar</th>
                            <th>Keterangan</th>
                            <th>Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->waktu_transaksi }}</td>
                                <td>{{ $t->nama_pelanggan }}</td>
                                <td>{{ $t->layanan->id }}</td>
                                <td>{{ $t->berat }}</td>
                                <td>Rp{{ number_format($t->layanan->harga_per_kg, 0, ',', '.') }}</td>
                                <td>Rp{{ number_format($t->jumlah_bayar, 0, ',', '.') }}</td>
                                <td>{{ $t->keterangan }}</td>
                                <td>
                                    @if ($t->pembayaran == 'Belum Bayar')
                                    <span class="text-danger">{{ $t->pembayaran }}</span>
                                        <form action="{{ route('transaksi.bayar', $t->id) }}" method="POST"
                                            class="KonfirmasiBayar">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa-regular fa-credit-card"></i></i></button>
                                        </form>
                                        @elseif ($t->pembayaran == 'Lunas')
                                    <span class="text-success">{{ $t->pembayaran }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex jusstify-content-center gap-2">
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#editTransaksi{{ $t->id }}"><i
                                                class="fa-regular fa-pen-to-square"></i></button>
                                        <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST"
                                            class="KonfirmasiHapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                        @if ($t->pembayaran == 'Lunas')
                                            <a href="{{ route('struk', $t->id) }}">
                                                  <button type="button" class="btn btn-outline-success"><i
                                                    class="fa-solid fa-print"></i></button>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @include('transaksi.edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    @include('transaksi.tambah')
@endsection

@push('scripts')
    <script>
        $('document').ready(function() {
            $('#tableTransaksi').DataTable({
                language: {
                    emptyTable: '<span class="text-danger"> Data transaksi tidak tersedia</span>'
                }
            });
        });

        document.addEventListener('shown.bs.modal', function(e) {
            const modal = e.target;

            const harga = modal.querySelector('.layanan');
            const berat = modal.querySelector('.berat');
            const total = modal.querySelector('.totalHarga');
            const bayar = modal.querySelector('.jumlahBayar');
            const kembalian = modal.querySelector('.Kembalian');
            const simpan = modal.querySelector('.btn-simpan');

            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(angka);
            }

            function hitung() {
                const Hberat = Number(berat.value) || 0;
                const Hlayanan = Number(harga.selectedOptions[0]?.dataset.harga || 0);
                const hasil = Hberat * Hlayanan;

                total.value = hasil ? formatRupiah(hasil) : '';
                hitungKembalian();
            }

            function hitungKembalian() {
                const totBayar = Number(total.value.replace(/\D/g, '')) || 0;
                const jumBayar = Number(bayar.value.replace(/\D/g, '')) || 0;
                const kembali = jumBayar - totBayar;

                kembalian.innerText = formatRupiah(kembali > 0 ? kembali : 0);
            }

            function validasiBayar(){
                const totAngka = Number(total.value.replace(/\D/g, '')) || 0;
                const jumAngka = Number(bayar.value.replace(/\D/g, '')) || 0;

                if( jumAngka > totAngka || jumAngka == totAngka) {
                    simpan.disabled = false;
                } else {
                    simpan.disabled = true;
                }
            }

            bayar.addEventListener('input', function() {
                let angka = this.value.replace(/\D/g, '');
                this.value = angka ? formatRupiah(angka) : '';
                hitungKembalian();
                validasiBayar();
            });

            berat.addEventListener('input', () => {
                hitung();
                validasiBayar();
            });
            harga.addEventListener('change', () =>{
                hitung();
                validasiBayar();
            });

            hitung();
        });
    </script>
@endpush
