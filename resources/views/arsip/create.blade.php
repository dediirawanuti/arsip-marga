@extends('layouts.app')
@section('title', 'Tambah Arsip')
@section('judul', 'Tambah Arsip')

@section('content')

    <section class="section">
        {{-- <h1>Tambah Arsip</h1>
        <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="judul">Judul:</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div>
                <label for="file">File:</label>
                <input type="file" id="file" name="file" required>
            </div>
            <button type="submit">Kirim</button>
        </form> --}}

        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Arsip</h5>
                        <!-- Floating Labels Form -->
                        <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Judul">
                                    <label for="judul">Masukkan Judul Arsip</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="tanggal" class="col-form-label">Tanggal</label>
                                <input class="form-control" type="date" name="tanggal" id="tanggal">
                            </div>

                            {{-- <div class="col-12">
                                <label for="kategori_id" class="col-form-label">Kategori</label>
                                <select class="form-control" name="kategori_id" id="kategori_id"
                                    aria-label="Default select example">
                                    <option selected>Pilih kategori</option>
                                    @foreach ($kategori as $kategoris)
                                        <option value="{{ $kategoris->id }}">{{ $kategoris->nama }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="col-12">
                                <label for="status" class="col-form-label">Status</label>
                                <select class="form-control" name="status" id="status"
                                    aria-label="Default select example">
                                    <option selected>Pilih status</option>
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
                            </div>
                            <div class="mb-3 col-12">
                                <label for="file" class="col-form-label">Unggah File</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="file" id="file" name="file" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" id="deskripsi" style="height: 100px;"></textarea>
                                    <label for="deskripsi">Deskripsi</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between items-center">
                                <a href="{{ route('arsip.index') }}">&laquo; Kembali</a>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </form><!-- End floating Labels Form -->
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
