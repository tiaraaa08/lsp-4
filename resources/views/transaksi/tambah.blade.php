<div class="modal" id="tambahTransaksi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('transaksi.add') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="form-floating form-floating-outline">
                                <input required type="date" id="nameBasic" class="form-control"
                                    placeholder="Masukkan Nama Layanan" name="waktu_transaksi" />
                                <label for="nameBasic">Waktu Transaksi</label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-floating form-floating-outline">
                                <input required type="text" id="nameBasic" class="form-control"
                                    placeholder="Masukkan Nama Pelanggan" name="nama_pelanggan" />
                                <label for="nameBasic">Nama Pelanggan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="form-floating form-floating-outline">
                                <select required name="id_layanan" class="form-select layanan"
                                    aria-label="Default select example">
                                    <option selected>Pilih Layanan</option>
                                    @foreach ($layanan as $l)
                                        <option value="{{ $l->id }}" data-harga="{{ $l->harga_per_kg }}">
                                            {{ $l->nama_layanan }} =>
                                            [Rp{{ number_format($l->harga_per_kg, 0, ',', '.') }}]</option>
                                    @endforeach
                                </select>
                                <label for="nameBasic">Nama Layanan</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating form-floating-outline">
                                <div class="input-group">
                                    <input required type="number" name="berat" class="form-control berat" placeholder="Berat">
                                    <span class="input-group-text">KG</span>
                                </div>
                                {{-- <label for="">Berat</label> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col ">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="nameBasic" readonly class="form-control totalHarga"
                                    placeholder="Harga Per KG" />
                                <label for="nameBasic">Total</label>
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-floating form-floating-outline">
                                 <input required type="text" name="jumlah_bayar" id="nameBasic" class="form-control jumlahBayar"
                                    placeholder="Harga Per KG" />
                                <label for="nameBasic">Jumlah Bayar</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col ">
                            <div class="form-floating form-floating-outline">
                                <select disabled name="keterangan" class="form-select layanan"
                                    aria-label="Default select example">
                                    <option selected value="Proses">Proses</option>
                                </select>
                                <label for="nameBasic">Keterangan</label>
                            </div>
                        </div>
                        <div class="col ">
                            <div class="form-floating form-floating-outline">
                                <select required name="pembayaran" class="form-select layanan"
                                    aria-label="Default select example">
                                    <option selected value="Belum Bayar">Belum Bayar</option>
                                    <option selected value="Lunas">Lunas</option>
                                </select>
                                <label for="nameBasic">Pembayaran</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <h6>Kembalian : <span class="Kembalian"></span></h6>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="subsmit" class="btn btn-primary btn-simpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
