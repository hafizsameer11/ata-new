<style>
     body {
        overflow-x: hidden !important; /* Prevent horizontal scrolling across the page */
    }
    .modal-content {
    border-radius: 10px;
    background-color: #f8f9fa;
    padding: 20px;
}

.modal-header {
    border-bottom: none;
    text-align: center;
}

.modal-title {
    font-size: 24px;
    font-weight: bold;
}

.btn-danger {
    background-color: #ff0000;
    border: none;
}

.btn-success {
    background-color: #28a745;
    border: none;
}
.dropdown-menu {
        max-height: unset; /* Ensure no height limitation */
        overflow: hidden; /* Allow content to display without scrollbars */
        padding: 0.5rem 0; /* Add padding for better look */
        border-radius: 0.375rem; /* Slightly round edges for aesthetics */
    }

    /* Remove unnecessary padding/margins on dropdown items */
    .dropdown-item {
        white-space: wrap; /* Prevent text wrapping */
        padding: 0.5rem 1rem; /* Proper spacing */
    }

</style>
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
                    <a class="nav-link fw-bold " href="{{route('home')}}">Home.</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link fw-bold ps-5 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Tours.
                    </a>
                    <ul class="dropdown-menu">
                        <li class="btn-group dropend w-100">
                            <button class="dropdown-toggle ps-5 fw-bold w-100 drop-btn" data-bs-toggle="dropdown"
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
                    <a class="nav-link fw-bold ps-5" href="{{route('activities')}}">Free & Easy.</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold ps-5" href="{{route('news')}}">News.</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold ps-5" href="{{ route('about') }}">About.</a>
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
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('website/images/user.png') }}" width="23" alt="User Profile" class="me-2">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- Check if user is authenticated -->
                        @auth
                            <!-- If the user is logged in, show My Profile and Logout -->
                            <li>
                                <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>
                            </li>
                            <li>
                                <form action="{{ route('user.logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        @else
                            <!-- If the user is not logged in, show My Profile as a button that triggers the login modal -->
                            <li>
                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal">My Profile</button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                            </li>
                        @endauth
                    </ul>
                    
                </div>
                
                {{-- <a href="{{route('user.logout')}}">Logout</a> --}}
               
                <button class="button-unset" style="margin-left:20px;">
                    <img src="{{ asset('website/images/menu.png') }}" width="23" alt="">
                </button>
            </div>
            {{-- login  --}}
            <div class="modal fade {{ $errors->has('username') || $errors->has('password') ? 'show' : '' }}" 
                id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true"
                style="{{ $errors->has('username') || $errors->has('password') ? 'display: block;' : '' }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Login</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('user.login')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="usernameOrEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="usernameOrEmail" name="email"
                                        value="{{ old('username') }}" required>
                                    @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-danger w-100">Login</button>
                            </form>
                            <div class="mt-3 text-center">
                                <a href="" class="text-decoration-none">Forgot password?</a>
                            </div>
                            <div class="mt-3 text-center">
                                <a href=""  data-bs-toggle="modal" data-bs-target="#signupModal" class="text-decoration-none">Don't have a account?Sign up now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
    
            {{-- end --}}
{{-- sign up --}}
<div class="modal fade {{ $errors->has('name') || $errors->has('email') || $errors->has('password') ? 'show' : '' }}" 
    id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true"
    style="{{ $errors->has('name') || $errors->has('email') || $errors->has('password') ? 'display: block;' : '' }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('user.signup')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
 
{{-- 
@if(session('registration_success'))
    <script type="text/javascript">
        // Use jQuery to trigger login modal after successful registration
        $('#signupModal').modal('hide'); // Hide the register modal if open
        $('#loginModal').modal('show');    // Show the login modal
    </script>
@endif --}}
{{-- end --}}
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