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
            
                    <select class="form-select" id="category_id" name="category_id" required>
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
           
            <div class="row mb-3">
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
            </div>

            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" required>
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
          
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                    @error('description')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="original_price" class="col-sm-2 col-form-label">Original Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="original_price" id="original_price" required>
                    @error('original_price')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
           
            <div class="row mb-3">
                <label for="sale_price" class="col-sm-2 col-form-label">Sale Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="sale_price" id="sale_price">
                    @error('sale_price')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sku" id="sku">
                    @error('sku')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        
            <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Featured Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                    @error('image')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3">
                <label for="gallery" class="col-sm-2 col-form-label">Gallery Images</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="gallery[]" id="gallery" accept="image/*">
                    <small class="text-muted">You can select multiple images or video for the gallery</small>
                    @error('gallery')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1" checked >
                        <label for="status" class="form-check-label">Visible</label>
                    </div>
                    @error('status')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
           
            <div class="row mb-4 mt-5">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Product Variant</h5>
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input" id="has_variants" name="has_variants" value="1">
                            <label for="has_variants" class="form-check-label">This Product has Variants</label>
                        </div>
                    </div>
                </div>
            </div>

            <div id="AttributeOptionsSection" style="display: none">
                
                <div class="row mb-3">
                    
                    <div class="col-12 mb-3">
                        <h6>Define Variant Attributes</h6>
                        <p class="text-muted">Define attributes for your product variants (eg: color,size,model,etc.).You can add as many as attributes as needed</p>
                    </div>

                </div>

                <div id="attributeContainer">

                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <button type="button" class="btn btn-outline-primary" id="addAttributeType">
                            <i class="bx bx-plus"></i>Add New Attribute Type
                        </button>
                    </div>
                </div> 

                <div class="row mb-4 mt-4">
                    <div class="col-12">
                        <button type="button" class="btn btn-secondary" id="generateVariants">Generate Variants</button>
                        <button type="button" class="btn btn-outline-info ms-2" id="previewVariants">Preview Variants</button>
                    </div>
                </div>

            </div>
          
          {{-- <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div> --}}
        </form>
      </div>
    </div>
  </div>


  <script>

    document.addEventListener('DOMContentLoaded',function(){

        const hasVariantsCheckbox = document.getElementById('has_variants');
        const AttributeOptionsSection = document.getElementById('AttributeOptionsSection');

        hasVariantsCheckbox.addEventListener('change',function(){
            AttributeOptionsSection.style.display = this.checked ? 'block' : 'none';

            if(this.checked && document.querySelectorAll('.attribute-card').length === 0)
            {
                addAttributeCard('Color');
                // addAttributeCard('Size');
            }
        });
        
        document.getElementById('addAttributeType').addEventListener('click',function(){
            addAttributeCard();
        });

        function addAttributeCard(defaultName = "")
        {
           const attributeContainer = document.getElementById('attributeContainer');
           const attributeId = 'attr_' + Date.now();
           const attributeName = defaultName || 'Enter Your Attribute';

            const card = document.createElement('div');
            card.classList.add('row','mb-3','attribute-card');
            card.dataset.attributeId = attributeId;

            card.innerHTML = 
            `
                <div class="col-md-4 mb-3">

                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <input type="text" class="form-control attribute-name" value="${attributeName}" placeholder="Attribute Name" name="attribute_names[]" required>

                            <button type="button" class="btn btn-sm btn-outline-danger ms-2 remove-attribute-card">
                                <i class="bx bx-trash"></i>
                            </button>

                        </div>

                        <div class="card-body">

                            <div class="attribute-values" data-attribute-id="${attributeId}">

                            <div class="mb-2 d-flex attribute-value-row">
                                
                                <input type="text" class="form-control me-2 attribute-value" name="attribute_values[${attributeId}][]" placeholder="Enter Your value">

                                <button type="button" class="btn btn-sm btn-outline-danger remove-option">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </div>

                        </div>

                        <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-value-btn" data-attribute-id="${attributeId}">
                            <i class="bx bx-plus"></i> Add value
                        </button>

                    </div>
                </div>
            </div>
            `;

            attributeContainer.appendChild(card);
            // card.classList.remove

            setupCardEventListeners(card);
        }

        function setupCardEventListeners(card)
        {
            card.querySelector('.remove-attribute-card').addEventListener('click',function()
            {
                card.remove();
            });

            card.querySelector('.add-value-btn').addEventListener('click',function(){

                const attributeId = this.dataset.attributeId;
                const valuesContainer = card.querySelector(`.attribute-values[data-attribute-id="${attributeId}"]`);

                const newValuesRows = document.createElement('div');
                newValuesRows.classList.add('mb-2','d-flex','attribute-value-row');
                newValuesRows.innerHTML = 
                `
                    <input type="text" class="form-control me-2 attribute-value" name="attribute_values[${attributeId}][]" placeholder="Enter Your Value">
                    <button type="button" class="btn btn-sm btn-outline-danger remove-option">
                        <i class="bx bx-trash"></i>
                    </button>
                `;

                valuesContainer.appendChild(newValuesRows);

                newValuesRows.querySelector('.remove-option').addEventListener('click',function(){
                    newValuesRows.remove();
                });
            });

            card.querySelectorAll('.remove-option').forEach(button => {
                button.addEventListener('click',function(){
                    this.closest('.attribute-value-row').remove();
                });
            });

        }

        document.getElementById('generateVariants').addEventListener('click',function(){
            console.log("called Generate Variants");
            
        });

        document.getElementById('previewVariants').addEventListener('click',function(){
            console.log("called Preview Variants");
            
        });


    })

  </script>
@endsection