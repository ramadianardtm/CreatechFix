@extends('layout')

@section('content')
    <style>
        .detail {
            margin-left: 18rem;
            margin-right: 18rem;
        }

        .banner img {
            width: 100%;
        }

        .banner-grid-display {
            display: grid;
            grid-template-columns: 70% 30%;
        }

        .banner-grid-display3 {
            display: grid;
            grid-template-columns: 30% 45% 25%;
        }

        .banner-grid-display3 img {
            width: 100%;
        }

        .banner-grid-display img {
            width: 100%;
        }

        .pr-8 {
            padding-right: 8rem;
        }

        .pl-8 {
            padding-left: 8rem;
        }

        .logincard {
            margin-top: 30px;
            border-radius: 20px;
            height: 300px;
            box-shadow: 2px 2px 4px #c5c5c5;
            margin-left: 20rem;
            margin-right: 20rem;
            padding: 10px;
        }
        .form-control{
            border-radius: 8px;
        }
        .btn-login{
            background-color: #1e87c3;
            border-radius: 10px;
            color: #fff;
            font-weight: 400;
        }
        .btn-login:hover{
            background-color: #43afed;
            color: #fff;
            font-weight: 400;
        }
        label{
            color:#3e3d3b; 
            font-size: 15px; 
            font-weight:bold;
        }

    </style>
    <div class="container">
        <h1 class="text-center pb-2" style="font-weight: 800; font-size: 55px">Log In</h1>
        <p class="text-center" style="color: #000; font-size:15px;">Don't have an account? 
                        <a href="/register" 
                      style="color: #1e57d6; font-size: 15px">Register here</a></p>
        <div class="card logincard" style="margin-bottom:100px;">
            <div class="card-body update-grid">
                <form action="" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" style="color: #000;" placeholder="Email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" class="form-control" style="color: #000;" placeholder="Password" name="password">
                    </div>
                    @if ($errors->any())
                        <div class="alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <div style="padding-top: 10px;">
                        <button type="submit" class="btn btn-block btn-login">Log In</button>
                   </div>

                </form>
            </div>
        </div>
    @endsection
