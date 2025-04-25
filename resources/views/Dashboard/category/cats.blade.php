@extends("dashboard.dashboardlayout")



@section("main")
{{-- Success Message --}}
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h1>All categories</h1>
    <a href="{{ route('cats.create') }}" class="btn btn-warning mb-3">Create category</a>
    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th><i class="fa fa-id-badge" aria-hidden="true"></i></th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cats as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning me-1">Edit</a>
                        <a href={{ route('cat.delete',$cat->id) }} class="btn btn-sm btn-danger me-1">Delete</a>
                        {{-- <a href={{ route("post.delete" , ) }} class= 'btn btn-sm btn-danger'>delete</a> --}}


                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No categories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection