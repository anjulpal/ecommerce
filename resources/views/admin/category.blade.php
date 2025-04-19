@extends('admin.layouts.app')
@section('content')
<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Category</h3></div>
                                    <div class="card-body">
                                        
                                        @if (isset($post->id))
                                            <form action="{{route('admin.category.edit', $post->id)}}" method="post">  
                                        
                                        
                                            @else
                                            <form action="{{route('admin.user.categorycreate')}}" method="post">
                                        
                                            @endif
                                            @csrf
                                            <input type="hidden" name="categorystatus" value="off">
                                        <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                       <input class="form-control" name="category_name" type="text" value="{{ $post ? $post->category_name : '' }}" placeholder="Enter your Category name" />

                                                        <label for="inputFirstName">Category name</label>
                                                        @if($errors->has('category_name'))
                                                        <div class="alert alert-danger mt-2">
                                                         {{ $errors->first('category_name') }}
                                                         </div>
                                                         @endif
                                                    </div>
                                                </div>
                                               
                                            </div>
                                          

                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="category_url" type="text"value="{{ $post ? $post->category_url : '' }}" placeholder="Enter your Category url" />
                                                <label for="inputEmail">Category url</label>
                                                @if($errors->has('category_url'))
                                                        <div class="alert alert-danger mt-2">
                                                         {{ $errors->first('category_url') }}
                                                         </div>
                                                         @endif
                                            </div>

                                            <div class="form-floating mb-3">
                                            <input type="checkbox" checked data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" name="categorystatus" data-offstyle="danger">
                                                <label for="inputEmail"></label>
                                            </div>
                                            @if(isset($post) && $post->id)
    <div class="mt-4 mb-0">
        <div class="d-grid">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update Category">
        </div>
    </div>
@else
    <div class="mt-4 mb-0">
        <div class="d-grid">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Create Category">
        </div>
    </div>
@endif

</form>
                                        @if (session('success'))
                                         <div class="alert alert-success mt-3">
                                      {{ session('success') }}
                                 </div>
                                  @endif
                                  
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               
@endsection