@extends('app')

@section('content')
    <div class="row mb-2">
        <h2>Category: {{ $category->name }}</h2>
        @if ($posts->isEmpty())
            <p>No posts found for this category.</p>
        @else
            @foreach ($posts as $post)
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden mb-4 shadow-sm position-relative">
                        <div class="col-lg-8 p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary-emphasis">{{ $post->category->name }}</strong>
                            <h3 class="mb-0">{{ $post->title }}</h3>
                            <div class="mb-1 text-body-secondary">
                                {{ $post->created_at->format('M d, Y - h:i a') }}</div>
                            <p class="card-text mb-auto">{{ Str::limit($post->description, 200) }}</p>
                            <a href="{{ route('post.show', ['id' => $post->id]) }}" class="icon-link gap-1 icon-link-hover">
                                Continue reading
                            </a>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <img class="w-100 h-100" src="{{ $post->image }}" alt="Post Image">
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
