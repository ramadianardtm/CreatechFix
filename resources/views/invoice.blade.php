<!-- <style>
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
</style> -->
<style>
    html,
    body {
        margin: 10px;
        padding: 10px;
        font-family: sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    span,
    label {
        font-family: sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0px !important;
    }

    table thead th {
        height: 28px;
        text-align: left;
        font-size: 16px;
        font-family: sans-serif;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 14px;
    }

    .heading {
        font-size: 24px;
        margin-top: 12px;
        margin-bottom: 12px;
        font-family: sans-serif;
    }

    .small-heading {
        font-size: 18px;
        font-family: sans-serif;
    }

    .total-heading {
        font-size: 18px;
        font-weight: 700;
        font-family: sans-serif;
    }

    .order-details tbody tr td:nth-child(1) {
        width: 20%;
    }

    .order-details tbody tr td:nth-child(3) {
        width: 20%;
    }

    .text-start {
        text-align: left;
    }

    .text-end {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .company-data span {
        margin-bottom: 4px;
        display: inline-block;
        font-family: sans-serif;
        font-size: 14px;
        font-weight: 400;
    }

    .no-border {
        border: 1px solid #fff !important;
    }

    .bg-blue {
        background-color: #1e1e1e;
        color: #fff;
    }
</style>

<body>
    <?php $total_price = 0; ?>
    <?php $trandet = App\Models\DetailTransaction1::all()->where('transaction_id', $data->id); ?>
    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <img class="text-start" style="width: 200px; height:100px;position:absolute;" src="https://i.ibb.co/JCtkv8p/Createch-Logo-Fix.png" alt="">
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: INV29183910</span> <br>
                    <span>Date: {{$data['created_at']}}</span> <br>
                    <span>Zip code : 47500</span> <br>
                    <span>Address: Jalan Lagoon Timur, Tangerang Selatan, Banten, Indonesia.</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        @foreach ($trandet as $pd)
        <?php $product_info = App\Models\User::find($pd->user_id); ?>
        @endforeach
        @foreach ($trandet as $pd)
        <?php $payment_info = App\Models\PaymentCatMethod::find($pd->payment_id); ?>
        @endforeach
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{$data['id']}}</td>

                <td>Full Name:</td>
                <td>{{ $product_info->name }}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>funda-CRheOqspbA</td>

                <td>Email Id:</td>
                <td>{{ $product_info->email }}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{$data['created_at']}}</td>

                <td>Phone:</td>
                <td>{{ $product_info->phone }}</td>
            </tr>
            <tr>
                <td>Payment Method:</td>
                <td>{{ $payment_info->name }}</td>

                <td>Address:</td>
                <td>{{ $product_info->address }}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>completed</td>

                <td>Pin code:</td>
                <td>TR354</td>
            </tr>
        </tbody>
    </table>

    <!--  Table Createch -->
    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th scope="col">ID</th>
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
                <td width="10%">{{ $product_info->id }}</td>
                <td scope="row">{{ $product_info->name }}</td>
                <td>{{ $product_info->price }}</td>
                <td>{{ $td->quantity }}</td>
                <td>{{ $td->quantity * $product_info->price }}</td>
            </tr>
            <?php $total_price += $td->quantity * $product_info->price; ?>
            @endforeach
            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">IDR{{ $total_price }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank you for shopping with Createch
    </p>
    <!-- Table Createch end -->
</body>