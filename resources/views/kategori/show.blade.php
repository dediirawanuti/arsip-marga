@extends('layouts.app')
@section('title', 'Manajemen Kategori')
@section('judul', 'Daftar Kategori')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tampilan Kategori</h5>
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"
                            onclick="addKategori()">
                            Tambah Kategori
                        </button> --}}

                        <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>

                        <table class="table datatable" id="kategori-table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $kategoris)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kategoris->nama }}</td>
                                        <td>{{ $kategoris->deskripsi }}</td>
                                        <td>
                                            
                                            <a href="{{ route('kategori.edit', $kategoris->hash_id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('kategori.destroy', $kategoris->hash_id) }}"
                                                method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button"
                                                    data-title="{{ $kategoris->nama }}">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>


    </section>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.delete-button');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    var title = this.getAttribute('data-title');
                    var confirmDelete = confirm('Apakah Anda yakin ingin menghapus arsip "' +
                        title + '"?');

                    if (!confirmDelete) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
@endsection
