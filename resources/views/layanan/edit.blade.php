<div class="modal" id="editLayanan{{ $l->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Edit Layanan {{ $l->nama_layanan }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('layanan.update', $l->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-6 mt-2">
                            <div class="form-floating form-floating-outline">
                                <input required type="text" id="nameBasic" value="{{ $l->nama_layanan }}" class="form-control" placeholder="Masukkan Nama Layanan" name="nama_layanan" />
                                <label for="nameBasic">Nama Layanan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-6 mt-2">
                            <div class="form-floating form-floating-outline">
                                <input required type="text" id="nameBasic" class="form-control hargaKG" value="{{ $l->harga_per_kg }}" placeholder="Harga Per KG" name="harga_per_kg" />
                                <label for="nameBasic">Harga Per KG</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
