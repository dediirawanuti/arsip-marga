@extends('layouts.app')
@section('title', 'Edit Arsip')
@section('judul', 'Edit Arsip')

@section('content')

    <section class="section">

        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Arsip</h5>
                        <!-- Floating Labels Form -->
                        <form action="{{ route('arsip.update', $arsip->hash_id) }}" method="POST"
                            enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label for="judul">Masukkan Judul Arsip</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul"
                                    value="{{ $arsip->judul }}">
                            </div>
                            <div class="col-12">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control"
                                    value="{{ $arsip->tanggal }}">
                            </div>

                            {{-- <div class="col-12">
                                <label for="ketegori" class="col-sm-2 col-form-label">Kategori</label>
                                <select class="form-control" name="kategori_id" id="kategori_id"
                                    aria-label="Default select example">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $arsip->kategori_id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="col-12">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="draft" {{ $arsip->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ $arsip->status == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="file" class="col-md-6 col-form-label">Unggah File</label>
                                <input class="form-control" type="file" id="file" name="file">
                                @if ($arsip->file_path)
                                    <a href="{{ asset('storage/' . $arsip->file_path) }}" target="_blank">Lihat File</a>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" id="deskripsi" style="height: 100px;">{{ $arsip->deskripsi }}</textarea>
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
