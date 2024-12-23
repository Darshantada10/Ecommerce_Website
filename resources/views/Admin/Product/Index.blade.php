@extends('Layouts.Admin.App')

@section('Content')
    
@if (session('success'))
<p class="text-primary">{{session('success')}}</p>
@endif

<div class="card">
    <h5 class="card-header">
        All Products
        <a href="{{url('/admin/product/create')}}" class="btn rounded-pill btn-primary float-end">
            <i class="bx bx-list-plus"></i> Add Product</a>



    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>ID</th>
            <th>Name</th>
            <th>Category Name</th>
            <th>Brand Name</th>
            <th>Logo</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                
            {{-- <tr>
                <th>{{$product->id}}</th>
                <th>{{$product->name}}</th>
                <th>{{$product->slug}}</th>
                <th>{{$product->category->name}}</th>
                <th>
                    <img src="{{asset($product->logo)}}" alt="product Image" height="80px">
                </th>
                <th>{{$product->description}}</th>
                <th>
                    <a href="{{url('admin/product/edit/'.$product->id)}}" class="btn btn-sm btn-primary">Update</a>
                    
                    <a href="{{url('admin/product/delete/'.$product->id)}}" class="btn btn-sm btn-danger">Delete</a>
                    
                </th>
                
            </tr> --}}
            
            @endforeach
            
        </tbody>
      </table>

      </div>
    </div>



@endsection