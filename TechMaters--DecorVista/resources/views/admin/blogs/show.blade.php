@extends('admin.layouts.main-file')

@section('main-section')
<div class="col-xl-12 col-lg-12 d-flex justify-content-between align-items-center">
    <h4 class="fw-bold topbar-button pe-none text-uppercase mb-2 mx-4">Blog Detail</h4>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-primary mx-4 mb-2">Blog List</a>
</div>
<div class="container-xxl">
    <div class="row">
        <!-- Blog Details Section -->
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-column flex-md-row align-items-start">
                    <!-- Title and Metadata Container -->
                    <div class="d-flex flex-column flex-grow-1">
                        <h1 class="card-title" style="font-size: 2rem;">{{ $blog->title }}</h1>
                        <p class="text-muted mb-2">Published on {{ \Carbon\Carbon::parse($blog->date)->format('F j, Y') }} by {{ $blog->created_by }}</p>
                    </div>
                    <!-- Display the first image larger on the right side -->
                    @if ($blog->images[0]->image_path)
                        <img src="{{ env('ASSET2_URL') . $blog->images[0]->image_path }}" class="img-thumbnail" style="width: 200px; height: auto; margin-left: 20px;">
                    @endif
                </div>
                <div class="card-body">
                    <!-- Blog Body with Quill -->
                    <div id="snow-editor-detail" style="height: auto;">
                        {!! $blog->body !!}
                    </div>

                    <!-- Blog Images -->
                    <div class="mt-4">
                        <h5 class="mb-3">Images</h5>
                        <div class="d-flex flex-wrap">
                            @foreach ($blog->images as $image)
                                <div class="position-relative m-2" style="display: inline-block;">
                                    <img 
                                    src="{{ env('ASSET2_URL') . $image->image_path}}"
                                    class="img-thumbnail" style="width: 150px; margin: 5px;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<!-- Include Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill Editor
    var quill = new Quill('#snow-editor-detail', {
        theme: 'snow',
        readOnly: true, // Make the editor read-only for display purposes
    });
</script>
@endpush
@endsection
