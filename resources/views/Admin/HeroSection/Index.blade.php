@extends('Layouts.Admin.App')

@section('Content')
    
@if (session('success'))
<p class="text-primary">{{session('success')}}</p>
@endif

<div class="card">
    <h5 class="card-header">
        All Hero Sections
        <a href="{{url('/admin/hero-section/create')}}" class="btn rounded-pill btn-primary float-end">
            <i class="bx bx-list-plus"></i> Add Hero Section</a>



    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>ID</th>
            <th>Heading</th>
            <th>Image</th>
            <th>Text</th>
            <th>URL</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($herosections as $hero)
                
            <tr>
                <th>{{$hero->id}}</th>
                <th>{{$hero->heading}}</th>
                <th>
                    <img src="{{asset($hero->image)}}" alt="" height="80px">
                </th>
                <th>{{$hero->text}}</th>
                <th>{{$hero->url}}</th>
                <th>{{$hero->status}}</th>
                <th>
                    <a href="{{url('admin/hero-section/edit/'.$hero->id)}}" class="btn btn-sm btn-primary">Update</a>
                    
                    <a href="{{url('admin/hero-section/delete/'.$hero->id)}}" class="btn btn-sm btn-danger">Delete</a>
                    
                </th>
                
            </tr>
            
            @endforeach
            
        </tbody>
      </table>

      </div>
    </div>



@endsection