@extends('admin.main')

@section('content')
    <table class="table" style="background:#bee5eb" >
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Danh Mục</th>
            <th>Giá Gốc</th>
            <th>Giá Khuyến Mãi</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        {{--        lấy dữ liệu san pham ra--}}
        @foreach($sales as $key => $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->name }}</td>
                <td>{{ $sale->menu->name }}</td>
                <td>{{ $sale->price }}</td>
                <td>{{ $sale->price_sale }}</td>
                <td>{!! \App\Helpers\Helper::active($sale->active) !!}</td>
                <td>{{ $sale->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/sales/edit/{{ $sale->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $sale->id }}, '/admin/sales/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $sales->links() !!}
        {{--        phân trang--}}
    </div>
@endsection


