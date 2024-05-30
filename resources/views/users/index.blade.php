@extends('layouts.app')
@section('title', 'Manajemen User')
@section('judul', 'Tampilan User')

@section('style')
    <style>
        .password-wrapper {
            position: relative;
            rounded-radius: 12px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tampilan User</h5>
                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdd"
                            onclick="addKategori()">
                            Tambah Kategori
                        </button> --}}
                        <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">Tambah User</a>

                        <table class="table datatable" id="user-table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Usertype</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $users)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $users->name }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>
                                            @if ($users->usertype == 'admin')
                                                Kepala Tu
                                            @else
                                                Petugas Tu
                                            @endif
                                        </td>
                                        <td>
                                            <div class="password-wrapper">
                                                <input type="password" class="form-control" value="{{ $users->plain_password }}"
                                                    readonly>
                                                <span class="toggle-password" onclick="togglePassword(this)">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', $users->hash_id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('user.destroy', $users->hash_id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-button"
                                                    data-title="{{ $users->name }}">Hapus</button>
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
                    var confirmDelete = confirm('Apakah Anda yakin ingin menghapus users "' +
                        title + '"?');

                    if (!confirmDelete) {
                        event.preventDefault();
                    }
                });
            });
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#kategori-table').DataTable();
        });
    </script>

    <script>
        function togglePassword(element) {
            const passwordInput = element.previousElementSibling;
            const icon = element.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
@endsection
