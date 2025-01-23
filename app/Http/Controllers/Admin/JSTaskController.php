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
}
