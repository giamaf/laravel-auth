@session('message')
    <div class="alert alert-{{ session('type', 'info') }} alert-dismissible fade show" role="alert">
        <span>{{ $value }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endsession
