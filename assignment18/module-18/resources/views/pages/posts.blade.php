@extends('app')

@section('content')
    {{-- All post --}}
    <div class="row mb-2">
        @foreach ($posts as $post)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden mb-4 shadow-sm position-relative">
                    <div class="col-lg-8 p-4 d-flex flex-column position-static">
                        <a href="{{ route('category.posts', ['id' => $post->category->id]) }}"><strong
                                class="d-inline-block mb-2 text-primary-emphasis">{{ $post->category->name }}</strong></a>
                        <h3 class="mb-0">{{ $post->title }}</h3>
                        <div class="mb-1 text-body-secondary">{{ $post->created_at->format('M d, Y - h:i a') }}</div>
                        <p class="card-text mb-auto">{{ Str::limit($post->description, 150) }}</p>
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
    </div>
    {{-- Category wise post --}}
    <div class="row mb-2">
        @foreach ($categories as $category)
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                Latest From <strong> {{ $category->name }} </strong>
            </h3>
            @if ($category->latestPost())
                <div class="col-md-12">
                    <div class="row g-0 border rounded overflow-hidden mb-4 shadow-sm position-relative">
                        <div class="col-lg-8 p-4 d-flex flex-column position-static">
                            <h3 class="mb-0">{{ $category->latestPost()->title }}</h3>
                            <div class="mb-1 text-body-secondary">
                                {{ $category->latestPost()->created_at->format('M d, Y - h:i a') }}</div>
                            <p class="card-text mb-auto">{{ Str::limit($category->latestPost()->description, 300) }}</p>
                            <a href="{{ route('post.show', ['id' => $category->latestPost()->id]) }}"
                                class="icon-link gap-1 icon-link-hover">
                                Continue reading
                            </a>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <img class="w-100 h-100" src="{{ $category->latestPost()->image }}" alt="Post Image">
                        </div>
                    </div>
                </div>
            @else
                <p>No posts found for this category.</p>
            @endif
        @endforeach
    </div>
@endsection
