
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
                                            <th>Size</th>
                                            <th>status</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($rows as $size)
                                         <tr>
                                            <td>{{ $size->size}}</td>
                                            <td>@if( $size->sizestatus ===1 )
                                            <input type="checkbox" checked data-id="{{ $size->id}}" checked class="sizestatus" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" name="sizestatus" data-offstyle="danger">
                                            @else
                                                <input type="checkbox"  class="sizestatus" data-id="{{ $size->id}}" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" name="sizestatus" data-offstyle="danger">
                                            @endif
                                         </td>

                                            <td><a href="{{route('admin.size.delete', (  $size->id) )}}" class="btn btn-warning btn-flat" data-id="{{ $size->id}}"><i class="fa fa-lg fa-trash" id="icon-{{ $size->id}}"></i> </a>
                                            <a href="{{route('admin.size.edit', (  $size->id) )}}" class="btn btn-warning btn-flat" data-id="{{ $size->id}}"> <i class="fa fa-lg fa-edit" id="edit-icon-{{$size->id}}"></i> </a></td>
                                            
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

