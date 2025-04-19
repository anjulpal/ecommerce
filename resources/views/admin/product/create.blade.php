@extends('admin.layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Product Manage</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($product->id) ? route('admin.product_attribute.edit', $product->id) : route('admin.product.create') }}" 
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="productstatus" value="off">
                            <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">

                            <h1>Product Attribute</h1>

                            <!-- Dynamic Attributes Rows Container -->
                            <div id="product-rows">
                                @if($product_attribute->isEmpty())
                                    <!-- If there are no product attributes, show one empty row -->
                                    <div class="product-row" id="product-row-0">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select name="category[0]" class="form-select">
                                                        <option value="">Select category</option>
                                                        @foreach($category as $categories)
                                                            <option value="{{$categories->id}}">{{$categories->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select name="color[0]" class="form-select">
                                                        <option value="">Select color</option>
                                                        @foreach($color as $colors)
                                                            <option value="{{$colors->id}}">{{$colors->color}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <select name="size[0]" class="form-select">
                                                        <option value="">Select Size</option>
                                                        @foreach($size as $sizes)
                                                            <option value="{{$sizes->id}}">{{$sizes->size}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row mb-3">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" id="add-row">Add Row</button>
                                    </div>
                                 </div>
                                    </div>
                                @else
                                    <!-- Loop through existing product attributes if available -->
                                    @foreach($product_attribute as $key => $attribute)

                                       
                                        <div class="product-row"  name="product_attribute_id" value="{{$attribute->id }}">
                                        @foreach($product_attribute as $attribute)
                                            <input type="hidden" name="product_attribute_id[]" value="{{ $attribute->id }}">
                                        @endforeach
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="category[]" class="form-select">
                                                            <option value="">Select category</option>
                                                            @foreach($category as $categories)
                                                                <option value="{{$categories->id}}" 
                                                                    {{ $categories->id == $attribute->category_id ? 'selected' : '' }}>
                                                                    {{$categories->category_name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="color[]" class="form-select">
                                                            <option value="">Select color</option>
                                                            @foreach($color as $colors)
                                                                <option value="{{$colors->id}}" 
                                                                    {{ $colors->id == $attribute->color_id ? 'selected' : '' }}>
                                                                    {{$colors->color}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="size[]" class="form-select">
                                                            <option value="">Select Size</option>
                                                            @foreach($size as $sizes)
                                                                <option value="{{$sizes->id}}" 
                                                                    {{ $sizes->id == $attribute->size_id ? 'selected' : '' }}>
                                                                    {{$sizes->size}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            @if($key == 0)
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-primary" id="add-row">Add Row</button>
                                                </div>

                                                <br>
                                             @else
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-danger remove-row" data-row-id="{{ $attribute->id }}">Remove</button>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    @endforeach
                                @endif
                               
                            </div>

                            <!-- Add Row Button -->
                            <div class="row mb-3">
                        

                            <div class="mt-4 mb-0 d-grid">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" 
                                value="{{ isset($product) ? 'Update Product' : 'Create Product' }}">
                            </div>
                        </form>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- jQuery and Custom Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let categories = @json($category);
        let colors = @json($color);
        let sizes = @json($size);

        let rowCount = @json(count($product_attribute)) || 0;

        // Add new row when the button is clicked
        $('#add-row').click(function () {
            rowCount++;

            const newRow = `
                <div class="product-row" id="product-row-${rowCount}">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <select name="category[${rowCount}]" class="form-select">
                                    <option value="">Select category</option>
                                    ${categories.map(category => `
                                        <option value="${category.id}">
                                            ${category.category_name}
                                        </option>
                                    `).join('')}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <select name="color[${rowCount}]" class="form-select">
                                    <option value="">Select color</option>
                                    ${colors.map(color => `
                                        <option value="${color.id}">
                                            ${color.color}
                                        </option>
                                    `).join('')}
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-floating mb-3 mb-md-0">
                                <select name="size[${rowCount}]" class="form-select">
                                    <option value="">Select Size</option>
                                    ${sizes.map(size => `
                                        <option value="${size.id}">
                                            ${size.size}
                                        </option>
                                    `).join('')}
                                </select>
                            </div>
                        </div>
                    </div>
                   
                </div>
            `;

            $('#product-rows').append(newRow);
        });

        // Remove row when the remove button is clicked
        $(document).on("click", ".remove-row", function () {
            const rowId = $(this).data('row-id');
            $(`#product-row-${rowId}`).remove();
        });
    });
</script>

@endsection
