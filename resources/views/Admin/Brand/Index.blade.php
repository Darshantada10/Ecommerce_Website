@extends('Layouts.Admin.App')

@section('Content')
    
@if (session('success'))
<p class="text-primary">{{session('success')}}</p>
@endif

<div class="card">
    <h5 class="card-header">
        All Brands
        <a href="{{url('/admin/brand/create')}}" class="btn rounded-pill btn-primary float-end">
            <i class="bx bx-list-plus"></i> Add Brand</a>



    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Category Name</th>
            <th>Logo</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                
            <tr>
                <th>{{$brand->id}}</th>
                <th>{{$brand->name}}</th>
                <th>{{$brand->slug}}</th>
                <th>{{$brand->category->name}}</th>
                <th>
                    <img src="{{asset($brand->logo)}}" alt="Brand Image" height="80px">
                </th>
                <th>{{$brand->description}}</th>
                <th>
                    <a href="{{url('admin/brand/edit/'.$brand->id)}}" class="btn btn-sm btn-primary">Update</a>
                    
                    <a href="{{url('admin/brand/delete/'.$brand->id)}}" class="btn btn-sm btn-danger">Delete</a>
                    
                </th>
                
            </tr>
            
            @endforeach
            
        </tbody>
      </table>

      </div>
    </div>



@endsection