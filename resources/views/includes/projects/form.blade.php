@if ($project->exsist)
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data"
        class="my-4">
        @method('PUT')
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="my-4">
@endif
@csrf
<div class="row">
    <div class="col-6">
        <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input type="text"
                class="form-control @error('name') is-invalid @elseif (old('name', '')) is-valid @enderror"
                name="name" id="name" placeholder="Project Name" value="{{ old('title', $project->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div class="form-text">
                    <p>Add project name</p>
                </div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug"
                value="{{ Str::slug(old('title', $project->title)) }}" disabled>
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @elseif (old('name', '')) is-valid @enderror"
                id="content" rows="10" name="content">{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div class="form-text">
                    <p>Add project content</p>
                </div>
            @enderror
        </div>
    </div>
    <div class="col-11">
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file"
                class="form-control @error('image') is-invalid @elseif (old('image', '')) is-valid @enderror"
                id="image" name="image" placeholder="http:// or https://"
                value="{{ old('image', $project->image ?? '') }}">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div class="form-text">
                    <p>Add project image</p>
                </div>
            @enderror
        </div>
    </div>
    <div class="col-1">
        <img src="{{ old('image', $project->image) ? $projcet->renderImage() : 'https://marcolanci.it/boolean/assets/placeholder.png' }}"
            alt="project-img" id="preview" class="img-fluid rounded">
    </div>
    <div class="col-2">
        <div class="form-check form-switch my-3">
            <label class="form-check-label" for="completed">Completed</label>
            <input class="form-check-input" type="checkbox" role="switch" id="completed" name="is_completed"
                value="1" @if (old('is_completed', $project->is_completed)) checked @endif>
        </div>
    </div>
</div>
<div class="d-flex justify-content-between align-items-center my-4">
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary"><i
            class="fas fa-arrow-left me-1"></i>Back to list</a>
    <div class="d-flex align-items-center gap-1">
        <button class="btn btn-warning" type="reset"><i class="fa-solid fa-arrow-rotate-left me-1"
                id="reset-button"></i>Clear</button>
        <button class="btn btn-success"><i class="fas fa-floppy-disk me-1"></i>Confirm</button>
    </div>
</div>
</form>

@section('scripts')
    <script>
        const projectName = document.getElementById('name');
        const slug = document.getElementById('slug');

        projectName.addEventListener('blur', () => {
            slug.value = projectName.value.trim().toLowerCase().split(' ').join('-');
        })
    </script>
@endsection
