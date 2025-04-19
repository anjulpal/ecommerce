
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
                                            <th>Tittle</th>
                                            <th>Coupon</th>
                                            <th>value</th>
                                            <th>status</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    @foreach($rows as $coupon)
                                         <tr>
                                            <td>{{$coupon->coupon_tittle}}</td>
                                            <td>{{$coupon->coupon}}</td>
                                            <td>{{$coupon->coupon_value}}</td> 
                                            <td>@if($coupon->couponstatus ===1 )
                                            <input type="checkbox" checked data-id="{{$coupon->id}}" checked class="couponstatus" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" name="couponstatus" data-offstyle="danger">
                                            @else
                                                <input type="checkbox"  class="couponstatus" data-id="{{$coupon->id}}" data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" name="couponstatus" data-offstyle="danger">
                                            @endif
                                         </td>

                                            <td><a href="{{route('admin.coupon.delete', ( $coupon->id) )}}" class="btn btn-warning btn-flat" data-id="{{$coupon->id}}"><i class="fa fa-lg fa-trash" id="icon-{{$coupon->id}}"></i> </a>
                                            <a href="{{route('admin.coupon.edit', ( $coupon->id) )}}" class="btn btn-warning btn-flat" data-id="{{$coupon->id}}"> <i class="fa fa-lg fa-edit" id="edit-icon-{{$coupon->id}}"></i> </a></td>
                                            
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

                        $(document).on('change', '.couponstatus', function(){
                           var id =  $(this).data("id");
                         
                          var status = $(this).prop('checked');

                          $.ajax({

                            url: "{{route('admin.coupon.status')}}",
                            type: "GET",
                            data: {
                                id: id,
                                coupon: status,
                                
                             }
                          })

                        })
                    })

                </script>

