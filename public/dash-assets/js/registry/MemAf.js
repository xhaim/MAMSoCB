const addMemAfBtn = document.getElementById('AddMemAf');
let MemAfCount = 2; // Initial member count

console.log('Value of MemAfCount:', MemAfCount);

function addMemAf() {
    const MemAfFormContainer = document.getElementById('MemAfDetails');
    const newMemAfDetails = document.createElement('div');
    newMemAfDetails.id = `MemAf${MemAfCount}`;
    newMemAfDetails.innerHTML = `
            <h5>Organization Details</h5>

            <div class="form-group">
            <label for="membership" class="col-sm-8 control-label">Name of Organizations/Clubs/Cooperative/Associations</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="membership${MemAfCount}" name="membership${MemAfCount}" placeholder="Enter Name of Organizations/Clubs/Cooperative/Associations" maxlength="255" >
            </div>
            </div>
            
            <div class="form-group">
            <label for="position" class="col-sm-8 control-label">Position</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="position${MemAfCount}" name="position${MemAfCount}" placeholder="Enter Position" maxlength="255" >
            </div>
            </div>
            
            <div class="form-group">
            <label for="member_since" class="col-sm-8 control-label">Member Since</label>
            <div class="col-sm-12">
                <input type="number"  placeholder="Enter year" min="1900" max="2100" class="form-control" id="member_since${MemAfCount}" name="member_since${MemAfCount}" >
            </div>
            </div>
            
            <div class="form-group">
            <label for="status" class="col-sm-8 control-label">Status</label>
            <div class="col-sm-12">
                <select class="form-control" id="status${MemAfCount}" name="status${MemAfCount}">
                <option value="ACTIVE">ACTIVE</option>
                <option value="INACTIVE">INACTIVE</option>
                </select>
            </div>
            </div>

            <button class="btn-danger" type="button" id="RemMemAfBtn${MemAfCount}" onclick="removeMemAf(${MemAfCount})">Remove Membership & Affiliation</button>
    
        </div>
        <hr>
        <!-- Add other form fields here -->
    `;
    

    MemAfFormContainer.appendChild(newMemAfDetails);
    MemAfCount++;

    if (MemAfCount === 6) {
        addMemAfBtn.style.display = 'none';
      }
}

function removeMemAf(memberId) {
    const MemAfToRemove = document.getElementById(`MemAf${memberId}`);

    const membership = document.getElementById(`membership${memberId}`);
    const position = document.getElementById(`position${memberId}`);
    const member_since = document.getElementById(`member_since${memberId}`);
    const status = document.getElementById(`status${memberId}`);
    
    
    membership.value = '';
    position.value = '';
    member_since.value = '';
    status.value = 'INACTIVE';

    if (MemAfToRemove) {
        MemAfToRemove.remove();
    }
    MemAfCount--;
}