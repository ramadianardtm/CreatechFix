@extends('layout')
@section('content')
<style>
    .home {
        margin-left: 18rem;
        margin-right: 18rem;
        margin-bottom: 20px;
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
        grid-template-columns: 30% 70%;
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

    /* Card CSS */
    .container {
        position: relative;
        display: flex;
        justify-content: center;
        max-width: 1200px;
        align-items: center;
        flex-wrap: wrap;
        z-index: 1;
    }

    .container .card {
        position: relative;
        width: 280px;
        height: 400px;
        margin: 30px;
        box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.1);
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        border-top: 1px solid rgba(255, 255, 255, 0.5);
        border-left: 1px solid rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(5px);
    }

    .container .card .content {
        padding: 20px;
        text-align: center;
        opacity: 1;
        transition: 0.5s;
    }

    .container .card:hover .content {
        opacity: 1;
    }

    .container .card .content h2 {
        position: absolute;
        top: -80px;
        right: 30px;
        font-size: 8em;
        color: rgba(255, 255, 255, 0.05);
        pointer-events: none;
    }

    .container .card .content h3 {
        font-size: 23px;
        color: #fff;
        z-index: 1;
    }

    .container .card .content p {
        font-size: 1em;
        font-style: italic;
        color: #fff;
        font-weight: 300;
    }
</style>

<div>
    <div class="home justify-content-center text-center">
        <h3 class="display-4">Level Up Your</h3>
        <h3 class="display-4 pb-2">Product & Life.</h3>
    </div>
    <div class="home banner text-center">
        <img src="https://i.ibb.co/Cvx4XqT/Abous-Us-Pic.png">
        <h4 class="pt-5" style="line-height: 40px;">
            “The Internet of Things is the game changer for an overall business ecosystem transformation”</p>
    </div>
    <div class="home banner2 mt-5 pt-5">
        <div class="banner-grid-display align-items-center">
            <div>
                <h3 class="pr-8" style="font-weight: bold;font-size:20px;text-align:right;">IOT changing the world?</h3>
                <p class="pr-8" style="text-align: right;line-height: 32px;">The number of devices expected to be connected to the Internet (IoT) around the world will reach about 38.6 billion in 2025 and 50 billion by 2030 (Statista).
                    In a nutshell, it will result in creating a massive worldwide network of connected devices across various industries.</p>
            </div>
            <div>
                <img style="height: 200px;width:250px;margin-left:-70px;" src="https://i.ibb.co/5jqBTT6/2-1.png">
            </div>
        </div>
    </div>

    <div class="home banner3 pt-5 mt-5">
        <div class="row banner-grid-display3 align-items-center">
            <div class="col">
                <img src="https://i.ibb.co/DfTv0SX/3-1.png" alt="3-1">
            </div>
            <div class="col pl-5">
                <h3 style="font-weight: bold;font-size:20px;">IOT make life easier?</h3>
                <p style="text-align: left;line-height: 32px;">A big reason for the invention of IoT is
                    convenience. Smart devices that automate
                    daily tasks allow humans to do other activities.
                    These devices ultimately lighten people's workload.</p>
            </div>
        </div>
    </div>
    <div class="text-center" style="width: 100%;">

    </div>

    @if (\Illuminate\Support\Facades\Auth::check())
    @if (\Illuminate\Support\Facades\Auth::user()->role == 'admin')

    @else
    <div class="text-center" style="margin-top: 70px;background-color:#141414;padding:20px;">
        <h1 class="text-center p-3 display-4" style="color: #fff;font-size:50px;margin-top:50px;">What They Said</h1>
        <div class="container" style="margin-bottom: 100px;">
            <div class="card">
                <div class="content">
                    <img style="width: 100px; height:100px;border-radius:50%;object-fit:cover;margin-bottom:10px;" src="https://i.ibb.co/zQJdjqv/foto.jpg">
                    <h3>Firzan Ananta</h3>
                    <p>I have been trying to find smart irrigation system for my farm. Thank you.</p>
                    <i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <img style="width: 100px; height:100px;border-radius:50%;object-fit:cover;margin-bottom:10px;" src="https://i.ibb.co/ZfnjJLV/blakelivelycostumeinstitutegalacelebratingyc9ph0f-zwyl.jpg">
                    <h3>Savanna Jacq</h3>
                    <p>Createch really helps me to find what best for my home! Thank you!</p>
                    <i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <img style="width: 100px; height:100px;border-radius:50%;object-fit:cover;margin-bottom:10px;" src="https://i.ibb.co/QJfPF3B/ryan-reynolds-gettyimages-630281680.webp">
                    <h3>Gifino Thoriq</h3>
                    <p>I used to forgot to turn my AC off, but not again all thanks to Createch's Smart AC.</p>
                    <i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i>
                </div>
            </div>
        </div>
        <hr size="1" color="#fff" style="width: 80%;opacity:0.3;">
    </div>
    @endif

    @else
    <div class="text-center" style="margin-top: 70px;background-color:#141414;padding:20px;">
        <h1 class="text-center p-3 display-4" style="color: #fff;font-size:50px;margin-top:50px;">What They Said</h1>
        <div class="container" style="margin-bottom: 100px;">
            <div class="card">
                <div class="content">
                    <img style="width: 100px; height:100px;border-radius:50%;object-fit:cover;margin-bottom:10px;" src="https://i.ibb.co/zQJdjqv/foto.jpg">
                    <h3>Firzan Ananta</h3>
                    <p>I have been trying to find smart irrigation system for my farm. Thank you.</p>
                    <i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <img style="width: 100px; height:100px;border-radius:50%;object-fit:cover;margin-bottom:10px;" src="https://i.ibb.co/ZfnjJLV/blakelivelycostumeinstitutegalacelebratingyc9ph0f-zwyl.jpg">
                    <h3>Savanna Jacq</h3>
                    <p>Createch really helps me to find what best for my home! Thank you!</p>
                    <i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i>
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <img style="width: 100px; height:100px;border-radius:50%;object-fit:cover;margin-bottom:10px;" src="https://i.ibb.co/QJfPF3B/ryan-reynolds-gettyimages-630281680.webp">
                    <h3>Gifino Thoriq</h3>
                    <p>I used to forgot to turn my AC off, but not again all thanks to Createch's Smart AC.</p>
                    <i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i><i class="fa-solid fa-star" style="color: #ffdd44;"></i>
                </div>
            </div>
        </div>
        <hr size="1" color="#fff" style="width: 80%;opacity:0.3;">
    </div>
    @endif
</div>

@endsection