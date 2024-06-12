<div>
    <button class="btn-primary" id="printButton" onClick="printDiv('printable_div_id');">Print Document</button>
    <div id="printable_div_id">
        
      
    <style>
        @media print {
            /* Define page size and orientation for print */
            @page {
                size: 8.5in 13in;
                margin: 0;
                margin-top: -30px;
                
            }

            /* Apply additional styling for the print version */
            body {
                margin: 0;
                text-align: center;
                align-items: center;
            }

            /* Rest of your print-specific styles */
        }

        /* Add the following styles to reduce spacing */
        h6 {
            margin: 5px;
        }

        p {
            margin: 0;
        }

        .mt-4 {
            margin-top: 5px;
        }

        .mt-100 {
            margin-top: 10px;
        }
        /* Style for the signature area */
        .signature {
            margin-top: 20px;
            border-top: 1px solid #000;
            width: 200px;
            margin-left: 200px;
            text-align: center;
        }
        .signature_one {
            margin-top: 20px;
            border-top: 1px solid #000;
            width: 200px;
            margin-left: 550px;
            text-align: center;
        }
        #underline {
            border-bottom: 1px solid #000;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 0; 
        }
        .sign {
            margin-top: 20px;
            width: 100%;
            margin-left: 200px;
            position: absolute;
        }
        .cont_underlined{
            margin-left: 425px; 
            width: 250px;
             align-items: center;
             text-align: center;
        }
        .cont_underlined1{
            margin-left: 200px; 
            width: 300px;
            align-items: center;
            text-align: center;
            margin-top: 30px;
        }
        .signature_mayor{
            margin-top: 20px;
            border-top: 1px solid #000;
            width: 300px;
            margin-left: 200px;
            text-align: center;
        }
    </style>

    <div class="container mt-5" style="text-align: left;">
        <div>
            
                <div class="col-12 text-center">
                    <div>
                        <h6>Certificate of Achievement</h6>
                        <h6>Province of Bohol</h6>
                        <h6><b>Municipality of Carmen</b></h6>
                        <h6>
                            <b><u>EQUIPMENT RENTAL REQUISITION ORDER (TRACTOR)</u></b>
                        </h6>
                    </div>
                </div>
          
                <p style="text-indent: 20px;">I. Interview of Applicant (by MAO's Office)</p>
                <p>NAME OF APPLICANT: <span id="view-applicant"></span></p>
                <p>APPLICANT ADDRESS: <span id="view-address"></span></p>
                <p>FARM LOCATION: <span id="view-location"></span></p>
                <p>PROJECT DESCRIPTION: <span id="view-project_description"></p>
                <p>CONTACT NO: <span id="view-contact"></span></p>
                <p class="signature" style="width: 150px; margin-left: 425px; ">Applicant Signature</p>
                <p style="text-indent: 20px;">II. Ocular Inspection of Farm (by MAO's Office)</p>
                <p>Actual Land Area of Farm: <span id="view-actual_land_area_of_farm"></span></p>
                <p>Date Inspected: <span id="view-date_inspected"></span></p>
                  
                        <p style="margin-left: 450px;">Inspected by:</p>
                        <div class="signature_one" style=" margin-top:-5px; height: 1px; border:none;">
                            <span id="view-inspector"></span>
                        </div>
                        <p class="signature_one">INSPECTOR</p>
                
                <p>Assign Equipment and Compute Fuel Requirement (by MAO's Office)</p>
                <p>Fuel Requirement: <span id="view-fuel_requirement"></span></p>
                <p>Estimated Hours of Operation: <span id="view-hours_of_operation"></span></p>
                    <p style="margin-left:290px;">Recommended by:</p>
                    <div class="cont_underlined" >
                    <p >ARLENE D. CABUSAO</p>
                    <p id="underline"></p>
                    <p class="name">Municipal Agriculturist</p>
                    </div>
                <p style="text-indent: 20px;">III.Assessment/Computation/Collection of Rental (by MTO Office)</p>
                <p>Program Activity:<span id="view-equipment"></span></p>
                <p>Land Area Requested for Operation <span id="view-area"></span></p>
                <p>Rental Rate: <span id="view-rental_rate"></span></p>
                <p>Total Amount of Rental: <span id="view-total_rental_amount"></span></p>
                <p>Payment: <span id="view-payment"></span></p>
                <div style="margin-left: 250px; margin-top: 10px;"> 
                    <p>O.R.#: <span id="view-or_number"></span></p>
                    <p>DATE: <span id="view-payment_date"></p>
                    <p>Amount: <span id="view-payment_amount"></span></p>
                </div>
                
                        <p style="margin-left: 450px;">Computed by:</p>
                        <div class="signature_one" style=" margin-top:-5px; height: 1px; border:none;">
                            <span id="view-municipal_treasurer"></span>
                        </div>
                        <p class="signature_one">Municipal Treasurer</p>
               
                <p style="text-indent: 20px;">IV.Optional for LGU Funded Project</p>
                <p>Check Availability/Source of Fund(Accounting and Budget Office)</p>
                <p>Sources of Fund:<span id="view-source_of_fund"></span></p>
                <p>Funds Available:<span id="view-funds_available"></p>
                <div class="col-12" >
                    <div class="row">
                        <div class="col-md-4">
                                <p style="margin-left: 50px;">Certified by:</p>
                                <div style=" margin-top:-5px; height: 1px; width:500px; border:none; margin-left:230px;">
                                    <span id="view-municipal_accountant">
                                </div>
                                <p class="signature">Municipal Accountant</p>
                        </div>
                        <div class="col-md-6">
                                <p style="margin-left: 100px;">Computed by:</p>
                                <div style=" margin-top:-5px; height: 1px; border:none; margin-left:230px">
                                    <span id="view-municipal_budget_officer"></span>
                                </div>
                                <p class="signature">Municipal Budget Officer</p>
                        </div>
                    </div>
                    <div class="cont_underlined1">
                        <p style="margin-left: 30px;">Approved:</p>
                        <div  style=" margin-top:-5px; height: 1px; width: 500px; border:none; margin-left:100px">
                            <span id="view-municipal_mayor"></span>
                        </div>
                        <p class="signature_mayor">Municipal Mayor</p>
                    </div>
                </div>
                <p style="text-indent: 20px;">V. Equipment Dispatch (by MAO-Tractor Operation OIC)</p>
                <p>Schedule of Operation:<span id="view-schedule_of_operation"></span></p>
                <p>Plate Number of Tractor:<span id="view-plate_number_tractor"></span></p>
                <div class="cont_underlined">
                    <p style="margin-left: 30px;">By:</p>
                    <div style=" margin-top:-5px; height: 1px; width: 500px; border:none;margin-left:100px;">
                        <span id="view-mao_tractor_incharge"></span>
                    </div>
                    <p class="signature" style="width: 300px;">MAO-TRACTOR INCHARGE</p>
                </div>
                <p style="text-indent: 20px;">VI.Field Inspection (by Mayor's Office)</p>
                <p>Actual Land Area Served:<span id="view-actual_land_area_served"></span></p>
                <p>Actual Hours of Operation:<span id="view-actual_hours_of_operation"></span></p>
                <p>Remarks:<span id="view-remarks"></span></p>
                <div class="cont_underlined">
                    <p style="margin-left: 30px;">Inspected by:</p>
                    <div style=" margin-top:-5px; height: 1px; width: 500px; border:none;margin-left:100px;">
                        <span id="view-mo_field_inspector"></span>
                    </div>
                    <p class="signature" style="width: 300px;">MO Field Inspector</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>