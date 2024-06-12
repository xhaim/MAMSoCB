<script type="text/javascript">
     
    $(document).ready( function () {
   
     $.ajaxSetup({
       headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
       $('#assistance-crud-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('assistance-crud-datatable') }}",
              columns: [
                       { data: 'rsbsa', name: 'rsbsa' },
                       { data: 'name', name: 'name' },
                       { data: 'gender', name: 'gender' },
                       { data: 'birthdate', name: 'birthdate' },
                       { data: 'created_at', name: 'created_at' },
                       {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
          });
   
     });
     
     function add(){
   
          $('#AssistanceForm').trigger("reset");
          $('#AssistanceModal').html("Add Farmers Assistance");
          $('#assistance-modal').modal('show');
          $('#btn-save-withIMG').attr('hidden', 'hidden');

          
          $('#btn-save-withIMG').css("display","none");
          $('#btn-save').css("display","inline-flex");

          $('#id').val('');

   
     }   
     function editFunc(id){
       
       $.ajax({
           type:"POST",
           url: "{{ url('edit-assistance') }}",
           data: { id: id },
           dataType: 'json',
           success: function(res){
            $('#btn-save').attr('hidden', 'hidden');
            
            $('#btn-save').css("display","none");
            $('#btn-save-withIMG').css("display","inline-flex");

             $('#AssistanceModal').html("Edit Farmers Assistance");
             $('#assistance-modal').modal('show');
             $('#id').val(res.id);
             $('#rsbsa').val(res.rsbsa);
             $('#date').val(res.date);
             $('#timepicker').val(res.timepicker);
             $('#name').val(res.name);
             $('#gender').val(res.gender);
             $('#birthdate').val(res.birthdate);
             $('#spouse').val(res.spouse);
             $('#spouse_gender').val(res.spouse_gender);
             $('#spouse_birthdate').val(res.spouse_birthdate);
             $('#dependents').val(res.dependents);
             $('#income').val(res.income);
             $('#address').val(res.address);
             // Particulars
             $('#purok').val(res.purok);
               $('#brngy').val(res.brngy);
               $('#geographic_coordinates').val(res.geographic_coordinates);
               $('#title_no').val(res.title_no);
               $('#tax_declarration_no').val(res.tax_declarration_no);
               
   
            //    Tenure Display Saved Data
   
            //    const tenureString = "["+res.tenure+"]";    
            //    const tenureArray = JSON.parse(tenureString);
            //    Object.freeze(tenureArray); // Freeze the Tenure array to make it a constant
   
            //    tenureArray.forEach(item => {
            //        const checkboxId = item; // Generate checkbox ID
                   
            //        if(checkboxId !== null){
            //        if (checkboxId === "Owned") {
            //            const checkbox = document.getElementById('ownedCheckbox');
            //            checkbox.checked = true; // Check the checkbox if the item exists in the array
            //        }
            //        if (checkboxId.includes("Rent")) {
            //            const checkbox = document.getElementById('rentCheckbox');
            //            checkbox.checked = true; // Check the checkbox if the item exists in the array
            //            var originalString = tenureString;
            //            var strippedString = originalString.replace(/Rent: | year\(s\)/g, "");
            //            var output = JSON.parse(strippedString);
            //            var numberOnly = output[0].match(/\d+/);
   
            //            $(`#rentYears`).val(numberOnly[0]);
            //            $(`#rentCheckbox`).val('Rent: '+numberOnly[0]+"year(s)");
            //            $(`#rentYears`).css('display', 'block');
   
            //            console.log(numberOnly[0]);
            //            console.log(strippedString); // Output: 2 year(s)
            //        }
            //        if (checkboxId === "Tenant") {
            //            const checkbox = document.getElementById('tenantCheckbox');
            //            checkbox.checked = true; // Check the checkbox if the item exists in the array
            //        }
            //        if (checkboxId.includes("Others")) {
            //            const checkbox = document.getElementById('othersCheckbox');
            //            checkbox.checked = true; // Check the checkbox if the item exists in the array
            //            var originalOthersString = checkboxId;
            //            var strippedOthersString = originalOthersString.replace("Others: ", "");
   
            //            $('#otherInput').val(strippedOthersString);
            //            $('#othersCheckbox').val(checkboxId);
            //            $('#otherInput').css('display', 'block');
   
            //            console.log(strippedOthersString); // Output: 
            //        }
            //    }
            //    });
   
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
   
             $('#intended_crop').val(res.intended_crop);
   $('#evaluation_intended_crop').val(res.evaluation_intended_crop);
   $('#target_date_intended_crop').val(res.target_date_intended_crop);
   $('#completion_date_intended_crop').val(res.completion_date_intended_crop);
   $('#servedby_intended_crop').val(res.servedby_intended_crop);
   $('#conform_intended_crop').val(res.conform_intended_crop);
   
   $('#program_applied').val(res.program_applied);
   $('#evaluation_program_applied').val(res.evaluation_program_applied);
   $('#target_date_program_applied').val(res.target_date_program_applied);
   $('#completion_date_program_applied').val(res.completion_date_program_applied);
   $('#servedby_program_applied').val(res.servedby_program_applied);
   $('#conform_program_applied').val(res.conform_program_applied);
   // Area Applied
   $('#area_applied').val(res.area_applied);
   $('#evaluation_area_applied').val(res.evaluation_area_applied);
   $('#target_date_area_applied').val(res.target_date_area_applied);
   $('#completion_date_area_applied').val(res.completion_date_area_applied);
   $('#servedby_area_applied').val(res.servedby_area_applied);
   $('#conform_area_applied').val(res.conform_area_applied);
   
   // Land Preparation
   $('#land_preparation').val(res.land_preparation);
   $('#evaluation_land_preparation').val(res.evaluation_land_preparation);
   $('#target_date_land_preparation').val(res.target_date_land_preparation);
   $('#completion_date_land_preparation').val(res.completion_date_land_preparation);
   $('#servedby_land_preparation').val(res.servedby_land_preparation);
   $('#conform_land_preparation').val(res.conform_land_preparation);
   
   // Lay Outing
   $('#lay_outing').val(res.lay_outing);
   $('#evaluation_lay_outing').val(res.evaluation_lay_outing);
   $('#target_date_lay_outing').val(res.target_date_lay_outing);
   $('#completion_date_lay_outing').val(res.completion_date_lay_outing);
   $('#servedby_lay_outing').val(res.servedby_lay_outing);
   $('#conform_lay_outing').val(res.conform_lay_outing);
   
   // Farm Development
   $('#farm_development').val(res.farm_development);
   $('#evaluation_farm_development').val(res.evaluation_farm_development);
   $('#target_date_farm_development').val(res.target_date_farm_development);
   $('#completion_date_farm_development').val(res.completion_date_farm_development);
   $('#servedby_farm_development').val(res.servedby_farm_development);
   $('#conform_farm_development').val(res.conform_farm_development);
   
   // Plowing
   $('#plowing').val(res.plowing);
   $('#evaluation_plowing').val(res.evaluation_plowing);
   $('#target_date_plowing').val(res.target_date_plowing);
   $('#completion_date_plowing').val(res.completion_date_plowing);
   $('#servedby_plowing').val(res.servedby_plowing);
   $('#conform_plowing').val(res.conform_plowing);
   
   // Harrowing
   $('#harrowing').val(res.harrowing);
   $('#evaluation_harrowing').val(res.evaluation_harrowing);
   $('#target_date_harrowing').val(res.target_date_harrowing);
   $('#completion_date_harrowing').val(res.completion_date_harrowing);
   $('#servedby_harrowing').val(res.servedby_harrowing);
   $('#conform_harrowing').val(res.conform_harrowing);
   
   // Rotavator
   $('#rotavator').val(res.rotavator);
   $('#evaluation_rotavator').val(res.evaluation_rotavator);
   $('#target_date_rotavator').val(res.target_date_rotavator);
   $('#completion_date_rotavator').val(res.completion_date_rotavator);
   $('#servedby_rotavator').val(res.servedby_rotavator);
   $('#conform_rotavator').val(res.conform_rotavator);
   
   // Seeds
   $('#seeds').val(res.seeds);
   $('#evaluation_seeds').val(res.evaluation_seeds);
   $('#target_date_seeds').val(res.target_date_seeds);
   $('#completion_date_seeds').val(res.completion_date_seeds);
   $('#servedby_seeds').val(res.servedby_seeds);
   $('#conform_seeds').val(res.conform_seeds);
   
   // Inoculant
   $('#inoculant').val(res.inoculant);
   $('#evaluation_inoculant').val(res.evaluation_inoculant);
   $('#target_date_inoculant').val(res.target_date_inoculant);
   $('#completion_date_inoculant').val(res.completion_date_inoculant);
   $('#servedby_inoculant').val(res.servedby_inoculant);
   $('#conform_inoculant').val(res.conform_inoculant);
   
   // Enrollment
   $('#enrollment').val(res.enrollment);
   $('#evaluation_enrollment').val(res.evaluation_enrollment);
   $('#target_date_enrollment').val(res.target_date_enrollment);
   $('#completion_date_enrollment').val(res.completion_date_enrollment);
   $('#servedby_enrollment').val(res.servedby_enrollment);
   $('#conform_enrollment').val(res.conform_enrollment);
   
   // Insurance Claim
   $('#insurance_claim').val(res.insurance_claim);
   $('#evaluation_insurance_claim').val(res.evaluation_insurance_claim);
   $('#target_date_insurance_claim').val(res.target_date_insurance_claim);
   $('#completion_date_insurance_claim').val(res.completion_date_insurance_claim);
   $('#servedby_insurance_claim').val(res.servedby_insurance_claim);
   $('#conform_insurance_claim').val(res.conform_insurance_claim);
   
   // Production
   $('#production').val(res.production);
   $('#evaluation_production').val(res.evaluation_production);
   $('#target_date_production').val(res.target_date_production);
   $('#completion_date_production').val(res.completion_date_production);
   $('#servedby_production').val(res.servedby_production);
   $('#conform_production').val(res.conform_production);
   
   // Fertilizer
   $('#evaluation_fertilizer').val(res.evaluation_fertilizer);
   $('#target_date_fertilizer').val(res.target_date_fertilizer);
   $('#completion_date_fertilizer').val(res.completion_date_fertilizer);
   $('#servedby_fertilizer').val(res.servedby_fertilizer);
   $('#conform_fertilizer').val(res.conform_fertilizer);
   
   // Feeding Inputs
   $('#evaluation_feeding_inputs').val(res.evaluation_feeding_inputs);
   $('#target_date_feeding_inputs').val(res.target_date_feeding_inputs);
   $('#completion_date_feeding_inputs').val(res.completion_date_feeding_inputs);
   $('#servedby_feeding_inputs').val(res.servedby_feeding_inputs);
   $('#conform_feeding_inputs').val(res.conform_feeding_inputs);
   
   // Pest Control
   $('#evaluation_pest_control').val(res.evaluation_pest_control);
   $('#target_date_pest_control').val(res.target_date_pest_control);
   $('#completion_date_pest_control').val(res.completion_date_pest_control);
   $('#servedby_pest_control').val(res.servedby_pest_control);
   $('#conform_pest_control').val(res.conform_pest_control);
   
   // Irrigation
   $('#evaluation_irrigation').val(res.evaluation_irrigation);
   $('#target_date_irrigation').val(res.target_date_irrigation);
   $('#completion_date_irrigation').val(res.completion_date_irrigation);
   $('#servedby_irrigation').val(res.servedby_irrigation);
   $('#conform_irrigation').val(res.conform_irrigation);
   
   // Post Harvest
   $('#evaluation_post_harvest').val(res.evaluation_post_harvest);
   $('#target_date_post_harvest').val(res.target_date_post_harvest);
   $('#completion_date_post_harvest').val(res.completion_date_post_harvest);
   $('#servedby_post_harvest').val(res.servedby_post_harvest);
   $('#conform_post_harvest').val(res.conform_post_harvest);
   
   // Harvester
   $('#harvester').val(res.harvester);
   $('#evaluation_harvester').val(res.evaluation_harvester);
   $('#target_date_harvester').val(res.target_date_harvester);
   $('#completion_date_harvester').val(res.completion_date_harvester);
   $('#servedby_harvester').val(res.servedby_harvester);
   $('#conform_harvester').val(res.conform_harvester);
   
   // Hauling
   $('#hauling').val(res.hauling);
   $('#evaluation_hauling').val(res.evaluation_hauling);
   $('#target_date_hauling').val(res.target_date_hauling);
   $('#completion_date_hauling').val(res.completion_date_hauling);
   $('#servedby_hauling').val(res.servedby_hauling);
   $('#conform_hauling').val(res.conform_hauling);
   
   // Drying
   $('#drying').val(res.drying);
   $('#evaluation_drying').val(res.evaluation_drying);
   $('#target_date_drying').val(res.target_date_drying);
   $('#completion_date_drying').val(res.completion_date_drying);
   $('#servedby_drying').val(res.servedby_drying);
   $('#conform_drying').val(res.conform_drying);
   
   // Milling
   $('#milling').val(res.milling);
   $('#evaluation_milling').val(res.evaluation_milling);
   $('#target_date_milling').val(res.target_date_milling);
   $('#completion_date_milling').val(res.completion_date_milling);
   $('#servedby_milling').val(res.servedby_milling);
   $('#conform_milling').val(res.conform_milling);
   
   // Grading
   $('#grading').val(res.grading);
   $('#evaluation_grading').val(res.evaluation_grading);
   $('#target_date_grading').val(res.target_date_grading);
   $('#completion_date_grading').val(res.completion_date_grading);
   $('#servedby_grading').val(res.servedby_grading);
   $('#conform_grading').val(res.conform_grading);
   
   // Marketing
   $('#marketing').val(res.marketing);
   $('#evaluation_marketing').val(res.evaluation_marketing);
   $('#target_date_marketing').val(res.target_date_marketing);
   $('#completion_date_marketing').val(res.completion_date_marketing);
   $('#servedby_marketing').val(res.servedby_marketing);
   $('#conform_marketing').val(res.conform_marketing);
   
   // Others
   $('#others').val(res.others);
   $('#evaluation_others').val(res.evaluation_others);
   $('#target_date_others').val(res.target_date_others);
   $('#completion_date_others').val(res.completion_date_others);
   $('#servedby_others').val(res.servedby_others);
   $('#conform_others').val(res.conform_others);
   
   // Notes
   $('#notes').val(res.notes);
   
            // Set image preview for imageUpload1
            if (res.imageUpload1 !== null) {
                $('#imagePreview1').attr('src',res.imageUpload1);
                $('#imageUploadData1').val(res.imageUpload1)
                $('#imagePreview1').removeClass("d-none");
            } else {
                // If there is no image, you can set a default image or hide the preview
                $('#imagePreview1').attr('src',"images/defaultimg/no_image.jpg");
                $('#imagePreview1').removeClass("d-none");
            }

            // Set image preview for imageUpload2
            if (res.imageUpload2 !== null) {
                $('#imagePreview2').attr('src',res.imageUpload2);
                $('#imageUploadData2').val(res.imageUpload2)
                $('#imagePreview2').removeClass("d-none");
            } else {
                // If there is no image, you can set a default image or hide the preview
                $('#imagePreview2').attr('src',"images/defaultimg/no_image.jpg");
                $('#imagePreview2').removeClass("d-none");
            }
   
            // Special Notes
            $('#special_notes').val(res.special_notes);  
        }
       });
     }  
   
     function viewFunc(id) {
       $.ajax({
           type: "GET",
           url: "{{ url('get-assistance-details') }}/" + id,
           success: function (data) {
               // Populate the modal with record details
            $('#view_rsbsa').text(data.rsbsa);
            $('#view_date').text(data.date);
            $('#view_timepicker').text(data.timepicker);
            $('#view_name').text(data.name);
            $('#view_gender').text(data.gender);
            $('#view_birthdate').text(data.birthdate);
            $('#view_spouse').text(data.spouse);
            $('#view_spouse_gender').text(data.spouse_gender);
            $('#view_spouse_birthdate').text(data.spouse_birthdate);
            $('#view_dependents').text(data.dependents);
            $('#view_income').text(data.income);
            $('#view_address').text(data.address);
            // Particulars
            $('#view_purok').text(data.purok);
            $('#view_brngy').text(data.brngy);
            $('#view_geographic_coordinates').text(data.geographic_coordinates);
            $('#view_title_no').text(data.title_no);
            $('#view_tax_declarration_no').text(data.tax_declarration_no);
                // Land Checkbox Edit Res
                const landString = "["+data.land+"]";    
               const landArray = JSON.parse(landString);
               Object.freeze(landArray); // Freeze the array to make it a constant
   
               landArray.forEach(item => {
                   const checkboxId = item; // Generate checkbox ID
                   
                   
                   if (checkboxId === "Flat") {
                        $("#flat_check").removeAttr("hidden");
                        $("#flat").css('background-color','black'); // Check the checkbox if the item exists in the array
                   }
                   if (checkboxId === "Gently Sloping") {
                        $("#slope_check").removeAttr("hidden");
                        $("#slope").css('background-color','black');// Check the checkbox if the item exists in the array
                   }
                   if (checkboxId === "Rolling or Undulating") {
                        $("#rolling_check").removeAttr("hidden");
                        $("#rolling").css('background-color','black');// Check the checkbox if the item exists in the array
                   }
                   if (checkboxId === "Hilly or Steep Slopes") {
                        $("#hillysteep_check").removeAttr("hidden");
                        $("#hillysteep").css('background-color','black');// Check the checkbox if the item exists in the array
                   }
               });
   
               console.log(landArray);
   
               $('#view_soil_type').text(data.soil_type);
   
               const sourceString = "["+data.source+"]";    
               const sourceArray = JSON.parse(sourceString);
               Object.freeze(sourceArray); // Freeze the array to make it a constant
   
               sourceArray.forEach(item => {
                   const checkboxId = item; // Generate checkbox ID
                   
                   
                   if (checkboxId === "Irrigated") {
                        $("#irrigated_check").removeAttr("hidden");
                        $("#irrigated").css('background-color','black');// Check the checkbox if the item exists in the array
                   }
                   if (checkboxId === "SWIP or SIS") {
                        $("#swip_check").removeAttr("hidden");
                        $("#swip").css('background-color','black'); // Check the checkbox if the item exists in the array
                   }
                   if (checkboxId === "Water Pump") {
                        $("#waterpump_check").removeAttr("hidden");
                        $("#waterpump").css('background-color','black');// Check the checkbox if the item exists in the array
                   }
                   if (checkboxId === "Rainfed") {
                        $("#rainfed_check").removeAttr("hidden");
                        $("#rainfed").css('background-color','black');// Check the checkbox if the item exists in the array
                   }
               });

               const tenureString = "["+data.tenure+"]";    
               const tenureArray = JSON.parse(tenureString);
               Object.freeze(sourceArray); // Freeze the array to make it a constant
   
               tenureArray.forEach(item => {
                   const checkboxId = item; // Generate checkbox ID
                   
                   
                   if (checkboxId === "Owned") {
                        $("#owned_check").removeAttr("hidden");
                        $("#owned").css('background-color','black');// Check the checkbox if the item exists in the array
                   }
                   if (checkboxId === "Rent") {
                        $("#lease_check").removeAttr("hidden");
                        $("#lease").css('background-color','black'); // Check the checkbox if the item exists in the array
                   }
                   if (checkboxId === "Tenant") {
                        $("#tenant_check").removeAttr("hidden");
                        $("#tenant").css('background-color','black');// Check the checkbox if the item exists in the array
                   }
                   if (checkboxId === "Rainfed") {
                        $("#others_check").removeAttr("hidden");
                        $("#others").css('background-color','black');// Check the checkbox if the item exists in the array
                   }
               });
   
               $('#view_notes').text(data['notes']);
   
             $('#view_intended_crop').text(data.intended_crop);
   $('#view_evaluation_intended_crop').text(data.evaluation_intended_crop);
   $('#view_target_date_intended_crop').text(data.target_date_intended_crop);
   $('#view_completion_date_intended_crop').text(data.completion_date_intended_crop);
   $('#view_servedby_intended_crop').text(data.servedby_intended_crop);
   $('#view_conform_intended_crop').text(data.conform_intended_crop);
   
   $('#view_program_applied').text(data.program_applied);
   $('#view_evaluation_program_applied').text(data.evaluation_program_applied);
   $('#view_target_date_program_applied').text(data.target_date_program_applied);
   $('#view_completion_date_program_applied').text(data.completion_date_program_applied);
   $('#view_servedby_program_applied').text(data.servedby_program_applied);
   $('#view_conform_program_applied').text(data.conform_program_applied);
   // Area Applied
   $('#view_area_applied').text(data.area_applied);
   $('#view_evaluation_area_applied').text(data.evaluation_area_applied);
   $('#view_target_date_area_applied').text(data.target_date_area_applied);
   $('#view_completion_date_area_applied').text(data.completion_date_area_applied);
   $('#view_servedby_area_applied').text(data.servedby_area_applied);
   $('#view_conform_area_applied').text(data.conform_area_applied);
   
   // Land Preparation
   $('#view_land_preparation').text(data.land_preparation);
   $('#view_evaluation_land_preparation').text(data.evaluation_land_preparation);
   $('#view_target_date_land_preparation').text(data.target_date_land_preparation);
   $('#view_completion_date_land_preparation').text(data.completion_date_land_preparation);
   $('#view_servedby_land_preparation').text(data.servedby_land_preparation);
   $('#view_conform_land_preparation').text(data.conform_land_preparation);
   
   // Lay Outing
   $('#view_lay_outing').text(data.lay_outing);
   $('#view_evaluation_lay_outing').text(data.evaluation_lay_outing);
   $('#view_target_date_lay_outing').text(data.target_date_lay_outing);
   $('#view_completion_date_lay_outing').text(data.completion_date_lay_outing);
   $('#view_servedby_lay_outing').text(data.servedby_lay_outing);
   $('#view_conform_lay_outing').text(data.conform_lay_outing);
   
   // Farm Development
   $('#view_farm_development').text(data.farm_development);
   $('#view_evaluation_farm_development').text(data.evaluation_farm_development);
   $('#view_target_date_farm_development').text(data.target_date_farm_development);
   $('#view_completion_date_farm_development').text(data.completion_date_farm_development);
   $('#view_servedby_farm_development').text(data.servedby_farm_development);
   $('#view_conform_farm_development').text(data.conform_farm_development);
   
   // Plowing
   $('#view_plowing').text(data.plowing);
   $('#view_evaluation_plowing').text(data.evaluation_plowing);
   $('#view_target_date_plowing').text(data.target_date_plowing);
   $('#view_completion_date_plowing').text(data.completion_date_plowing);
   $('#view_servedby_plowing').text(data.servedby_plowing);
   $('#view_conform_plowing').text(data.conform_plowing);
   
   // Harrowing
   $('#view_harrowing').text(data.harrowing);
   $('#view_evaluation_harrowing').text(data.evaluation_harrowing);
   $('#view_target_date_harrowing').text(data.target_date_harrowing);
   $('#view_completion_date_harrowing').text(data.completion_date_harrowing);
   $('#view_servedby_harrowing').text(data.servedby_harrowing);
   $('#view_conform_harrowing').text(data.conform_harrowing);
   
   // Rotavator
   $('#view_rotavator').text(data.rotavator);
   $('#view_evaluation_rotavator').text(data.evaluation_rotavator);
   $('#view_target_date_rotavator').text(data.target_date_rotavator);
   $('#view_completion_date_rotavator').text(data.completion_date_rotavator);
   $('#view_servedby_rotavator').text(data.servedby_rotavator);
   $('#view_conform_rotavator').text(data.conform_rotavator);
   
   // Seeds
   $('#view_seeds').text(data.seeds);
   $('#view_evaluation_seeds').text(data.evaluation_seeds);
   $('#view_target_date_seeds').text(data.target_date_seeds);
   $('#view_completion_date_seeds').text(data.completion_date_seeds);
   $('#view_servedby_seeds').text(data.servedby_seeds);
   $('#view_conform_seeds').text(data.conform_seeds);
   
   // Inoculant
   $('#view_inoculant').text(data.inoculant);
   $('#view_evaluation_inoculant').text(data.evaluation_inoculant);
   $('#view_target_date_inoculant').text(data.target_date_inoculant);
   $('#view_completion_date_inoculant').text(data.completion_date_inoculant);
   $('#view_servedby_inoculant').text(data.servedby_inoculant);
   $('#view_conform_inoculant').text(data.conform_inoculant);
   
   // Enrollment
   $('#view_enrollment').text(data.enrollment);
   $('#view_evaluation_enrollment').text(data.evaluation_enrollment);
   $('#view_target_date_enrollment').text(data.target_date_enrollment);
   $('#view_completion_date_enrollment').text(data.completion_date_enrollment);
   $('#view_servedby_enrollment').text(data.servedby_enrollment);
   $('#view_conform_enrollment').text(data.conform_enrollment);
   
   // Insurance Claim
   $('#view_insurance_claim').text(data.insurance_claim);
   $('#view_evaluation_insurance_claim').text(data.evaluation_insurance_claim);
   $('#view_target_date_insurance_claim').text(data.target_date_insurance_claim);
   $('#view_completion_date_insurance_claim').text(data.completion_date_insurance_claim);
   $('#view_servedby_insurance_claim').text(data.servedby_insurance_claim);
   $('#view_conform_insurance_claim').text(data.conform_insurance_claim);
   
   // Production
   $('#view_production').text(data.production);
   $('#view_evaluation_production').text(data.evaluation_production);
   $('#view_target_date_production').text(data.target_date_production);
   $('#view_completion_date_production').text(data.completion_date_production);
   $('#view_servedby_production').text(data.servedby_production);
   $('#view_conform_production').text(data.conform_production);
   
   // Fertilizer
   $('#view_evaluation_fertilizer').text(data.evaluation_fertilizer);
   $('#view_target_date_fertilizer').text(data.target_date_fertilizer);
   $('#view_completion_date_fertilizer').text(data.completion_date_fertilizer);
   $('#view_servedby_fertilizer').text(data.servedby_fertilizer);
   $('#view_conform_fertilizer').text(data.conform_fertilizer);
   
   // Feeding Inputs
   $('#view_evaluation_feeding_inputs').text(data.evaluation_feeding_inputs);
   $('#view_target_date_feeding_inputs').text(data.target_date_feeding_inputs);
   $('#view_completion_date_feeding_inputs').text(data.completion_date_feeding_inputs);
   $('#view_servedby_feeding_inputs').text(data.servedby_feeding_inputs);
   $('#view_conform_feeding_inputs').text(data.conform_feeding_inputs);
   
   // Pest Control
   $('#view_evaluation_pest_control').text(data.evaluation_pest_control);
   $('#view_target_date_pest_control').text(data.target_date_pest_control);
   $('#view_completion_date_pest_control').text(data.completion_date_pest_control);
   $('#view_servedby_pest_control').text(data.servedby_pest_control);
   $('#view_conform_pest_control').text(data.conform_pest_control);
   
   // Irrigation
   $('#view_evaluation_irrigation').text(data.evaluation_irrigation);
   $('#view_target_date_irrigation').text(data.target_date_irrigation);
   $('#view_completion_date_irrigation').text(data.completion_date_irrigation);
   $('#view_servedby_irrigation').text(data.servedby_irrigation);
   $('#view_conform_irrigation').text(data.conform_irrigation);
   
   // Post Harvest
   $('#view_evaluation_post_harvest').text(data.evaluation_post_harvest);
   $('#view_target_date_post_harvest').text(data.target_date_post_harvest);
   $('#view_completion_date_post_harvest').text(data.completion_date_post_harvest);
   $('#view_servedby_post_harvest').text(data.servedby_post_harvest);
   $('#view_conform_post_harvest').text(data.conform_post_harvest);
   
   // Harvester
   $('#view_harvester').text(data.harvester);
   $('#view_evaluation_harvester').text(data.evaluation_harvester);
   $('#view_target_date_harvester').text(data.target_date_harvester);
   $('#view_completion_date_harvester').text(data.completion_date_harvester);
   $('#view_servedby_harvester').text(data.servedby_harvester);
   $('#view_conform_harvester').text(data.conform_harvester);
   
   // Hauling
   $('#view_hauling').text(data.hauling);
   $('#view_evaluation_hauling').text(data.evaluation_hauling);
   $('#view_target_date_hauling').text(data.target_date_hauling);
   $('#view_completion_date_hauling').text(data.completion_date_hauling);
   $('#view_servedby_hauling').text(data.servedby_hauling);
   $('#view_conform_hauling').text(data.conform_hauling);
   
   // Drying
   $('#view_drying').text(data.drying);
   $('#view_evaluation_drying').text(data.evaluation_drying);
   $('#view_target_date_drying').text(data.target_date_drying);
   $('#view_completion_date_drying').text(data.completion_date_drying);
   $('#view_servedby_drying').text(data.servedby_drying);
   $('#view_conform_drying').text(data.conform_drying);
   
   // Milling
   $('#view_milling').text(data.milling);
   $('#view_evaluation_milling').text(data.evaluation_milling);
   $('#view_target_date_milling').text(data.target_date_milling);
   $('#view_completion_date_milling').text(data.completion_date_milling);
   $('#view_servedby_milling').text(data.servedby_milling);
   $('#view_conform_milling').text(data.conform_milling);
   
   // Grading
   $('#view_grading').text(data.grading);
   $('#view_evaluation_grading').text(data.evaluation_grading);
   $('#view_target_date_grading').text(data.target_date_grading);
   $('#view_completion_date_grading').text(data.completion_date_grading);
   $('#view_servedby_grading').text(data.servedby_grading);
   $('#view_conform_grading').text(data.conform_grading);
   
   // Marketing
   $('#view_marketing').text(data.marketing);
   $('#view_evaluation_marketing').text(data.evaluation_marketing);
   $('#view_target_date_marketing').text(data.target_date_marketing);
   $('#view_completion_date_marketing').text(data.completion_date_marketing);
   $('#view_servedby_marketing').text(data.servedby_marketing);
   $('#view_conform_marketing').text(data.conform_marketing);
   
   // Others
   $('#view_others').text(data.others);
   $('#view_evaluation_others').text(data.evaluation_others);
   $('#view_target_date_others').text(data.target_date_others);
   $('#view_completion_date_others').text(data.completion_date_others);
   $('#view_servedby_others').text(data.servedby_others);
   $('#view_conform_others').text(data.conform_others);
   
   // Notes
   $('#view_notes').text(data.notes);

//    IMGAGES
   $('#view_imagePreview1').attr('src',data.imageUpload1);
   $('#view_imagePreview2').attr('src',data.imageUpload2);
   
   
            // Special Notes
            $('#view_special_notes').text(data.special_notes);     
               // Show the modal
               $("#viewModal").modal("show");
           },
           error: function (data) {
               console.log("Error:", data);
           },
       });
   }
  
     //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //
   
   $('#assistance-archive-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('assistance-archive-datatable') }}",
           columns: [ 
                       { data: 'rsbsa', name: 'rsbsa' },
                       { data: 'name', name: 'name' },
                       { data: 'gender', name: 'gender' },
                       { data: 'birthdate', name: 'birthdate' },
                       { data: 'created_at', name: 'created_at' },
                       {data: 'action', name: 'action', orderable: false},
                    ],
                   
                   order: [[0, 'desc']]
       });
   
     function archiveFunc(id) {
         if (confirm("Archive Record?") == true) {
             // Make an AJAX request to the archive route
             $.ajax({
                 type: "POST",
                 url: "{{ url('assistance/archive') }}",
                 data: { id: id },
                 dataType: 'json',
                 success: function (response) {
                     // Handle success, e.g., show a success message
                     console.log(response.success);
                     // Optionally, you may want to refresh the data table
                     var ArcTable = $('#assistance-archive-datatable').DataTable();
                     var oTable = $('#assistance-crud-datatable').DataTable();
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
                 url: "{{ url('assistance/restore') }}",
                 data: { id: id },
                 dataType: 'json',
                 success: function (response) {
                     // Handle success, e.g., show a success message
                     console.log(response.success);
                     // Optionally, you may want to refresh the data table
                     var ArcTable = $('#assistance-archive-datatable').DataTable();
                     var oTable = $('#assistance-crud-datatable').DataTable();
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
                 url: "{{ url('delete-assistance') }}",
                 data: { id: id },
                 dataType: 'json',
                 success: function (response) {
                     // Handle success, e.g., show a success message
                     console.log(response.success);
                     // Optionally, you may want to refresh the data table
                     var ArcTable = $('#assistance-archive-datatable').DataTable();
                     var oTable = $('#assistance-crud-datatable').DataTable();
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


    $('#btn-save').click(function() {
        var formData = new FormData($('#AssistanceForm')[0]);

        $.ajax({
            type: 'POST',
            url: "{{ url('store-assistance')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#assistance-modal").modal('hide');
                var oTable = $('#assistance-crud-datatable').dataTable();
                oTable.fnDraw(false);
                $("#btn-save").html('Submit');
                $("#btn-save").attr("disabled", false);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    // Manually trigger form submission when the button is clicked
    $('#btn-save').click(function() {
        $('#AssistanceForm').submit();
    });


    //   EDIT WITH IMG SUBMIT
    $('#btn-save-withIMG').click(function() {
        var formData = new FormData($('#AssistanceForm')[0]);

        $.ajax({
            type: 'POST',
            url: "{{ url('store-assistance-withIMG')}}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                $("#assistance-modal").modal('hide');
                var oTable = $('#assistance-crud-datatable').dataTable();
                oTable.fnDraw(false);
                $("#btn-save-withIMG").html('Submit');
                $("#btn-save-withIMG").attr("disabled", false);
            },
            error: function(data) {
                console.log(data);
            }
        });
    });

    // Manually trigger form submission when the button is clicked
    $('#btn-save-withIMG').click(function() {
        $('#AssistanceForm').submit();
    });

   
   </script>
   
   <script>
     function toggleContent(contentId, triangleId) {
        var hiddenContent = document.getElementById(contentId);
        var triangleIcon = document.getElementById(triangleId);

        if (hiddenContent.classList.contains('show')) {
            // Close the content
            hiddenContent.classList.remove('show');
            triangleIcon.style.transform = 'rotate(0deg)';
        } else {
            // Open the content
            hiddenContent.classList.add('show');
            triangleIcon.style.transform = 'rotate(90deg)';

            // Calculate the scroll position to center the content vertically
            var scrollPosition = hiddenContent.offsetTop - (window.innerHeight / 2 - hiddenContent.offsetHeight / 2);

            // Smooth scroll to the opened content
            window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
        }
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
     function previewImage(input, previewId) {
         var preview = document.getElementById(previewId);
         var previewContainer = document.getElementById(previewId + 'Container');
   
         // Ensure that a file is selected
         if (input.files && input.files[0]) {
             var reader = new FileReader();
   
             reader.onload = function (e) {
                 preview.src = e.target.result;
                 preview.classList.remove('d-none'); // Show the image preview
             };
   
             reader.readAsDataURL(input.files[0]);
         } else {
             preview.src = '#';
             preview.classList.add('d-none'); // Hide the image preview
         }
     }
   </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var fileInput1 = document.getElementById('imageUpload1');
        var textInput1 = document.getElementById('imageUploadData1');

        // Add an event listener to the file input field
        fileInput1.addEventListener('change', function () {
            // Check if a file is selected
            if (this.files && this.files[0]) {
                // Enable the text input and set its value
                textInput1.disabled = false;
                textInput1.value = 'Not null';
            } else {
                // Disable the text input and reset its value
                textInput1.disabled = true;
                textInput1.value = '';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var fileInput2 = document.getElementById('imageUpload2');
        var textInput2 = document.getElementById('imageUploadData2');

        // Add an event listener to the file input field
        fileInput2.addEventListener('change', function () {
            // Check if a file is selected
            if (this.files && this.files[0]) {
                // Enable the text input and set its value
                textInput2.disabled = false;
                textInput2.value = 'Not null';
            } else {
                // Disable the text input and reset its value
                textInput2.disabled = true;
                textInput2S.value = '';
            }
        });
    });
</script>

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
         
  <script src="{{asset('dash-assets/js/registry/CheckBoxHandler.js')}}"></script>