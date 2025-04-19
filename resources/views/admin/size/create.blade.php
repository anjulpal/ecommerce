@extends('admin.layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Size Manage</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($size->id))
                            <form action="{{ route('admin.size.edit', $size->id) }}" method="post">
                        @else
                            <form action="{{ route('admin.size.create') }}" method="post">
                        @endif
                            @csrf
                            <input type="hidden" name="sizestatus" value="off">

                            <!-- Category Name Field -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input 
                                            class="form-control" 
                                            name="size" 
                                            type="text" 
                                            value="{{$size ? $size->size : ''}}"
                                            placeholder="Enter your size" 
                                        />
                                        <label for="coupon_tittle">Size</label>
                                        @if ($errors->has('size'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('size') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                          <div class="form-floating mb-3">
                            <input type="checkbox"  data-toggle="toggle"  data-on="Active"   data-off="Deactive" data-onstyle="success" name="sizestatus"  data-offstyle="danger"  {{ $size->sizestatus == 1 ? 'checked' : '' }}>
                           
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    @if (isset($size) && $size->id)
                                        <input 
                                            type="submit" 
                                            name="submit" 
                                            class="btn btn-primary btn-block" 
                                            value="Update Size" 
                                        />
                                    @else
                                        <input 
                                            type="submit" 
                                            name="submit" 
                                            class="btn btn-primary btn-block" 
                                            value="Create Size" 
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
@endsection
