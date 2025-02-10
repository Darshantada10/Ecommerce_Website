<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::all();
        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $employee = Employee::create($request->all());
        return response()->json( $employee);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $employee = Employee::find($id);
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
        // dd($employee);
        // if(isset($employee))
        // {
        // }
        // else
        // {
        //     return response()->json("no data found");
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return response()->json(data: $employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json(['message'=>"data deleted successfully"]);

    }
}
