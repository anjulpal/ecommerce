@extends('admin.layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Color Manage</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($color->id))
                            <form action="{{ route('admin.color.edit', $color->id) }}" method="post">
                        @else
                            <form action="{{ route('admin.color.create') }}" method="post">
                        @endif
                            @csrf
                            <input type="hidden" name="colorstatus" value="off">

                            <!-- Category Name Field -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input 
                                            class="form-control" 
                                            name="color" 
                                            type="text" 
                                            value="{{$color ? $color->color : ''}}"
                                            placeholder="Enter your size" 
                                        />
                                        <label for="coupon_tittle">color</label>
                                        @if ($errors->has('color'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('color') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                          <div class="form-floating mb-3">
                            <input type="checkbox"  data-toggle="toggle"  data-on="Active"   data-off="Deactive" data-onstyle="success" name="colorstatus"  data-offstyle="danger"  {{ $color->colorstatus == 1 ? 'checked' : '' }}>
                           
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    @if (isset($color) && $color->id)
                                        <input 
                                            type="submit" 
                                            name="submit" 
                                            class="btn btn-primary btn-block" 
                                            value="Update Color" 
                                        />
                                    @else
                                        <input 
                                            type="submit" 
                                            name="submit" 
                                            class="btn btn-primary btn-block" 
                                            value="Create Color" 
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
