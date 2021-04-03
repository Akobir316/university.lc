<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Day;
use App\Models\Lesson;
use App\Models\LessType;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachersController extends Controller
{
    public function index($id){
        $teacher = Teacher::where('user_id', $id)->get();
        return view('teacher', compact('teacher'));
    }
    public function filterTable(Request $request)
    {

        $request->validate([
            'room'=>'required'
        ]);
        $room = $request->room . $request->korpus;
        $classroom = Classroom::where('name',$room)->whereNull('status')->get();
        if($classroom->count()) {
            $time = explode('/', $request->time);
            $para = Lesson::all();
            $k=0;
            foreach ($para as $par){
                if(strtotime($time[1])>strtotime($par->start_time)&&strtotime($time[1])<strtotime($par->end_time)){
                    $k = $par->less_num;
                }
            }
            $res = [];
            if($k) {
                $timeTables = TimeTable::where('day_id', $time[0])->where('lesson_id',$k)->get();
                foreach ($timeTables as $timeTable) {
                    if($room == $timeTable->classroom->name){
                        $res['k'] = $timeTable->lesson->less_num;
                        $res['group'] = $timeTable->group->group;
                        $res['para'] = $timeTable->discipline->name;
                        $res['type'] = $timeTable->less_type->type;
                        $res['teacher'] = $timeTable->teacher->fio;
                    }
                }
                $request->session()->flash('er', 'В данный момент это комната пустая...');
                return view('teacher', compact('res'));
            }
            $request->session()->flash('er', 'Учёба с 8:30 до 18:00');
            return view('teacher');
        }
        $request->session()->flash('er','В университете не существует  или введенная комната зарезервирована'.$room.'-аудитория');
        return view('teacher');

    }
}
