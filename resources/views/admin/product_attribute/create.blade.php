@extends('admin.layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">product Manage</h3>
                    </div>
                    <div class="card-body">

                       @if (isset($product->id))
                                <form action="{{ route('admin.product_attribute.edit') }}" method="post" enctype="multipart/form-data">
                            @else
                                <form action="{{ isset($product_id) ?? route('admin.product_attribute.create', $product_id) }}" method="post" enctype="multipart/form-data">
                            @endif

                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product_id ?? '' }}">
                            <div id="product-rows">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name="category[]" id="cars" class="form-select">
                                            <option value="">Select category</option>
                                           @foreach($category as $categories)
                                             <option value=" {{$categories->id}}"> {{ $categories->category_name }} </option>
                                             @endforeach
                                        </select>

                                        @if ($errors->has('category'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('category') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                             </div>

                        <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">

                                        <select name="color[]" id="color" class="form-select">

                                            <option>select color</option>
                                            @foreach($color as $colors)
                                                <option value=" {{ $colors->id }}"> {{ $colors->color }} </option>
                                               
                                            @endforeach
                                        </select>
                                        <label for="coupon_tittle"> Color </label>
                                        @if ($errors->has('size'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('size') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                       <select  name="size[]" id="color" class="form-select">
                                            <option value="">select Size </option>
                                            @foreach($size as $sizes)
                                            <option value="{{$sizes->id}}"> {{ $sizes->size }}</option>
                                            @endforeach
                                        </select>
                                      

                                        <label for="coupon_tittle">Size</label>
                                        @if ($errors->has('size'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('size') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>




                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input name="sku[]" class="form-control" type="text"  placeholder="Enter your sku"/>
                                         <label for="coupon_tittle">SKU</label>
                                        @if ($errors->has('brand'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('brand') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"  name="mrp[]" type="number"  placeholder="Enter your mrp"/>
                                        <label for="coupon_tittle">MRP</label>
                                        @if ($errors->has('model'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('model') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>




                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control"  name="quantity[]" type="number"  placeholder="Enter your quantity"/>
                                        <label for="coupon_tittle">Quantity</label>
                                        @if ($errors->has('short_desc'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('short_desc') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control"  name="price[]" type="number"  placeholder="Enter your price"/>
                                        <label for="coupon_tittle">Price</label>
                                        @if ($errors->has('desc'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('desc') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>


                           <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input 
                                            class="form-control" 
                                            name="product_attribute[]" 
                                            type="file" 
                                             placeholder="Enter your product image"
                                        />
                                        
                                        @if ($errors->has('warranty'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('warranty') }}
                                            </div>
                                        @endif
                                    </div>
                                  
                                </div>
                            </div>

                         

                          </div>
                   
                          <button type="button" id="add-row" class="btn btn-primary">Add Row</button>
                            <!-- Submit Button -->
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    @if (isset($product_attribute) && $product_attribute->id)
                                   
                                        <input 
                                            type="submit" 
                                            name="submit" 
                                            class="btn btn-primary btn-block" 
                                            value="Update Product" 
                                        />
                                    @else
                                        <input 
                                            type="submit" 
                                            name="submit" 
                                            class="btn btn-primary btn-block" 
                                            value="Create Product" 
                                        />
                                    @endif
                                </div>
                            </div>
                        </form>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <div class="card-footer text-center py-3">
                        <div class="small">
                            <a href="login.html">Have an account? Go to login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready( function() {

            $('#add-row').click(function () {

                var newRow = `
           
          <div id="product-row">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select name="category[]" id="cars" class="form-select">
                                            <option value="">Select category</option>
                                           
                                           
                                          @foreach($category as $categories)
                                        
                                          <option value=" {{$categories->id}}"> {{ $categories->category_name }} </option>

                                          @endforeach

                                        </select>

                                        @if ($errors->has('category'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('category') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                             </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">

                                        <select name="color[]" id="color" class="form-select">

                                            <option>select color</option>
                                            @foreach($color as $colors)
                                                <option value=" {{ $colors->id }}"> {{ $colors->color }} </option>
                                               
                                            @endforeach
                                        </select>
                                        <label for="coupon_tittle"> Color </label>
                                        @if ($errors->has('size'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('size') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                       <select  name="size[]" id="color" class="form-select">
                                            <option value="">select Size </option>
                                            @foreach($size as $sizes)
                                            <option value="{{$sizes->id}}"> {{ $sizes->size }}</option>
                                            @endforeach
                                        </select>
                                      

                                        <label for="coupon_tittle">Size</label>
                                        @if ($errors->has('size'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('size') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>




                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input name="sku[]" class="form-control" type="text"  placeholder="Enter your sku"/>
                                         <label for="coupon_tittle">SKU</label>
                                        @if ($errors->has('brand'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('brand') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control"  name="mrp[]" type="number"  placeholder="Enter your mrp"/>
                                        <label for="coupon_tittle">MRP</label>
                                        @if ($errors->has('model'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('model') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>




                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control"  name="quantity[]" type="number"  placeholder="Enter your quantity"/>
                                        <label for="coupon_tittle">Quantity</label>
                                        @if ($errors->has('short_desc'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('short_desc') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control"  name="price[]" type="number"  placeholder="Enter your price"/>
                                        <label for="coupon_tittle">Price</label>
                                        @if ($errors->has('desc'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('desc') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>


                           <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input 
                                            class="form-control" 
                                            name="product_attribute[]"
                                            type="file" 
                                             placeholder="Enter your product image"
                                        />
                                        
                                        @if ($errors->has('warranty'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('warranty') }}
                                            </div>
                                        @endif
                                    </div>
                                  
                                </div>
                            </div>

                         

                       <div class="col-md-6">
                        <button type="button" class="btn btn-danger remove-row">Remove Row</button>
                    </div>

           
         `;
           $('#product-rows').append(newRow);

          
            })
         
            $(document).on('click', '.remove-row', function() {

$(this).closest('#product-row').remove();




})
        })

</script>
@endsection