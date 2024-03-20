@extends('layouts.app')

@section('title', 'New Project')

@section('content')
    <header>
        <h3 class="border-bottom py-1">New Project</h3>
    </header>

    <form action="{{ route('admin.projects.store') }}" method="POST" class="my-4">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Project Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Project Name"
                        value="{{ old('title', '') }}">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" rows="10" name="content">{{ old('content', '') }}</textarea>
                </div>
            </div>
            <div class="col-11">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="text" class="form-control" id="image" name="image"
                        placeholder="http:// or https://" value="{{ old('image', '') }}">
                </div>
            </div>
            <div class="col-1">
                <img src="{{ old('image', 'https://marcolanci.it/boolean/assets/placeholder.png') }}" alt="project-img"
                    id="preview" class="img-fluid rounded">
            </div>
            <div class="col-2">
                <div class="form-check form-switch my-3">
                    <label class="form-check-label" for="completed">Completed</label>
                    <input class="form-check-input" type="checkbox" role="switch" id="completed" name="is_completed"
                        value="1" @if (old('is_completed', '')) checked @endif>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center my-4">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">Back to list</a>
            <div class="d-flex align-items-center gap-1">
                <button class="btn btn-warning" type="reset"><i class="fa-solid fa-arrow-rotate-left me-1"
                        id="reset-button"></i>Clear</button>
                <button class="btn btn-success"><i class="fas fa-floppy-disk me-1"></i>Save</button>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
    <script>
        // OPZIONE 1 -- Recupero gli elementi
        const input = document.getElementById('image');
        const preview = document.getElementById('preview');
        const placeholder = 'https://marcolanci.it/boolean/assets/placeholder.png';
        const resetButton = document.getElementById('reset-button');

        input.addEventListener('input', () => {
            // C'è qualcosa nell'input?.. Se si allora metti il valore dell'input altrimenti il placeholder
            preview.src = input.value || placeholder;
        })

        // Al click sul reset button reinserisco il placeholder
        resetButton.addEventListener('click', () => {
            preview.src = placeholder;
        })

        // OPZIONE 2 - Non recupero gli elementi ma ho delle variabili globali

        // image.addEventListener('input', () => {
        // C'è qualcosa nell'input?.. Se si allora metti il valore dell'input altrimenti il placeholder
        // preview.src = image.value ? image.value : placeholder;
        // })
    </script>
@endsection
