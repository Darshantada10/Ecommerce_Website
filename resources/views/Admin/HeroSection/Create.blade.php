@extends('Layouts.Admin.App')

@section('Content')
    

<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add Hero Section</h5>
        <a href="{{url('/admin/all/hero-sections')}}" class="btn btn-primary float-end">Back</a>
      </div>
      <div class="card-body">
        <form action="{{url('/admin/hero-section/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="heading">Heading</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="heading" name="heading" required/>
              @error('heading')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
         
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="text">Text</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="text" name="text" required/>
              @error('text')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="url">URL</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="url" name="url" required/>
              @error('url')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="image">Image</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="image" name="image" accept="image/*" required/>
              @error('image')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="size">Size</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="size" name="size" required/>
              @error('size')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="status">Status</label>
            <div class="col-sm-10">
              <input type="checkbox" id="status" name="status" />
              <div class="form-text">Tick if you want it ON or else OFF</div>

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