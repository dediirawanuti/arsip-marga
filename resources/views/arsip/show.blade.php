@extends('layouts.app')
@section('title', 'Detail Arsip')
@section('judul', 'Detail Arsip')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2>{{ $arsip->judul }}</h2>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Deskripsi</h5>
                        <p class="card-text">{{ $arsip->deskripsi }}</p>

                        {{-- <h5 class="card-title">Kategori</h5>
                        <p class="card-text">{{ $arsip->kategori->nama }}</p> --}}

                        <h5 class="card-title">Status</h5>
                        <p class="card-text">{{ $arsip->status }}</p>

                        <h5 class="card-title">Tanggal</h5>
                        <p class="card-text">{{ $arsip->created_at->format('d M Y') }}</p>

                        <a href="{{ asset('storage/' . $arsip->file_path) }}" class="btn btn-primary mt-2"
                            target="blank">Unduh File</a>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('arsip.index') }}" class="mr-4">&laquo; Kembali</a>
                        Diperbarui pada {{ $arsip->updated_at->format('d M Y, H:i') }}
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
