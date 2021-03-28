<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index($id){
        $student = Student::where('user_id',$id)->get();
        dump($student);
    }
}
