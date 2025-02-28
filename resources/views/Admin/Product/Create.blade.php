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



  <div class="modal fade" id="variantPreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Variant Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <div id="previewContent"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>

  <div class="row mt-3">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-bordered" id="variantsTable" style="display: none">
                <thead>
                    <tr>
                        <th>Varaint</th>
                        <th>SKU</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
    
                <tbody id="variantsTableBody">
    
                </tbody>

            </table>
        </div>
    </div>
  </div>

  <div class="row mt-3" id="bulkActionsSection" style="display: none">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Bulk Actions</h6>
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">Set All Original Price</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" id="bulkOriginalPrice">
                            <button class="btn btn-outline-primary" type="button" id="applyBulkOriginalPrice">Apply</button>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Set All Sale Prices</label>
                        <div class="input-group">
                            <input type="number" step="0.01" class="form-control" id="bulkSalePrice">
                            <button class="btn btn-outline-primary" type="button" id="applyBulkSalePrice">Apply</button>
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                        <label class="form-label">Set All Quantities</label>
                        <div class="input-group">
                            <input type="number" min="0" class="form-control" id="bulkQuantity">
                            <button class="btn btn-outline-primary" type="button" id="applyBulkQuantity">Apply</button>
                        </div>
                    </div>

                </div>
            </div>
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
            // console.log("called Generate Variants");
            GenerateAndDisplayVariants();
            
        });

        document.getElementById('previewVariants').addEventListener('click',function(){
            // console.log("called Preview Variants");
           
            const attributes = collectAttributeData();
            // console.log(attributes);
            
            const combinations = GenerateCombinations(attributes);

            let previewHTML = '<h6>'+ combinations.length + ' Variants will be generated:</h6>';
            previewHTML += '<ul class="list-group">';

                combinations.forEach(combo => {
                    const variantName = Object.entries(combo).map(([key,value])=>value).join('/');
                    // console.log(variantName);
                    
                previewHTML += `<li class="list-group-item"> ${variantName} </li>`;
                });

                previewHTML += `</ul>`;

                document.getElementById('previewContent').innerHTML = previewHTML;
                const modal = new bootstrap.Modal(document.getElementById('variantPreviewModal'));
                modal.show();

        });

        function collectAttributeData()
        {
            const attributes = {};

            document.querySelectorAll('.attribute-card').forEach(card => {
                const attributeId = card.dataset.attributeId;
                const attributeName = card.querySelector('.attribute-name').value;
                
            if(attributeName.trim() === "")
            {
                return;
            }

            const values =[];

            card.querySelectorAll('.attribute-value').forEach(input => {
                
            if(input.value.trim() !== "")
            {
                values.push(input.value.trim());
            }

            });

            if(values.length>0)
            {
                attributes[attributeName] = values;
            }

            });

            return attributes;
        }

        function GenerateAndDisplayVariants()
        {
            const attributes = collectAttributeData();
            const combinations = GenerateCombinations(attributes);
            
            const variantsTable = document.getElementById('variantsTable');
            const variantsTableBody = document.getElementById('variantsTableBody');
            const bulkActionsSection = document.getElementById('bulkActionsSection');
            
            variantsTableBody.innerHTML = '';
            
            combinations.forEach((combo,index)=> {
                const row = document.createElement('tr');

                const variantName = Object.entries(combo).map(([key,value])=> value).join('/');

                const attributesInput = Object.entries(combo).map(([key,value])=> `<input type="hidden" name="variants[${index}][attributes][${key}]" value="${value}">`).join("");

            const basePrice = document.getElementById('original_price').value || 0;





            row.innerHTML = 
            `
                <td>${variantName}${attributesInput}</td>
                
                <td> <input type="text" class="form-control varaint-sku" name="variants[${index}][sku]" placeholder=Enter Your SKU"></td>
                
                <td> <input type="number" step="0.01" class="form-control varaint-price" name="variants[${index}][original_price]" value="${basePrice}" placeholder=Enter Your Original Price"></td>

                <td> <input type="number" step="0.01" class="form-control varaint-sale-price" name="variants[${index}][sale_price]" placeholder=Enter Your Sale Price"></td>
                
                <td> <input type="number" min="0" class="form-control varaint-quantity" name="variants[${index}][quantity]" placeholder=Enter Your Quantity" value="0"></td>

                <td> <button type="button" class="btn btn-sm btn-outline-danger remove-variant">Remove</button> </td>
            `;
            variantsTableBody.appendChild(row);
            });
            
            if(combinations.length >0)
            {
                variantsTable.style.display = "table";
                bulkActionsSection.style.display = "block";

                document.querySelectorAll('.remove-variant').forEach(button => {
                    button.addEventListener('click',function(){
                        this.closest('tr').remove();

                    if(variantsTableBody.children.length === 0 )
                    {
                        variantsTable.style.display = "none";
                        bulkActionsSection.style.display = "none";
                    }
                    }); 
                });

                document.querySelectorAll('.variant-sku').forEach((input,index)=> {
                    const baseSKU = document.getElementById('sku').value;

                if(baseSKU)
                {
                    input.value = baseSKU + '-' + (index+1);
                }

                });

                setupBulkActions();
            }
        }

        function setupBulkActions()
        {
            document.getElementById('applyBulkOriginalPrice').addEventListener('click',function(){
                const value = document.getElementById('bulkOriginalPrice').value;

            if(value)
            {
                document.querySelectorAll('.variant-price').forEach(input =>{
                    input.value = value;
                });
            }
            
        });

        document.getElementById('applyBulkSalePrice').addEventListener('click',function(){
            const value = document.getElementById('bulkSalePrice').value;
            document.querySelectorAll('.variant-sale-price').forEach(input => {
                input.value = value;
            });
        });


        document.getElementById('applyBulkQuantity').addEventListener('click',function()
        {
            const value = document.getElementById('bulkQuantity').value;
            
        if(value)
        {
            document.querySelectorAll('.variant-quantity').forEach(input => {
                input.value = value;
            });
        }
        });
        }


        document.getElementById('sku').addEventListener('input',function(){
            const baseSKU = this.value;

            document.querySelectorAll('.variant-sku').forEach((input,index)=> {
                input.value = baseSKU ? baseSKU+'-'+(index + 1): "";
            });
        });


        function GenerateCombinations(attributes)
        {
            // console.log(attributes);

            const keys = Object.keys(attributes);

        if(keys.length === 0)
        {
            return [];
        }

        let combinations = attributes[keys[0]].map(value => ({[keys[0]]:value}));


        for(let i=1; i<keys.length; i++)
        {
            const currentKey = keys[i];
            const currentValues = attributes[currentKey];



            const newCombinations = [];

            combinations.forEach(combo => {
                currentValues.forEach(values => {
                    newCombinations.push({...combo,[currentKey]:values});
                });
            });

            combinations = newCombinations;
            console.log(combinations);
        }
        return combinations;
            
        }



    })

  </script>
@endsection