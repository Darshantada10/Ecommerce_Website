@extends('Layouts.Admin.App')

@section('Content')
    

<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Add Product</h5>
        <a href="{{url('/admin/all/products')}}" class="btn btn-primary float-end">Back</a>
      </div>
      <div class="card-body">
        <form action="{{url('/admin/product/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="category_id">Category</label>
                <div class="col-sm-10">
                    <select class="form-select" id="category_id" name="category_id" onchange="categorybrand()" required>
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            
            {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="brand_id">Brand</label>
                <div class="col-sm-10">
                    <select class="form-select" id="brand_id" name="brand_id" required>
                        <option value="">Select a Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div> --}}



          {{-- <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" required/>
              @error('name')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="descriptiono">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" id="description" cols="10" rows="5"></textarea>
              @error('description')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="logo">Logo</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="logo" name="logo" accept="image/*"/>
              @error('logo')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div> --}}
          
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script>
    function categorybrand(id)
    {
        console.log("inside function",id);
        
        
    }
  </script>
@endsection