@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Tên Sản Phẩm</th>
            <th>Nội Dung</th>
            <th>Ngày Bình Luận</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $key => $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{$comment->user->name}}</td>
                <td>{{ $comment->post->name }}</td>
                <td>{{ $comment->comment_body }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>
{{--                    <a class="btn btn-primary btn-sm" href="/admin/comments/view/{{ $comment->id }}">--}}
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $comment->id }}, '/admin/comments/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $comments->links() !!}
    </div>
@endsection
