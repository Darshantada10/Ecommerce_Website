<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JSTask;
use Illuminate\Http\Request;

class JSTaskController extends Controller
{
    public function Index()
    {
        // $tasks = JSTask::all();

        return view('Admin.Task.Index');
    }
    public function APIAllData()
    {
        $tasks = JSTask::all();
        // dd($tasks);
        // echo($tasks);
        $data = json_encode($tasks);
        // echo($data);
        return response()->json($data);
    }

    public function Store(Request $request)
    {
        $request->validate([
            'Name'=>'required|string|max:255', 
            'Age'=>'required|integer', 
            'City'=>'required|string|max:255', 
            'Salary'=>'required|numeric', 
        ]);
        
        // dd($request);
        $task = new JSTask();
        $task->name = $request->Name;
        $task->age = $request->Age;
        $task->city = $request->City;
        $task->salary = $request->Salary;
        $task->save();

        return response()->json(['Success'=>true,'Message'=>"Task Added Successfully"]);
    }

    public function UpdateData($id)
    {
        // dd($id,"received form controler");
        $data = JSTask::findOrFail($id);
        // dd($data);
        return response()->json($data);
    }

    public function Update(Request $request,$id)
    {
        // dd($request,$id);
        $task = JSTask::findOrFail($id);
        // dd($task);
        $task->update([
            'name' =>$request->Name,
            'age' =>$request->Age,
            'city' =>$request->City,
            'salary' =>$request->Salary,
        ]);
        return response()->json(['Success'=>true,'Message'=>"Task Updated Successfully"]);

    }

    public function Delete(Request $request)
    {
        // dd($request);
        JSTask::destroy($request->id);

        return response()->json(['Success'=>true,'Message'=>"Task Deleted Successfully"]);
    }
}
