@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header>
        <h3 class="border-bottom py-1">Projects</h3>
    </header>

    <table class="table table-striped my-4">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
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
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <div class="d-flex justify-content-end gap-1">
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning"><i
                                    class="fas fa-pencil "></i></a>

                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-can"></i></button>
                            </form>
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
@endsection
