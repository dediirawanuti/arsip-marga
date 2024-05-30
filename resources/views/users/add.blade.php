@extends('layouts.app')
@section('title', 'Tambah Users')
@section('judul', 'Tampil Users')

@section('content')

    <section class="section">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Users</h5>
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="name" required autocomplete="on" value="{{ old('name') }}">
                                    <label for="name">Nama Users</label>
                                </div>
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="name@example.com" required value="{{ old('email') }}">
                                    <label for="email">Email address</label>
                                </div>
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <select class="form-control" name="usertype" id="usertype"
                                    aria-label="Default select example">
                                    <option selected>Pilih Users</option>
                                    <option value="admin">Kelapa Tu</option>
                                    <option value="user">Petugas Tu</option>
                                </select>
                            </div>
                            <div class="mb-3 col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="password" required value="{{ old('password') }}">
                                    <label for="password">Password</label>
                                </div>
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="password_confirmation" required>
                                    <label for="password_confirmation">Ulangi Password</label>
                                </div>
                                @error('password_confirmation')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between items-center">
                                <a href="{{ route('user.index') }}">&laquo; Kembali</a>

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
