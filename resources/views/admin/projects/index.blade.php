@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header class="d-flex justify-content-between align-items-center border-bottom py-2">
        <h3 class="m-0">Projects</h3>

        {{-- Filtro --}}
        <div class="d-flex justify-content-between align-items-center gap-3">
            <form action="{{ route('admin.projects.index') }}" method="GET">
                <div class="d-flex justify-content-between gap-1">
                    <select class="form-select" name="filter">
                        <option value="" @if ($filter === '') selected @endif>All</option>
                        <option value="yes" @if ($filter === 'yes') selected @endif>Yes</option>
                        <option value="no" @if ($filter === 'no') selected @endif>No</option>
                    </select>
                    <button class="btn btn-outline-primary">Search</button>
                </div>
            </form>

            {{-- Button per aggiungere un nuovo progetto --}}
            <a href="{{ route('admin.projects.create') }}" class="btn btn-success"><i class="fas fa-plus me-1"></i>Add
                New</a>
        </div>
    </header>

    <table class="table table-striped my-4">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Completed</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->is_completed ? 'Yes' : 'No' }}</td>
                    <td>{{ $project->getFormatDate('created_at', 'm-Y') }}</td>
                    <td>{{ $project->getFormatDate('updated_at', 'm-Y') }}</td>
                    <td>
                        <div class="d-flex justify-content-end gap-1">
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning"><i
                                    class="fas fa-pencil "></i></a>
                            <button type="button" class="btn btn-danger delete-buttons"><i
                                    class="fas fa-trash-can"></i></button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                            id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary modal-buttons"
                                                    data-bs-dismiss="modal" value="back">Back</button>
                                                <button type="button" class="btn btn-danger modal-buttons"
                                                    value="confirm">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <h3>No projects</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($projects->hasPages())
        {{ $projects->links() }}
    @endif
@endsection


@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
