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
        <div class="flex">
            @if (\Illuminate\Support\Facades\Auth::check())
            @if (\Illuminate\Support\Facades\Auth::user()->role == 'admin')
            <h4 style="font-weight: 800; margin-bottom:20px;">Manage Products</h4>
            @endif
            @else
            <h4 style="font-weight: 800; margin-bottom:20px;">Available Products</h4>
            @endif
            <form action="/search" method="post" class="row">
                @csrf
                <div class="d-flex col-md-4 justify-content-between">
                    <input name="search" type="text" class="form-control" placeholder="Search...">
                </div>
                <button type="submit" class="btn btn-signin btn-light">Search</button>
                @if (\Illuminate\Support\Facades\Auth::check())
                @if (\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                <a href="/add" class="btn btn-light btn-add" style="margin-left: 460px">Add Product</a>
                @endif
                @endif
            </form>

        </div>

        <div class="product-grid">
            @foreach ($product as $pr)

            <!-- Popup modal Signout -->
            <div class="modal fade" id="deleteproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure to Delete?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a type="button" class="btn btn-primary" style="color: #fff;" href="/remove/{{ $pr->id }}">Confirm</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Popup modal end -->

            <div class="card mx-1 mt-4" style="width: 15rem;">
                <a href="/detail/{{ $pr->id }}">
                    <div class="rounded"><img style="height:150px; object-fit:cover;"  src="/storage/{{ $pr->image }}" class="card-img-top p-4 rounded" alt="Product Image">
                    </div>
                    <div class="card-body">
                        <p class="card-text" style="font-size: 18px;">{{ $pr->name }}</p>
                        <div class="pb-1" style="font-weight: 700;">
                            IDR {{ $pr->price }}
                        </div>
                        <?php $cat = App\Models\Category::find($pr->category_id); ?>
                        <div class="pb-4" style="font-weight: 500; color:#494949;">
                            {{ $cat->name }}
                        </div>
                        @if (\Illuminate\Support\Facades\Auth::check())

                        @if (\Illuminate\Support\Facades\Auth::user()->role == 'member')
                        <a href="/detail/{{ $pr->id }}" class="text-primary">Add To Cart</a>
                        @else
                        <div class="d-flex" style="justify-content: end;">
                            <a href="/edit/{{ $pr->id }}" class="btn btn-edit">Edit</a>
                            <a class="btn icon-del" data-toggle="modal" data-target="#deleteproduct"><i class="fa-regular fa-trash-can" style="color: tomato;font-size:18px"></i></a>
                        </div>
                        @endif
                        @endif
                    </div>
                </a>

            </div>

            @endforeach


        </div>
        <div class="d-flex mt-4">
            {{ $product->links('pagination::bootstrap-4') }}
        </div>

    </div>

</div>
@endsection