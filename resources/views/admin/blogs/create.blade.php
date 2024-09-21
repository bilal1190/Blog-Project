@extends('layouts.admin')
@section('content')
<div class="py-12">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create / Blog') }}
    </h2>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
              <form action="{{ route('admin.blogs.store') }}" method="post">
                  @csrf
                  <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <div class="mb-3">
                          <input name="title" value="{{ old('title') }}" type="text"
                              class="form-control" id="title"
                              placeholder="Post Title" required>
                          @error('title')
                              <p class="invalid-feedback">{{ $message }}</p>
                          @enderror
                          
                        
                      </div>

                      <label for="content" class="form-label">Content</label>
                      <div class="my-3">
                          <textarea value="{{ old('content') }}" name="content" type="text" class="form-control" id="content"
                              placeholder="Enter Your Content" required></textarea>
                          @error('content')
                          <p class="invalid-feedback">{{ $message }}</p>
                          @enderror
                      </div>
                      
                      <label for="category_id" class="form-label">Category</label>
                      <div class="flex justify-between ">
                          <div class="my-3">
                              <select id="category_id" name="category_id"
                              class="form-control" required>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                          @error('category_id')
                          <p class="invalid-feedback">{{ $message }}</p>
                      @enderror
                          </div>

                          <div class="my-3">
                              <button class="btn btn-primary">Submit</button>
                          </div>     
                      </div>

                      <!-- Hidden input for user_id -->
                      <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
