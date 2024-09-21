@extends('layouts.user') <!-- If you are using a layout -->
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <div class="card h-100 bg-light border-0 rounded-3 shadow-sm">
                <div class="card-body">
                    <h2 class="card-subtitle mb-2 text-muted">{{ $blog->category->name }}</h2> <!-- Assuming category relation -->
                    <h1 class="card-title mb-3">{{ $blog->title }}</h1>
                    <p class="card-text">{{ $blog->content }}</p>
                </div>
                <div class="card-footer text-muted small">
                    <span class="d-inline-flex align-items-center me-3">
                        <svg class="bi bi-eye me-1" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 3a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5z"/>
                            <path d="M8 0a8 8 0 0 0-8 8 8 8 0 0 0 8 8 8 8 0 0 0 8-8 8 8 0 0 0-8-8zm0 12a4 4 0 0 1-4-4 4 4 0 0 1 4-4 4 4 0 0 1 4 4 4 4 0 0 1-4 4z"/>
                        </svg>
                        1.2K Views
                    </span>
                    <span class="d-inline-flex align-items-center">
                        <svg class="bi bi-heart me-1" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M4.5 0a4.5 4.5 0 0 1 4.5 4.5c0 1.5-.87 3.2-2.1 4.2L8 9.08l-1.9-1.3C4.87 7.7 4 6.05 4 4.5A4.5 4.5 0 0 1 8.5 0z"/>
                        </svg>
                        2.3K Likes
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
