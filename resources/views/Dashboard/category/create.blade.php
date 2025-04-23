@extends("dashboard.dashboardlayout");


@push('style')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

@endpush
@section("main")
 {{-- Form Start --}}
 <form id="createform" action="{{ route('cats.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Title --}}
    <div class="mb-3">
        <label for="Category" class="form-label">Category:</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    {{-- Submit --}}
    <button type="submit" class="btn btn-primary">Submit Post</button>
</form>
@push('script')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });

    document.querySelector('#createform').addEventListener('submit', function(e){
        e.preventDefault();
        const textarea = document.querySelector('#content');
        const html = quill.getSemanticHTML();
        textarea.value = html;
        document.querySelector("#createform").submit();
    });
  </script>
@endpush
@endsection