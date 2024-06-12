<script type="text/javascript">
        
    $(document).ready( function () {
    
     $.ajaxSetup({
       headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
       $('#registry-crud-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('registry-crud-datatable') }}",
              columns: [
                        { data: 'rsbsa_id', name: 'rsbsa_id'},
                        { data: 'generated_id', name: 'generated_id'},
                        { data: 'date_enrolled', name: 'date_enrolled' },

                     
                        // INCOME
                        { data: 'income_source', name: 'income_source' },
                        // { data: 'est_annual_income', name: 'est_annual_income', visible: false },
                        { data: 'address', name: 'address' },
                        { data: 'sitio_purok', name: 'sitio_purok'},
                        { data: 'barangay', name: 'barangay' },
                        
                      
                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
          });
    
     });
      
     function add(){
    
          $('#RegistryForm').trigger("reset");
          $('#RegistryModal').html("Add Registry");
          $('#registry-modal').modal('show');
          $('#id').val('');
          
          $('#hh_member').val('');
          $('#surname').val('');
          $('#firstname').val('');
          $('#middlename').val('');
          $('#gender').val('');
          $('#age').val('');
          $('#birthdate').val('');

          for (let i = 2; i <= 20; i++) {
                $(`#hh_member${i}`).val('');
                $(`#surname${i}`).val('');
                $(`#firstname${i}`).val('');
                $(`#middlename${i}`).val('');
                $(`#gender${i}`).val('');
                $(`#age${i}`).val('');
                $(`#birthdate${i}`).val('');
                $(`#hhMemberDetails${i}`).css('display', 'none');
                $(`#remove2ndMemberButton`).css('display', 'none');
                $(`#add2ndMemberButton`).css('display', 'block');               
                $(`#add3rdMemberButton`).css('display', 'none');
                $(`#remove3rdMemberButton`).css('display', 'none');
                $(`#add${i}thMemberButton`).css('display', 'none');
                $(`#remove${i}thMemberButton`).css('display', 'none');
          }

          for (let m = 2; m <= 5; m++) {
                $(`#membership${m}`).val('');
                $(`#position${m}`).val('');
                $(`#member_since${m}`).val('');
                $(`#status${m}`).val('');
                $(`#MemAf${m}`).css('display', 'none');
          }

          for (let a = 2; a <= 5; a++) {
                $(`#award${a}`).val('');
                $(`#awarding_body${a}`).val('');
                $(`#date_received${a}`).val('');
                $(`#AwCi${a}`).css('display', 'none');
          }
    
    
     }   

     function editFunc(id){
        
       $.ajax({
           type:"POST",
           url: "{{ url('edit-registry') }}",
           data: { id: id },
           dataType: 'json',
           success: function(res){
            
            $('#RegistryModal').html("Edit Registry");
            $('#registry-modal').modal('show');

            
            $('#first_part').removeAttr('hidden');
            $('#second_modal_part').attr('hidden', 'hidden');
            $('#third_awards_part').attr('hidden', 'hidden');
            $('#third_part').attr('hidden', 'hidden');
            $('#fourth_part').attr('hidden', 'hidden');
            $('#optional_part1').attr('hidden', 'hidden');
            $('#optional_part2').attr('hidden', 'hidden');

            $("#btn-next").css('display', 'block');
            $("#btn-next1").css('display', 'none');
            $("#btn-next2").css('display', 'none');
            $("#btn-next3").css('display', 'none');
            $("#btn-next4").css('display', 'none');

            $("#btn-save").css('display', 'none');

            $("#btn-back1").css('display', 'none');
            $("#btn-back2").css('display', 'none');
            $("#btn-back3").css('display', 'none');
            $("#btn-back4").css('display', 'none');
            $("#btn-back5").css('display', 'none');

            


            $('#id').val(res.id);
            $('#rsbsa_id').val(res.rsbsa_id);
            $('#generated_id').val(res.generated_id);
            var dateParts = res.date_enrolled.split('/');
            var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

            // Set the formatted date to the input field
            $('#date_enrolled').val(formattedDate);

            // INCOME
            $('#income_source').val(res.income_source);
            $('#est_annual_income').val(res.est_annual_income);
            $('#address').val(res.address);
            $('#sitio_purok').val(res.sitio_purok);
            $('#barangay').val(res.barangay);
            $('#city').val(res.city);
            $('#geo_coordinates').val(res.geo_coordinates);
            $('#years_of_residency').val(res.years_of_residency);
            
            // HH MEMBER
            $('#hh_member').val(res.hh_member);
            $('#surname').val(res.surname);
            $('#firstname').val(res.firstname);
            $('#middlename').val(res.middlename);
            $('#gender').val(res.gender);
            $('#age').val(res.age);

            var BdateParts = res.birthdate.split('/');
            var formattedBDate = BdateParts[2] + '-' + BdateParts[1] + '-' + BdateParts[0];

            // Set the formatted date to the input field
            $('#birthdate').val(formattedBDate);


                     
// HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS  

            const formContainer = document.getElementById('HHMEMBERS');
            memberCount = 2;
            let lastValidMemberCount = 2;
            // HH MEMBER 2-20
            for (let i = 2; i <= 20; i++) {

              
                // Check if the required data exists in the response for the current member
                if (res[`hh_member${i}`] && typeof res[`hh_member${i}`] === 'string' && res[`hh_member${i}`].trim() !== '') {
                    const newMemberDetails = document.createElement('div');
                    newMemberDetails.id = `hhMemberDetails${i}`;
                    
                    newMemberDetails.innerHTML = `
                        <h5>HH Member Details</h5>
                        <div class="form-group">
            <label for="hh_member" class="col-sm-8 control-label">HH Member</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="hh_member${i}" name="hh_member${i}" placeholder="Enter HH Member" maxlength="100" >
            </div>

            <div class="form-group">
            <label for="surname" class="col-sm-8 control-label">Surname</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="surname${i}" name="surname${i}" placeholder="Enter Surname" maxlength="100" >
            </div>
            </div>

            <div class="form-group">
            <label for="firstname" class="col-sm-8 control-label">First Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="firstname${i}" name="firstname${i}" placeholder="Enter First Name" maxlength="100" >
            </div>
            </div>

            <div class="form-group">
            <label for="middlename" class="col-sm-8 control-label">Middle Name</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="middlename${i}" name="middlename${i}" placeholder="Enter Middle Name" maxlength="100" >
            </div>
            </div>

            <div class="form-group">
            <label for="gender" class="col-sm-8 control-label">Gender</label>
            <div class="col-sm-12">
                <select class="form-control" id="gender${i}" name="gender${i}" >
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </select>
            </div>
            </div>
            
            <div class="form-group">
            <label for="age" class="col-sm-8 control-label">Age</label>
            <div class="col-sm-12">
                <input type="number" class="form-control" id="age${i}" name="age${i}" placeholder="Enter Age" >
            </div>
            </div>

            <div class="form-group">
            <label for="birthdate" class="col-sm-8 control-label">Date of Birth (mm/dd/yyyy)</label>
            <div class="col-sm-12">
                <input type="date" class="form-control" id="birthdate${i}" name="birthdate${i}" placeholder="Enter Date of Birth (mm/dd/yyyy)" >
            </div>
            </div>
            <button class="btn-danger" type="button" onclick="removeMember(${i})">Remove Member</button>
    
        </div>
                    `;
                
                    formContainer.appendChild(newMemberDetails);
                $(`#hh_member${i}`).val(res[`hh_member${i}`]);
                $(`#surname${i}`).val(res[`surname${i}`]);
                $(`#firstname${i}`).val(res[`firstname${i}`]);
                $(`#middlename${i}`).val(res[`middlename${i}`]);
                $(`#gender${i}`).val(res[`gender${i}`]);
                $(`#age${i}`).val(res[`age${i}`]);

                var BdateParts = res[`birthdate${i}`].split('/');
                var formattedBDate = BdateParts[2] + '-' + BdateParts[1] + '-' + BdateParts[0];

                // Set the formatted date to the input field
                $(`#birthdate${i}`).val(formattedBDate);

                lastValidMemberCount = i + 1; // Update lastValidMemberCount
                }
                memberCount = lastValidMemberCount;
                console.log('Value of i:', i);
                console.log('Value of memberCount:', memberCount);
                console.log('Value of LVM:', lastValidMemberCount);
            }

// ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG //
            // ORGANIZATION
            $('#membership').val(res.membership);
            $('#position').val(res.position);
            $('#member_since').val(res.member_since);
            $('#status').val(res.status);

            const OrgformContainer = document.getElementById('MemAfDetails');
            MemAfCount = 2;
            let lastValidMemAfCount = 2;
            // HH MEMBER 2-20
            for (let m = 2; m <= 5; m++) {

              
                // Check if the required data exists in the response for the current member
                if (res[`membership${m}`] && typeof res[`membership${m}`] === 'string' && res[`membership${m}`].trim() !== '') {
                    const newMemAfDetails = document.createElement('div');
                    newMemAfDetails.id = `MemAf${m}`;
                    
                    newMemAfDetails.innerHTML = `           
                        <h5>Organization Details</h5>

                            <div class="form-group">
                            <label for="membership" class="col-sm-8 control-label">Name of Organizations/Clubs/Cooperative/Associations</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="membership${m}" name="membership${m}" placeholder="Enter Name of Organizations/Clubs/Cooperative/Associations" maxlength="255" >
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="position" class="col-sm-8 control-label">Position</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="position${m}" name="position${m}" placeholder="Enter Position" maxlength="255" >
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="member_since" class="col-sm-8 control-label">Member Since</label>
                            <div class="col-sm-12">
                                <input type="number"  placeholder="Enter year" min="1900" max="2100" class="form-control" id="member_since${m}" name="member_since${m}" >
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="status" class="col-sm-8 control-label">Status</label>
                            <div class="col-sm-12">
                                <select class="form-control" id="status${m}" name="status${m}">
                                <option value="ACTIVE">ACTIVE</option>
                                <option value="INACTIVE">INACTIVE</option>
                                </select>
                            </div>
                            </div>

                            <button class="btn-danger" type="button" id="RemMemAfBtn${m}" onclick="removeMemAf(${m})">Remove Membership & Affiliation</button>
                    
                    
                    <!-- Add other form fields here -->
                      `;
                
                      OrgformContainer.appendChild(newMemAfDetails);
                $(`#membership${m}`).val(res[`membership${m}`]);
                $(`#position${m}`).val(res[`position${m}`]);
                $(`#member_since${m}`).val(res[`member_since${m}`]);
                $(`#status${m}`).val(res[`status${m}`]);
                lastValidMemAfCount = m + 1; // Update lastValidMemAfCount
                }
                MemAfCount = lastValidMemAfCount;
                console.log('Value of m:', m);
                console.log('Value of MemAfCount:', MemAfCount);
                console.log('Value of LVMA:', lastValidMemAfCount);
            }


// ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG //
            
// AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS 

            // ORGANIZATION
            $('#award').val(res.award);
            $('#awarding_body').val(res.awarding_body);

            var AwarddateParts1 = res[`date_received`].split('/');
                var formattedAwardDate1 = AwarddateParts1[2] + '-' + AwarddateParts1[1] + '-' + AwarddateParts1[0];

                // Set the formatted date to the input field
                $(`#date_received`).val(formattedAwardDate1);

            const AwCiFormContainer = document.getElementById('Awards');
            AwardsCount = 2;
            let lastValidAwardsCount = 2;
            
            for (let a = 2; a <= 5; a++) {

              
                // Check if the required data exists in the response for the current member
                if (res[`award${a}`] && typeof res[`award${a}`] === 'string' && res[`award${a}`].trim() !== '') {
                    const newAwCiDetails = document.createElement('div');
                    newAwCiDetails.id = `AwCi${a}`;
                    
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
                
        
                    <button class="btn-danger" type="button" id="RemAwCiBtn${AwardsCount}" onclick="removeAwCi(${AwardsCount})">Remove Award/Citation</button>
            
                </div>
                <hr>
                <!-- Add other form fields here -->
                 `;
                
                      AwCiFormContainer.appendChild(newAwCiDetails);
                $(`#award${a}`).val(res[`award${a}`]);
                $(`#awarding_body${a}`).val(res[`awarding_body${a}`]);

                var AwarddateParts = res[`date_received${a}`].split('/');
                var formattedAwardDate = AwarddateParts[2] + '-' + AwarddateParts[1] + '-' + AwarddateParts[0];

                // Set the formatted date to the input field
                $(`#date_received${a}`).val(formattedAwardDate);

                lastValidAwardsCount = a + 1; // Update lastValidAwardsCount
                }
                AwardsCount = lastValidAwardsCount;
                console.log('Value of a:', a);
                console.log('Value of AwardsCount:', AwardsCount);
                console.log('Value of LVA:', lastValidAwardsCount);
            }

            $('#remarks').val(res.remarks);

// AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS 

// PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS // PARTICULARS
            // Particulars
            $('#purok').val(res.purok);
            $('#brngy').val(res.brngy);
            $('#geographic_coordinates').val(res.geographic_coordinates);
            $('#title_no').val(res.title_no);
            $('#tax_declarration_no').val(res.tax_declarration_no);
            

            // Tenure Display Saved Data

            const tenureString = "["+res.tenure+"]";    
            const tenureArray = JSON.parse(tenureString);
            Object.freeze(tenureArray); // Freeze the Tenure array to make it a constant

            tenureArray.forEach(item => {
                const checkboxId = item; // Generate checkbox ID
                
                if(checkboxId !== null){
                if (checkboxId === "Owned") {
                    const checkbox = document.getElementById('ownedCheckbox');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId.includes("Rent")) {
                    const checkbox = document.getElementById('rentCheckbox');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                    var originalString = tenureString;
                    var strippedString = originalString.replace(/Rent: | year\(s\)/g, "");
                    var output = JSON.parse(strippedString);
                    var numberOnly = output[0].match(/\d+/);

                    $(`#rentYears`).val(numberOnly[0]);
                    $(`#rentCheckbox`).val('Rent: '+numberOnly[0]+"year(s)");
                    $(`#rentYears`).css('display', 'block');

                    console.log(numberOnly[0]);
                    console.log(strippedString); // Output: 2 year(s)
                }
                if (checkboxId === "Tenant") {
                    const checkbox = document.getElementById('tenantCheckbox');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId.includes("Others")) {
                    const checkbox = document.getElementById('othersCheckbox');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                    var originalOthersString = checkboxId;
                    var strippedOthersString = originalOthersString.replace("Others: ", "");

                    $('#otherInput').val(strippedOthersString);
                    $('#othersCheckbox').val(checkboxId);
                    $('#otherInput').css('display', 'block');

                    console.log(strippedOthersString); // Output: 
                }
            }
            });

            $('#existing_crop').val(res.existing_crop);
            $('#previous_crop').val(res.previous_crop);
            $('#hectares').val(res.hectares);
            console.log(res);

            // Land Checkbox Edit Res
            const landString = "["+res.land+"]";    
            const landArray = JSON.parse(landString);
            Object.freeze(landArray); // Freeze the array to make it a constant

            landArray.forEach(item => {
                const checkboxId = item; // Generate checkbox ID
                
                
                if (checkboxId === "Flat") {
                    const checkbox = document.getElementById('flatCheckbox');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Gently Sloping") {
                    const checkbox = document.getElementById('gentlySlopingCheckbox');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Rolling or Undulating") {
                    const checkbox = document.getElementById('rollingUndulatingCheckbox');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Hilly or Steep Slopes") {
                    const checkbox = document.getElementById('hillySteepSlopesCheckbox');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
            });

            console.log(landArray);

            $('#soil_type').val(res.soil_type);

            const sourceString = "["+res.source+"]";    
            const sourceArray = JSON.parse(sourceString);
            Object.freeze(sourceArray); // Freeze the array to make it a constant

            sourceArray.forEach(item => {
                const checkboxId = item; // Generate checkbox ID
                
                
                if (checkboxId === "Irrigated") {
                    const checkbox = document.getElementById('irrigated');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "SWIP or SIS") {
                    const checkbox = document.getElementById('swip');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Water Pump") {
                    const checkbox = document.getElementById('pump');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Rainfed") {
                    const checkbox = document.getElementById('rainfed');
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
            });

            $(`#notes`).val(res[`notes`]);

            // Particulars 2-3
            for (let p = 2; p <= 3; p++) {
                $(`#purok${p}`).val(res[`purok${p}`]);
                $(`#brngy${p}`).val(res[`brngy${p}`]);
                $(`#geographic_coordinates${p}`).val(res[`geographic_coordinates${p}`]);
                $(`#title_no${p}`).val(res[`title_no${p}`]);
                $(`#tax_declarration_no${p}`).val(res[`tax_declarration_no${p}`]);
                $(`#tenure${p}`).val(res[`tenure${p}`]);

                // Tenure Display Saved Data

            const tenureString = "["+res[`tenure${p}`]+"]";    
            const tenureArray = JSON.parse(tenureString);
            Object.freeze(tenureArray); // Freeze the Tenure array to make it a constant

            console.log('TENUREARR',tenureArray);
            tenureArray.forEach(item => {
                const checkboxId = item; // Generate checkbox ID
                
                if(checkboxId !== null){
                if (checkboxId === "Owned") {
                    const checkbox = document.getElementById(`ownedCheckbox${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId.includes("Rent")) {
                    const checkbox = document.getElementById(`rentCheckbox${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                    var originalString = tenureString;
                    var strippedString = originalString.replace(/Rent: | year\(s\)/g, "");
                    var output = JSON.parse(strippedString);
                    var numberOnly = output[0].match(/\d+/);

                    $(`#rentYears${p}`).val(numberOnly[0]);
                    $(`#rentCheckbox${p}`).val('Rent: '+numberOnly[0]+"year(s)");
                    $(`#rentYears${p}`).css('display', 'block');

                    console.log(numberOnly[0]);
                    console.log(strippedString); // Output: 2 year(s)
                }
                if (checkboxId === "Tenant") {
                    const checkbox = document.getElementById(`tenantCheckbox${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId.includes("Others")) {
                    const checkbox = document.getElementById(`othersCheckbox${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                    var originalOthersString = checkboxId;
                    var strippedOthersString = originalOthersString.replace("Others: ", "");

                    $(`#otherInput${p}`).val(strippedOthersString);
                    $(`#othersCheckbox${p}`).val(checkboxId);
                    $(`#otherInput${p}`).css('display', 'block');

                    console.log(strippedOthersString); // Output: 
                }
            }
            });
            
                $(`#existing_crop${p}`).val(res[`existing_crop${p}`]);
                $(`#previous_crop${p}`).val(res[`previous_crop${p}`]);
                $(`#hectares${p}`).val(res[`hectares${p}`]);

            const landString = "["+res[`land${p}`]+"]";    
            const landArray = JSON.parse(landString);
            Object.freeze(landArray); // Freeze the array to make it a constant

            landArray.forEach(item => {
                const checkboxId = item; // Generate checkbox ID
                
                
                if (checkboxId === "Flat") {
                    const checkbox = document.getElementById(`flatCheckbox${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Gently Sloping") {
                    const checkbox = document.getElementById(`gentlySlopingCheckbox${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Rolling or Undulating") {
                    const checkbox = document.getElementById(`rollingUndulatingCheckbox${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Hilly or Steep Slopes") {
                    const checkbox = document.getElementById(`hillySteepSlopesCheckbox${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
            });
            
            $(`#soil_type${p}`).val(res[`soil_type${p}`]);

            const sourceString = "["+res[`source${p}`]+"]";    
            const sourceArray = JSON.parse(sourceString);
            Object.freeze(sourceArray); // Freeze the array to make it a constant

            sourceArray.forEach(item => {
                const checkboxId = item; // Generate checkbox ID
                
                
                if (checkboxId === "Irrigated") {
                    const checkbox = document.getElementById(`irrigated${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "SWIP or SIS") {
                    const checkbox = document.getElementById(`swip${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Water Pump") {
                    const checkbox = document.getElementById(`pump${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
                if (checkboxId === "Rainfed") {
                    const checkbox = document.getElementById(`rainfed${p}`);
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
            });
                
                console.log('Value of p:', p);
                $(`#notes${p}`).val(res[`notes${p}`]);
            }

           }
       });
     }  

     function viewFunc(id) {
    $.ajax({
        type: "GET",
        url: "{{ url('get-registry-details') }}/" + id,
        success: function (data) {
            // // Populate the modal with record details
            $('#view-rsbsa_id').text(data.rsbsa_id);
            $('#view-date_enrolled').text(data.date_enrolled);

            // INCOME
            $('#view-income_source').text(data.income_source);
            $('#view-est_annual_income').text('PHP '+data.est_annual_income);
            $('#view-address').text(data.address);
            $('#view-sitio_purok').text(data.sitio_purok);
            $('#view-barangay').text(data.barangay);
            $('#view-city').text(data.city);
            $('#view-geo_coordinates').text(data.geo_coordinates);
            $('#view-years_of_residency').text(data.years_of_residency+' year(s)');

            // HH MEMBER
            $('#view-hh_member').text(data.hh_member);
            $('#view-surname').text(data.surname);
            $('#view-firstname').text(data.firstname);
            $('#view-middlename').text(data.middlename);
            $('#view-gender').text(data.gender);
            $('#view-age').text(data.age);
            $('#view-birthdate').text(data.birthdate);

// HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS // HHMEMBERS  

            const formContainer = document.getElementById('HHMemberView');
            memberCount = 2;
            let lastValidMemberCount = 2;
            // HH MEMBER 2-20
            for (let i = 2; i <= 20; i++) {

              
                // Check if the required data exists in the response for the current member
                if (data[`hh_member${i}`] && typeof data[`hh_member${i}`] === 'string' && data[`hh_member${i}`].trim() !== '') {
                    const newMemberDetails = document.createElement('div')
                    newMemberDetails.id = `HHMList${i}`;
                    
                    if(data[`hh_member${i}`] == ''){
                        $(`#HHMList${i}`).attr('hidden', 'hidden');
                    }

                    newMemberDetails.innerHTML = `
                    <div class="columns2">
                        <div class="column3" style="height:25px;">
                <p id="view-hh_member${i}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
              
            <div class="column3" style="height:25px;">
                <p id="view-surname${i}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-firstname${i}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-middlename${i}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-gender${i}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-age${i}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-birthdate${i}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
        </div>
        </div>
                    `;
                
                    formContainer.appendChild(newMemberDetails);
                $(`#view-hh_member${i}`).text(data[`hh_member${i}`]);
                $(`#view-surname${i}`).text(data[`surname${i}`]);
                $(`#view-firstname${i}`).text(data[`firstname${i}`]);
                $(`#view-middlename${i}`).text(data[`middlename${i}`]);
                $(`#view-gender${i}`).text(data[`gender${i}`]);
                $(`#view-age${i}`).text(data[`age${i}`]);
                $(`#view-birthdate${i}`).text(data[`birthdate${i}`]);
                lastValidMemberCount = i + 1; // Update lastValidMemberCount
                }
                memberCount = lastValidMemberCount;
                console.log('Value of i:', i);
                console.log('Value of memberCount:', memberCount);
                console.log('Value of LVM:', lastValidMemberCount);
            }

// ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG //
            // ORGANIZATION
            $('#view-membership').text(data.membership);
            $('#view-position').text(data.position);
            $('#view-member_since').text(data.member_since);
            $('#view-status').text(data.status);

            const OrgformContainer = document.getElementById('ViewOrg');
            MemAfCount = 2;
            let lastValidMemAfCount = 2;
            // HH MEMBER 2-20
            for (let m = 2; m <= 5; m++) {

              
                // Check if the required data exists in the response for the current member
                if (data[`membership${m}`] && typeof data[`membership${m}`] === 'string' && data[`membership${m}`].trim() !== '') {
                    const newMemAfDetails = document.createElement('div');
                    newMemAfDetails.id = `ORGList${m}`;

                    if(data[`membership${m}`] == ''){
                        $(`#ORGList${m}`).attr('hidden', 'hidden');
                    }
                    
                    newMemAfDetails.innerHTML = `           
                    <div class="columns2" style="margin-top:0px;">
                        <div class="column3" style="height:25px;">
                            <p id="view-membership${m}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
                        </div>
                        <div class="column3" style="height:25px;">
                            <p id="view-position${m}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
                        </div>
                        <div class="column3" style="height:25px;">
                            <p id="view-member_since${m}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
                        </div>
                        <div class="column3" style="height:25px;">
                            <p id="view-status${m}" style="font-size:12px; height:1px; margin-top:-1px;"></p>
                        </div>
                    </div>
                      `;
                
                      OrgformContainer.appendChild(newMemAfDetails);
                $(`#view-membership${m}`).text(data[`membership${m}`]);
                $(`#view-position${m}`).text(data[`position${m}`]);
                $(`#view-member_since${m}`).text(data[`member_since${m}`]);
                $(`#view-status${m}`).text(data[`status${m}`]);
                lastValidMemAfCount = m + 1; // Update lastValidMemAfCount
                }
                MemAfCount = lastValidMemAfCount;
                console.log('Value of m:', m);
                console.log('Value of MemAfCount:', MemAfCount);
                console.log('Value of LVMA:', lastValidMemAfCount);
            }


// ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG //
            
// AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS 

            // ORGANIZATION
            $('#view-award').text(data.award);
            $('#view-awarding_body').text(data.awarding_body);
            $('#view-date_received').text(data.date_received);

            const AwCiString = data[`award`];
            console.log(AwCiString);
            if(AwCiString == null){
                $(`#AwardList`).attr('hidden', 'hidden');
            }

            $('#view-award2').text(data.award2);
            $('#view-awarding_body2').text(data.awarding_body2);
            $('#view-date_received2').text(data.date_received2);

            const AwCiString2 = data[`award2`];
            console.log(AwCiString2);
            if(AwCiString2 == null){
                $(`#AwardList2`).attr('hidden', 'hidden');
            }

            $('#view-award3').text(data.award3);
            $('#view-awarding_body3').text(data.awarding_body3);
            $('#view-date_received3').text(data.date_received3);

            const AwCiString3 = data[`award3`];
            console.log(AwCiString3);
            if(AwCiString3 == null){
                $(`#AwardList3`).attr('hidden', 'hidden');
            }

            $('#view-award4').text(data.award4);
            $('#view-awarding_body4').text(data.awarding_body4);
            $('#view-date_received4').text(data.date_received4);

            const AwCiString4 = data[`award4`];
            console.log(AwCiString4);
            if(AwCiString4 == null){
                $(`#AwardList4`).attr('hidden', 'hidden');
            }

            $('#view-award5').text(data.award5);
            $('#view-awarding_body5').text(data.awarding_body5);
            $('#view-date_received5').text(data.date_received5);

            const AwCiString5 = data[`award5`];
            console.log(AwCiString5);
            if(AwCiString5 == null){
                $(`#AwardList5`).attr('hidden', 'hidden');
            }


            $('#view-remarks').text(data.remarks);

// AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS // AWARDS & CITATIONS 

            // Particulars
            const FarmString1 = "Purok " + data[`purok`] + "," + data[`brngy`]  + "," + data.city;
                if (FarmString1.includes('null')){
                    $(`#view-FarmAddress`).text(" ");
                }else{
                    $(`#view-FarmAddress`).text(FarmString1);
                }
            $('#view-purok').text(data.purok);
            $('#view-brngy').text(data.brngy);
            $('#view-geographic_coordinates').text(data.geographic_coordinates);
            $('#view-title_no').text(data.title_no);
            $('#view-tax_declarration_no').text(data.tax_declarration_no);
            const TenureString1 = data && data[`tenure`]; // Check if data is not null or undefined
                if (TenureString1 && TenureString1.includes('null')) {
                    $(`#view-tenure`).text(" ");
                } else {
                    $(`#view-tenure`).text(TenureString1);
                }
            $(`#view-existing_crop`).text(data[`existing_crop`]);
            $(`#view-previous_crop`).text(data[`previous_crop`]);
            $(`#view-hectares`).text(data[`hectares`]);
            $(`#view-land_type`).text(data[`land`]);
            $(`#view-soil_type`).text(data[`soil_type`]);
            $(`#view-source`).text(data[`source`]);
            $(`#view_notes`).text(data[`notes`]);
            


            for (let p = 2; p <= 3; p++) {

                const FarmString = "Purok " + data[`purok${p}`] + "," + data[`brngy${p}`]  + "," + data.city;
                if (FarmString.includes('null')){
                    $(`#view-FarmAddress${p}`).text(" ");
                }else{
                    $(`#view-FarmAddress${p}`).text(FarmString);
                }
                
                $(`#view-purok${p}`).text(data[`purok${p}`]);
                $(`#view-brngy${p}`).text(data[`brngy${p}`]);
                $(`#view-geographic_coordinates${p}`).text(data[`geographic_coordinates${p}`]);
                $(`#view-title_no${p}`).text(data[`title_no${p}`]);
                $(`#view-tax_declarration_no${p}`).text(data[`tax_declarration_no${p}`]);

                const TenureString = data && data[`tenure${p}`]; // Check if data is not null or undefined
                if (TenureString && TenureString1.includes('null')) {
                    $(`#view-tenure${p}`).text(" ");
                } else {
                    $(`#view-tenure${p}`).text(TenureString);
                }

                $(`#view-existing_crop${p}`).text(data[`existing_crop${p}`]);
                $(`#view-previous_crop${p}`).text(data[`previous_crop${p}`]);
                $(`#view-hectares${p}`).text(data[`hectares${p}`]);

                const LandString = data && data[`land${p}`]; // Check if data is not null or undefined
                if (LandString && LandString.includes('null')) {
                    $(`#view-land_type${p}`).text(" ");
                } else {
                    $(`#view-land_type${p}`).text(LandString);
                }


                $(`#view-soil_type${p}`).text(data[`soil_type${p}`]);

                const SourceString = data && data[`source${p}`]; // Check if data is not null or undefined
                if (SourceString && SourceString.includes('null')) {
                    $(`#view-source${p}`).text(" ");
                } else {
                    $(`#view-source${p}`).text(SourceString);
                }


                
                $(`#view_notes${p}`).text(data[`notes${p}`]);
            
            }

            $('#hhm_ownerSig').text(data.firstname + " " +data.surname);
           
            // Certification
            $('#hhm_owner').text(data.firstname + " " +data.surname);
            $('#brgny_cert').text(data.brngy);

            // Show the modal
            $("#viewModal").modal("show");
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
}

     
    
     //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //
   
   $('#registry-archive-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('registry-archive-datatable') }}",
           columns: [ 
                        { data: 'rsbsa_id', name: 'rsbsa_id'},
                        { data: 'generated_id', name: 'generated_id'},
                        { data: 'date_enrolled', name: 'date_enrolled' },
                       // INCOME
                       { data: 'income_source', name: 'income_source' },
                        // { data: 'est_annual_income', name: 'est_annual_income', visible: false },
                        { data: 'address', name: 'address' },
                        { data: 'sitio_purok', name: 'sitio_purok'},
                        { data: 'barangay', name: 'barangay' },
                       {data: 'action', name: 'action', orderable: false},
                    ],
                   
                   order: [[0, 'desc']]
       });
   
     function archiveFunc(id) {
         if (confirm("Archive Record?") == true) {
             // Make an AJAX request to the archive route
             $.ajax({
                 type: "POST",
                 url: "{{ url('registry/archive') }}",
                 data: { id: id },
                 dataType: 'json',
                 success: function (response) {
                     // Handle success, e.g., show a success message
                     console.log(response.success);
                     // Optionally, you may want to refresh the data table
                     var ArcTable = $('#registry-archive-datatable').DataTable();
                     var oTable = $('#registry-crud-datatable').DataTable();
                     ArcTable.ajax.reload(); // Reload the DataTable
                     oTable.ajax.reload(); // Reload the DataTable
                 },
                 error: function (error) {
                     // Handle error, e.g., show an error message
                     console.error('Error archiving record:', error);
                 }
             });
         }
     } 
   
     function restoreFunc(id) {
         if (confirm("Restore Record?") == true) {
             // Make an AJAX request to the archive route
             $.ajax({
                 type: "POST",
                 url: "{{ url('registry/restore') }}",
                 data: { id: id },
                 dataType: 'json',
                 success: function (response) {
                     // Handle success, e.g., show a success message
                     console.log(response.success);
                     // Optionally, you may want to refresh the data table
                     var ArcTable = $('#registry-archive-datatable').DataTable();
                     var oTable = $('#registry-crud-datatable').DataTable();
                     ArcTable.ajax.reload(); // Reload the DataTable
                     oTable.ajax.reload(); // Reload the DataTable
                 },
                 error: function (error) {
                     // Handle error, e.g., show an error message
                     console.error('Error archiving record:', error);
                 }
             });
         }
     } 
   
   
   
     function deleteFunc(id) {
         if (confirm("Delete Record?") == true) {
             // Make an AJAX request to the archive route
             $.ajax({
                 type: "POST",
                 url: "{{ url('delete-registry') }}",
                 data: { id: id },
                 dataType: 'json',
                 success: function (response) {
                     // Handle success, e.g., show a success message
                     console.log(response.success);
                     // Optionally, you may want to refresh the data table
                     var ArcTable = $('#registry-archive-datatable').DataTable();
                     var oTable = $('#registry-crud-datatable').DataTable();
                     ArcTable.ajax.reload(); // Reload the DataTable
                     oTable.ajax.reload(); // Reload the DataTable
                 },
                 error: function (error) {
                     // Handle error, e.g., show an error message
                     console.error('Error archiving record:', error);
                 }
             });
         }
     } 
   
   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //

    
     $('#RegistryForm').submit(function(e) {
    
        e.preventDefault();
      
        var formData = new FormData(this);
      
        $.ajax({
           type:'POST',
           url: "{{ url('store-registry')}}",
           data: formData,
           cache:false,
           contentType: false,
           processData: false,
           success: (data) => {
             $("#registry-modal").modal('hide');
             var oTable = $('#registry-crud-datatable').dataTable();
             oTable.fnDraw(false);
             $("#btn-save").html('Submit');
             $("#btn-save"). attr("disabled", false);
           },
           error: function(data){
              console.log(data);
            }
          });
      });
    
    
   </script>

   {{-- View Modal JS SCRIPT --}}
  <script>
    var printClicked = false; // Initialize a flag variable

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        // Set the flag to true when printDiv is clicked
        printClicked = true;

        window.onafterprint = function() {
            document.body.innerHTML = originalContents;
        };

        window.print();
    }

    function closeviewModal() {
        var addRoomModal = document.getElementById("viewModal");
        addRoomModal.classList.remove('show');
        $("#viewModal").modal('hide');
        setTimeout(function() {
            var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
            if (modalBackdrop) {
                modalBackdrop.remove('show');
            }
            
            // Check if printDiv was clicked before running location.reload()
            if (printClicked) {
                location.reload();
            }
        }, 400);
    }
  </script>
 <script>
    function toggleDatatables() {
      var div1 = document.getElementById('MainTable');
      var div2 = document.getElementById('Archive');
      var toggleButton = document.getElementById('toggleDatatables');
  
      // Toggle the 'hidden' attribute
      if (div1.hasAttribute('hidden')) {
        div1.removeAttribute('hidden');
        div2.setAttribute('hidden', 'hidden');
        toggleButton.innerHTML = '  Archive';
      } else {
        div1.setAttribute('hidden', 'hidden');
        div2.removeAttribute('hidden');
        toggleButton.innerHTML = '<i class="fas fa-eye-slash">Archive</i>';
      }
    }
  </script>
  <script>
    $(document).ready(function () {
        $('#rsbsa_id').on('input', function () {
            var rsbsaIdValue = $(this).val();

            // Make an Ajax request to check if the RSBSA ID exists
            $.ajax({
                url: '{{ route("check.rsbsa_id") }}', // Update with your actual route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rsbsa_id: rsbsaIdValue
                },
                success: function (response) {
                    // Update the validation message based on the response
                    if (response.exists) {
                        $('#rsbsa-id-validation-message').text('RSBSA ID already exists');
                    } else {
                        $('#rsbsa-id-validation-message').text('');
                    }
                },
                error: function (error) {
                    console.error('Error checking RSBSA ID:', error);
                }
            });
        });
    });
</script>
