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

    </style>
    <div class="container">
        <div class="card">
            <div class="card-body update-grid">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Photo</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Price</label>
                        <input type="number" class="form-control" placeholder="price" name="price">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stock</label>
                        <input type="number" class="form-control" placeholder="stock" name="stock">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Category</label><br>
                        <select name="category">
                            <option value="1">Pick here</option>
                        </select>
                    </div>

                    <div class="form-group mt-5">
                        <button type="button" class="btn btn-light border-secondary">Cancel</button>
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>

                </form>
            </div>
        </div>
    @endsection
