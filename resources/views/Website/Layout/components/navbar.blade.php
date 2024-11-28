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
                    <a class="nav-link" href="{{route('home')}}">Home</a>
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
                    <a class="nav-link" href="{{route('activities')}}">Free & Easy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('news')}}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
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

            <div class="website-description">
                <div class="close-description-can">
                    <button class="close-description-btn">X</button>
                </div>
                <img src="{{asset('website/images/ata.png')}}" alt="logo" class="w-25 d-block mx-auto mt-5">
                <p class="w-75 text-center mx-auto">
                    A Singapore Tour and Travel Agency: With ATA, you can go for our holiday package, or just travel free
                    and easy!
                </p>
                <h6 class="w-75 mx-auto heading">Address</h6>
                <p class="w-75 mx-auto">12 Woodlands Square Tower 1 #08-85, Singapore 737715</p>
                <h6 class="w-75 mx-auto heading">Phone</h6>
                <p class="theme-text w-75 mx-auto">+65 9233 6029</p>
                <h6 class="w-75 mx-auto heading">Email</h6>
                <p class="theme-text w-75 mx-auto">sales@ataeventvacation.com</p>
            </div>
        </div>
    </div>
</nav>
