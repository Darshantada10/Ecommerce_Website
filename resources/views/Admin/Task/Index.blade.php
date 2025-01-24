@extends('Layouts.Admin.App')

@section('Content')
    
@include('Admin.Task.AddTaskModal')

@if (session('success'))
<p class="text-primary">{{session('success')}}</p>
@endif

<div class="card">

    <h5 class="card-header">

        All Tasks
        <a href="#" class="btn rounded-pill btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddTaskModal">
            <i class="bx bx-list-plus"></i> Add Task
        </a>

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
        <tbody id="TaskData">
            {{-- <td>helo</td> --}}
        </tbody>
      </table>

      </div>
    </div>


<script>

function DisplayData()
{

  fetch(`/admin/api/all/tasks`).then(response => response.json()).then(data => {
    // console.log(data);
    var Tasks = JSON.parse(data);
    // console.log(Tasks);

    var AllData = document.getElementById('TaskData')
    
    // AllData.innerHTML = "";
    var TableData = "";
    Tasks.forEach(task => {
      TableData += 
      `
        <tr>
          <td>${task.id}</td>
          <td>${task.name}</td>
          <td>${task.age}</td>
          <td>${task.city}</td>
          <td>${task.salary}</td>
          <td>
              <button class="btn btn-primary btn-sm edit-btn" data-id="${task.id}">Edit</button>
              <button class="btn btn-danger btn-sm edit-btn" data-id="${task.id}">Delete</button>
          </td>
        </tr>
      `;
      AllData.innerHTML = TableData;

    });

   });
  
}

DisplayData();
</script>








@endsection


