@extends('Layouts.Admin.App')

@section('Content')
    
@if (session('success'))
<p class="text-primary">{{session('success')}}</p>
@endif

<div class="card">
    <h5 class="card-header">
        All Categories
        <a href="{{url('/admin/category/create')}}" class="btn rounded-pill btn-primary float-end">
            <i class="bx bx-list-plus"></i> Add Category</a>



    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Image</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                
            <tr>
                <th>{{$category->id}}</th>
                <th>{{$category->name}}</th>
                <th>{{$category->slug}}</th>
                <th>
                    <img src="{{asset($category->image)}}" alt="" height="80px">
                </th>
                <th>{{$category->description}}</th>
                <th>
                    <a href="{{url('admin/category/edit/'.$category->id)}}" class="btn btn-sm btn-primary">Update</a>
                    
                    <a href="{{url('admin/category/delete/'.$category->id)}}" class="btn btn-sm btn-danger">Delete</a>
                    
                </th>
                
            </tr>
            
            @endforeach
            
        </tbody>
      </table>

      </div>
    </div>



@endsection