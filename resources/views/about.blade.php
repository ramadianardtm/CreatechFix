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
        .box-banner{
        padding: 50px;
        width: 50%;
        border-radius: 8px;
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
    }

    </style>
    <div>
    <h4 style="font-weight: bold; font-size:46px;text-align:center;margin-top:30px;">About Us</h4>
        <div class="container text-center box-banner" style="margin-top: 50px;">
            <b>"Createch is an online ecommerce website that sells Internet of Things Devices or well 
                known as IoT. The website covered a rich selection of IoT products."</b>
            <br>
            <br>
            <p>Ramadian Arditama / CEO Createch </p>
        </div>
        <div class="home" style="margin-bottom: 100px;">
            <div class="banner2 d-flex justify-content-around" style="margin-top:120px;">
                <div>
                    <h3>Get In Touch</h3>
                </div>
                <div>
                    <div>
                        <b>Sales Inquiry</b>
                        <div>sales@createch.com</div>
                        <p>+62 (021) 840-7229 ext 1</p>
                    </div>
                    <br>
                    <div>
                        <b>B2b</b>
                        <div>b2b@createch.com</div>
                        <p>+62 (021) 840-7229 ext 1</p>
                    </div>
                </div>
                <div>
                    <b>Customer Service</b>
                    <div>cs@createch.com</div>
                    <p>+62 (021) 840-7229 ext 1</p>
                </div>
            </div>

            <div class="banner2 d-flex justify-content-around mt-5">
                <div>
                    <h3>Locations</h3>
                </div>
                <div>
                    <div>
                        <b>Jakarta</b>
                        <div>Jl. Rawa Belong No.420</div>
                        <p>11420</p>
                    </div>
                    <br>
                    <div>
                        <b>Karawang</b>
                        <div>Jl. Ciputat Timur No.520</div>
                        <p>11220</p>
                    </div>
                </div>
                <div>
                    <b>Bandung</b>
                    <div>Jl. Salendro Timur No.4</div>
                    <p>16214</p>
                </div>
            </div>
        </div>
    </div>


@endsection
