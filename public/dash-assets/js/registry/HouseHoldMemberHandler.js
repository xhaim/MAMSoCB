const AddHHMemberBtn = document.getElementById('AddHHMember');
let memberCount = 2; // Initial member count

function addMember() {
    
    const formContainer = document.getElementById('HHMEMBERS');
    const newMemberDetails = document.createElement('div');
    newMemberDetails.id = `hhMemberDetails${memberCount}`;
    newMemberDetails.innerHTML = `
        <h5>HH Member Details</h5>
            <div class="form-group">
            <label for="hh_member" class="col-sm-8 control-label">HH Member</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="hh_member${memberCount}" name="hh_member${memberCount}" placeholder="Enter HH Member" maxlength="100" >
            </div>

            <div class="form-group">
            <label for="surname" class="col-sm-8 control-label">Surname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="surname${memberCount}" name="surname${memberCount}" placeholder="Enter Surname" maxlength="100" >
            </div>
            </div>

            <div class="form-group">
            <label for="firstname" class="col-sm-8 control-label">First Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="firstname${memberCount}" name="firstname${memberCount}" placeholder="Enter First Name" maxlength="100" >
            </div>
            </div>

            <div class="form-group">
            <label for="middlename" class="col-sm-8 control-label">Middle Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="middlename${memberCount}" name="middlename${memberCount}" placeholder="Enter Middle Name" maxlength="100" >
            </div>
            </div>

            <div class="form-group">
            <label for="gender" class="col-sm-8 control-label">Gender</label>
            <div class="col-sm-12">
                <select class="form-control" id="gender${memberCount}" name="gender${memberCount}" >
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
            </div>
            </div>
            
            <div class="form-group">
            <label for="age" class="col-sm-8 control-label">Age</label>
            <div class="col-sm-12">
                <input type="number" class="form-control" id="age${memberCount}" name="age${memberCount}" placeholder="Enter Age" >
            </div>
            </div>

            <div class="form-group">
            <label for="birthdate" class="col-sm-8 control-label">Date of Birth (mm/dd/yyyy)</label>
            <div class="col-sm-12">
                <input type="date" class="form-control" id="birthdate${memberCount}" name="birthdate${memberCount}" placeholder="Enter Date of Birth (mm/dd/yyyy)" >
            </div>
            </div>
            <button class="btn-danger" type="button" id="RemHHMBtn${memberCount}" onclick="removeMember(${memberCount})">Remove Member</button>
    
        </div>
        <hr>
        <!-- Add other form fields here -->
    `;
    

    formContainer.appendChild(newMemberDetails);
    memberCount++;

    if (memberCount === 21) {
        AddHHMemberBtn.style.display = 'none';
    }
}

function removeMember(memberId) {
    const elementToRemove = document.getElementById(`hhMemberDetails${memberId}`);

    const hh_member = document.getElementById(`hh_member${memberId}`);
    const surname = document.getElementById(`surname${memberId}`);
    const firstname = document.getElementById(`firstname${memberId}`);
    const middlename = document.getElementById(`middlename${memberId}`);
    const gender = document.getElementById(`gender${memberId}`);
    const age = document.getElementById(`age${memberId}`);
    const birthdate = document.getElementById(`birthdate${memberId}`);

     hh_member.value = '';
     surname.value = '';
     firstname.value = '';
     middlename.value = '';
     gender.value = 'Male'; // Set a default value, e.g., 'Male' for the gender select
     age.value = '';
     birthdate.value = '';

    if (elementToRemove) {
        elementToRemove.remove();
    }
    memberCount--;
}