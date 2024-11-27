<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container">
        <div class="d-flex align-items-center gap-2">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('website/images/ata.png') }}" alt="logo" class="logo">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Tours
                    </a>
                    <ul class="dropdown-menu">
                        <li class="btn-group dropend w-100">
                            <button class="dropdown-toggle w-100 drop-btn" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu sub-dropdown-menu">
                                <li class="dropdown-item"><a href="#">Sub-action 1</a></li>
                                <li class="dropdown-item"><a href="#">Sub-action 2</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-item"><a href="#">Another action</a></li>
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Free & Easy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-item-center gap-4 navBar-right">
            <div class="d-flex align-items-center gap-2">
                <i class="theme-text fa-solid fa-phone"></i>
                +65 9233 6029
            </div>
            {{-- divider --}}
            <div class="navbar-divider"></div>
            <div class="d-flex align-items-center">
                <a href=""><img src="{{ asset('website/images/user.png') }}" width="23" alt=""></a>
                <button class="button-unset" style="margin-left:20px;">
                    <img src="{{ asset('website/images/menu.png') }}" width="23" alt="">
                </button>
            </div>
        </div>
    </div>
</nav>
