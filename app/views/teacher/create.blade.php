@extends('frame')
@section('content')
    <form action="" enctype="multipart/form-data" method="post">
        <p>
            <label for="">name</label>
            <input type="text" name="name" value="{{ isset($_POST['name']) ? $_POST['name'] : '' }}"
                class="form-control">
            <span style="color: red">{{ isset($error['name']) ? $error['name'] : '' }}</span>
        </p>
        <p>
            <label for="">gender</label>
            <select name="gender" class="form-control">
                <option value="0">nam</option>
                <option value="1">nữ</option>
                <option value="3">khác</option>
            </select>
        </p>
        <p>
            <label for="">school</label>
            <select name="school_id" class="form-control">
                @foreach ($schools as $key => $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <label for="">avatar</label>
            <input type="file" name="avatar" class="form-control"
                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            <img id="blah" alt="your image" width="150" />
            <span style="color: red">{{ isset($error['avatar']) ? $error['avatar'] : '' }}</span>
        </p>
        <p>
            <label for="">major</label>
            <input type="text" name="major" value="{{ isset($_POST['major']) ? $_POST['major'] : '' }}"
                class="form-control">
            <span style="color: red">{{ isset($error['major']) ? $error['major'] : '' }}</span>
        </p>
        <p>
            <label for="">salary</label>
            <input type="number" name="salary" value="{{ isset($_POST['salary']) ? $_POST['salary'] : '' }}"
                class="form-control">
            <span style="color: red">{{ isset($error['salary']) ? $error['salary'] : '' }}</span>
        </p>
        <p>
            <label for="">birthday</label>
            <input type="date" name="birthday" value="{{ isset($_POST['birthday']) ? $_POST['birthday'] : '' }}"
                class="form-control">
            <span style="color: red">{{ isset($error['birthday']) ? $error['birthday'] : '' }}</span>
        </p>
        <p>
            <button type="submit" class="btn btn-success">thêm</button>
        </p>
    </form>
@endsection
