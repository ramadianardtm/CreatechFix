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
        .btn-add {
        width: 140px;
        border-radius: 4px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }
    .btn-add:hover {
        width: 140px;
        border-radius: 4px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #a4a4a4;
        background-color: #a4a4a4;
        color: #fff;
    }

    </style>
    <div class="category-container">
        <h4 style="font-size:28px;font-weight: bold;">Your Cart</h4>
        <br>
        @if ($cart->count() == 0)
        <div class="text-center" style="padding: 60px;margin-bottom:50px;">
            <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
            <br>
            <h5 style="margin-top: 20px;font-weight:bold;">Your cart is empty, please shop more !</h5>
        </div>
        @else
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price (IDR)</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Subtotal (IDR)</th>
                    </tr>
                </thead>
                <?php $total_price = 0; ?>
                <tbody>
                    @foreach ($cart as $ca)
                        <?php $product_info = App\Models\Product::find($ca->product_id); ?>
                        <tr>
                            <th scope="row">{{ $product_info->name }}</th>
                            <td>{{ $product_info->price }}</td>
                            <td>{{ $ca->quantity }}</td>
                            <td>{{ $ca->quantity * $product_info->price }}</td>
                        </tr>
                        <?php $total_price += $ca->quantity * $product_info->price; ?>

                    @endforeach

                </tbody>
            </table>
            <b>Total : IDR {{ $total_price }}</b>
            <br>
            <br>
            <div class="w-100" style="margin-bottom: 100px;">
            <a href="/checkout" class="btn btn-add w-25 mt-2" style="float:right;">CHECK OUT</a>
            </div>

        @endif
    </div>
@endsection
