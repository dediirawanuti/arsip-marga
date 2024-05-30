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
            {{-- <a class="nav-link collapsed" href="{{ route('logout') }}">
              <i class="bi bi-box-arrow-in-right"></i>
              <span>Log Out</span>
          </a> --}}
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
