@extends('admin.main')

@section('content')
    <div class="card">
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-info">
                    <thead>
                    <tr>
                        <th style="width: 50px">ID</th>
                        <th>Name</th>
                        <th>Active</th>
                        <th>Update</th>
                        <th style="width: 100px">Edit  /  Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    {!! \App\Helpers\Helper::menu($menus) !!}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

