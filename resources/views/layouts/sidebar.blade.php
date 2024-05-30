<!-- ======= Sidebar ======= -->
<aside class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Master</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('arsip.index') }}">
                {{-- <a class="nav-link collapsed" href="{{ route('arsip.index') }}"> --}}
                <i class="bi bi-archive-fill"></i>
                <span>Data Arsip</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('kategori.index') }}">
                <i class="bi bi-list-task"></i>
                <span>Data Kategori</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.index') }}">
                <i class="bi bi-person-fill"></i>
                <span>Data User</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.password') }}">
                <i class="bi bi-card-list"></i>
                <span>Ganti Password</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link collapsed">
                    <i class="bi bi-box-arrow-right"></i>
                    {{ __('Log Out') }}
                </button>
            </form>
        </li><!-- End Login Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
