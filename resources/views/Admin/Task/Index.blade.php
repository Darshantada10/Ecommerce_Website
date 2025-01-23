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
        <tbody id="alldata">
            
        </tbody>
      </table>

      </div>
    </div>


<script>


  fetch(`/admin/api/all/tasks`).then(response => response.json()).then(data => {
    console.log(data);
      

   });


</script>








@endsection


