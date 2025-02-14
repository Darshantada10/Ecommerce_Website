@extends('Layouts.Admin.App')

@section('Content')
    
@if (session('success'))
<p class="text-primary">{{session('success')}}</p>
@endif

@include('Admin.Employee.Create')

<div class="card">
    <h5 class="card-header">
        All Employees
        {{-- <a href="#" class="btn rounded-pill btn-primary float-end" onclick="ShowCreateModal()">
            <i class="bx bx-list-plus"></i> Add Employee</a> --}}
        <button class="btn rounded-pill btn-primary float-end" onclick="ShowCreateModal()">
            <i class="bx bx-list-plus"></i> Add Employee</button>



    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="text-nowrap">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th>Experience</th>
            <th>Profile</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="EmployeesData">
            {{-- @foreach ($employee as $brand)
                
            <tr>
                <th>{{$brand->id}}</th>
                <th>{{$brand->name}}</th>
               
                <th>{{$brand->position}}</th>
                <th>{{$brand->email}}</th>
                <th>{{$brand->experience}}</th>
                <th>{{$brand->gender}}</th>
                <th>{{$brand->address}}</th>
                <th>
                    <a href="{{url('admin/employee/edit/'.$brand->id)}}" class="btn btn-sm btn-primary">Update</a>
                    
                    <a href="{{url('admin/employee/delete/'.$brand->id)}}" class="btn btn-sm btn-danger">Delete</a>
                    
                </th>
                
            </tr>
            
            @endforeach --}}
            
        </tbody>
      </table>

      </div>
    </div>

<script>
  function ShowCreateModal()
  {
    // console.log("inside function");
    // document.getElementById('CreateEmployeeForm')
    new bootstrap.Modal(document.getElementById('CreateEmployeeModal')).show();
    
  }

    function DisplayData()
{

  fetch(`/api/employees`).then(response => response.json()).then(Employees => {
    console.log(Employees);
    // var Employees = JSON.parse(data);
    // console.log(Employees);

    var AllData = document.getElementById('EmployeesData')
    
    AllData.innerHTML = "";
    var TableData = "";
    Employees.forEach(employee => {
      TableData += 
      `
        <tr>
          <td>${employee.id}</td>
          <td>${employee.name}</td>
          <td>${employee.email}</td>
          <td>${employee.position}</td>
          <td>${employee.gender}</td>
          <td>${employee.hobby}</td>
          <td>${employee.experience}</td>
          <td>${employee.profile}</td>
          <td>${employee.address}</td>
          <td>
              <button class="btn btn-primary btn-sm edit-btn" data-id="${employee.id}" data-bs-toggle="modal" data-bs-target="#EditEmployeeModal" onclick="EditData(${employee.id})">Edit</button>
              <button class="btn btn-danger btn-sm delete-btn" data-id="${employee.id}">Delete</button>
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