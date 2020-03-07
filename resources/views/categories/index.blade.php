@extends('layouts.dashboard')

@section('title')
  Categories
@endsection

@section('categories')
  active
@endsection



@section('breadcrumb')
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
      <span class="breadcrumb-item active">Categories</span>
  </nav>
@endsection


@section('content')

    <div class="container">
       <div class="row">
         <div class="col-lg-4">
           <div class="card">

              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif



             <div class="card-header">
               <h3 class="text-center">Add Categories</h3>
             </div>
             <div class="card-body">
               <form class="form-group" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="py-3">
                   <input class="form-control" type="text" name="category_name" placeholder="Category Name">
                   @error ('category_name')
                     <small class="text-danger">{{ $message }}</small>
                   @enderror
                 </div>
                 <div class="py-3">
                   <input class="form-control" type="file" name="category_image">
                   @error ('category_name')
                     <small class="text-danger">{{ $message }}</small>
                   @enderror
                 </div>
              <div class="py-3">
                   <button type="submit" name="button" class="btn btn-primary">Add Category</button>
              </div>
              @if($errors->all())
                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                       <li>{{ $error }}</li>
                  </div>
                @endforeach
              @endif
               </form>
             </div>

           </div>
         </div>

         <div class="col-lg-8">
           <div class="card">
             <div class="card-header">
               <h3 class="text-center">All Categories</h3>
             </div>

             <div class="card-body">
               <table class="table table-bordered">
                 <tr>
                   <th>SL.</th>
                   <th>Category</th>
                   <th>Added By</th>
                   <th>Image</th>
                   <th>Created at</th>
                   <th>Updated at</th>
                   <th>Action</th>
                 </tr>
                  @forelse($categories as $category)
                    <tr>
                      <td>{{ $loop -> index + 1 }}</td>
                      <td>{{ $category->category_name }}</td>
                      {{-- <td>{{ App\User::findOrFail($category->added_by)->name }}</td> --}}
                      {{-- <td>{{ $category->relationBetweenUser->name }}</td> --}}
                      <td>{{ $category->connection_between_User->name }}</td>
                      <td>
                        <img src="{{ asset('uploads/categories') }}/{{ $category->category_image }}" alt="{{ $category->category_image }}" width="50">
                      </td>
                      <td>{{ $category->created_at->diffForHumans() }}</td>
                      <td>
                        @if (isset($category->updated_at))
                          {{ $category->updated_at->diffForHumans() }}
                        @else
                           --
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info">Edit</a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td>No data Available</td>
                    </tr>
                  @endforelse
               </table>
             </div>
           </div>
         </div>

       </div>
    </div>
@endsection
