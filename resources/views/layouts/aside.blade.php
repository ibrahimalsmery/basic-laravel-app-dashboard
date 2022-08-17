<aside class="main-sidebar sidebar-dark-primary elevation-1">

    <a href="{{ url()->full() }}" class="brand-link">
        <img src="{{ asset('public/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME', '') }}</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->profileImageUrl() }}" class="img-circle elevation-2"
                    style="width: 30px;height: 30px;object-fit: cover" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('dashboard.user.profile') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('dashboard.index') }}"
                        class="nav-link  {{ url()->full() === route('dashboard.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('dashboard.users.list') }}"
                        class="nav-link  {{ url()->full() === route('dashboard.users.list') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users

                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a style="cursor: pointer"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        class="nav-link ">
                        <i class=" nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout

                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>

    </div>

</aside>
