<div class="container sticky-top px-0">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid justify-content-between">
            <a class="navbar-brand" href="{{ route('home') }}">E-commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Profile</a></li>
                              <li><a class="dropdown-item" href="{{ route('logoutAuth') }}">Logout</a></li>
                              <li><a class="dropdown-item" href="{{ route('resetPassword') }}">Reset Password</a></li>
                            </ul>
                        </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('loginUser') }}" class="btn btn-outline-primary">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>
