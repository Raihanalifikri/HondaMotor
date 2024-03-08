@extends('home.parent')
@section('content')
<div class="row">
    <div class="card p-4">
        <h3>Category Update</h3>
        <hr>
        
        <form action="{{ route('honda.update', $honda->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if (session('update'))
        <div class="alert alert-success">
            {{ session('update') }}
        </div>
    @endif
        
        <div class="col-12">
            <label for="inputName" name="name" class="form-label">Category Name</label>
            {{-- Value= jika di Refresh atau ada error data nya tidak akan hilang. --}}
            <input type="text" class="form-control" id="inputName" name="name" value="{{ $honda->name }}">
        </div>
        <div class="col-12">
            <label for="inputImage" class="form-label">Category Image</label>
            <input type="file" class="form-control" id="inputImage" name="image">
        </div>

        <div class="d-flex justify-content-end ">
            <a href="{{ route('honda.index') }}" class="btn btn-primary mx-2 mt-2">
            <i class="bi bi-arrow-left"></i>
            </a>
            <button type="submit" class="btn btn-success mt-2">
                <i class="bi bi-pen"></i>
                Edit Honda
            </button>
        </div>
        </form>
    </div>
</div>
@endsection