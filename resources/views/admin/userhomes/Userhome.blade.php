
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Ngày Tạo Tài Khoản</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user_homes as $key => $user_home)
            <tr>
                <td>{{ $user_home->id }}</td>
                <td>{{$user_home->name}}</td>
                <td>{{ $user_home->email }}</td>
                <td>{{ $user_home->created_at }}</td>
                <td>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $user_home->id }}, '/admin/userhomes/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {{--        {!! $userhomes->links() !!}--}}
    </div>
@endsection

