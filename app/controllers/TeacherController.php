<?php

namespace App\Controllers;

use App\Models\School;
use App\Models\Teacher;

class TeacherController
{
    public function index()
    {
        return view('teacher.list', [
            'teachers' => Teacher::all()
        ]);
    }

    public function taoForm()
    {
        return view('teacher.create', [
            'schools' => School::all()
        ]);
    }

    public function luuTao()
    {
        $error = array();
        if ($_POST['name'] == '') {
            $error['name'] = 'ko đc để trống';
        }
        if ($_POST['major'] == '') {
            $error['major'] = 'ko đc để trống';
        }
        if ($_POST['salary'] == '') {
            $error['salary'] = 'ko đc để trống';
        }
        if ($_POST['birthday'] == '') {
            $error['birthday'] = 'ko đc để trống';
        }
        if ($_FILES['avatar']['size'] <= 0) {
            $error['avatar'] = 'hãy thêm ảnh';
        }

        if (!empty($error)) {
            return view('teacher.create', [
                'error' => $error,
                'schools' => School::all()
            ]);
        } else {
            echo "insert data";
            $model = new Teacher();
            $model->fill($_POST);

            $img = $_FILES['avatar']['name'];
            $tmp = $_FILES['avatar']['tmp_name'];
            move_uploaded_file($tmp, 'public/img/' . $img);

            $model->avatar = $img;
            $model->save();
            header('location: ' . BASE_URL . 'teachers');
        }
    }

    public function suaForm($id)
    {
        return view('teacher.edit', [
            'teacher' => Teacher::find($id),
            'schools' => School::all()
        ]);
    }
    public function luuSua($id)
    {
        $error = array();
        if ($_POST['name'] == '') {
            $error['name'] = 'ko đc để trống';
        }
        if ($_POST['major'] == '') {
            $error['major'] = 'ko đc để trống';
        }
        if ($_POST['salary'] == '') {
            $error['salary'] = 'ko đc để trống';
        }
        if ($_POST['birthday'] == '') {
            $error['birthday'] = 'ko đc để trống';
        }

        if (!empty($error)) {
            return view('teacher.create', [
                'error' => $error,
                'schools' => School::all()
            ]);
        } else {
            echo "update data";
            $model = Teacher::find($id);
            $model->fill($_POST);

            if ($_FILES['avatar']['size'] <= 0) {
                $img = $model->avatar;
            } else {
                $img = $_FILES['avatar']['name'];
                $tmp = $_FILES['avatar']['tmp_name'];
                move_uploaded_file($tmp, 'public/img/' . $img);
            }

            $model->avatar = $img;
            $model->save();
            header('location: ' . BASE_URL . 'teachers');
        }
    }

    public function xoa($id)
    {
        $model = Teacher::find($id);
        $model->delete();
        header('location: ' . BASE_URL . 'teachers');
    }
}