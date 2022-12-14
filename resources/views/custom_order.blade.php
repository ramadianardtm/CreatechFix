@extends('layout')
@section('content')

<style>
    .home {
        margin-left: 18rem;
        margin-right: 18rem;
    }

    .banner1 {
        width: 100%;
        padding-left: 25rem;
        padding-right: 25rem;

    }

    .banner2 {
        width: 100%;
        padding: 25px;
        padding-left: 25px;
        padding-right: 25px;

    }

    .btn-order:hover {
        width: 200px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
    }

    .btn-order {
        width: 200px;
        margin-top: 30px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }
    .customorder{
        padding: 50px;
        border-radius: 8px;
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
    }
</style>
<div style="margin-bottom: 100px;">
<h4 style="font-weight: bold; font-size:46px;text-align:center;margin-top:30px;">Contact Us</h4>
    <div class="banner1 text-center" style="margin-top: 50px;">
        <div class="container customorder">
            <b>Createch offers the custom order for the Createch user.  The products that Createch based on commissioned, personalized, customized,  
                and manufactured to meet the user specific needs. </b>
            <br>
            <br>
            <p>YOUR NEEDS IS ONE CLICK AWAY</p>
            <a role="button" class="btn btn-order" href="https://api.whatsapp.com/send/?phone=601139836325&text&app_absent=0">Contact Now!</a>
        </div>
    </div>
    <div class="home">
        <div class="banner2 text-center">
        </div>
    </div>
</div>


@endsection