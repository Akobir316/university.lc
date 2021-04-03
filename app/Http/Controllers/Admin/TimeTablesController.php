<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Day;
use App\Models\Discipline;
use App\Models\Faculty;
use App\Models\Group;
use App\Models\Kafedrs;
use App\Models\Lesson;
use App\Models\LessType;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Http\Request;

class TimeTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::paginate(10);

        $data = [];
        foreach ($faculties as $faculty){
            $data[$faculty->name]= $faculty->groups;
        }

        return view('admin.timetables.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        $group = Group::find($_GET['id']);
        $days = Day::pluck('name', 'id');
        $disciplines = Discipline::pluck('name', 'id');
        $lessons = Lesson::pluck('less_num', 'id');
        $teachers = Teacher::pluck('fio', 'id');
        $lesstypes = LessType::pluck('type', 'id');
        $classrooms = Classroom::whereNull('status')->get();


        return view('admin.timetables.create', compact('group', 'days', 'disciplines','lessons', 'lesstypes','teachers', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {


        if(TimeTable::where('day_id', $request->day_id)->where('lesson_id',$request->lesson_id)->where('classroom_id',$request->classroom_id)->exists()){
            return redirect()->route('timetables.create', ['id'=>$request->group_id])->with('error', 'В это время комната занята');
        }
        if (TimeTable::where('day_id', $request->day_id)->where('lesson_id',$request->lesson_id)->where('teacher_id', $request->teacher_id)->exists()){
            return redirect()->route('timetables.create', ['id'=>$request->group_id])->with('error', 'В это время у учителя знаятие!');
        }

        TimeTable::create($request->all());

        return redirect()->route('timetables.show', ['timetable'=>$request->group_id])->with('success', 'Предмет добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($id);
        $results=[];
        $timetables = TimeTable::where('group_id', $id)->orderBy('day_id')->get();
        foreach ($timetables as $timetable) {
                $results[$timetable->day->name][$timetable->lesson_id] = [
                    'id'=>$timetable->id,
                    'time'=>substr($timetable->lesson->start_time,0,-3),
                    'discipline' => $timetable->discipline->name,
                    'lesstype' => $timetable->less_type->type,
                    'teacher' => $timetable->teacher->fio,
                    'classroom' => $timetable->classroom->name
                ];
        }

       return view('admin.timetables.timetable', compact('group', 'results'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timetable = TimeTable::find($id);

        $days = Day::pluck('name', 'id');
        $disciplines = Discipline::pluck('name', 'id');
        $lessons = Lesson::pluck('less_num', 'id');
        $teachers = Teacher::pluck('fio', 'id');
        $lesstypes = LessType::pluck('type', 'id');
        $classrooms = Classroom::whereNull('status')->get();

        return view('admin.timetables.edit', compact('timetable','days','disciplines', 'lessons', 'teachers', 'lesstypes', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if(TimeTable::where('day_id', $request->day_id)->where('lesson_id',$request->lesson_id)->where('teacher_id', $request->teacher_id)->exists()){
            return redirect()->route('timetables.edit', ['timetable'=>$id])->with('error', 'В это время у учителя занятие!');
        }
        if(TimeTable::where('day_id', $request->day_id)->where('lesson_id',$request->lesson_id)->where('classroom_id',$request->classroom_id)->exists()){

            return redirect()->route('timetables.edit', ['timetable'=>$id])->with('error', 'В это время комната занята');

        }
        TimeTable::find($id)->update($request->all());
        return redirect()->route('timetables.show',['timetable'=>$request->group_id])->with('success', 'Изменения сохранены');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $timetable = TimeTable::find($id);

        TimeTable::destroy($id);
        return redirect()->route('timetables.show',['timetable'=>$timetable->group_id])->with('success', 'Удалено ');
    }
}
