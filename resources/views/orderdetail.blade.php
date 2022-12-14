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

    .customorder {
        padding: 50px;
        border-radius: 8px;
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
    }
</style>
<div style="margin-bottom: 100px;">
    <?php $total_price = 0; ?>


    <div class="banner1" style="margin-top: 50px;">
        <div class="container customorder">
            <?php $trandet = App\Models\DetailTransaction1::all()->where('transaction_id', $data->id); ?>
            <div class="row">
                <div class="col-md-6">
                <h4 style="font-weight: bold; font-size:30px;margin-bottom:5px;">Your Invoice</h4>
                </div>
                <div class="col-md-6">
                <img style="height:100px;width:200px;position:absolute;padding-bottom:60px;object-fit: cover;" src="https://i.ibb.co/0YWcnqy/illustration-of-barcode-vector-removebg-preview.png" alt="illustration-of-barcode-vector-removebg-preview" border="0">
                </div>
            </div>
            <hr size="2" color="#000">
            <span><b>Order ID :</b> {{$data['id']}} </span><br>
            <span><b>Transaction Date :</b> {{$data['created_at']}} </span>
            <br>
            @foreach ($trandet as $pd)
            <?php $product_info = App\Models\User::find($pd->user_id); ?>
            @endforeach
            <span><b>Recipient :</b> {{ $product_info->name }}</span>
            <table class="table table-bordered" style="margin-top: 20px;font-size:14px;">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price (IDR)</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Subtotal (IDR)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trandet as $td)
                    <?php $product_info = App\Models\Product::find($td->product_id); ?>
                    <tr>
                        <td scope="row">{{ $product_info->name }}</td>
                        <td>{{ $product_info->price }}</td>
                        <td>{{ $td->quantity }}</td>
                        <td>{{ $td->quantity * $product_info->price }}</td>
                    </tr>
                    <?php $total_price += $td->quantity * $product_info->price; ?>

                    @endforeach

                </tbody>
            </table>
            @foreach ($trandet as $pd)
            <?php $product_info = App\Models\PaymentCatMethod::find($pd->payment_id); ?>
            @endforeach
            <div class="mb-1"><a style="font-weight: bold;">Payment Method : </a> {{ $product_info->name }}</div>

            @foreach ($trandet as $pd)
            <?php $product_info = App\Models\DeliveryOptions::find($pd->delivery_id); ?>
            @endforeach
            <div class="mb-1"><a style="font-weight: bold;">Delivery : </a> {{ $product_info->name }}</div>
            <div class="mt-5"><a style="font-weight: bold;">Total Price : IDR</a> {{ $total_price }}</div>
            <div><a style="font-weight: bold;">Status : </a> PAID</div>
            <a href="invoice{{$data['id']}}" class="btn btn-order">Download Invoice</a>
            <br>
            <br>
            <!-- <a role="button" class="btn btn-order" href="https://api.whatsapp.com/send/?phone=601139836325&text&app_absent=0">Contact Now!</a> -->
        </div>
    </div>
</div>


@endsection