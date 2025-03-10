<div>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <title>Subscription PLans</title>

        <style>
            .card {
                border: none;
                padding: 10px 50px;
            }

            .card::after {
                position: absolute;
                z-index: -1;
                opacity: 0;
                -webkit-transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
                transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            }

            .card:hover {


                transform: scale(1.02, 1.02);
                -webkit-transform: scale(1.02, 1.02);
                backface-visibility: hidden;
                will-change: transform;
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, .75) !important;
            }

            .card:hover::after {
                opacity: 1;
            }

            .card:hover .btn-outline-primary {
                color: white;
                background: #007bff;
            }
        </style>

    </head>

    <body>


        <div class="container-fluid">
            @if ($model == false)
                <div class="container p-5 ">
                    <div class="row mt-5">
                        {{-- {{ $subscriptions }} --}}
                        @foreach ($subscriptions as $item)
                            <div class="col-lg-4 col-md-12 mb-4 ">
                                <div class="card h-100 shadow-lg">
                                    <div class="card-body">
                                        <div class="text-center p-3">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <small>Individual</small>
                                            <br><br>
                                            <span class="h2">{{ number_format($item->price, 2) }} PKR</span>/month
                                            <br><br>
                                        </div>
                                        <p class="card-text">{{ $item->description }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @if ($item->name == 'Manufacture Plan')
                                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg>
                                                Adding Load</li>
                                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg> Unlimited Request for Ridder</li>
                                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg> 24/7 Available</li>
                                        @endif
                                        @if ($item->name == 'Trucking Plan')
                                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg>
                                                Search Load</li>
                                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg> Unlimated Load Request Ride</li>
                                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg> 24/7 Available</li>
                                        @endif
                                        @if ($item->name == 'House Holding')
                                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg>
                                                Search Load</li>
                                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg> Unlimited Booking</li>
                                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-check" viewBox="0 0 16 16">
                                                    <path
                                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                                </svg> 24/7 Available</li>
                                        @endif

                                    </ul>
                                    <div class="card-body text-center">
                                        <button type="button" class="btn btn-outline-primary btn-lg"
                                            style="border-radius:30px"
                                            wire:click="StatusChangeData({{ $item->id }})">Select</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @elseif ($model == true)
                <div>

                    <style>
                        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

                        * {
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                            list-style: none;
                            font-family: 'Montserrat', sans-serif
                        }

                        body {
                            background-color: #3ecc6d;
                        }

                        .container {
                            margin: 20px auto;
                            width: 800px;
                            padding: 30px
                        }

                        .card.box1 {
                            width: 350px;
                            height: 500px;
                            background-color: #3ecc6d;
                            color: #baf0c3;
                            border-radius: 0
                        }

                        .card.box2 {
                            width: 450px;
                            height: 580px;
                            background-color: #ffffff;
                            border-radius: 0
                        }

                        .text {
                            font-size: 13px
                        }

                        .box2 .btn.btn-primary.bar {
                            width: 20px;
                            background-color: transparent;
                            border: none;
                            color: #3ecc6d
                        }

                        .box2 .btn.btn-primary.bar:hover {
                            color: #baf0c3
                        }

                        .box1 .btn.btn-primary {
                            background-color: #57c97d;
                            width: 45px;
                            height: 45px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            border: 1px solid #ddd
                        }

                        .box1 .btn.btn-primary:hover {
                            background-color: #f6f8f7;
                            color: #57c97d
                        }

                        .btn.btn-success {
                            width: 40px;
                            height: 40px;
                            border-radius: 50%;
                            background-color: #ddd;
                            color: black;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            border: none
                        }

                        .nav.nav-tabs {
                            border: none;
                            border-bottom: 2px solid #ddd
                        }

                        .nav.nav-tabs .nav-item .nav-link {
                            border: none;
                            color: black;
                            border-bottom: 2px solid transparent;
                            font-size: 14px
                        }

                        .nav.nav-tabs .nav-item .nav-link:hover {
                            border-bottom: 2px solid #3ecc6d;
                            color: #05cf48
                        }

                        .nav.nav-tabs .nav-item .nav-link.active {
                            border: none;
                            border-bottom: 2px solid #3ecc6d
                        }

                        .form-control {
                            display: block;
                            width: 100%;
                            padding: 1.375rem 0.75rem;
                            font-size: 1rem;
                            font-weight: 400;
                            line-height: 1.5;
                            color: #212529;
                            background-color: #fff;
                            background-clip: padding-box;
                            border: 1px solid #ced4da;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            appearance: none;
                            border-radius: .25rem;
                            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                        }

                        .inputWithIcon {
                            position: relative
                        }

                        img {
                            width: 50px;
                            height: 20px;
                            object-fit: cover
                        }

                        .inputWithIcon span {
                            position: absolute;
                            right: 14px;
                            bottom: 9px;
                            color: #57c97d;
                            cursor: pointer;
                            transition: 0.3s;
                            font-size: 14px;
                        }

                        .form-control:focus {
                            box-shadow: none;
                            border-bottom: 1px solid #ddd
                        }

                        .btn-outline-primary {
                            color: black;
                            background-color: #ddd;
                            border: 1px solid #ddd
                        }

                        .btn-outline-primary:hover {
                            background-color: #05cf48;
                            border: 1px solid #ddd
                        }

                        .btn-check:active+.btn-outline-primary,
                        .btn-check:checked+.btn-outline-primary,
                        .btn-outline-primary.active,
                        .btn-outline-primary.dropdown-toggle.show,
                        .btn-outline-primary:active {
                            color: #baf0c3;
                            background-color: #3ecc6d;
                            box-shadow: none;
                            border: 1px solid #ddd
                        }

                        .btn-group>.btn-group:not(:last-child)>.btn,
                        .btn-group>.btn:not(:last-child):not(.dropdown-toggle),
                        .btn-group>.btn-group:not(:first-child)>.btn,
                        .btn-group>.btn:nth-child(n+3),
                        .btn-group>:not(.btn-check)+.btn {
                            border-radius: 50px;
                            margin-right: 20px
                        }

                        form {
                            font-size: 14px
                        }

                        form .btn.btn-primary {
                            width: 100%;
                            height: 45px;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            background-color: #3ecc6d;
                            border: 1px solid #ddd
                        }

                        form .btn.btn-primary:hover {
                            background-color: #05cf48
                        }

                        @media (max-width:750px) {
                            .container {
                                padding: 10px;
                                width: 100%
                            }

                            .text-green {
                                font-size: 14px
                            }

                            .card.box1,
                            .card.box2 {
                                width: 100%
                            }

                            .nav.nav-tabs .nav-item .nav-link {
                                font-size: 12px
                            }
                        }
                    </style>

                    <!-- Bootstrap CSS from CDN -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
                        rel="stylesheet" />

                    <!-- Font Awesome from CDN -->
                    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" />

                    <div class="container bg-light d-md-flex align-items-center">
                        <div class="card box2 shadow-sm">
                            <div class="d-flex align-items-center justify-content-between p-md-5 p-4"> <span
                                    class="h5 fw-bold m-0">Payment methods</span>
                                {{-- <div class="btn btn-primary bar"><span class="fas fa-bars"></span></div> --}}
                            </div>
                            <ul class="nav nav-tabs mb-3 px-md-4 px-2">
                                <li>Plan: {{ $plans->name }}</a>
                                </li>
                            </ul>
                            <form action="{{ route('payment.process') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Credit Card</span>
                                            <div class="inputWithIcon">
                                                <input required class="form-control" type="text"
                                                   placeholder="xxxx-xxxx-xxxx-xxxx"> <span class=""> <img
                                                        src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png"
                                                        alt=""></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex flex-column ps-md-5 px-md-0 px-4 mb-4">
                                            <span>Expiration<span class="ps-1">Date</span></span>
                                            <div class="inputWithIcon">
                                                <input required type="text" class="form-control"
                                                    placeholder="05/20">
                                                <span class="fas fa-calendar-alt"></span>
                                            </div>
                                            <input hidden type="text" value="{{ $user->id }}" name="plans"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex flex-column pe-md-5 px-md-0 px-4 mb-4"> <span>Code
                                                CVV</span>
                                            <div class="inputWithIcon"> <input required type="password"
                                                    class="form-control" placeholder="1234">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex flex-column px-md-5 px-4 mb-4"> <span>Name</span>
                                            <div class="inputWithIcon"> <input required
                                                    class="form-control text-uppercase" type="text"
                                                    placeholder="valdimir berezovkiy"> <span
                                                    class="far fa-user"></span> </div>
                                        </div>
                                    </div>
                                    <div class="col-12 px-md-5 px-4 mt-3">
                                        <button type="submit" class="btn btn-primary w-100">Pay
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- jQuery CDN -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                    <!-- Bootstrap JS Bundle CDN -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

                </div>

            @endif
        </div>
    </body>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>


    </body>

    </html>
</div>
