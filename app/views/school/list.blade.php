@extends('frame')
@section('content')
    @include('nav')
    <br>
    <a href="{{ BASE_URL }}schools/tao" class="btn btn-success">thêm mới</a>
    <br>
    <table class="table table-light">
        <thead>
            <th>ID</th>
            <th>Tên </th>
            <th>Địa chỉ</th>
            <th>Logo</th>
        </thead>
        <tbody>
            @foreach ($schools as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->address }}</td>
                    <td><img src="public/img/{{ $item->logo }}" alt="" width="150"></td>
                    <td> <a href="{{ BASE_URL }}schools/sua/{{ $item->id }}" class="btn btn-success">sửa</a></td>
                    <td> <a href="{{ BASE_URL }}schools/xoa/{{ $item->id }}" class="btn btn-danger">xóa</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
