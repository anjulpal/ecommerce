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

                            <h1> Product </h1>

                           

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-select">
                                        <option value="">Select Category</option>
                                        @foreach($category as $cat)
                                          
                                            <option value="{{ $cat->id }}"
                                                {{ isset($product) && $product->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->category_name }}
                                            </option>
                                            @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $product->name ?? '') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug' , $product->slug ?? '') }}">
                                </div>
                            </div>

                      

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="brand" class="form-label">Brand</label>
                                    <input type="text" class="form-control" name="brand" id="brand" value="{{ old('brand', $product->brand ?? '' )}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="model" class="form-label">Model</label>
                                    <input type="text" class="form-control" name="model" id="model" value="{{ old('model', $product->model ?? '' )}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="short_desc" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_desc" id="short_desc">{{ old('short_desc' , $product->short_desc ?? '') }}</textarea>
                                </div> 
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="desc" class="form-label">Description</label>
                                    <textarea class="form-control" name="desc" id="desc">{{ old('desc', $product->desc ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="keywords" class="form-label">Keywords</label>
                                    <input type="text" class="form-control" name="keywords" id="keywords" value="{{ old('keywords' , $product->keywords ?? '') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="technical_specification" class="form-label">Technical Specification</label>
                                    <textarea class="form-control" name="technical_specification" id="technical_specification">{{ old('technical_specification' , $product->technical_specification ?? '' ) }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="uses" class="form-label">Uses</label>
                                    <textarea class="form-control" name="uses" id="uses">{{ old('uses', $product->uses ?? '' ) }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="warranty" class="form-label">Warranty</label>
                                    <input type="text" class="form-control" name="warranty" id="warranty" value="{{ old('warranty', $product->warranty ?? '') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="productstatus" class="form-label">Status</label><br>
                                    <input type="checkbox"  data-toggle="toggle"  data-on="Active"   data-off="Deactive" data-onstyle="success" name="productstatus"  data-offstyle="danger"  {{ $product && $product->productstatus == 1 ? 'checked' : '' }}>
                                   
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="file_uploads" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" name="file_uploads" id="file_uploads">
                                    <img src="{{ asset('uploads/'.$product->file_uploads) }}"Alt="Profile Image" style="max-width: 50px; border-radius: 50%;">
                                </div>
                            </div>


                            <h1>Product Attribute</h1>

                            <div id="product-rows">
                                @if($product_attribute->isEmpty())
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
                                    @foreach($product_attribute as $key => $attribute)
                                  
                                        <input type="hidden" name="product_attribute_id[]" value="{{ $attribute->id }}">
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

                            <div class="mt-4 mb-0 d-grid">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" 
                                value="{{ isset($product) ? 'Update Product' : 'Create Product' }}">
                            </div>

                        </form>
                        @if (session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
    $('#add-row').click(function () {
        let newRow = `
            <div class="product-row">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-floating mb-3 mb-md-0">
                            <select name="category[]" class="form-select">
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
                            <select name="color[]" class="form-select">
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
                            <select name="size[]" class="form-select">
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
                        <button type="button" class="btn btn-danger remove-row" data-row-id="">Remove</button>
                    </div>
                </div>
            </div>
        `;

        $('#product-rows').append(newRow);
    });

    $(document).on("click", ".remove-row", function () {
        var rowId = $(this).data('row-id');
        var $row = $(this).closest('.product-row'); // reference to the specific row clicked

        if (rowId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('attribute.remove') }}",
                data: { 'id': rowId },
                type: 'GET',
                success: function(response) {
                    alert('Row deleted successfully!');
                    $row.remove(); // Remove only the clicked row
                },
                error: function(xhr) {
                    console.log("Error deleting row");
                }
            });
        } else {
            // Just remove from DOM if it's a new row (not in DB)
            $row.remove();
        }
    });
});

</script>
@endsection
