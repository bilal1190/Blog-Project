@extends('layouts.admin')
@section('content')
<div class="py-12 ">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('List / Blogs') }}
    </h2>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-message>
          
      </x-message>
      <table class="table">
          <thead class="bg-gray-50">
              <tr class="border-b">
                  {{-- {{ $name }} --}}
                  <th scope="col" width="60">#</th>
                  <th  scope="col" width="60">Title</th>
                  <th  scope="col" width="120">content</th>
                  <th  scope="col" width="120">Create</th>
                  <th  scope="col" width="160">Action</th>
              </tr>
          </thead>
          <tbody class="bg-white">
              @if ($blogs->isNotEmpty())
                  @foreach ( $blogs as $blog )
                  <tr class="border-b">
                      <td class="px-6 py-3 text-left">
                          {{ $blog->id }}
                      </td>
                      <td class="px-6 py-3 text-left">
                          {{ $blog->title }}
                      </td>
                      <td class="px-6 py-3 text-left">
                        {{ Str::limit($blog->content, 50, ' ... ')}}
                    </td>
                      <td class="px-6 py-3 text-left">
                          {{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}
                      </td>
                      <td class="px-6 py-3 text-left" >
                        <a href="{{ route("admin.blogs.edit", $blog->id) }}" class="btn btn-success btn-sm me-2">Edit</a>
                        <a href="javascript:void(0);" onclick="deleteblog({{ $blog->id }})" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  @endforeach
              @endif
             
          </tbody>
      </table>
      <div class="py-3 my-3">
        {{ $blogs->links('pagination::bootstrap-5') }}
      </div>
</div>

@endsection

<script type="text/javascript">
    function deleteblog(id) {
      if (confirm('Are you sure you want to delete this blog?')) {
        $.ajax({
          url : '{{ url("admin/blogs") }}/' + id, // Append the id to the URL
          type: 'DELETE', // Change to DELETE method
          data: { _token: '{{ csrf_token() }}' }, // Pass CSRF token in data
          datatype: 'json',
          success: function(response) {
            if (response.status) {
                window.location.href = '{{ route("admin.blogs.list") }}';
            } else {
                alert('Error: Blog not deleted.');
            }
          }
        });
      }
    }
  </script>

