@extends('layouts.app')
@section('title', 'Manajemen Arsip')
@section('judul', 'Daftar Arsip')

@section('content')

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tampilan Arsip</h5>

                        <a href="{{ route('arsip.create') }}" class="btn btn-primary mb-2">Tambah Arsip</a>

                        <table class="table datatable" id="arsip-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    {{-- <th scope="col">Kategori</th> --}}
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($arsip as $arsips)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $arsips->judul }}</td>
                                        {{-- <td>{{ $arsips->nama_kategori }}</td> --}}
                                        <td>{{ $arsips->deskripsi }}</td>
                                        <td>{{ $arsips->status }}</td>
                                        <td>
                                            <a href="{{ route('arsip.edit', $arsips->hash_id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>

                                            <form action="{{ route('arsip.destroy', $arsips->hash_id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button"
                                                    data-title="{{ $arsips->judul }}">Hapus</button>
                                            </form>

                                            <a href="{{ route('arsip.show', $arsips->hash_id) }}"
                                                class="btn btn-info btn-sm">Detail</a>
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
