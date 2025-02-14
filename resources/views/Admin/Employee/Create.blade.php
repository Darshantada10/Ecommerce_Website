<div class="modal fade" id="CreateEmployeeModal" tabindex="-1" aria-labelledby="CreateEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="CreateEmployeeModalLabel">Add New Employee</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <form id="CreateEmployeeForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="Name" required>
                </div>
                
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="mail" class="form-control" id="Email" required>
                </div>
                
                <div class="mb-3">
                    <label for="Position" class="form-label">Position</label>
                    <input type="text" class="form-control" id="Position" required>
                </div>
                
                <div class="mb-3">
                    <label for="Gender" class="form-label">Gender</label>
                    {{-- <input type="number" class="form-control" id="Gender" required> --}}
                    <input type="radio" id="Gender" name="Gender" value="Male">Male
                    <input type="radio" id="Gender" name="Gender" value="Female">Female
                </div>

                <div class="mb-3">
                    <label for="Hobby" class="form-label">Hobby</label>
                    {{-- <input type="number" class="form-control" id="Hobby" required> --}}
                    <input type="checkbox" id="Hobby" name="Hobby" value="Cricket">Cricket
                    <input type="checkbox" id="Hobby" name="Hobby" value="Football">Football
                    <input type="checkbox" id="Hobby" name="Hobby" value="Travelling">Travelling
                    <input type="checkbox" id="Hobby" name="Hobby" value="Music">Music
                    
                </div>

                <div class="mb-3">
                    <label for="Experience" class="form-label">Experience</label>
                    {{-- <input type="number" class="form-control" id="Experience" required> --}}
                    <select name="Experience" id="Experience" class="form-control">
                        <option value="0">Fresher</option>
                        <option value="1">1 Year</option>
                        <option value="2">2 Year</option>
                        <option value="3">3 Year</option>
                        <option value="4">4 Year</option>
                        <option value="5">5 Year</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="Profile" class="form-label">Profile</label>
                    <input type="file" class="form-control" id="Profile" name="Profile">
                </div>

                <div class="mb-3">
                    <label for="Address" class="form-label">Address</label>
                    {{-- <input type="number" class="form-control" id="Address" required> --}}
                    <textarea name="Address" id="Address" class="form-control" required></textarea>
                </div>

                <button type="button" class="btn btn-primary" onclick="CreateEmployee()">Add Employee</button>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <script>
    function CreateEmployee()
    {
        // console.log("inside function create");
        let EmployeeData = new FormData();
        
        EmployeeData.append('name',document.getElementById('Name').value);
        EmployeeData.append('email',document.getElementById('Email').value);
        EmployeeData.append('position',document.getElementById('Position').value);
        EmployeeData.append('experience',document.getElementById('Experience').value);
        EmployeeData.append('address',document.getElementById('Address').value);

        let GenderButton = document.getElementsByName('Gender');
        // console.log(GenderButton);
        let SelectedGender = "";
        for(let Gender of GenderButton)
        {
            if(Gender.checked)
            {
                SelectedGender = Gender.value;
                break;
            }
        }
        
        EmployeeData.append('gender',SelectedGender);

        let HobbyElementsMaruBanavelu = document.getElementsByName('Hobby');
        let SelectedHobbies = [];
        
        for(let hobby of HobbyElementsMaruBanavelu)
        {
            if(hobby.checked)
            {
                SelectedHobbies.push(hobby.value);
            }
        }

        EmployeeData.append('hobby',SelectedHobbies);

        // console.log(SelectedHobbies);
        

        // console.log(SelectedGender);

        let ProfilePicture = document.getElementById('Profile');
        
        if(ProfilePicture.files.length>0)
        {
            EmployeeData.append('profile',ProfilePicture.files[0]);
        }
        // console.log(ProfilePicture.files);
        
        // console.log(EmployeeData);

        fetch('/api/employees',{
            method:'POST',
            body: EmployeeData
        }).then(response => response.json()).then(data => {
            DisplayData();
            document.getElementById('CreateEmployeeForm').reset();
            bootstrap.Modal.getInstance(document.getElementById('CreateEmployeeModal')).hide();
            // console.log(data);
            // console.log("Form submitted");
        });
        
        
    }
  </script>