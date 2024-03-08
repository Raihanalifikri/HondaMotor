@extends('home.parent')
@section('content')
   <div class="card p-4">
    <h1>Product Honda</h1>
    <div class="d-flex justify-content-end">
        <a href="{{ route('product.create') }}" class="btn btn-primary justify-content-end">
            <i class="bi bi-plus"></i>
            Make Product!
        </a>
    </div>
    <hr>

    <div class="container">
                <div class="card p-3">
                    <h5 class="card-title">Data News</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image News</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($product as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->honda->name }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <img src="{{ $row->image }}" width="100px" alt="Ini Image category">
                                    </td>
                                    <td>{{ $row->color }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>
                                        <button class="btn btn-info">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            <p class="text-center">
                                data Masih Kosong
                            </p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
   </div>
@endsection