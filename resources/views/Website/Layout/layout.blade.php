<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A T A</title>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="{{ asset('website/images/ata.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- ajax token meta --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">

    {{-- font --}}
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/product-view.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/animtion.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        .contact-info-item {
            margin-bottom: 15px;
            border-bottom: 1px solid #e5e5e5;
        }

        .contact-info-item i {
            color: red;
            margin-right: 10px;
        }

        .contact-info-item .info-text {
            color: #333;
            font-size: 16px;
        }

        .fas {
            font-size: 28px
        }

        /* Filter Bar Container */
        .filter-bar {
            background-color: #f8f9fa;
            /* Light background */
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 8px;
        }

        /* Filter Item */
        .filter {
            display: flex;
            align-items: center;
            flex: 1 0 auto;
            gap: 10px;
            border-right: 1px solid #ddd;
            /* Divider between filters */
            padding: 10px;
        }

        .filter:last-child {
            border-right: none;
            /* Remove border for the last filter */
        }


        /* Filter Title */
        .filter-title {
            font-size: 20px !important;
            font-weight: 900 !important;
            color: #333;
            margin-bottom: 2px;
        }

        /* Dropdowns and Inputs */
        .filter select,
        .filter input {
            border: none;
            outline: none;
            font-size: 0.85rem;
            color: #999;
            width: 100%;
        }

        .filter select:focus,
        .filter input:focus {
            box-shadow: none;
        }

        /* Guests Counter */
        #guest_quantity {
            font-size: 0.85rem;
            font-weight: bold;
            color: #333;
        }

        /* Search Button */
        .filter-btn {
            flex-shrink: 0;
        }

        .filter-bar .form-control {
            outline: none !important;
            /* Removes the outline property */
        }

        .bol {
            border-top-right-radius: 10px !important;
            /* Top-right corner */
            border-bottom-right-radius: 10px !important;
            /* Bottom-right corner */
        }

        #collapseExample {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 10;
        }
        @media screen and (max-width:1042px) {
            #collapseExample {
                position: static;
            }

            .bol {
                border-top-right-radius: 10px !important;
                border-top-left-radius: 10px !important;
                /* Top-right corner */
                border-bottom-right-radius: 10px !important;
                border-bottom-left-radius: 10px !important;
                /* Bottom-right corner */
            }
            .filter-bar {
                align-items: center;
                height: fit-content;
                justify-content: center;
            }
            .filter {
                height: fit-content;
                /* border-right: 1px; */
            }
        }
        @media screen and (max-width:768px){
            .filter {
                height: fit-content;
                border-right: none;
                width: 100% !important;
            }
            .filter > div{
                margin-block: 20px;
                width: 100% !important;
            }
            .filter-dropdown {
                width: 100% !important;
            }
            #dropdown1 >  div
            {
                display: flex;
                flex-direction: row;
                width: 100%;
                justify-content: space-between;
                align-items: center;
            }
            .bol {
                width: 100%;
            }
        }
    </style>
    @stack('css')
</head>

<body>
    @include('Website.Layout.components.navbar')
    @yield('content')
    @include('Website.Layout.components.footer')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Setup CSRF Token for AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Example: Show a SweetAlert when the button is clicked
            $('#alertButton').click(function() {
                Swal.fire({
                    title: 'SweetAlert2',
                    text: 'This is a test alert!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        });
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('website/js/observer.js') }}"></script>
    <script src="{{ asset('website/js/script.js') }}"></script>
    @stack('js')
</body>

</html>
