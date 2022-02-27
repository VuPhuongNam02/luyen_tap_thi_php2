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
            <label for="">address</label>
            <input type="text" name="address" value="{{ isset($_POST['address']) ? $_POST['address'] : '' }}"
                class="form-control">
            <span style="color: red">{{ isset($error['address']) ? $error['address'] : '' }}</span>
        </p>
        <p>
            <label for="">logo</label>
            <input type="file" name="logo" class="form-control"
                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            <img id="blah" alt="your image" width="150" />
            <span style="color: red">{{ isset($error['logo']) ? $error['logo'] : '' }}</span>
        </p>
        <p>
            <button type="submit" class="btn btn-success">thêm</button>
        </p>
    </form>
@endsection
