<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Faculty;
use App\Models\Kafedrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class FacultiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::paginate(10);
        return view('admin.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'fio_dean'=>'required',
            'room'=>'required'
        ]);
        if(Classroom::where('name', $request->room)->whereNull('status')->exists()){
            Faculty::create($request->all());
            Classroom::where('name',$request->room)->update(['status'=>$request->name]);
            return redirect()->route('faculties.index')->with('success', 'Факультет добавлен');
        }
        return redirect()->route('faculties.index')->with('error','Введенная комната занята или не существует');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::find($id);
        return view('admin.faculties.edit', compact('faculty'));
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
        $faculty = Faculty::find($id);

        if($faculty->room !== $request->room&&Classroom::where('name', $request->room)->whereNull('status')->exists()) {
            Classroom::where('name', $faculty->room)->update(['status'=>null]);
            Classroom::where('name', $request->room)->update(['status'=>$request->name]);
        } else {
            return redirect()->route('faculties.edit', $id)->with('error','Введенная комната занята или не существует');
        }
        $faculty->update($request->all());
        return redirect()->route('faculties.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(Kafedrs::where('faculty_id', $id)->count()){
            return redirect()->route('faculties.index')->with('error', 'Невозможно удалить, факультет имеет кафедры');
        } Classroom::where('name', Faculty::find($id)->room)->update(['status'=>null]);
        Faculty::destroy($id);
        return redirect()->route('faculties.index')->with('success', 'Факультет удален');
    }
}
