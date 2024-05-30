@extends('layouts.app')
@section('title', 'Ganti Password')
@section('judul', 'Ganti Password')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Ganti Password</h5> --}}
                        {{-- <form action="{{ route('password.updatePassword', $users->hash_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="current_password"
                                        name="current_password" placeholder="Current Password" required>
                                    <label for="current_password">Password Lama</label>
                                </div>
                                @error('current_password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="New Password" required>
                                    <label for="password">Password Baru</label>
                                </div>
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm New Password" required>
                                    <label for="password_confirmation">Ulangi Password Baru</label>
                                </div>
                                @error('password_confirmation')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between items-center">
                                <a href="{{ route('user.index') }}">&laquo; Kembali</a>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Ganti Password</button>
                                </div>
                            </div>
                        </form> --}}
                        <div class="p-4">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
