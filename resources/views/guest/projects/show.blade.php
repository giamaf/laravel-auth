@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{-- Header --}}
    <header>
        <h3 class="border-bottom py-1">{{ $project->name }}</h3>
    </header>

    {{-- Project --}}
    <section class="single-project clearfix">
        @if ($project->image)
            <img src="{{ $project->image }}" alt="{{ $project->title }}" class="float-start me-2">
        @endif
        <p>{{ $project->content }}</p>
        <div class="date">
            <figcaption class="fw-lighter">
                <span>created:</span> {{ $project->getFormatDate('created_at', 'd-m-Y H:i') }}
            </figcaption>
            <figcaption class="fw-lighter">
                <span>updated:</span> {{ $project->getFormatDate('updated_at', 'd-m-Y H:i') }}
            </figcaption>
        </div>

    </section>
@endsection
