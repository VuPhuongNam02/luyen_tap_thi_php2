@extends('frame')
@section('content')
    @include('nav')
    <br>
    <a href="{{ BASE_URL }}teachers/tao" class="btn btn-success">thêm mới</a>
    <br>
    <table class="table table-light">
        <thead>
            <th>ID</th>
            <th>Tên </th>
            <th>giới tính</th>
            <th>trường</th>
            <th>ảnh</th>
            <th>chuyên ngành</th>
            <th>lương</th>
            <th>ngày sinh</th>
        </thead>
        <tbody>
            @foreach ($teachers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ App\helper\helper::gender($item->gender) }}</td>
                    <td>{{ $item->school->name }}</td>
                    <td><img src="public/img/{{ $item->avatar }}" alt="" width="150"></td>
                    <td>{{ $item->major }}</td>
                    <td>{{ $item->salary }}</td>
                    <td>{{ $item->birthday }}</td>
                    <td> <a href="{{ BASE_URL }}teachers/sua/{{ $item->id }}" class="btn btn-warning">sửa</a></td>
                    <td> <a href="{{ BASE_URL }}teachers/xoa/{{ $item->id }}" class="btn btn-danger">xóa</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
