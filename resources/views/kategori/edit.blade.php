@extends('layouts.app')
@section('title', 'Edit Kategori')
@section('judul', 'Edit Kategori')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Kategori</h5>
                        <form action="{{ route('kategori.update', $kategoris->hash_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        placeholder="nama" required value="{{ $kategoris->nama }}">
                                    <label for="nama">Nama Kategori</label>
                                </div>
                                @error('nama')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" id="deskripsi" style="height: 100px;">{{ $kategoris->deskripsi }}</textarea>
                                    <label for="deskripsi">Deskripsi</label>
                                </div>
                                @error('deskripsi')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between items-center">
                                <a href="{{ route('kategori.index') }}">&laquo; Kembali</a>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
