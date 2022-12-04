@extends('admin.main')

@section('content')

        <div class="col-sm-10" style="padding-left: 135px">
        <form class="wrap-search-header  ">
            <input class="search" type="search" name="search" placeholder="Search..."
                   style="width: 700px; height: 50px ; margin-bottom: 10px">

            <button class="flex-c-m trans-04 btn btn-primary">
                <i class="zmdi zmdi-search">Search</i>
            </button>
        </form>
        </div>


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
        @foreach($products as $key => $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->menu->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price_sale }}</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $products->links() !!}
        {{--        phân trang--}}
    </div>
@endsection


