@extends('Layouts.Admin.App')

@section('Content')
    

<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Edit Brand</h5>
        <a href="{{url('/admin/all/brands')}}" class="btn btn-primary float-end">Back</a>
      </div>
      <div class="card-body">
        <form action="{{url('/admin/brand/update',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="category_id">Category</label>
                <div class="col-sm-10">
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$data->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>



          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" required/>
              @error('name')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="descriptiono">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" id="description" cols="10" rows="5">{{$data->description}}</textarea>
              @error('description')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="logo">Logo</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="logo" name="logo" accept="image/*"/>
              <img src="{{asset($data->logo)}}" class="mt-3" alt="Brand Logo" height="100px">
              @error('logo')
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