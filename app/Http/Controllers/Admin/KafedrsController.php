<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Faculty;
use App\Models\Kafedrs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KafedrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $kafedrs = Kafedrs::paginate(10);


        return view('admin.kafedrs.index',compact('kafedrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::pluck('name','id');
        return view('admin.kafedrs.create',compact('faculties'));
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
            'id_faculty'=>'integer',
            'name'=>'required',
            'fio_manage'=>'required',
            'room'=>'required',
        ]);
        if(Classroom::where('name', $request->room)->whereNull('status')->exists()){
            Kafedrs::create($request->all());
            Classroom::where('name',$request->room)->update(['status'=>$request->name]);
            return redirect()->route('kafedrs.index')->with('success', 'Кафедра добавлена');
        }

        return redirect()->route('kafedrs.create')->with('error','Введенная комната занята или не существует');
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
        $kafedry = Kafedrs::find($id);
        $faculties = Faculty::pluck('name','id');
        return view('admin.kafedrs.edit', compact('kafedry', 'faculties'));

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
        $kafedry = Kafedrs::find($id);
        if($kafedry->room !== $request->room&&Classroom::where('name', $request->room)->whereNull('status')->exists()) {
            Classroom::where('name', $kafedry->room)->update(['status'=>null]);
            Classroom::where('name', $request->room)->update(['status'=>$request->name]);
        } else {
            return redirect()->route('kafedrs.edit', $id)->with('error','Введенная комната занята или не существует');
        }
        $kafedry->update($request->all());
        return redirect()->route('kafedrs.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Classroom::where('name', Kafedrs::find($id)->room)->update(['status'=>null]);
        Kafedrs::destroy($id);
        return redirect()->route('kafedrs.index')->with('success', 'Кафедра удалена');
    }
}
