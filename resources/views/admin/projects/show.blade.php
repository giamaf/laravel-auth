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
            <img src="{{ $project->renderImage() }}" alt="{{ $project->title }}" class="img-fluid float-start rounded me-2">
        @endif
        <p>{{ $project->content }}</p>
    </section>
    <div class="date">
        <figcaption class="fw-lighter">
            <span>created:</span> {{ $project->getFormatDate('created_at', 'd-m-Y H:i') }}
        </figcaption>
        <figcaption class="fw-lighter">
            <span>updated:</span> {{ $project->getFormatDate('updated_at', 'd-m-Y H:i') }}
        </figcaption>
    </div>
@endsection

{{-- Footer --}}
@section('footer')
    <section class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary"><i
                class="fas fa-arrow-left me-1"></i>Back</a>

        <div class="d-flex gap-1">
            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning"><i
                    class="fas fa-pencil me-1"></i>Edit</a>
            <button type="button" class="btn btn-danger delete-buttons"><i
                    class="fas fa-trash-can me-1"></i>Delete</button>

            <!-- Modal -->
            <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Confirmation</h1>
                            <button type="button" class="btn-close modal-buttons" data-bs-dismiss="modal"
                                aria-label="Close" value="exit"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete this project?
                        </div>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-buttons" data-bs-dismiss="modal"
                                    value="back">Back</button>
                                <button type="button" class="btn btn-danger modal-buttons" value="confirm">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
