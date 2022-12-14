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
        margin-top: 20px;
        border-radius: 20px;
        box-shadow: 2px 2px 4px #c5c5c5;
        margin-left: 20rem;
        margin-right: 20rem;
        padding: 10px;
    }

    label {
        color: #3e3d3b;
        font-size: 15px;
        font-weight: bold;
    }

    .form-control {
        border-radius: 8px;
        color: #000;
        font-size: 15px;
    }

    .btn-login {
        background-color: #1e87c3;
        border-radius: 10px;
        color: #fff;
        font-weight: 400;
    }

    .btn-login:hover {
        background-color: #43afed;
        color: #fff;
        font-weight: 400;
    }

    .titleheader {
        font-weight: 800;
        font-size: 55px;
    }
</style>
<div class="container">
    <h1 class="text-center pb-2 titleheader">Sign Up</h1>
    <p class="text-center" style="color: #000; font-size:15px;">Already have an account?
        <a href="/login" style="color: #1e57d6; font-size: 15px">Log In</a>
    </p>
    <div class="card logincard" style="margin-bottom:100px;">
        <div class="card-body update-grid">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Profile Picture</label>
                    <input type="file" name="image" onchange="loadFile(this)" class="form-control-file" id="image">
                    <span style="font-size: 12px;font-style:italic;color:#1e57d6">*optional</span>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm">
                </div>

                <div class="form-group">
                    <label for="description">Address</label>
                    <textarea class="form-control" name="address" rows="4" placeholder="Address"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input type="text" class="form-control" placeholder="Phone number" name="phone">
                </div>

                @if ($errors->any())
                <div class="alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <div class="form-group">
                    <button type="submit" style="margin-top: 20px;" class="btn btn-block btn-login">Create Account</button>
                </div>

            </form>
        </div>
    </div>
    @endsection
    <script>
        var loadFile = function(e) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>