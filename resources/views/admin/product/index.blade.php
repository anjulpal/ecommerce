
            @extends('admin.layouts.app')
                @section('content')
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                         <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>product image </th>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>status</th>
                                             <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($rows as $product)
                                           
                                         <tr>
                                            <td> <img src= {{ asset('uploads/' . $product->file_uploads)}}> </td>
                                            <td>{{ $product->name}}</td>
                                            <td>{{ $product->category->category_name ?? 'No Category' }}</td>
                                            <td>
                                                @if($product->productstatus == "0")
                                                    <input type="checkbox" data-toggle="toggle"  data-on="Active" data-off="Deactive" data-onstyle="success" name="productstatus" data-offstyle="danger">
                                                @else 
                                                    <input type="checkbox" data-toggle="toggle" checked data-on="Active" data-off="Deactive" data-onstyle="success" name="productstatus" data-offstyle="danger">
                                                @endif
                                            </td>

                                            <td><a href="{{route('admin.product.delete', (  $product->id) )}}" class="btn btn-warning btn-flat" data-id="{{ $product->id}}"><i class="fa fa-lg fa-trash" id="icon-{{ $product->id}}"></i> </a>


                                            <a href="{{route('admin.product.edit', (  $product->id) )}}" class="btn btn-warning btn-flat" data-id="{{ $product->id}}"> <i class="fa fa-lg fa-edit" id="edit-icon-{{$product->id}}"></i> </a>

                                            <a href="{{route('admin.product_attribute.create',(  $product->id) )}}" class="btn btn-warning btn-flat"> <i class="fa fa-product-hunt"></i>
                                            </a></td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                @endsection
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function(){
                       
                        $(document).on('change', '.sizestatus', function(){
                          
                           var id =  $(this).data("id");
                           
                          var status = $(this).prop('checked');
                        
                          $.ajax({

                            url: "{{ route('admin.size.status')}}",
                            type: "GET",
                            data: {
                                id: id,
                                size: status,
                                
                             }
                          })

                        })
                    })

                </script>

