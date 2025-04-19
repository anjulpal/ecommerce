
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
                                            <th>Category Name</th>
                                            <th>Category Url</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($row as $post)
                                         <tr>
                                            <td>{{$post->category_name}}</td>
                                            <td>{{$post->category_url}}</td>
                                            <td>@if($post->categorystatus === 1) 
                                            <input type="checkbox" checked data-toggle="toggle" class="statusid" data-on="Active" data-off="Deactive" data-id="{{$post->id}}"
                                             data-onstyle="success" name="categorystatus" data-offstyle="danger">
                                         @else
                                          <input type="checkbox" data-toggle="toggle"  class="statusid" data-id="{{$post->id}}" data-on="Active" data-off="Deactive" 
                                            data-onstyle="success" name="categorystatus" data-offstyle="danger">
                                        @endif
                                     
                                        </td>
                                            <td><a href="{{route('admin.category.delete', ( $post->id) )}}" class="btn btn-warning btn-flat" data-id="{{$post->id}}"><i class="fa fa-lg fa-trash" id="icon-{{$post->id}}"></i> </a>
                                            <a href="{{route('admin.category.edit', ( $post->id) )}}" class="btn btn-warning btn-flat" data-id="{{$post->id}}"> <i class="fa fa-lg fa-edit" id="edit-icon-{{$post->id}}"></i> </a></td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                @endsection
               
                <script>
                    $(document).ready(function(){
                       $(document).on("change", ".statusid", function(){
                      var id = $(this).data("id");
                       var status = $(this).prop('checked');
                       
                        $.ajax({

                            url:"{{ route('admin.category.status')}}",
                            type: "GET",
                            data:{
                                id: id,
                                statusid: status==true ? 1 : 0,
                            
                            },
                            success: function(response) {
                            console.log("Success:", response);
                           },

                        })
                    })
                    })
            </script>