@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang, {{ auth()->user()->name }}! 🎉</h5>
                            <p class="mb-4">
                                Anda berhasil login ke Admin Panel menggunakan Template Sneat. 
                                Silakan gunakan menu di sebelah kiri untuk mengelola konten website.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection