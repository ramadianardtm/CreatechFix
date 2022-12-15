@extends('layout')

@section('content')
<style>
    .product-grid {
        display: grid;
        grid-template-columns: auto auto auto auto;
        color: black;
    }

    .product-grid a {
        text-decoration: none;
        color: black;
    }

    .btn-edit {
        height: fit-content;
        width: 80px;
        border-radius: 30px;
        border: 2px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
        font-weight: 500;
    }

    .btn-edit:hover {
        font-weight: 700px;
        border-radius: 30px;
        border: 2px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }

    .btn-signin {
        height: fit-content;
        width: 120px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
        font-weight: 500;
    }

    .btn-signin:hover {
        width: 120px;
        font-weight: 700px;
        border-radius: 30px;
        border: 1px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }

    .btn-add {
        width: 130px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }

    .btn-add:hover {
        width: 130px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #a4a4a4;
        background-color: #a4a4a4;
        color: #fff;
    }

    .icon-edit:hover {
        color: #37c1f0;
    }

    .icon-del:hover {
        color: #a11313;
    }
</style>
<div class="main-box" style="margin-bottom: 100px;margin-top:30px;">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h4><b>Search Result : </b> {{ $search }}</h4>
            <form action="/search" method="post" class="row">
                @csrf
                <div class="col-md-8">
                    <input name="search" type="text" class="form-control" placeholder="Search...">
                </div>
                <button type="submit" class="btn btn-signin btn-light">Search</button>
            </form>
        </div>

        @if ($product->count() == 0)
        <div class="text-center" style="padding: 60px;margin-bottom:50px;">
            <a href=""><i class="fas fa-exclamation-circle" style="font-size: 100px;color:#ffec58"></i></a>
            <br>
            <h5 style="margin-top: 20px;font-weight:bold;">No product match</h5>
        </div>
        @else
        <div class="product-grid">
            @foreach ($product as $pr)
            <div class="card mx-1 mt-4" style="width: 15rem;">
                <a href="/detail/{{ $pr->id }}">
                    <div class="rounded"><img src="/storage/{{ $pr->image }}" style="height:150px; object-fit:cover;border-radius:27px;" class="card-img-top p-4" alt="Flower Image">
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="font-weight: 500; color:#494949;">{{ $pr->name }}</p>
                        <div style="font-weight: 700;">
                            IDR {{ $pr->price }}
                        </div>
                        <?php $cat = App\Models\Category::find($pr->category_id); ?>
                        <div class="pb-4">
                            {{ $cat->name }}
                        </div>
                        @if (\Illuminate\Support\Facades\Auth::check())
                        @if (\Illuminate\Support\Facades\Auth::user()->role == 'member')
                        <a href="/detail/{{ $pr->id }}" class="text-primary">Add To Cart</a>
                        @else
                        <div class="w-100">
                            <a href="/edit/{{ $pr->id }}" class="btn btn-edit ">Edit</a>
                            <a href="/remove/{{ $pr->id }}" class="btn icon-del"><i class="fa-regular fa-trash-can" style="color: tomato;font-size:18px"></i></a>
                            <!-- <a href="/remove/{{ $pr->id }}" class="btn btn-danger ">Remove</a> -->
                        </div>
                        @endif
                        @endif
                    </div>
                </a>
            </div>

            @endforeach


        </div>
        @endif

    </div>

</div>
@endsection