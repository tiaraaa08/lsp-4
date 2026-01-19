@extends('master')
@section('title', 'Dashboard')
@section('content')
    <div class="">
        <div class="row g-6">
            <div class="col-md-6 col-xl-4">
                <div class="card shadow-none bg-transparent border border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Jumlah Layanan</h5>
                        <p class="card-text text-primary">
                            Some quick example text to build on the card title and make up.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card shadow-none bg-transparent border border-secondary">
                    <div class="card-body">
                        <h5 class="card-title text-secondary">Transaksi Baru</h5>
                        <p class="card-text text-secondary">
                            Some quick example text to build on the card title and make up.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card shadow-none bg-transparent border border-success">
                    <div class="card-body">
                        <h5 class="card-title text-success">Sedang Diproses</h5>
                        <p class="card-text text-success">
                            Some quick example text to build on the card title and make up.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card shadow-none bg-transparent border border-danger">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Belum Dibayar</h5>
                        <p class="card-text text-danger">
                            Some quick example text to build on the card title and make up.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
