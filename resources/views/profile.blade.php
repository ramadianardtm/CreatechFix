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

    .btn-success {
        background-color: #1e87c3;
        border: none;
    }

    .btn-success:hover {
        background-color: #0065a1;
        border: none;
    }
    .btn-edit {
        height: fit-content;
        width: 120px;
        border-radius: 4px;
        background-color: #000;
        color: #fff;
        font-weight: 500;
    }

    .btn-edit:hover {
        width: 120px;
        font-weight: 700px;
        border-radius: 4px;
        background-color: #b6b6b6;
        color: #fff;
    }

    .btn-signout {
        height: fit-content;
        width: 120px;
        border-radius: 4px;
        border: solid 1px #ff5858;
        background-color: #fff;
        color: #ff5858;
        font-weight: 500;
    }

    .btn-signout:hover {
        width: 120px;
        font-weight: 700px;
        border-radius: 4px;
        border: solid 1px #ff5858;
        background-color: #ff5858;
        color: #fff;
    }

</style>
<div class="container">
    <h1 class="text-center p-3 titleheader">Your Profile</h1>
    <div class="card" style="margin-bottom: 100px;">
        <div class="card-body update-grid">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                <div class="alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <div class="form-group">
                    <!-- <label for="exampleFormControlFile1">Profile Picture</label> -->
                    @if ($user->image == '')
                    <center>
                        <img style="width: 150px; height:150px;border-radius:50%;object-fit:cover;" src="https://i.ibb.co/Dbf3Fj9/blank-profile-picture-973460-960-720-300x300.png">
                    </center>
                    @else
                    <center>
                        <img style="width: 150px; height:150px;border-radius:50%;object-fit:cover;" src="/storage/{{ $user->image }}">
                    </center>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input readonly value="{{ $user->name }}" type="text" class="form-control" placeholder="Name" name="name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input readonly value="{{ $user->email }}" type="email" class="form-control" placeholder="Email" name="email">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Password</label>
                    <input readonly type="password" class="form-control" placeholder="Password" name="password">
                </div>

                <div class="form-group">
                    <label for="description">Address</label>
                    <textarea readonly class="form-control" name="address" rows="4" placeholder="Address">{{ $user->address }}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input readonly value="{{ $user->phone }}" type="text" class="form-control" placeholder="Phone number" name="phone">
                </div>

                <div class="form-group mt-5"  style="float: right;">
                    <a href="/updateprofile" class="btn btn-edit">Edit</a>
                    <a href="/logout" class="btn btn-signout mx-2">Sign Out</a>
                </div>

            </form>
        </div>
    </div>
    @endsection