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
        // http://localhost:8000/api/employees -> local url example
        // https://www.perenexa.com/api/employees -> live url example
        // i will provide this same url to Android app developer , ios app developer and software developer
        return response()->json($employee);
    }

    public function WebsiteIndexPage()
    {
        // $employee = Employee::all();
        // ,compact('employee')
        return view('Admin.Employee.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // laravel website mate
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users,email,',
        //     'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        //     'address' => 'nullable|string',
        //     'insurance' => 'nullable|string',
        //     'marital_status' => 'nunllable',
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
                // mobile application mate

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users,email,',
        //     'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        //     'address' => 'nullable|string',
        //     'insurance' => 'nullable|string',
        //     'marital_status' => 'nunllable',
        // ]);
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
