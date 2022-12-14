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
        .btn-add {
        width: 140px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }

    .btn-add:hover {
        width: 140px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #a4a4a4;
        background-color: #a4a4a4;
        color: #fff;
    }

    </style>
    <div class="detail">
        <div class="home banner3 pt-2 mt-5" style="margin-bottom: 100px;">
            <div class="banner-grid-display3 align-items-center">
                <div>
                    <img src="/storage/{{ $detail->image }}" class="card-img-top p-4 rounded" alt="Flower Image">
                </div>
                <div class="pl-5">
                    <h3>{{ $detail->name }}</h3>
                    <p>{{ $detail->description }}
                    </p>
                    <p>Stock : {{ $detail->stock }}</p>
                    <?php $category = App\Models\Category::find($detail->category_id); ?>

                    <p>Category : <i>{{ $category->name }}</i></p>
                </div>
                @if (\Illuminate\Support\Facades\Auth::check())

                    @if (\Illuminate\Support\Facades\Auth::user()->role == 'member')
                        <div>
                            <form action="" method="post" class="pl-5">
                                @csrf
                                <div class="form-group w-10">
                                    <input type="number" class="form-control" placeholder="Qty" name="qty">
                                </div>
                                <div class=" form-group mt-3">
                                    <button type="submit" class="btn btn-add">Add To Cart</button>
                                </div>
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
