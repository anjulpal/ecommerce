@extends('admin.layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Coupon Manage</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($post->id))
                            <form action="{{ route('admin.coupon.edit', $post->id) }}" method="post">
                        @else
                            <form action="{{ route('admin.coupon.create') }}" method="post">
                        @endif
                            @csrf
                            <input type="hidden" name="couponstatus" value="off">

                            <!-- Category Name Field -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input 
                                            class="form-control" 
                                            name="coupon_tittle" 
                                            type="text" 
                                            value="{{ $post ? $post->coupon_tittle : '' }}" 
                                            placeholder="Enter your Category name" 
                                        />
                                        <label for="coupon_tittle">Tittle</label>
                                        @if ($errors->has('coupon_tittle'))
                                            <div class="alert alert-danger mt-2">
                                                {{ $errors->first('coupon_tittle') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Coupon Field -->
                            <div class="form-floating mb-3">
                                <input 
                                    class="form-control" 
                                    name="coupon" 
                                    type="text" 
                                    value="{{ $post ? $post->coupon : '' }}" 
                                    placeholder="Enter your coupon" 
                                />
                                <label for="coupon">Coupon</label>
                                @if ($errors->has('coupon'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('coupon') }}
                                    </div>
                                @endif
                            </div>

                            <!-- Category Status Toggle -->
                           
                            <div class="form-floating mb-3">
                                <input 
                                    class="form-control" 
                                    name="coupon_value" 
                                    type="text" 
                                    value="{{ $post ? $post->coupon_value : '' }}" 
                                    placeholder="Enter your coupon_value" 
                                />
                                <label for="coupon_value">value</label>
                                @if ($errors->has('coupon_value'))
                                    <div class="alert alert-danger mt-2">
                                        {{ $errors->first('coupon_value') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-floating mb-3">
                            <input type="checkbox"  data-toggle="toggle"  data-on="Active"   data-off="Deactive" data-onstyle="success" name="couponstatus"  data-offstyle="danger"  {{ $post && $post->couponstatus == 1 ? 'checked' : '' }}>

                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    @if (isset($post) && $post->id)
                                        <input 
                                            type="submit" 
                                            name="submit" 
                                            class="btn btn-primary btn-block" 
                                            value="Update Coupon" 
                                        />
                                    @else
                                        <input 
                                            type="submit" 
                                            name="submit" 
                                            class="btn btn-primary btn-block" 
                                            value="Create Coupon" 
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
