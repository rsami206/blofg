@extends("dashboard.dashboardlayout");


@push('style')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

@endpush
@section("main")
 {{-- Form Start --}}
 <form id="createform" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Title --}}
    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
     {{-- Excerpt --}}
     <div class="mb-3">
        <label for="Excerpt" class="form-label">Excerpt:</label>
        <input type="text" name="Excerpt" class="form-control @error('Excerpt') is-invalid @enderror" value="{{ old('Excerpt') }}">
        @error('Excerpt')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Content --}}
    <div class="mb-3">
        <label for="content" class="form-label">Content:</label>
        <textarea id="content" name="content" class=" d-none form-control" rows="5">{{ old('content') }}</textarea>
            <!-- Create the editor container -->
            <div id="editor" class="bg-light" style="height: 300px"></div>
        {{-- @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror --}}
    </div>

    {{-- Image --}}
    <div class="mb-3">
        <label for="image" class="form-label">Image:</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
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