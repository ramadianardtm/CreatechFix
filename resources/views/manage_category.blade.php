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
        .btn-cat {
        height: fit-content;
        display: inline-block;
        cursor: default;
        width: 200px;
        border-radius: 30px;
        border: 2px;
        border-style: solid;
        border-color: #000;
        background-color: #fff;
        color: #000;
        font-weight: 500;
    }
    .btn-add {
        width: 150px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #000;
        background-color: #000;
        color: #fff;
    }

    .btn-add:hover {
        width: 150px;
        border-radius: 30px;
        border: 2px;
        font-weight: 700px;
        border-style: solid;
        border-color: #a4a4a4;
        background-color: #a4a4a4;
        color: #fff;
    }

    </style>
    <div class="category-container">
        <b style="font-size: 17px; font-weight: 900;">Available Category</b>
        <br>
        <div class="category-grid text-center pt-4">
            @foreach ($category as $cat)
                <div class="mx-2 p-1 mt-2">
                    <a role="button" class="btn btn-cat" style="cursor: default;">{{ $cat->name }}</a>
                </div>
            @endforeach
        </div>
        <br>
        <div class="mt-5"></div>
        <b style="font-size: 17px; font-weight: 900;">Add New Category</b>
        <form action="" method="post">
            @csrf
            <div class="form-group pt-4 d-flex">
                <label class="mt-2"for="exampleFormControlInput1" style="color: #646464; font-weight:bold;">Category Name</label>
                <input type="text" class="form-control w-25 mx-3" placeholder="Enter Category" name="name">
            </div>
            @if ($errors->any())
                <div class="alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            <button type="submit" class="btn btn-add mt-4">Add Category</button>

        </form>
    </div>
@endsection
