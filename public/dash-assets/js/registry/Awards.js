const addAwardBtn = document.getElementById('addAwardBtn');
let AwardsCount = 2; // Initial member count

console.log('Value of AwardsCount:', AwardsCount);

function addAwCi() {
    const AwCiFormContainer = document.getElementById('Awards');
    const newAwCiDetails = document.createElement('div');
    newAwCiDetails.id = `AwCi${AwardsCount}`;
    newAwCiDetails.innerHTML = `
        <h5>Award Details</h5>

            <div class="col-sm-12">
            <h6>Awards & Citations received (if any);</h6>
            </div>
            <div class="form-group">
            <label for="award" class="col-sm-8 control-label">Name of Award/Citation</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="award${AwardsCount}" name="award${AwardsCount}" placeholder="Enter Name of Award/Citation" maxlength="255" >
            </div>
            </div>
            
            <div class="form-group">
            <label for="awarding_body" class="col-sm-8 control-label">Awarding Body</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="awarding_body${AwardsCount}" name="awarding_body${AwardsCount}" placeholder="Enter Awarding Body" maxlength="255" >
            </div>
            </div>
            
            <div class="form-group">
            <label for="date_received" class="col-sm-8 control-label">Date Received</label>
            <div class="col-sm-12">
                <input type="date" class="form-control" id="date_received${AwardsCount}" name="date_received${AwardsCount}" placeholder="Enter Date Received" maxlength="100" >
            </div>
            </div>
        

            <button class="btn-danger" type="button" onclick="removeAwCi(${AwardsCount})">Remove Award/Citation</button>
    
        </div>
        <hr>
        <!-- Add other form fields here -->
    `;
    

    AwCiFormContainer.appendChild(newAwCiDetails);
    AwardsCount++;

    if (AwardsCount === 6) {
        addAwardBtn.style.display = 'none';
      }
}

function removeAwCi(awardsId) {
    const AwCiToRemove = document.getElementById(`AwCi${awardsId}`);

    const award = document.getElementById(`award${awardsId}`);
    const awarding_body = document.getElementById(`awarding_body${awardsId}`);
    const date_received = document.getElementById(`date_received${awardsId}`);
    

    award.value = '';
    awarding_body.value = '';
    date_received.value = '';

    if (AwCiToRemove) {
        AwCiToRemove.remove();
    }
    AwardsCount--;
}