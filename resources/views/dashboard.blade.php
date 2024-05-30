@extends('layouts.app')
@section('title', 'Dashboard')
@section('judul', 'Dashboard')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Arsip</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('arsip.index') }}">Lihat Arsip</a></li>
                                    <li><a class="dropdown-item" href="{{ route('arsip.create') }}">Tambah Arsip</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total <span>| Arsip</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-file-archive
                                        "></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalArsip }}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Users</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('user.index') }}">Lihat User</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.create') }}">Tambah User</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total <span>| User</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-user
                                        "></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalUser }}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Kategori</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('kategori.index') }}">Lihat Kategori</a></li>
                                    <li><a class="dropdown-item" href="{{ route('kategori.create') }}">Tambah Kategori</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Total <span>| Kategori</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bx-category
                                        "></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalKategori }}</h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                </div>
            </div>
        </div>
    </section>
@endsection
