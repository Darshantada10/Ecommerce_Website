@extends('Layouts.Admin.App')

@section('Content')
    
@if (session('success'))
<p class="text-primary">{{session('success')}}</p>
@endif

<div class="card">
    <h5 class="card-header">
        All Tasks
        <a href="{{url('/admin/task/create')}}" class="btn rounded-pill btn-primary float-end">
            <i class="bx bx-list-plus"></i> Add Task</a>



    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>City</th>
            <th>Salary</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                
           
            
            @endforeach
            
        </tbody>
      </table>

      </div>
    </div>



@endsection