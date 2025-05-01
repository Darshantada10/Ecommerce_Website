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

                <div class="row mb-4">
                    <div class="col-12">
                        <h6 class="text-primary">Basic Product Information</h6>
                        <hr>
                    </div>
                </div>
                
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
                
                <div class="row mb-4 mt-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-primary">Product Variants</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="has_variants" name="has_variants" value="1">
                                <label class="form-check-label" for="has_variants">This product has variants</label>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                
                <div id="attributeOptionsSection" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-12 mb-3">
                            <h6>Define Variant Attributes</h6>
                            <p class="text-muted">Define attributes for your product variants (e.g., color, size, model). You can add as many attribute types as needed.</p>
                        </div>
                    </div>
                    
                    <div id="attributeContainer">
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-12">
                            <button type="button" class="btn btn-outline-primary" id="addAttributeType">
                                <i class="bx bx-plus"></i> Add New Attribute Type
                            </button>
                        </div>
                    </div>
                    
                    <div class="row mb-4 mt-4">
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary" id="generateVariants">Generate Variants</button>
                            <button type="button" class="btn btn-outline-info ms-2" id="previewVariants">Preview Variants</button>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="variantPreviewModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Variant Preview</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <table class="table table-bordered" id="variantsTable" style="display: none;">
                                    <thead>
                                        <tr>
                                            <th>Variant</th>
                                            <th>SKU</th>
                                            <th>Original Price</th>
                                            <th>Sale Price</th>
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
                    
                    <div class="row mt-3" id="bulkActionsSection" style="display: none;">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Bulk Actions</h6>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Set All Original Prices</label>
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
                </div>
                
                <div class="row justify-content-end mt-4">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() 
    {

        const hasVariantsCheckbox = document.getElementById('has_variants');
        const attributeOptionsSection = document.getElementById('attributeOptionsSection');
        
        hasVariantsCheckbox.addEventListener('change', function() 
        {
            attributeOptionsSection.style.display = this.checked ? 'block' : 'none';
            
            if (this.checked && document.querySelectorAll('.attribute-card').length === 0) 
            {
                addAttributeCard('Color');
            }
        });
        
        document.getElementById('addAttributeType').addEventListener('click', function() 
        {
            addAttributeCard();
        });
        
        function addAttributeCard(defaultName = '') 
        {
            const attributeContainer = document.getElementById('attributeContainer');
            const attributeId = 'attr_' + Date.now();
            const attributeName = defaultName || 'Attribute';
            
            const card = document.createElement('div');
            card.classList.add('row', 'mb-3', 'attribute-card');
            card.dataset.attributeId = attributeId;
            
            card.innerHTML = `
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <input type="text" class="form-control attribute-name" 
                                   value="${attributeName}" placeholder="Attribute Name"
                                   name="attribute_names[]" required>
                            <button type="button" class="btn btn-sm btn-outline-danger ms-2 remove-attribute-card">
                                <i class="bx bx-trash"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="attribute-values" data-attribute-id="${attributeId}">
                                <div class="mb-2 d-flex attribute-value-row">
                                    <input type="text" class="form-control me-2 attribute-value" 
                                           name="attribute_values[${attributeId}][]" placeholder="Value">
                                    <button type="button" class="btn btn-sm btn-outline-danger remove-option">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2 add-value-btn" 
                                    data-attribute-id="${attributeId}">
                                <i class="bx bx-plus"></i> Add Value
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            attributeContainer.appendChild(card);
            
            setupCardEventListeners(card);
        }
        
        function setupCardEventListeners(card) 
        {
            card.querySelector('.remove-attribute-card').addEventListener('click', function() 
            {
                card.remove();
            });
            
            card.querySelector('.add-value-btn').addEventListener('click', function() 
            {
                const attributeId = this.dataset.attributeId;
                const valuesContainer = card.querySelector(`.attribute-values[data-attribute-id="${attributeId}"]`);
                
                const newValueRow = document.createElement('div');
                newValueRow.classList.add('mb-2', 'd-flex', 'attribute-value-row');
                newValueRow.innerHTML = `
                    <input type="text" class="form-control me-2 attribute-value" 
                           name="attribute_values[${attributeId}][]" placeholder="Value">
                    <button type="button" class="btn btn-sm btn-outline-danger remove-option">
                        <i class="bx bx-trash"></i>
                    </button>
                `;
                
                valuesContainer.appendChild(newValueRow);
                
                newValueRow.querySelector('.remove-option').addEventListener('click', function() 
                {
                    newValueRow.remove();
                });
            });
            
            card.querySelectorAll('.remove-option').forEach(button => 
            {
                button.addEventListener('click', function() 
                {
                    this.closest('.attribute-value-row').remove();
                });
            });
        }
        
        document.getElementById('generateVariants').addEventListener('click', function() 
        {
            generateAndDisplayVariants();
        });
        
        document.getElementById('previewVariants').addEventListener('click', function() 
        {
            const attributes = collectAttributeData();
            const combinations = generateCombinations(attributes);
            
            let previewHTML = '<h6>' + combinations.length + ' variants will be generated:</h6>';
            previewHTML += '<ul class="list-group">';
            
            combinations.forEach(combo => {
                const variantName = Object.entries(combo).map(([key, value]) => `${value}`).join(' / ');
                
                previewHTML += `<li class="list-group-item">${variantName}</li>`;
            });
            
            previewHTML += '</ul>';
            
            document.getElementById('previewContent').innerHTML = previewHTML;
            const modal = new bootstrap.Modal(document.getElementById('variantPreviewModal'));
            modal.show();
        });
        
        function collectAttributeData() 
        {
            const attributes = {};
            
            document.querySelectorAll('.attribute-card').forEach(card => 
            {
                const attributeId = card.dataset.attributeId;
                const attributeName = card.querySelector('.attribute-name').value;
                
                if (attributeName.trim() === '')
                {
                    return;
                } 
                
                const values = [];

                card.querySelectorAll('.attribute-value').forEach(input => 
                {
                    if (input.value.trim() !== '') 
                    {
                        values.push(input.value.trim());
                    }
                });
                
                if (values.length > 0) 
                {
                    attributes[attributeName] = values;
                }
            });
            
            return attributes;
        }
        
        function generateAndDisplayVariants() 
        {
            const attributes = collectAttributeData();
            const combinations = generateCombinations(attributes);
            
            const variantsTable = document.getElementById('variantsTable');
            const variantsTableBody = document.getElementById('variantsTableBody');
            const bulkActionsSection = document.getElementById('bulkActionsSection');
            
            variantsTableBody.innerHTML = '';
            
            combinations.forEach((combo, index) => 
            {
                const row = document.createElement('tr');
                
                const variantName = Object.entries(combo).map(([key, value]) => `${value}`).join(' / ');
                
                const attributesInput = Object.entries(combo).map(([key, value]) => `<input type="hidden" name="variants[${index}][attributes][${key}]" value="${value}">`).join('');
                
                const basePrice = document.getElementById('original_price').value || 0;
                
                row.innerHTML = `
                    <td>
                        ${variantName}
                        ${attributesInput}
                    </td>
                    <td>
                        <input type="text" class="form-control variant-sku" name="variants[${index}][sku]" placeholder="SKU">
                    </td>
                    <td>
                        <input type="number" step="0.01" class="form-control variant-price" name="variants[${index}][original_price]" value="${basePrice}">
                    </td>
                    <td>
                        <input type="number" step="0.01" class="form-control variant-sale-price" name="variants[${index}][sale_price]">
                    </td>
                    <td>
                        <input type="number" min="0" class="form-control variant-quantity" name="variants[${index}][quantity]" value="0">
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-variant">Remove</button>
                    </td>
                `;
                
                variantsTableBody.appendChild(row);
            });
            
            if (combinations.length > 0) 
            {
                variantsTable.style.display = 'table';
                bulkActionsSection.style.display = 'block';
                
                document.querySelectorAll('.remove-variant').forEach(button => 
                {
                    button.addEventListener('click', function() 
                    {
                        this.closest('tr').remove();
                        
                        if (variantsTableBody.children.length === 0) 
                        {
                            variantsTable.style.display = 'none';
                            bulkActionsSection.style.display = 'none';
                        }
                    });
                });
                
                document.querySelectorAll('.variant-sku').forEach((input, index) => 
                {
                    const baseSku = document.getElementById('sku').value;
                    if (baseSku) 
                    {
                        input.value = baseSku + '-' + (index + 1);
                    }
                });
                
                setupBulkActions();
            }
        }
        
        function setupBulkActions() 
        {

            document.getElementById('applyBulkOriginalPrice').addEventListener('click', function() 
            {
                const value = document.getElementById('bulkOriginalPrice').value;
                if (value) 
                {
                    document.querySelectorAll('.variant-price').forEach(input => 
                    {
                        input.value = value;
                    });
                }
            });
            
            document.getElementById('applyBulkSalePrice').addEventListener('click', function() 
            {
                const value = document.getElementById('bulkSalePrice').value;
                document.querySelectorAll('.variant-sale-price').forEach(input => 
                {
                    input.value = value;
                });
            });
            
            document.getElementById('applyBulkQuantity').addEventListener('click', function() 
            {
                const value = document.getElementById('bulkQuantity').value;
                if (value) 
                {
                    document.querySelectorAll('.variant-quantity').forEach(input => 
                    {
                        input.value = value;
                    });
                }
            });
        }
        
        document.getElementById('sku').addEventListener('input', function() 
        {
            const baseSku = this.value;
            document.querySelectorAll('.variant-sku').forEach((input, index) => 
            {
                input.value = baseSku ? baseSku + '-' + (index + 1) : '';
            });
        });
        
        function generateCombinations(attributes) 
        {
            const keys = Object.keys(attributes);
            if (keys.length === 0) 
            {
                return [];
            }

            let combinations = attributes[keys[0]].map(value => ({ [keys[0]]: value }));
            
            for (let i = 1; i < keys.length; i++) 
            {
                const currentKey = keys[i];
                const currentValues = attributes[currentKey];
                
                const newCombinations = [];
                combinations.forEach(combo => 
                {
                    currentValues.forEach(value => 
                    {
                        newCombinations.push({ ...combo, [currentKey]: value });
                    });
                });
                
                combinations = newCombinations;
            }
            
            return combinations;
        }
    });

</script>
@endsection


{{-- <input type="text" id="searchBar" placeholder="Search products..." />
<button id="voiceSearchBtn">🎤</button>
<div id="results"></div>

<script>
  const searchBar = document.getElementById('searchBar');
  const voiceSearchBtn = document.getElementById('voiceSearchBtn');

  voiceSearchBtn.addEventListener('click', () => {
    const recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
    recognition.lang = 'en-US';
    recognition.start();

    recognition.onresult = (event) => {
      const transcript = event.results[0][0].transcript;
      searchBar.value = transcript;
      searchProducts(transcript);
    };

    recognition.onerror = (event) => {
      console.error('Voice recognition error:', event.error);
    };
  });

  function searchProducts(query) {
    // Simulating product search (replace with actual API/database call)
    const products = ['Laptop', 'Mobile', 'Headphones', 'Smartwatch'];
    const results = products.filter(product => product.toLowerCase().includes(query.toLowerCase()));
    document.getElementById('results').innerHTML = results.length ? results.join('<br>') : 'No products found';
  }
</script> --}}
