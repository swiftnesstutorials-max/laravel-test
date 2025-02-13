<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\student;
use App\Models\subject;
use App\Models\level;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $student=Student::OrderBy('id','desc')->paginate(2);
        if($request->query('search')){
        $student=Student::where('name','like','%'.$request->query('search').'%')->paginate(2);
        }
       // $student=Student::where('name','like','m%')->get();
        return view('manage_student',['students'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)

    {
      
       $subject=Subject::all();
        $level=Level::all();
    
        return view('student',['levels'=>$level,'subjects'=>$subject]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=validator::make($request->all(),[
            'level_id'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:students',
            'phone'=>'required|digits:10',

        ]);
        if($validator->passes()){

            
            $student=Student::create([
                'level_id'=>$request->level_id,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,

            ]);
             foreach($request->subjects as $subjectid){
                $subject=Subject::find($subjectid);
               $subject->students()->attach($student->id);            
            }
             return redirect()->route('student')->with('success','add successfully');
        }else{
            return redirect()->route('student.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
      
    {
        $level=Level::all();
        $subject=Subject::all();
        //$student=Student::find($id);
        return view('student_edit',['student'=>$student,'levels'=>$level,'subjects'=>$subject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
         $validator=validator::make($request->all(),[
            'level_id'=>'required',
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|digits:10',

        ]);
        if($validator->passes()){
           $student->level_id=$request->level_id;
           $student->name=$request->name;
           $student->email=$request->email;
           $student->phone=$request->phone;
           $student->subjects()->sync($request->subjects);
           $student->save();
           return redirect()->route('student')->with('update','update successfully');
             
        }else{
            return redirect()->back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student,int $id)
    {
        $student=Student::find($id);
        $student->delete();
    }
}
