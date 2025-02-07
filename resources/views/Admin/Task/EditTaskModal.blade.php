<div class="modal fade" id="EditTaskModal" tabindex="-4" aria-labelledby="EditTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="EditTaskModalLabel">Update Task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form id="EditTaskForm">
                
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    {{-- <input type="text" class="form-control" id="Name" required value="{{$data->name}}"> --}}
                    <input type="text" class="form-control" id="Edit_Name" required>
                    {{-- <input type="text" class="form-control" id="Name" required> --}}
                </div>
                
                <div class="mb-3">
                    {{-- <label for="Id" class="form-label">ID</label> --}}
                    <input class="form-control" id="Edit_Id" type="hidden" required>
                </div>

                <div class="mb-3">
                    <label for="Age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="Edit_Age" required>
                </div>
                
                <div class="mb-3">
                    <label for="City" class="form-label">City</label>
                    <input type="text" class="form-control" id="Edit_City" required>
                </div>
                
                <div class="mb-3">
                    <label for="Salary" class="form-label">Salary</label>
                    <input type="number" class="form-control" id="Edit_Salary" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Task</button>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('EditTaskForm').addEventListener('submit',function(e){
      e.preventDefault();

      var id = document.getElementById('Edit_Id').value;
      var name = document.getElementById('Edit_Name').value;
      var age = document.getElementById('Edit_Age').value;
      var city = document.getElementById('Edit_City').value;
      var salary = document.getElementById('Edit_Salary').value;

      fetch(`/admin/api/task/update/${id}`,{
        method: 'POST',
        headers: {'Content-Type':'Application/json','X-CSRF-TOKEN':'{{csrf_token()}}'},
        body: JSON.stringify({
          id: id,
          Name:name,
          Age:age,
          City:city,
          Salary:salary,
        })
      }).then(response => response.json()).then(data => {
        // console.log(data);
        if(data.Success == true)
      {
        alert('Task Updated Successfully');
        document.getElementById('EditTaskForm').reset();
        DisplayData();
        var modal = bootstrap.Modal.getInstance(document.getElementById('EditTaskModal'));
        modal.hide();
      }
      else
      {
        alert('Error Updating Task');
      }
        
      });


    });
  </script>

  {{-- <script>

    document.getElementById('EditTaskForm').addEventListener('submit',function(e)
    {
        e.preventDefault();
        



        // var TaskData = {

        //      Name : document.getElementById('Name').value,
        //      Age : document.getElementById('Age').value,
        //      City : document.getElementById('City').value,
        //      Salary : document.getElementById('Salary').value,
        // };
        
        // fetch('/admin/api/task/save',{
        //     method:'POST',
        //     headers: {'Content-Type':'application/json','X-CSRF-Token':'{{csrf_token()}}'},
        //     body: JSON.stringify(TaskData),
        // }).then(response => response.json()).then(data => {
            
        // if(data.Success == true)
        // {
        //     alert("Task Added Successfully!");
        //     const modal = bootstrap.Modal.getInstance(document.getElementById('AddTaskModal'));
        //     modal.hide();

        //     // document.getElementById('Name').value = '';
        //     // document.getElementById('Age').value = '';
        //     // document.getElementById('City').value = '';
        //     // document.getElementById('Salary').value = '';

        //     document.getElementById('AddTaskForm').reset();
        //     DisplayData();

        //   }
        //   else
        //   {
        //     alert("Failed To Add Task!");
        //   }
            
        }).catch(error=>console.error('Error Updating Task: ',error));
    // });


  </script> --}}