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

    .btn-confirm {
        width: 140px;
        border-radius: 4px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }

    .btn-confirm:hover {
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
    <h4 style="font-size:28px;font-weight: bold;">Please confirm your order</h4>
    <br>
    @if ($cart->count() == 10)
    <p>Your cart is empty, please shop more !</p>
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
        <tbody>
            @foreach ($cart as $ca)
            <?php $product_info = App\Models\Product::find($ca->product_id); ?>
            <tr>
                <th scope="row">{{ $product_info->name }}</th>
                <td>{{ $product_info->price }}</td>
                <td>{{ $ca->quantity }}</td>
                <td>{{ $ca->quantity * $product_info->price }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <?php $total_price = 0; ?>
    <?php $product_info = App\Models\Product::find($ca->product_id); ?>
    @foreach ($cart as $ca)
    <?php $total_price += $ca->quantity * $product_info->price; ?>
    @endforeach
    <div class="row">
        <div class="col-md-2" style="margin-right: -30px;">
            <span style="font-weight:bold;">Total price</span>
        </div>
        <div class="col-md-1" style="margin-right: -50px;">
            <a>:</a>
        </div>
        <div class="col-md-9">
            <a style="color:#2986cc;font-weight:bold;">IDR {{ $total_price }}</a>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-2" style="margin-right: -30px;">
            <a style="font-weight:bold;">Ship to</a>
        </div>
        <div class="col-md-1" style="margin-right: -50px;">
            <a>:</a>
        </div>
        <div class="col-md-9">
            <a style="font-weight:bold;color:#2986cc;">{{ $user->address }}</a>
        </div>
    </div>
    <form action="" method="post">
        @csrf
        <div class="form-group w-26" style="margin-top:20px;">
            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" style="font-weight:bold;">Payment Method</label><br>
                    <select class="form-control" name="payment" style="margin-bottom: 15px;">
                        <?php $cat = App\Models\PaymentCatMethod::all(); ?>
                        <option value="0">Select payment</option>
                        @foreach ($cat as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" style="font-weight:bold;">Delivery Options</label><br>
                    <select class="form-control" name="delivery" style="margin-bottom: 15px;">
                        <?php $cat = App\Models\DeliveryOptions::all(); ?>
                        <option value="0">Select delivery</option>
                        @foreach ($cat as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <label for="exampleFormControlInput1"><a style="font-weight:bold;">Please enter the code : </a><a style="color:#2986cc;font-weight:bold;">TR354</a></label>
            <input type="text" class="form-control" placeholder="XXXXX" name="code">
            <input type="hidden" class="form-control" placeholder="XXXXX" name="correct" value="TR354">
        </div>
        @if ($errors->any())
        <div class="alert-danger" style="margin-bottom: 10px;">
            {{ $errors->first() }}
        </div>
        @endif
        <!-- <button type="submit" class="btn btn-add w-25">CONFIRM</button> -->
        <div class="w-100" style="margin-bottom:130px">
        <button type="button" style="float:right;" class="btn btn-add w-25 mt-4" data-toggle="modal" data-target="#checkoutmodal">CHECKOUT</button>
        </div>
        <!-- Popup modal Checkout -->
        <div class="modal fade" id="checkoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Checkout Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <a style="font-weight:bold;">Product : </a>
                        @foreach ($cart as $ca)
                        <div class="mt-1">
                            <?php $product_info = App\Models\Product::find($ca->product_id); ?>
                            <a style="font-weight:400;">{{ $product_info->name }}</a>
                        </div>
                        <?php $total_price += $ca->quantity * $product_info->price; ?>
                        @endforeach
                        <div class="mt-2">
                            <span style="font-weight:bold;">Delivery Address : </span>
                            <span style="font-weight:bold;color:#2986cc;">{{ $user->address }}</span>
                        </div>
                        <div class="mt-2">
                            <span style="font-weight:bold;">Total Price : </span>
                            <span style="font-weight:bold;color:#2986cc;">IDR {{ $total_price }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-confirm w-25">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popup modal end -->

    </form>
    @endif
</div>
@endsection