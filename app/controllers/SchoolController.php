<?php

namespace App\Controllers;

use App\Models\School;
use App\Models\Teacher;

class SchoolController
{
    public function index()
    {
        return view('school.list', [
            'schools' => School::all()
        ]);
    }

    public function taoForm()
    {
        return view('school.create', []);
    }

    public function luuTao()
    {
        $error = array();
        if ($_POST['name'] == '') {
            $error['name'] = 'ko đc để trống';
        }
        if ($_POST['address'] == '') {
            $error['address'] = 'ko đc để trống';
        }
        if ($_FILES['logo']['size'] <= 0) {
            $error['logo'] = 'hãy thêm ảnh';
        }

        if (!empty($error)) {
            return view('school.create', [
                'error' => $error
            ]);
        } else {
            $model = new School();
            $model->fill($_POST);

            $img = $_FILES['logo']['name'];
            $tmp = $_FILES['logo']['tmp_name'];
            move_uploaded_file($tmp, 'public/img/' . $img);

            $model->logo = $img;
            $model->save();
            header('location: ' . BASE_URL . 'schools');
        }
    }

    public function suaForm($id)
    {
        return view('school.edit', [
            'school' => School::find($id)
        ]);
    }
    public function luuSua($id)
    {
        $error = array();
        if ($_POST['name'] == '') {
            $error['name'] = 'ko đc để trống';
        }
        if ($_POST['address'] == '') {
            $error['address'] = 'ko đc để trống';
        }

        if (!empty($error)) {
            return view('school.edit', [
                'error' => $error,
                'school' => School::find($id)
            ]);
        } else {
            $model = School::find($id);
            $model->fill($_POST);

            if ($_FILES['logo']['size'] <= 0) {
                $img = $model->logo;
            } else {
                $img = $_FILES['logo']['name'];
                $tmp = $_FILES['logo']['tmp_name'];
                move_uploaded_file($tmp, 'public/img/' . $img);
            }
            $model->logo = $img;
            $model->save();
            header('location: ' . BASE_URL . 'schools');
        }
    }

    public function xoa($id)
    {
        $model = School::find($id);
        $model->delete();
        header('location: ' . BASE_URL . 'schools');
    }
}