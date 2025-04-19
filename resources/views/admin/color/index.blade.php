
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
                                            <th>Color</th>
                                            <th>status</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($rows as $color)
                                         <tr>
                                            <td>{{ $color->color}}</td>
                                            <td>@if( $color->colorstatus ===1 )
                                            <input type="checkbox" checked data-id="{{ $color->id}}" checked class="colorstatus" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" name="colorstatus" data-offstyle="danger">
                                            @else
                                                <input type="checkbox"  class="colorstatus" data-id="{{ $color->id}}" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" name="colorstatus" data-offstyle="danger">
                                            @endif
                                         </td>

                                            <td><a href="{{route('admin.color.delete', (  $color->id) )}}" class="btn btn-warning btn-flat" data-id="{{ $color->id}}"><i class="fa fa-lg fa-trash" id="icon-{{ $color->id}}"></i> </a>
                                            <a href="{{route('admin.color.edit', (  $color->id) )}}" class="btn btn-warning btn-flat" data-id="{{ $color->id}}"> <i class="fa fa-lg fa-edit" id="edit-icon-{{$color->id}}"></i> </a></td>
                                            
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
                       
                        $(document).on('change', '.colorstatus', function(){
                       
                           var id =  $(this).data("id");
                           
                          var status = $(this).prop('checked');
                        
                          $.ajax({

                            url: "{{ route('admin.color.status')}}",
                            type: "GET",
                            data: {
                                id: id,
                                size: status,
                                
                             }
                          })

                        })
                    })

                </script>

