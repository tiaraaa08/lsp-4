<div class="modal" id="tambahLayanan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Tambah Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('layanan.add') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="row">
                        <div class="col mt-3">
                            <div class="form-floating form-floating-outline">
                                <input required type="text" id="nameBasic" class="form-control" placeholder="Masukkan Nama Layanan" name="nama_layanan" />
                                <label for="nameBasic">Nama Layanan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <div class="form-floating form-floating-outline">
                                <input required type="text" id="nameBasic" class="form-control hargaKG" placeholder="Harga Per KG" name="harga_per_kg" />
                                <label for="nameBasic">Harga Per KG</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="subsmit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
