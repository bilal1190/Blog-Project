@extends('layouts.user')
@section('content')
<div class="container">
  <!-- Center the h1 tag -->
  <h1 class="text-center my-4">Blog List</h1>

  <!-- Create a responsive card layout -->
  
  <div class="container px-5 py-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach($blogs as $blog)
      <div class="col">
        <div class="card h-100 bg-light border-0 rounded-3 shadow-sm position-relative overflow-hidden text-center">
          <a href="{{ route('frontblog.show', $blog->id) }}" class="stretched-link"></a> <!-- Add a link around the card -->
          <div class="card-body d-flex flex-column">
            <h2 class="card-subtitle mb-2 text-muted">{{ $blog->category_id }}</h2>
            <h1 class="card-title mb-3">{{ $blog->title }}</h1>
            <p class="card-text mb-3">{{ Str::limit($blog->content, 50, ' ... ')}}</p>
            {{-- <a href="#" class="btn btn-outline-primary mt-auto">
              Read More
              <svg class="bi bi-arrow-right ms-2" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M5.5 11.5a.5.5 0 0 0 0-.707L8.293 8 5.5 5.207a.5.5 0 1 0-.707.707L7.5 8l-2.707 2.707a.5.5 0 0 0 .707.707z"/>
                <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
              </svg>
            </a> --}}
          </div>
          <div class="card-footer text-muted small position-absolute bottom-0 start-0 w-100 py-2">
            <span class="d-inline-flex align-items-center me-3">
              <svg class="bi bi-eye me-1" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 3a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5z"/>
                <path d="M8 0a8 8 0 0 0-8 8 8 8 0 0 0 8 8 8 8 0 0 0 8-8 8 8 0 0 0-8-8zm0 12a4 4 0 0 1-4-4 4 4 0 0 1 4-4 4 4 0 0 1 4 4 4 4 0 0 1-4 4z"/>
              </svg>
              1.2K
            </span>
            <span class="d-inline-flex align-items-center">
              <svg class="bi bi-heart me-1" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M4.5 0a4.5 4.5 0 0 1 4.5 4.5c0 1.5-.87 3.2-2.1 4.2L8 9.08l-1.9-1.3C4.87 7.7 4 6.05 4 4.5A4.5 4.5 0 0 1 8.5 0z"/>
              </svg>
              2.3K
            </span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  

{{-- 
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    @foreach($blogs as $blog)
      <div class="col">
        <div class="card h-100" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text"> {{ Str::limit($blog->content, 50, ' ... ')}}</p>
            <span  class="text-primary"> {{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</span>
          </div>
        </div>
      </div>
    @endforeach
  </div> --}}

  <!-- Pagination -->
  <div class="py-3 my-3">
    {{ $blogs->links('pagination::bootstrap-5') }}
  </div>
</div>



@endsection

