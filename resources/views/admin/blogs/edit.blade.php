@extends('layouts.admin')
@section('content')
    <div class="py-12">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit / Blog') }}
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <div class="mb-3">
                                <input name="title" value="{{ old('title', $blog->title) }}" type="text"
                                    class="form-control" id="title" placeholder="Post Title">
                                @error('title')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="content" class="form-label">Content</label>
                            <div class="my-3">
                                <textarea name="content"  value="{{ old('content', $blog->content) }}" type="text" class="form-control" id="content"
                                    placeholder="Enter Your Content"></textarea>
                                @error('content')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="category_id" class="form-label">Category</label>
                            <div class="flex justify-between ">
                                <div class="my-3">
                                    <select id="category_id" value="{{ old('category_id', $blog->category_id) }}" name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="text-red-400 font-medium">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="my-3">
                                    <button type="submit" class="btn btn-success">Update</button>
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
