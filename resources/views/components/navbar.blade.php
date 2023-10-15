<nav class="navbar navbar-expand-lg mb-3 bg-wheat">
        <div class="container-fluid">
            <a class="navbar-brand" href="/item">
                <img class="navbar-icon" src="media/kofi-nook-icon.jpg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(Auth::user()->role == 'owner')
                    <li class="nav-item">
                        <a class="nav-link" href="/item">Items</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/category">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/unit">Units</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/type">Types</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/account">Accounts</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/report">Report</a>
                    </li>
                    @endif
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <h5><i>{{ Auth::user()->first_name }}
                                    {{ Auth::user()->last_name }} <span class="bi bi-person-lines-fill"></span></i></h5>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#updateProfileModal{{ Auth::user()->id }}">Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>