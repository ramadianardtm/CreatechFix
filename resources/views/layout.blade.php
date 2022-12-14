<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="https://i.ibb.co/16LXThs/WEB-SHELF.png">
    <script src="https://kit.fontawesome.com/cfebdc1fe4.js" crossorigin="anonymous"></script>
    <title>Creative Technology</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        #logo img {
            width: 120px;
        }

        html * {
            font-family: 'Poppins', sans-serif;
        }

        #logo {
            margin-left: 6rem;
        }

        header {
            line-height: 62px;
        }

        .right-btn {
            margin-right: 6rem;
        }

        footer {
            width: 100%;
            color: grey;
        }

        .btn-signin {
            display: inline;
            height: 30px;
            width: 120px;
            border-radius: 30px;
            border: 2px;
            border-style: solid;
            border-color: #1e87c3;
            background-color: #1e87c3;
            color: #fff;
            font-weight: 500;
        }

        .btn-signin:hover {
            width: 200px;
            border-radius: 30px;
            border: 2px;
            border-style: solid;
            border-color: #37c1f0;
            background-color: #37c1f0;
            color: #fff;
        }

        .btn-signup {
            display: inline;
            height: 30px;
            width: 200px;
            font-size: 14px;
            border-radius: 30px;
            border: 1px;
            border-style: solid;
            border-color: #116dff;
            background-color: #fff;
            color: #116dff;
        }

        .btn-signup:hover {
            display: inline;
            height: 30px;
            width: 120px;
            font-size: 14px;
            border-radius: 30px;
            border: 1px;
            border-style: solid;
            border-color: #116dff;
            background-color: #116dff;
            color: #fff;
            font-weight: 500;
        }

        .titleheader {
            font-weight: 800;
            font-size: 55px;
            font-family: 'Poppins', sans-serif;
        }

        .form-control {
            border-radius: 8px;
        }

        .footer-black {
            background-color: #141414;
            width: 100%;
            font-family: 'Poppins', sans-serif;
        }
        .btn-chat {
        height: fit-content;
        width: 80%;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #fff;
        background-color: #141414;
        color: #fff;
        font-weight: 500;
    }

    .btn-chat:hover {
        width: 80%;
        font-weight: 500;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
    }
    </style>

</head>

<!-- Popup modal Signout -->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to Sign Out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary" href="/logout">Confirm</a>
            </div>
        </div>
    </div>
</div>
<!-- Popup modal end -->

<header class="d-flex justify-content-between pt-2 pb-4">
    <div id="logo" class="d-flex">
        <a href="/"><img src="https://i.ibb.co/JCtkv8p/Createch-Logo-Fix.png" alt="Logo-Createch"></a>
    </div>
    <div class="text-dark">
        @if (\Illuminate\Support\Facades\Auth::check())
        @if (\Illuminate\Support\Facades\Auth::user()->role == 'member')
        <a class="text-dark mx-3" style="font-size: 15px;" href="/product">Products</a>
        <a class="text-dark mx-3" style="font-size: 15px;" href="/transaction">Transactions</a>
        <a class="text-dark mx-3" style="font-size: 15px;" href="/about">About Us</a>
        <a class="text-dark mx-3" style="font-size: 15px;" href="/contact">Contact</a>
        @else
        <a class="text-dark mx-3" style="font-size: 15x;" href="/about">About Us</a>
        <a class="text-dark mx-3" style="font-size: 15px;" href="/product">Manage Products</a>
        <a class="text-dark mx-3" style="font-size: 15px;" href="/manage">Add Category</a>
        <a class="text-dark mx-3" style="font-size: 15px;" href="/manage-payment">Add Payment</a>
        <a class="text-dark mx-3" style="font-size: 15px;" href="/manage-delivery">Add Delivery</a>
        @endif


        {{-- belom login --}}
        @else
        <a class="text-dark mx-3" style="font-size: 15px;" href="/product">Products</a>
        <a class="text-dark mx-3" style="font-size: 15px;" href="/about">About Us</a>
        @endif
    </div>

    @if (\Illuminate\Support\Facades\Auth::check())
    <div class="text-dark right-btn">
        @if (\Illuminate\Support\Facades\Auth::user()->role == 'member')
        <a class="text-dark mx-2" style="font-size: 15px;" href="/cart"><i style="font-size: 16px;" class="fa-solid fa-cart-shopping"></i></a>
        @endif
        @if (\Illuminate\Support\Facades\Auth::user()->role == 'admin')
        <a class="text-dark mx-3" style="font-size: 15px;" href="/report">Report</a>
        @endif
        <a class="text-dark mx-2" style="font-size: 15px;" href="/profile">Profile</a>
        <a class="btn btn-signup" href="/logout" data-toggle="modal" data-target="#deletemodalpop">Sign Out</a>
    </div>
    @else
    @if (Route::has('/login'))
    <a class="text-sm text-gray-800 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-500" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif
    <div class="right-btn">
        <a class="btn btn-signup" href="/login">Sign In</a>
    </div>
    @endif
</header>

<body>
    <div class="content">
        @yield('content')
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

@if (\Illuminate\Support\Facades\Auth::check())
@if (\Illuminate\Support\Facades\Auth::user()->role == 'admin')
<footer class="text-center pt-5 mt-3 pb-5">
    © 2022 Createch, Inc. All rights reserved
</footer>
@else
<footer>
    <div class="footer-black">
        <div class="container-footer" style="padding: 20px;padding-bottom:70px;">
            <div class="row" style="height:fit-content;">
                <div class="col-md-3" style="padding-left:50px;padding-top:20px;">
                    <img style="width: 200px; height:100%;" src="https://i.ibb.co/njQBFCT/createchfooter.png" alt="">
                </div>
            </div>
            <div class="row" style="padding-left:60px;">
                <div class="col-md-3" style="margin-right: 50px;">
                    <P style="font-size: 15px; color:#fff;margin-top: 40px;">PT CREATECH EMPOWER LIFE</P>
                    <P style="font-size: 15px; color:#fff;margin-top: 5px;">Jalan Lagoon Timur, Tangerang Selatan, Banten, 47500.</P>
                </div>
                <div class="col-md-2">
                    <P style="font-size: 15px; color:#fff;margin-top: 40px; font-weight:500;">Menu</P>
                    <div><a href="/" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Home</a></div>
                    <div style="margin-top:8px;"><a href="/product" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Products</a></div>
                    <div style="margin-top:8px;"><a href="/customorder" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Chat</a></div>
                    <div style="margin-top:8px;"><a href="/transaction" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Transactions</a></div>
                </div>
                <div class="col-md-1" style="margin-right: 40px;">
                    <P style="font-size: 15px; color:#fff;margin-top: 40px; font-weight:500;">Others</P>
                    <div><a href="/cart" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Cart</a></div>
                    <div style="margin-top:8px;"><a href="/profile" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Profile</a></div>
                    <div style="margin-top:8px;"><a href="/about" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">About Us</a></div>
                </div>
                <div class="col-md-3">
                    <P style="font-size: 15px; color:#fff;margin-top: 40px;">Phone: +621139836329</P>
                    <P style="font-size: 15px; color:#fff;">Email: adminsupport@createch.id</P>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2">
                        <a class="text-dark mx-2" style="font-size: 15px;" href=""><i class="fa-brands fa-instagram" style="color: #fff;opacity:0.5;font-size:20px;"></i></a> 
                        </div>
                        <div class="col-md-2">
                        <a class="text-dark mx-2" style="font-size: 15px;" href=""><i class="fa-brands fa-linkedin"style="color: #fff;opacity:0.5;font-size:20px;"></i></a> 
                        </div>
                        <div class="col-md-2">
                        <a class="text-dark mx-2" style="font-size: 15px;" href=""><i class="fa-brands fa-twitter"style="color: #fff;opacity:0.5;font-size:20px;"></i></a> 
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                <P style="font-size: 15px; color:#fff;margin-top: 40px; font-weight:500;">Have a questions?</P>
                <a class="btn btn-chat" href="https://api.whatsapp.com/send/?phone=601139836325&text&app_absent=0">Chat Now!</a>
                </div>
            </div>
        </div>
    </div>
</footer>
@endif

<!-- Belom Login -->
@else
<footer>
    <div class="footer-black">
        <div class="container-footer" style="padding: 20px;padding-bottom:70px;">
            <div class="row" style="height:fit-content;">
                <div class="col-md-3" style="padding-left:50px;padding-top:20px;">
                    <img style="width: 200px; height:100%;" src="https://i.ibb.co/njQBFCT/createchfooter.png" alt="">
                </div>
            </div>
            <div class="row" style="padding-left:60px;">
                <div class="col-md-3" style="margin-right: 50px;">
                    <P style="font-size: 15px; color:#fff;margin-top: 40px;">PT CREATECH EMPOWER LIFE</P>
                    <P style="font-size: 15px; color:#fff;margin-top: 5px;">Jalan Lagoon Timur, Tangerang Selatan, Banten, 47500.</P>
                </div>
                <div class="col-md-2">
                    <P style="font-size: 15px; color:#fff;margin-top: 40px; font-weight:500;">Menu</P>
                    <div><a href="/" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Home</a></div>
                    <div style="margin-top:8px;"><a href="/product" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Products</a></div>
                    <div style="margin-top:8px;"><a href="/customorder" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Chat</a></div>
                    <div style="margin-top:8px;"><a href="/transaction" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Transactions</a></div>
                </div>
                <div class="col-md-1" style="margin-right: 40px;">
                    <P style="font-size: 15px; color:#fff;margin-top: 40px; font-weight:500;">Others</P>
                    <div><a href="/cart" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Cart</a></div>
                    <div style="margin-top:8px;"><a href="/profile" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">Profile</a></div>
                    <div style="margin-top:8px;"><a href="/about" style="font-size: 15px; color:#fff;margin-top: 5px;opacity:0.5;">About Us</a></div>
                </div>
                <div class="col-md-3">
                    <P style="font-size: 15px; color:#fff;margin-top: 40px;">Phone: +621139836329</P>
                    <P style="font-size: 15px; color:#fff;">Email: adminsupport@createch.id</P>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-2">
                        <a class="text-dark mx-2" style="font-size: 15px;" href=""><i class="fa-brands fa-instagram" style="color: #fff;opacity:0.5;font-size:20px;"></i></a> 
                        </div>
                        <div class="col-md-2">
                        <a class="text-dark mx-2" style="font-size: 15px;" href=""><i class="fa-brands fa-linkedin"style="color: #fff;opacity:0.5;font-size:20px;"></i></a> 
                        </div>
                        <div class="col-md-2">
                        <a class="text-dark mx-2" style="font-size: 15px;" href=""><i class="fa-brands fa-twitter"style="color: #fff;opacity:0.5;font-size:20px;"></i></a> 
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                <P style="font-size: 15px; color:#fff;margin-top: 40px; font-weight:500;">Have a questions?</P>
                <a class="btn btn-chat" href="https://api.whatsapp.com/send/?phone=601139836325&text&app_absent=0">Chat Now!</a>
                </div>
            </div>
        </div>
    </div>
</footer>

@endif



</html>