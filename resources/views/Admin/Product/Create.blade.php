@extends('Layouts.Admin.App')

@section('Content')

<div class="col-xxl">

    <div class="card mb-4">

        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add Product</h5>
            <a href="{{url('/admin/all/products')}}" class="btn btn-primary float-end">Back</a>
        </div>

        <div class="card-body">
            <form action="{{url('/admin/product/create')}}" method="POST" enctype="multipart/form-data" id="productForm">
                @csrf

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" required/>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="description">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" id="description" cols="10" rows="5"></textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Brand</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="brand_id" required>
                            <option value="">Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="original_price">Original Price</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="original_price" name="original_price" required/>
                        @error('original_price')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="sale_price">Sale Price</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price"/>
                        @error('sale_price')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="sku">SKU</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sku" name="sku"/>
                        @error('sku')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="image">Featured Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="image" name="image" accept="image/*"/>
                        @error('image')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="gallery">Gallery Images</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="gallery" name="gallery[]" multiple accept="image/*"/>
                        <small class="text-muted">You can select multiple images for the gallery</small>
                        @error('gallery')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="status">Status</label>
                    <div class="col-sm-10">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="status" name="status" value="1" checked>
                            <label class="form-check-label" for="status">Visible</label>
                        </div>
                        @error('status')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="quantity">Quantity</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="quantity" name="quantity"/>
                        @error('quantity')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <hr>
                <h4>Attributes (Optional)</h4>
                <div id="attributes-container">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Attribute 1</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="attributes[0][key]" placeholder="Attribute Name (eg. Color, Model, Size)">
                            @error('attributes.0.key')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="attributes[0][value]" placeholder="Attribute Value (eg. Red, 8GB+128GB, M)">
                            @error('attributes.0.value')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="button" class="btn btn-primary" onclick="addAttribute()">+ Add Attribute</button>
                    </div>
                </div>

                <script>

                    let attributeindex = 1;

                    function addAttribute()
                    {
                        // console.log("inside");
                        const container = document.getElementById('attributes-container');
                        const div = document.createElement('div');
                        div.className = 'row mb-3';

                        div.innerHTML = `
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label">Attribute ${attributeindex+1}</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="attributes[${attributeindex}][key]" placeholder="Attribute Name (eg. Color, Model, Size)">
                                                    @error('attributes.0.key')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="attributes[${attributeindex}][value]" placeholder="Attribute Value (eg. Red, 8GB+128GB, M)">
                                                    @error('attributes.0.value')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        `;
                            container.appendChild(div);
                            attributeindex++;
                    }



                </script>



                {{-- <script>
                    let attributeCount = 1;
                    
                    function addAttribute() {
                        attributeCount++;
                        
                        const container = document.getElementById('attributes-container');
                        const newAttributeRow = document.createElement('div');
                        newAttributeRow.className = 'row mb-3';
                        newAttributeRow.innerHTML = `
                            <label class="col-sm-2 col-form-label">Attribute ${attributeCount}</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="attributes[${attributeCount-1}][key]" placeholder="Attribute Name (eg. Color, Model, Size)">
                                @error('attributes.${attributeCount-1}.key')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="attributes[${attributeCount-1}][value]" placeholder="Attribute Value (eg. Red, 8GB+128GB, M)">
                                @error('attributes.${attributeCount-1}.value')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        `;
                        
                        container.appendChild(newAttributeRow);
                    }
                </script> --}}


                <div class="row justify-content-end mt-4">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success float-end">Save Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
