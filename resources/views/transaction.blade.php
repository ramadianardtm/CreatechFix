@extends('layout')

@section('content')
<style>
    .category-container {
        margin-left: 18rem;
        margin-right: 18rem;
    }

    .category-grid {
        display: grid;
        grid-template-columns: auto auto auto auto;
    }
</style>


<div class="category-container"style="margin-bottom: 100px;">
    <h4 style="font-weight: bold; font-size:28px;">Your Transaction Histories</h4>
    <br>
    @if ($transaction->count() == 0)
    <p>Your transaction is empty, please shop more !</p>
    @else
    @foreach ($transaction as $tran)
    <?php $total_price = 0; ?>
    Transaction Date : {{ $tran->created_at }}
    <table class="table">
        <thead class="thead-dark">
            <?php $trandet = App\Models\DetailTransaction1::all()->where('transaction_id', $tran->id); ?>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price (IDR)</th>
                <th scope="col">Qty</th>
                <th scope="col">Total (IDR)</th>
                <th scope="col"><a href="order{{$tran['id']}}"><i style="font-size: 20px;cursor:pointer;color:white;" class="fa-solid fa-receipt"></i></a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trandet as $td)
            <?php $product_info = App\Models\Product::find($td->product_id); ?>
            <tr>
                <th scope="row">{{ $product_info->name }}</th>
                <td>{{ $product_info->price }}</td>
                <td>{{ $td->quantity }}</td>
                <td>{{ $td->quantity * $product_info->price }}</td>
            </tr>
            <?php $total_price += $td->quantity * $product_info->price; ?>

            @endforeach

        </tbody>
    </table>
    <div class="row">
        <div class="col-md-5">
            <div class="mb-1"><a style="font-weight: bold;">Subtotal : IDR</a> {{ $total_price }}</div>
        </div>
        <div class="col-md-4">
            @foreach ($trandet as $pd)
            <?php $product_info = App\Models\PaymentCatMethod::find($pd->payment_id); ?>
            @endforeach
            <div class="mb-1"><a style="font-weight: bold;">Payment Method : </a> {{ $product_info->name }}</div>
        </div>
        <div class="col-md-3">
            @foreach ($trandet as $pd)
            <?php $product_info = App\Models\DeliveryOptions::find($pd->delivery_id); ?>
            @endforeach
            <div class="mb-1"><a style="font-weight: bold;">Delivery : </a> {{ $product_info->name }}</div>
        </div>
    </div>
    <hr size="3" color="#000">
    </hr>
    @endforeach
    @endif
</div>
@endsection