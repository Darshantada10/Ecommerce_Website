<div class="modal fade" id="AddTaskModal" tabindex="-1" aria-labelledby="AddTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="AddTaskModalLabel">Add New Task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form id="AddTaskForm">
                
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="Name" required>
                </div>
                
                <div class="mb-3">
                    <label for="Age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="Age" required>
                </div>
                
                <div class="mb-3">
                    <label for="City" class="form-label">City</label>
                    <input type="text" class="form-control" id="City" required>
                </div>
                
                <div class="mb-3">
                    <label for="Salary" class="form-label">Salary</label>
                    <input type="number" class="form-control" id="Salary" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Task</button>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>

    document.getElementById('AddTaskForm').addEventListener('submit',function(e)
    {
        e.preventDefault();
        
        var TaskData = {

             Name : document.getElementById('Name').value,
             Age : document.getElementById('Age').value,
             City : document.getElementById('City').value,
             Salary : document.getElementById('Salary').value,
        };
        
        fetch('/admin/api/task/save',{
            method:'POST',
            headers: {'Content-Type':'application/json','X-CSRF-Token':'{{csrf_token()}}'},
            body: JSON.stringify(TaskData),
        }).then(response => response.json()).then(data => {
            
        if(data.Success == true)
        {
            alert("Task Added Successfully!");
            const modal = bootstrap.Modal.getInstance(document.getElementById('AddTaskModal'));
            modal.hide();

            // document.getElementById('Name').value = '';
            // document.getElementById('Age').value = '';
            // document.getElementById('City').value = '';
            // document.getElementById('Salary').value = '';

            document.getElementById('AddTaskForm').reset();
            DisplayData();

          }
          else
          {
            alert("Failed To Add Task!");
          }
            
        }).catch(error=>console.error('Error Adding Task: ',error));
    });


  </script>