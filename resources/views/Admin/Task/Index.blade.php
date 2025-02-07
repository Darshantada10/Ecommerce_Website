@extends('Layouts.Admin.App')

@section('Content')
    
@include('Admin.Task.AddTaskModal')
@include('Admin.Task.EditTaskModal')

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
    console.log(data);
    var Tasks = JSON.parse(data);
    console.log(Tasks);

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
              <button class="btn btn-primary btn-sm edit-btn" data-id="${task.id}" data-bs-toggle="modal" data-bs-target="#EditTaskModal" onclick="EditData(${task.id})">Edit</button>
              <button class="btn btn-danger btn-sm delete-btn" data-id="${task.id}">Delete</button>
          </td>
        </tr>
      `;
      AllData.innerHTML = TableData;

    });

   });
  
}

DisplayData();

function EditData(id)
{
  fetch(`/admin/api/update/task/${id}`).then(response => response.json()).then(task => {
    // console.log(task);
    document.getElementById('Edit_Id').value = task.id
    document.getElementById('Edit_Name').value = task.name
    // document.getElementById('Name').value = task.name
    document.getElementById('Edit_Age').value = task.age
    document.getElementById('Edit_City').value = task.city
    document.getElementById('Edit_Salary').value = task.salary
  })
  // console.log("called function",id);
  // fetch(`/admin/api/update/task/${id}`).then(response => response.json()).then(data => {
  //   // var Tasks = JSON.parse(data);
  //   // console.log(Tasks);
  //   console.log(data);
  //   // document.getElementById('Salary').value = "Natha Bhai"
  //   document.getElementById('Name').innerHTML = "Natha Bhai"
    
  //   // var AllData = document.getElementById('TaskData')
  // });


}

document.addEventListener('click',function(e)
{
  // console.log(e.target.classList);
  // console.log(e.target.dataset.id);
  
  if(e.target.classList.contains('delete-btn'))
  {
    const DeleteId = e.target.dataset.id; 

    if(confirm("Are You Sure You Want To Delete This?"))
    {
      fetch(`/admin/api/task/delete?id=${DeleteId}`,{method:'GET'}).then(response => response.json()).then(data =>
        {
          console.log(data);
          // location.reload(); //it will reload the page
          DisplayData();

        }
      )
    }
  }

})


</script>








@endsection


