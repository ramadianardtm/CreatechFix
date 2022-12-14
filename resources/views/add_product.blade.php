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
                <center>
                    <img class="img-thumbnail mb-2" id="output" style="max-width: 30%;" />
                </center>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Photo</label>
                    <input type="file" name="image" onchange="loadFile(this)" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Price</label>
                    <input type="number" class="form-control" placeholder="Price" name="price">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Stock</label>
                    <input type="number" class="form-control" placeholder="Stock" name="stock">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlInput1">Category</label><br>
                    <select name="category">
                        <?php $cat = App\Models\Category::all(); ?>
                        <option value="0">Pick here</option>
                        @foreach ($cat as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->any())
                <div class="alert-danger">
                    {{ $errors->first() }}
                </div>
                @endif

                <div class="form-group mt-5">
                    <button type="button" class="btn btn-light border-secondary">Cancel</button>
                    <button type="submit" class="btn btn-info">Add</button>
                </div>

            </form>
        </div>
    </div>
    @endsection

    <script>
        var loadFile = function(e) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>