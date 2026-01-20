@extends('master')
@section('title', 'Layanan')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between my-3">
                <h5 class="">Layanan</h5>
                <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                    data-bs-target="#tambahLayanan">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered" id="tableLayanan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Harga Per KG</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($layanan as $l)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $l->nama_layanan }}</td>
                                <td>{{ number_format($l->harga_per_kg, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex jusstify-content-center gap-2">
                                        <button type="button" data-bs-toggle="modal"
                                            data-bs-target="#editLayanan{{ $l->id }}"
                                            class="btn btn-outline-warning"><i
                                                class="fa-regular fa-pen-to-square"></i></button>

                                        <form action="{{ route('layanan.destroy', $l->id) }}" method="POST"
                                            class="KonfirmasiHapus">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @include('layanan.edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layanan.tambah')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tableLayanan').DataTable({
                language: {
                    emptyTable: '<span class="text-danger"> Data transaksi tidak tersedia</span>'
                }
            });
        });

        document.addEventListener('shown.bs.modal', function(e) {
            const harga = e.target.querySelectorAll('.hargaKG');

            harga.forEach(input => {
                let mentah = input.value.replace(/\D/g, '');

                if (mentah !== '') {
                    input.value = new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0,
                    }).format(Number(mentah));
                }

                input.addEventListener('input', function() {
                    let val = this.value.replace(/\D/g, '');

                    this.value = val ?
                        new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR',
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0,
                        }).format(Number(val)) : '';
                });
            });
        });
    </script>
@endpush
