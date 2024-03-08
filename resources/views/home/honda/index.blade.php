@extends('home.parent')
@section('content')
    <div class="card p-4">
        <h1>Ini halaman index</h1>
        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('honda.create') }}">
                <i class="bi bi-plus"></i>
                Create Honda
            </a>
        </div>
    </div>
    <div class="card p-4">
        <div class="row">
            @forelse ($honda as $row)
                <div class="col-5">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ $row->image }}" class="card-img-top" alt="..." width="100px" height="200px">
                        <div class="card-body ">
                            <h5 class="card-title">{{ $row->name }}</h5>
                            <div class="d-flex gap-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="show"
                                    data-bs-target="#basicModal{{ $row->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <a href="{{ route('honda.edit', $row->id) }}" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('honda.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
            @endforelse

        </div>
    </div>
@endsection
