@extends('layouts.app')

@section('title', "Detail $project->name ")

{{-- Content --}}
@section('content')

    {{-- Header --}}
    <header>
        <h3 class="border-bottom py-1">{{ $project->name }}</h3>
    </header>

    {{-- Main --}}
    <section class="single-project clearfix">
        @if ($project->image)
            <img src="{{ $project->image }}" alt="{{ $project->title }}" class="float-start me-2">
        @endif
        <p>{{ $project->content }}</p>
        <div class="date">
            <figcaption class="fw-lighter">
                <span>created:</span> {{ $project->created_at }}
            </figcaption>
            <figcaption class="fw-lighter">
                <span>updated:</span> {{ $project->updated_at }}
            </figcaption>
        </div>
    </section>
@endsection

{{-- Footer --}}
@section('footer')
    <section class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary"><i
                class="fas fa-arrow-left me-1"></i>Back</a>

        <div class="d-flex gap-1">
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning"><i
                    class="fas fa-pencil me-1"></i>Edit</a>

            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-can me-1"></i>Delete</button>

                <!-- Modal -->
                <div class="modal fade" id="delete-confirm-modal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete confirmation</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Do you want to delete this project?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="modal-back-button"
                                    data-bs-dismiss="modal">Back</button>
                                <button type="submit" class="btn btn-primary" id="modal-confirm-button">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
