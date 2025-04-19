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
                        <th> SKU </th>
                        <th> MRP </th>
                        <th> Quantity </th>
                        <th> Product_attribute_image </th>
                        <th> Color </th>
                        <th> Size </th>
                        <th> Category </th>
                        <th> Action </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{ $row->sku }}</td>
                            <td>{{ $row->mrp }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td>{{ $row->product_attribute_image }}</td>
                            <td>{{ $row->color->color ?? '' }}</td>
                            <td>{{ $row->size->size  ?? '' }}</td>
                            <td>{{ $row->category->category_name ?? '' }}</td>
                            <td>
                                <a href="{{ route('admin.color.delete', $row->id) }}" class="btn btn-warning btn-flat" data-id="{{ $row->id }}">
                                    <i class="fa fa-lg fa-trash" id="icon-{{ $row->id }}"></i>
                                </a>
                                <a href="{{ route('admin.color.edit', $row->id) }}" class="btn btn-warning btn-flat" data-id="{{ $row->id }}">
                                    <i class="fa fa-lg fa-edit" id="edit-icon-{{ $row->id }}"></i>
                                </a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
