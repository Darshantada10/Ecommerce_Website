@extends('Layouts.Admin.App')

@section('Content')
    

<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add Hero Section</h5>
        <a href="{{url('/admin/all/categories')}}" class="btn btn-primary float-end">Back</a>
      </div>
      <div class="card-body">
        <form action="{{url('/admin/category/update',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" required value="{{$data->name}}"/>
              @error('name')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
         
          {{-- <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="slug">Slug</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="slug" name="slug" required/>
              @error('slug')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div> --}}
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="descriptiono">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" id="description" cols="10" rows="5">{{$data->description}}</textarea>
              @error('description')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>

          @if ($data->image)
              <img src="{{asset($data->image)}}" alt="Category Image" class="img-thumbnail mb-3" style="max-width: 200px;">
          @endif

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="image">Image</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="image" name="image" accept="image/*"/>
              @error('image')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection