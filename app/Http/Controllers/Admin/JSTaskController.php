<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JSTask;
use Illuminate\Http\Request;

class JSTaskController extends Controller
{
    public function Index()
    {
        $tasks = JSTask::all();

        return view('Admin.Task.Index',compact('tasks'));
    }
}
