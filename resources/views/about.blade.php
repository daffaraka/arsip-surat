@extends('layouts.app')

@section('content')
    <div class="container mt-5 text-dark">
        <h1>Tentang Aplikasi</h1>
        <p>Aplikasi ini digunakan untuk mengarsipkan dan mengelola surat.</p>
        <h4>Aplikasi ini dibuat oleh : </h4>
        <div class="card mb-3 mt-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{asset('foto_profil.jpg')}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">

                        <h5 class="card-title">Adesta Any Fitriani</h5>
                        <p class="card-text mb-0">D4-Sistem Informasi Bisnis</p>
                        <p class="card-text mb-0">NIM : 2141762063</p>
                        <p class="card-text mb-0">Tanggal : 21 Desember 2001</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
