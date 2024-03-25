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
                    <button class="btn btn-outline-primary">search</button>
                </div>
            </form>

            {{-- Button per aggiungere un nuovo progetto --}}
            <div class="d-flex justify-content-between align-items-center gap-1">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-success"><i class="fas fa-plus me-1"></i>add
                    New</a>
                <a href="{{ route('admin.projects.trash') }}" class="btn btn-danger"><i
                        class="fas fa-trash me-1"></i>trash</a>
            </div>
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
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                class="delete-form" data-bs-toggle="modal" data-bs-target="#modal">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-can"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
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
