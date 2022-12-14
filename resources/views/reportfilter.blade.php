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
    .btn-signin {
        height: fit-content;
        width: 80px;
        border-radius: 8px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
        font-weight: 500;
    }

    .btn-signin:hover {
        width: 80px;
        font-weight: 700px;
        border-radius: 8px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }
</style>
<div class="category-container">
<div class="row">
        <div class="col-md-11">
            <h4 style="font-weight: bold; font-size:25px;">Your Sales Report</h4>
        </div>
        <div class="col-md-1">
            <button type="button"  name="searchdate" title="Search" class="btn" style="background: #fff;" data-toggle="modal" data-target="#filtermodal"><i class="fa-solid fa-filter" style="font-size:20px; color:#000;opacity:0.9;"></i></button>
        </div>
    </div>
    <hr size="2" color="#000">
    <!-- Popup modal Filter -->
    <div class="modal fade bd-example-modal-lg" id="filtermodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Filter Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 style="font-weight: bold; font-size:18px;">Filter by date</h4>
                    <form action="/reportfilter" method="POST">
                        @csrf
                        <br>
                        <div class="row mb-5" style="margin-top: -20px; padding:10px;">
                            <div class="container-fluid">
                                <div class="form-group row">
                                    <label for="date" class="col-form-label col-sm-2">Order From</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control input-sm" style="cursor: pointer;" id="fromDate" name="fromDate" required />
                                    </div>
                                    <label for="date" class="col-form-label col-sm-2">Order To</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control input-sm" style="cursor: pointer;" id="toDate" name="toDate" required />
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-signin btn-light" title="Search">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Popup modal end -->


    @if ($transaction->count() == 0)
    <p>No sales on these date!</p>
    @else
    @foreach ($transaction as $tran)
    <?php $total_price = 0; ?>
    Transaction Date : {{ $tran->created_at }}
    <table class="table">
        <thead class="thead-dark">
            <?php $trandet = App\Models\DetailTransaction1::all()->where('transaction_id', $tran->id); ?>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price(IDR)</th>
                <th scope="col">Qty</th>
                <th scope="col">Subtotal(IDR)</th>
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
    @foreach ($trandet as $pd)
    <?php $product_info = App\Models\User::find($pd->user_id); ?>
    @endforeach
    @foreach ($trandet as $pd)
    <?php $payment_info = App\Models\PaymentCatMethod::find($pd->payment_id); ?>
    @endforeach
    @foreach ($trandet as $pd)
    <?php $delivery_info = App\Models\DeliveryOptions::find($pd->delivery_id); ?>
    @endforeach
    <div class="row">
        <div class="col-md-4">
            <div class="mb-1"><a style="font-weight: bold;">Buyer Name : </a> {{ $product_info->name }}</div>
        </div>
        <div class="col-md-5">
            <div class="mb-1"><a style="font-weight: bold;">Payment Method : </a> {{ $payment_info->name }}</div>
        </div>
        <div class="col-md-3">
            <div class="mb-1"><a style="font-weight: bold;">Delivery : </a> {{ $delivery_info->name }}</div>
        </div>
    </div>
    <div class="mb-1 mt-2"><a style="font-weight: bold;">Total Price IDR</a> {{ $total_price }}</div>
    <hr size="3" color="#000">
    </hr>
    @endforeach
    @endif
</div>
@endsection