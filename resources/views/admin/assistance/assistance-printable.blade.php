    <style>
        #body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .display-flex{
            display: flex;
            background-color: none;
        }
        .flex-1{
            flex:1;
            background-color: none;
        }
        .width-N6{
            width: 161px;
            background-color: none;
        }
        .width-N5{
            width: 749px;
            background-color: none;
        }
        .width-N4{
            width: 0px;
            background-color: none;
        }
        .width-N3{
            width: 100px;
            background-color: none;
        }
        .width-N2{
            width: 225px;
            background-color: none;
        }
        .width-N1{
            width: 145px;
            background-color: none;
        }
        .width-1{
            width: 150px;
            background-color: none;
        }
        .width-2{
            width: 80px;
            background-color: none;
        }
        .width-3{
            width: 374px;
            background-color: none;
        }
        .border-whole{
            border-left:  black solid 2.5px;
            border-top:  black solid 2.5px;
            border-right:  black solid 2.5px;
            border-bottom:  black solid 2.5px;
        }
        .border-no-left{
            border-left:  black solid 0px;
            border-top:  black solid 2.5px;
            border-right:  black solid 2.5px;
            border-bottom:  black solid 2.5px;
        }
        .border-no-top{
            border-left:  black solid 2.5px;
            border-top:  black solid 0px;
            border-right:  black solid 2.5px;
            border-bottom:  black solid 2.5px;
        }
        .border-no-right{
            border-left:  black solid 2.5px;
            border-top:  black solid 2.5px;
            border-right:  black solid 0px;
            border-bottom:  black solid 2.5px;
        }
        .border-no-bottom{
            border-left:  black solid 2.5px;
            border-top:  black solid 2.5px;
            border-right:  black solid 2.5px;
            border-bottom:  black solid 0px;
        }
        .border-left{
            border-left:  black solid 2.5px;
            margin-left: 10px:
        }
        .border-top{
            border-top:  black solid 2.5px;
        }
        .border-right{
            border-right:  black solid 2.5px;
        }
        .border-bottom{
            border-bottom:  black solid 2.5px;
        }
        .border-no-topbot{
            border-left:  black solid 2.5px;
            border-top:  black solid 0px;
            border-right:  black solid 2.5px;
            border-bottom:  black solid 0px;
        }
        .center{
            text-align: center;
        }
        .left{
            text-align: left;
            padding-left: 15px;
        }
        .right{
            text-align: right;
            padding-right: 15px;
        }
        h5{
            font-size: 15px;
            font-weight: bold;
        }
        p{
            font-size: 10px;
            font-weight: bold;
            height: 0px;
        }
        h3{
            margin-top: 10px;
            margin-bottom: 10px;
            font-size: 15px;
            height: 5px;
            font-weight: bold;
        }
        .height-auto{
            height: auto;
        }
        .height-small{
            height: 40px;
        }
        .height-small-1{
            height: 25px;
        }
        .marg-top-N1{
            margin-top: 2px;
        }
        .marg-top{
            margin-top: 12px;
        }
        .marg-top-1{
            margin-top: 2px;
        }
        .padding-bottom-1{
            padding-bottom: 2px;
        }

    </style>

<div id="body">
    
    <h3 class="center" style="margin-bottom: 10px;">FARMER ASSISTANCE APPLICATION FORM</h3>

    <!-- FARM FORM ENTRY -->
    <div class="display-flex border-no-bottom height-small">
        <div class="width-1 border-right center"><h5 class="marg-top">FASTFORM NO.:</h5></div>
        <div class="flex-1 border-right"> <p id="view_rsbsa" class="marg-top center bold"></p></div>
        <div class="width-1 border-right center"><h5 class="marg-top">Application:</h5></div>
        <div class="width-2 border-right center">
            <div class="center border-bottom"><p class=" marg-top-N1 padding-bottom-1 bold">Date</p></div>
            <div class="center"><p class="marg-top-1 bold">Time</p></div>
        </div>
        <div class="flex-1 ">
            <div class="center border-bottom"><p id="view_date" class=" marg-top-N1 padding-bottom-1 bold"></p></div>
            <div class="center"><p id="view_timepicker" class="marg-top-1 bold"></p></div>
        </div>
    </div>
    
    <!-- FARMER INFO -->
    <div class="display-flex border-no-bottom height-small-1">
        <div class="flex-1 left"><h5 class="marg-top-1">FARMERS INFORMATION:</h5></div>
    </div>

    <!-- FARMER -->
        <div class="display-flex border-whole height-small">
            <div class="width-2 center"><h5 class="marg-top">NAME:</h5></div>
            <div class="flex-1 border-left"> <p id="view_name" class="marg-top center bold">JUAN DELA CRUZ</p></div>

            <div class="width-2 border-left center">
                <div class="center border-bottom"><p class=" marg-top-N1 padding-bottom-1 bold">Gender</p></div>
                <div class="center"><p id="view_gender" class="marg-top-1 bold"></p></div>
            </div>
            
            <div class="width-2 border-no-topbot center">
                <div class="center border-bottom"><p class=" marg-top-N1 padding-bottom-1 bold">Age</p></div>
                <div class="center"><p id="age" class="marg-top-1 bold"></p></div>
            </div>

            
            <div class="width-2 center"><p class="marg-top" style="font-weight: bolder;">Date of Birth</p></div>
            <div class="flex-1 border-left"> <p id="view_birthdate" class="marg-top center bold">03-22-2002</p></div>
        </div>
    <!-- FARMER SPOUSE -->
        <div class="display-flex border-whole height-small">
            <div class="width-2 center"><h5 class="marg-top">SPOUSE:</h5></div>
            <div class="flex-1 border-left"> <p id="view_spouse" class="marg-top center bold">MARIA DELA CRUZ</p></div>

            <div class="width-2 border-left center">
                <div class="center border-bottom"><p class=" marg-top-N1 padding-bottom-1 bold">Gender</p></div>
                <div class="center"><p id="view_spouse_gender" class="marg-top-1 bold"></p></div>
            </div>
            
            <div class="width-2 border-no-topbot center">
                <div class="center border-bottom"><p class=" marg-top-N1 padding-bottom-1 bold">Age</p></div>
                <div class="center"><p id="spouse_age" class="marg-top-1 bold"></p></div>
            </div>

            
            <div class="width-2 center"><p class="marg-top" style="font-weight: bolder;">Date of Birth</p></div>
            <div class="flex-1 border-left"> <p id="view_spouse_birthdate" class="marg-top center bold">03-22-2002</p></div>
        </div>
    <!-- FARMER OFFSPRING & Income -->
        <div class="display-flex border-no-bottom height-small-1">
            <div class="flex-1 left"><h5 class="marg-top-1">Number of Dependents/Children: <span id="view_dependents">20</span></h5></div>
            
            <div class="width-1 left border-left"><h5 class="marg-top-1">Estimated Income:</h5></div>
            
            <div class="width-N1 left border-left"><h5 id="view_income" class="marg-top-1">₱5000</h5></div>
        </div>
    <!-- FARMER ADDRESS -->
        <div class="display-flex border-whole height-small-1">
            <div class="width-N2 center"><h5 class="marg-top-N1">Home / Residence Address:</h5></div>
            
            <div class="flex-1 left border-left"><h5 id="view_address" class="marg-top-1">West Av. Ney work City, Amsterdam</h5></div>
        </div>

    <!-- END OF FARMER INFO -->

    <!-- START OF FARM DESCRIPTION -->
    <h3 class="left">FARM DESCRIPTION:</h3>
        <!-- PARTICULARS -->
        <div class="display-flex border-no-bottom height-small-1">
            <div class="flex-1 center"><h5 class="marg-top-N1">PARTICULARS</h5></div>
        </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 left border-right"><h5 class="marg-top-N1">Farm Address / Location</h5></div>
                <div class="flex-1 center border-right"><h5 id=" " class="marg-top-N1"></h5></div>
                <div class="flex-1 left"><h5 class="marg-top-N1">Topography</h5></div>
                <div class="flex-1 center"><h5 id="" class="marg-top-N1"></h5></div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 left border-right"><h5 class="marg-top-N1">Sitio / Purok</h5></div>
                <div class="flex-1 center border-right"><h5 id="view_purok" class="marg-top-N1"></h5></div>
                <div class="flex-1 right "><h5 class="marg-top-N1">Flat</h5></div>
                <div class="flex-1 center">
                    <div id="flat" style="color:white; margin-top:5px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="flat_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 left border-right"><h5 class="marg-top-N1">Barangay</h5></div>
                <div class="flex-1 center border-right"><h5 id="view_brngy" class="marg-top-N1"></h5></div>
                <div class="flex-1 right "><h5 class="marg-top-N1">Gently Sloping</h5></div>
                <div class="flex-1 center">
                    <div id="slope" style="color:white; margin-top:5px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="slope_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 left border-right"><h5 class="marg-top-N1">Geopgraphic Coordinates</h5></div>
                <div class="flex-1 center border-right"><h5 id="view_geographic_coordinates" class="marg-top-N1"></h5></div>
                <div class="flex-1 right "><h5 class="marg-top-N1">Rolling / Undulating</h5></div>
                <div class="flex-1 center">
                    <div id="rolling" style="color:white; margin-top:5px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="rolling_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 left border-right"><h5 class="marg-top-N1">Title No.</h5></div>
                <div class="flex-1 center border-right"><h5 id="view_title_no" class="marg-top-N1"></h5></div>
                <div class="flex-1 right "><h5 class="marg-top-N1">Hilly/Steep Slopes</h5></div>
                <div class="flex-1 center">
                    <div id="hillysteep" style="color:white; margin-top:5px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="hillysteep_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 left border-right"><h5 class="marg-top-N1">Tax Declaration No.</h5></div>
                <div class="flex-1 center border-right"><h5 id="view_tax_declarration_no" class="marg-top-N1"></h5></div>
                <div class="flex-1 border-right left "><h5 class="marg-top-N1">Soil Type:</h5></div>
                <div class="flex-1 center">
                    <h5 id="view_soil_type" class="marg-top-N1"></h5>
                </div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 left "><h5 class="marg-top-N1">Tenure Type: </h5></div>
                <div class="flex-1 center border-right"><h5 id="" class="marg-top-N1"></h5></div>
                <div class="flex-1  left "><h5 class="marg-top-N1">Sources of Water</h5></div>
                <div class="flex-1 center">
                </div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 right"><h5 class="marg-top-N1">Owned</h5></div>
                <div class="flex-1 border-right left">
                    <div id="owned" style="color:white; margin-top:5px; width:15px; height:15px; border:black solid 1px;"><h5  id="owned_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
                <div class="width-N4 left">
                </div>
                <div class="flex-1 right "><h5 class="marg-top-N1">Irrigated</h5></div>
                <div class="flex-1 center">
                    <div id="irrigated" style="color:white; margin-top:5px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="irrigated_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 right"><h5 class="marg-top-N1">Lease/rent(indicate no. of years)</h5></div>
                <div class="flex-1 border-right left">
                    <div id="lease" style="color:white; margin-top:5px; width:15px; height:15px; border:black solid 1px;"><h5  id="lease_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
                <div class="width-N4 left">
                </div>
                <div class="flex-1 right "><h5 class="marg-top-N1">SWIP/SIS</h5></div>
                <div class="flex-1 center">
                    <div id="swip" style="color:white; margin-top:5px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="swip_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 right"><h5 class="marg-top-N1">Tenant</h5></div>
                <div class="flex-1 border-right left">
                    <div id="tenant" style="color:white; margin-top:5px; width:15px; height:15px; border:black solid 1px;"><h5  id="tenant_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
                <div class="width-N4 left">
                </div>
                <div class="flex-1 right "><h5 class="marg-top-N1">Water Pump</h5></div>
                <div class="flex-1 center">
                    <div id="waterpump" style="color:white; margin-top:5px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="waterpump_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="flex-1 right"><h5 class="marg-top-N1">Others</div>
                <div class="flex-1 border-right left">
                    <div id="others" style="color:white; margin-top:5px; width:15px; height:15px; border:black solid 1px;"><h5  id="others_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
                <div class="width-N4 left">
                </div>
                <div class="flex-1 right "><h5 class="marg-top-N1">Rainfed</h5></div>
                <div class="flex-1 center">
                    <div id="rainfed" style="color:white; margin-top:5px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="rainfed_check" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                </div>
            </div>
            <div class="display-flex border-whole height-small-1">
                <div class="flex-1 left "><h6 class="marg-top-N1">Existing Vegetation:</h6></div>
                <div class="flex-1 left border-right"><h5 id="existing" class="marg-top-N1"></h5></div>
                <div class="flex-1 left "><h6 class="marg-top-N1" style="width: 150px;">Existing/Previous-Crop:</h6></div>
                <div class="flex-1 left">
                    <h5 id="previous" class="marg-top-N1"></h5>
                </div>
            </div>
    <!-- END OF FARM DESCRIPTION -->

    <!-- START OF ASSISTANCE REQUEST -->
    <h3 class="left">ASSISTANCE REQUEST:</h3>
        <div class="display-flex border-no-bottom height-small-1">
            <div class="width-3 right"><h6 class="marg-top-N1" >REQUESTION</h6></div>
            <div class="width-3 border-right left"><h6 class="marg-top-N1" >DETAILS</h6></div>
            <div class="border-right center" style="width: 150px;"><h6 class="marg-top-N1 bold">Evaluation</h6></div>
            <div class="border-right center" style="width: 154px;"><h6 class="marg-top-N1" style="font-size:15px;">Target Date</h6></div>
            <div class="border-right center" style="width: 154px;"><h6 class="marg-top-N1" style="font-size:12px; font-weight:bold;">Completion Date</h6></div>
            <div class="border-right center" style="width: 151px;"><h6 class="marg-top-N1">Served by</h6></div>
            <div class="center" style="width: 157px;"><h6 class="marg-top-N1">Conform</h6></div>
        </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Intended Crop</h6></div>
                <div class="width-3 border-right center"><h6 id="view_intended_crop" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_intended_crop" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_intended_crop" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_intended_crop" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_intended_crop" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_intended_crop" class="marg-top-N1"></h6></div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Program Applied For (Has.)</h6></div>
                <div class="width-3 border-right center"><h6 id="view_program_applied" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_program_applied" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_program_applied" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_program_applied" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_program_applied" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_program_applied" class="marg-top-N1"></h6></div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Pre-planting/Land Preparation</h6></div>
                <div class="width-3 border-right center"><h6 id="view_land_preparation" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_land_preparation" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_land_preparation" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_land_preparation" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_land_preparation" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_land_preparation" class="marg-top-N1"></h6></div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Farm Planning/Lay-outing</h6></div>
                <div class="width-3 border-right center"><h6 id="view_lay_outing" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_lay_outing" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_lay_outing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_lay_outing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_lay_outing" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_lay_outing" class="marg-top-N1"></h6></div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Farm Development</h6></div>
                <div class="width-3 border-right center"><h6 id="view_farm_development" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_farm_development" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_farm_development" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_farm_development" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_farm_development" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_farm_development" class="marg-top-N1"></h6></div>
            </div>
            <div class="display-flex border-no-bottom height-small-1">
                <!-- Plowing -->
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Plowing</h6></div>
                <div class="width-3 border-right center"><h6 id="view_plowing" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_plowing" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_plowing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_plowing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_plowing" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_plowing" class="marg-top-N1"></h6></div>
            </div>
            
            <div class="display-flex border-no-bottom height-small-1">
                <!-- Harrowing -->
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Harrowing</h6></div>
                <div class="width-3 border-right center"><h6 id="view_harrowing" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_harrowing" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_harrowing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_harrowing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_harrowing" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_harrowing" class="marg-top-N1"></h6></div>
            </div>
            
            <div class="display-flex border-no-bottom height-small-1">
                <!-- Rotavator -->
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Rotavator</h6></div>
                <div class="width-3 border-right center"><h6 id="view_rotavator" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_rotavator" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_rotavator" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_rotavator" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_rotavator" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_rotavator" class="marg-top-N1"></h6></div>
            </div>
            
            <!-- Seeds/Input Material -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Seeds/Input Material</h6></div>
                <div class="width-3 border-right center"><h6 id="view_seeds" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_seeds" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_seeds" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_seeds" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_seeds" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_seeds" class="marg-top-N1"></h6></div>
            </div>
            
            <!-- Inoculants -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Inoculants</h6></div>
                <div class="width-3 border-right center"><h6 id="view_inoculant" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_inoculant" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_inoculant" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_inoculant" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_inoculant" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_inoculant" class="marg-top-N1"></h6></div>
            </div>
            
            <!-- Crop Insurance Enrollment -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Crop Insurance Enrollment</h6></div>
                <div class="width-3 border-right center"><h6 id="view_enrollment" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_enrollment" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_enrollment" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_enrollment" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_enrollment" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_enrollment" class="marg-top-N1"></h6></div>
            </div>
            
            <!-- Crop Insurance Claim -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Crop Insurance Claim</h6></div>
                <div class="width-3 border-right center"><h6 id="view_insurance_claim" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_insurance_claim" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_insurance_claim" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_insurance_claim" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_insurance_claim" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_insurance_claim" class="marg-top-N1"></h6></div>
            </div>
            
            <!-- Production -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Production</h6></div>
                <div class="width-3 border-right center"><h6 id="view_production" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_production" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_production" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_production" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_production" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_production" class="marg-top-N1"></h6></div>
            </div>
            
            <!-- Fertilizer -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Fertilizer</h6></div>
                <div class="width-3 border-right center"><h6 id="view_fertilizer" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_fertilizer" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_fertilizer" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_fertilizer" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_fertilizer" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_fertilizer" class="marg-top-N1"></h6></div>
            </div>
            
                    <!-- Feeding Inputs -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Feeding Inputs</h6></div>
                <div class="width-3 border-right center"><h6 id="view_feeding_inputs" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_feeding_inputs" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_feeding_inputs" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_feeding_inputs" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_feeding_inputs" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_feeding_inputs" class="marg-top-N1"></h6></div>
            </div>

            <!-- Pest/Disease Control -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Pest/Disease Control</h6></div>
                <div class="width-3 border-right center"><h6 id="view_pest_control" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_pest_control" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_pest_control" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_pest_control" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_pest_control" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_pest_control" class="marg-top-N1"></h6></div>
            </div>

            <!-- Irrigation/Water Pump -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Irrigation/Water Pump</h6></div>
                <div class="width-3 border-right center"><h6 id="view_irrigation" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_irrigation" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_irrigation" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_irrigation" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_irrigation" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_irrigation" class="marg-top-N1"></h6></div>
            </div>

            <!-- Post Harvest -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Post Harvest</h6></div>
                <div class="width-3 border-right center"><h6 id="view_post_harvest" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_post_harvest" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_post_harvest" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_post_harvest" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_post_harvest" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_post_harvest" class="marg-top-N1"></h6></div>
            </div>

            <!-- Harvester -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Harvester</h6></div>
                <div class="width-3 border-right center"><h6 id="view_harvester" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_harvester" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_harvester" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_harvester" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_harvester" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_harvester" class="marg-top-N1"></h6></div>
            </div>

            <!-- Hauling -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Hauling</h6></div>
                <div class="width-3 border-right center"><h6 id="view_hauling_distance" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_hauling_volume" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_hauling" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_hauling" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_hauling" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_hauling" class="marg-top-N1"></h6></div>
            </div>

            <!-- Drying -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Drying</h6></div>
                <div class="width-3 border-right center"><h6 id="view_drying" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_drying" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_drying" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_drying" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_drying" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_drying" class="marg-top-N1"></h6></div>
            </div>

            <!-- Milling/Processing -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Milling/Processing</h6></div>
                <div class="width-3 border-right center"><h6 id="view_milling_processing" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_milling_processing" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_milling_processing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_milling_processing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_milling_processing" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_milling_processing" class="marg-top-N1"></h6></div>
            </div>

            <!-- Grading/QM (Quality Management) -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Grading/QM</h6></div>
                <div class="width-3 border-right center"><h6 id="view_grading_qm" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_grading_qm" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_grading_qm" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_grading_qm" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_grading_qm" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_grading_qm" class="marg-top-N1"></h6></div>
            </div>

            <!-- Marketing -->
            <div class="display-flex border-no-bottom height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Marketing</h6></div>
                <div class="width-3 border-right center"><h6 id="view_marketing" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_marketing" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_marketing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_marketing" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_marketing" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_marketing" class="marg-top-N1"></h6></div>
            </div>

            <!-- Others -->
            <div class="display-flex border-whole height-small-1">
                <div class="width-3 border-right center"><h6 class="marg-top-N1">Others</h6></div>
                <div class="width-3 border-right center"><h6 id="view_others" class="marg-top-N1"></h6></div>
                <div class="width-N1 border-right center"><h6 id="view_evaluation_others" class="marg-top-N1 bold"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_target_date_others" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_completion_date_others" class="marg-top-N1"></h6></div>
                <div class="width-1 border-right center"><h6 id="view_servedby_others" class="marg-top-N1"></h6></div>
                <div class="width-1 center"><h6 id="view_conform_others" class="marg-top-N1"></h6></div>
            </div>

            <!-- NOTES -->
            <div class="display-flex border-whole height-auto" style="border-bottom: 3px black solid;">
                <div class="width-N2 center"><h5 class="marg-top-N1">Remarks:</h5></div>
                
                <div class=" left height-auto">
                    <h5 id="view_notes" class="marg-top-1" style="width: 600px; height: auto;">
                    </h5>
                </div>
            </div>


        <!-- EVALUATION -->
        <div class="display-flex">
            <div class="flex-1 right"><h5 class="marg-top"></h5></div>
            <div class="flex-1"> <h5 id="ff_no" class="marg-top left bold">Evaluated by:</h5></div>
            <div class="flex-1"><h5 class="marg-top left bold">Reviewed by:</h5></div>  
        </div>
    <div>
        <div class="display-flex">
            <div class="flex-1 right">
                <div class="center">
                    <div class="center"  style="margin-bottom: 5px;"><p class="bold" style="text-decoration: underline;">__________<span id="applicant_name"></span>__________</p>
                </div>
                    <div class="center"  style="margin-top: 5px;"><p>Applicants Signature over Printed Name</p></div>
                </div>
                <div class="flex-1 ">
                    <div class="center"><p id="applic_date" class="bold"></p></div>
                    <div class="center"><p id="applic_time" class="bold"></p></div>
                </div>
            </div>

            <div class="flex-1 right">
                <div class="center">
                    <div class="center"  style="margin-bottom: 5px;"><p class="bold" style="text-decoration: underline;">__________<span id="BAT"></span>__________</p>
                </div>
                    <div class="center"  style="margin-top: 5px;"><p>BAT</p></div>
                </div>
                <div class="flex-1 ">
                    <div class="center"><p id="applic_date" class="bold"></p></div>
                    <div class="center"><p id="applic_time" class="bold"></p></div>
                </div>
            </div>
            
            <div class="flex-1 right">
                <div class="center">
                    <div class="center"  style="margin-bottom: 5px;"><p class="bold" style="text-decoration: underline;">__________<span id="BAT"></span>__________</p>
                </div>
                    <div class="center"  style="margin-top: 5px;"><p>Cluster Supervisor</p></div>
                </div>
                <div class="flex-1 ">
                    <div class="center"><p id="applic_date" class="bold"></p></div>
                    <div class="center"><p id="applic_time" class="bold"></p></div>
                </div>
            </div>

        </div>
    </div>
    <div>

        <div class="display-flex" style="height: 30px;">
        </div>

        <div class="display-flex">

            <div class="flex-1 right">
                    <p class="bold" style="text-decoration: underline; text-align: center;">Date: ________<span id="applicant_sign-date"></span>________</p>
            </div>

            <div class="flex-1 right">
                <p class="bold" style="text-decoration: underline; text-align: center;">Date: ________<span id="BAT_signed-date"></span>________</p>
            </div>

            <div class="flex-1 right">
                <p class="bold" style="text-decoration: underline; text-align: center;">Date: ________<span id="cluster_supervisor_signed-date"></span>________</p>
            </div>

        </div>
    </div>

        <!-- PHOTOS -->      
        <h3 class="left" style="margin-top: 25px;">FARM SKETCH MAP</h3>
        <div class="display-flex border-whole height-auto">
            <img id="view_imagePreview1" src="" alt="" style="width: 50%; min-height: 100px; height: auto; justify-content:center;">
        </div>
        <h3 class="left">FARM SKETCH MAP</h3>
        <div class="display-flex border-whole height-auto">
            <img id="view_imagePreview2" src="" alt="" style="width: 50%; min-height: 100px; height: auto; justify-content:center;">
        </div>

        
        <h3 class="left">SPECIAL NOTES INSTRUCTION</h3>
        <div class="display-flex border-whole height-auto">            
            <div class=" left height-auto"><h5 id="view_special_notes" class="marg-top-1" style="width: 600px; height: auto;">
                </h5>
            </div>
        </div>
      
    </div>
