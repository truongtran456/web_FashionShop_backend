
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Email</th>
            <th>Tiêu Đề</th>
            <th>Nội Dung</th>
            <th>Ngày Bình Luận</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $key => $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{$contact->email}}</td>
                <td>{{ $contact->title }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $contact->id }}, '/admin/contacts/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
{{--        {!! $comments->links() !!}--}}
    </div>
@endsection
