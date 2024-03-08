@extends('home.parent')
@section('content')
    
    <div class="row">
        @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        <div class="card p-4">
            <h3>News Create</h3>

            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            {{-- Field untuk Title  --}}
            {{-- Name berfungsi untuk mengirimkan data ke controller --}}
            {{-- Value = old untuk  --}}
                <div class="mb-3">
                    <label for="inputTitle" name="name" class="form-label">News Title</label>
                    <input type="text" class="form-control" id="inputTitle" name="name" value="{{ old('title') }}">
                </div>

                 {{-- Field untuk Image  --}}
            {{-- Name berfungsi untuk mengirimkan data ke controller --}}
            {{-- Value = old untuk  --}}
            <div class="mb-3">
                <label for="inputImage" name="image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="inputImage" name="image" value="{{ old('image') }}">
            </div>

            <div class="mb-3">
                <label class="col-sm-2 col-form-label">Select</label>
                <div class="col-10">
                  <select name="honda_id" class="form-select" aria-label="Default select example">
                    <option selected>==== Choose Category ====</option>
                    @foreach ($honda as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                    
                  </select>
                </div>
            </div>


            {{-- Field Untuk Content --}}
            {{-- menggunakan ckeditor untuk menampilkan content --}}
            {{-- Name berfungsi untuk mengirimkan data ke controller --}}
            <div class="mb-2">
                <label class="col col-form-label" name="color">Color</label>
                <input type="text" class="form-control" id="inputImage" name="color" value="{{ old('image') }}">
            </div>

            {{-- Price --}}
            <div class="mb-2">
                <label class="col col-form-label" name="price">Price</label>
                <input type="text" class="form-control" id="inputImage" name="price" value="{{ old('image') }}">
            </div>
           

       <div class="justify-content-end d-flex">
        <button class="btn btn-primary" type="submit">
            <i class="bi bi-plus"></i>
            Create News
        </button>
       </div>
            </form>
        </div>
    </div>

@endsection