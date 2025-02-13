<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::all();
        return view('level', ['levels' => $levels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=validator::make($request->all(),[
            'name'=>'required'

        ]);
        if($validator->passes()){
            $level=Level::create([
                'name'=>$request->name
            ]);
            $level->save();
            return redirect()->route('level')->with('success','class added successfully');
        }else{
            return redirect()->route('level')->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(level $level,int $id)
    {
        $level=Level::find($id);
        return view('level_edit',['level'=>$level]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, level $level)
    {
        $level->name=$request->name;
        $level->save();
        return redirect()->route('level.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(level $level)
    {
        $level->delete();
        return redirect('level')->with('delete','delete successfully');
    }
}
