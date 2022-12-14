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

        img {
            width: 15rem;
        }

    </style>
    <div class="container">
        <div class="card">
            <div class="card-body update-grid">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <center>
                            <img src="/storage/{{ $product->image }}">
                        </center>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Photo</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name"
                            value="{{ $product->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Price</label>
                        <input value="{{ $product->price }}" type="number" class="form-control" placeholder="Price"
                            name="price">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stock</label>
                        <input value="{{ $product->stock }}" type="number" class="form-control" placeholder="stock"
                            name="stock">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="3"
                            placeholder="Description">{{ $product->description }}
                                                                                                                                                </textarea>
                    </div>


                    @if ($errors->any())
                        <div class="alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="form-group mt-5">
                        <a href="/product" class="btn btn-light border-secondary">Cancel</a>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>

                </form>
            </div>
        </div>
    @endsection
