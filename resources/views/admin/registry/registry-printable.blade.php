<div>
    <button class="btn-primary" id="printButton" onClick="printDiv('printable_div_id');">Print Document</button>
    <div id="printable_div_id">
    
    <style>
        .body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 1px 5px 10px 5px;
        }
        .title {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
        }
        .columns {
            display: flex;
            justify-content: space-between;
            padding: 10px;
          height: 70px;
        }
      .columns2 {
            display: flex;
            justify-content: space-between;
            padding:  0px 10px 0px 10px;
            
        }
      .columns3 {
            display: flex;
            justify-content: space-between;
            padding:  0px 10px 0px 10px;
            height: 70px ;
        }
        .column {
            flex: 1;
            text-align: left;
            font-size:15px;
            padding:5px;
            border: 0.5px solid #000;
        }
      .column2 {
            height: 60px ;
            flex: 1;
            text-align: center;
            font-size:13px;
            padding:5px;
            border: 0.5px solid #000;
        }
      .column3 {
            height: 100% ;
            flex: 1;
            text-align: center;
            font-size:13px;
            padding:5px;
            border: 0.5px solid #000;
        }
        p{
            font-weight:700;    
        }
    </style>
</head>
<div class="body">

    <div id="FirstPage" >
        <div class="title">
            FARMER REGISTRY ENROLMENT FORM
        </div>
        
        <div class="columns">
            <div class="column">
                <p style="margin-top:-5px;">RSBSA No:</p>
            <p id="view-rsbsa_id" style="margin-top:-10px;">5938-543</p>
            </div>
            <div class="column">
                <p style="margin-top:-5px;">Date & Time of Enrollment:</p>
            <p id="view-date_enrolled" style="margin-top:-10px;">MM/DD/YYYY</p>
            </div>
        </div>
        <!-- Rest of your content goes here -->
        <div style="height:5px;"></div>
        <p style="padding-left:10px; margin-bottom:-5px; margin-top:-2px;">FARMER'S INFORMATION</p>
        <div style="margin-bottom:-10px; height:auto;" class="columns">
            <div class="column2" >
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">HH Member:</p>
            </div>
            <div class="column2">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">Surname</p>
            </div>
        <div class="column2">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">First Name</p>
            </div>
        <div class="column2">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">Middle Name</p>
            </div>
        <div class="column2">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">Gender</p>
            </div>
        <div class="column2">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">Age</p>
            </div>
        <div class="column2">
                <p style="margin-top:-2px;">Birthdate</p>
                <p style="margin-top:-15px;">(MM-DD-YYYY)</p>
            </div>
        </div>
    <!--   HHM LIST STARTS HERE -->
    <div id="HHMemberView">

    <div id="HHMList" class="columns2" style="margin-top: 0px;">

            
            <div class="column3" style="height:25px;">
                <p id="view-hh_member" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
              
            <div class="column3" style="height:25px;">
                <p id="view-surname" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-firstname" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-middlename" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-gender" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-age" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
          
            <div class="column3" style="height:25px;">
                <p id="view-birthdate" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
        </div>

    </div>
        
    <!--   Income Source -->
    <div id="incomesource" class="columns3" style="height:60px;">

        <div class="column3" >
        <div style="text-align:left;Margin-top:-18px;">
        <p style="margin-top: 20px;">Sources of Income:</p>
        </div>
        <div>
        <p style="margin-top:-15px;" id="view-income_source"> Sample,Sample,Sample</p>
        </div>
        </div>
        <div class="column3">
        <div style="text-align:left;Margin-top:-18px;">
        <p style="margin-top: 20px;">Estimated Annual Income:</p>
        </div>
        <div>
        <p style="margin-top:-15px;" id="view-est_annual_income"> PHP 000000</p>
        </div>
        </div>
        
    </div>
    
    <div id="incomesource" class="columns3" style="margin-top:10px;">

        <div class="column3" style="height:90px; Margin-top:-10px; padding: 0 10px -10px 0;">
        <div style="text-align:left;Margin-top:0px;">
        <p>Home/Residence Address: <span id="view-address"></span></p>
        </div>
        <div style="display: flex;">
            
            <div class="column3" style="height:60px; Margin-top:-14px;">
            <div style="text-align:left; Margin-top:0px;">
            <p>Sitio/Purok:</p>
            </div>
            <div style="text-align:left;">
            <p id="view-sitio_purok" style=" text-align:center; Margin-top:-5px;">1,2,3,4,5,6,7,8,9</p>
            </div>
            </div>
            <div class="column3" style="height:60px;Margin-top:-14px;">
            <div style="text-align:left; Margin-top:0px;">
            <p>Barangay:</p>
            </div>
            <div style="text-align:left;">
            <p id="view-barangay" style=" text-align:center; Margin-top:-5px;">Sample</p>
            </div>
            </div>
            <div class="column3" style="height:60px; Margin-top:-14px;">
            <div style="text-align:left; Margin-top:0px;">
            <p>City/Municipality:</p>
            </div>
            <div style="text-align:left;">
            <p id="view-city" style=" text-align:center; Margin-top:-5px;">Sample</p>
            </div>
            </div>
            <div class="column3" style="height:60px;Margin-top:-14px;">
            <div style="text-align:left; Margin-top:0px;">
            <p>Geo Coordinates:</p>
            </div>
            <div style="text-align:left;">
            <p id="view-geo_coordinates" style="text-align:center; Margin-top:-10px; line-height:12px;">9.698085426934474, 123.93236241654222</p>
            </div>
            </div>
            
        </div>
        </div>
        <div class="column3"  style="height:90px; Margin-top:-10px;">
        <div style="text-align:left;Margin-top:0px;">
        <p>Years of Residency:</p>
        </div>
        <div>
        <p id="view-years_of_residency" style=" text-align:center; Margin-top:0px;">21 years</p>
        </div>
        </div>
        
    </div>
    
    <!--  ORGANIZATION  -->
    <div style="height:5px;"></div>
    <p style="padding-left:10px; margin-bottom:-5px; margin-top:30px;">MEMBERSHIP & AFFILIATIONS (if any):</p>

        <div style="margin-bottom:0px; height:50px;" class="columns">
        <div class="column2" style="height:40px;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">Name of Organization...</p>
            </div>
            <div class="column2" style="height:40px;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">POSITION</p>
            </div>
        <div class="column2" style="height:40px;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">MEMBER SINCE</p>
            </div>
            <div class="column2" style="height:40px;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">STATUS</p>
            </div>
        </div>
        {{-- ORG LIST STARTS HERE --}}
    <div id="ViewOrg">
        <div id="ORGList" class="columns2" style="margin-top:0px;">
            <div class="column3" style="height:25px;">
                <p id="view-membership" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-position" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-member_since" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-status" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
        </div>
    </div>
    
    <!--  AWARDS  -->
    <div style="height:5px;"></div>
    <p style="padding-left:10px; margin-bottom:-5px; margin-top:30px;">AWARDS & CITATIONS RECEIVED (if any):</p>
    
        <div style="margin-bottom:10px; height:45px;" class="columns">
            <div class="column2" style="height:45px;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">Name of Award/Citation</p>
            </div>
            <div class="column2" style="height:45px;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">Awarding Body</p>
            </div>
        <div class="column2" style="height:45px;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-10px;">Date Received</p>
            </div>
        </div>
    
        {{-- Awards Lists Starts here --}}
    </div id="ViewAwards">

        <div id="AwardList" class="columns2">
            <div class="column3" style="height:25px;">
                <p id="view-award" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-awarding_body" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-date_received" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
        </div>

        <div id="AwardList2" class="columns2">
            <div class="column3" style="height:25px;">
                <p id="view-award2" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-awarding_body2" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-date_received2" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
        </div>

        <div id="AwardList3" class="columns2">
            <div class="column3" style="height:25px;">
                <p id="view-award3" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-awarding_body3" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-date_received3" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
        </div>

        <div id="AwardList4" class="columns2">
            <div class="column3" style="height:25px;">
                <p id="view-award4" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-awarding_body4" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-date_received4" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
        </div>

        <div id="AwardList5" class="columns2">
            <div class="column3" style="height:25px;">
                <p id="view-award5" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-awarding_body5" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
            <div class="column3" style="height:25px;">
                <p id="view-date_received5" style="font-size:12px; height:1px; margin-top:-1px;"></p>
            </div>
        </div>

    </div>
   
    
    <!--  REMARKS  -->
    <div style="height:5px;"></div>
    <p style="padding-left:10px; margin-bottom:-5px; margin-top:30px;">REMARKS:</p>
    
        <div style="margin-bottom:30px; height:150px;" class="columns">
        <div class="column2" style="height:150px;">
                <p style="margin-top:-1px;"></p>
                <p id="view-remarks" style="margin-top:-10px; text-align:left;">Remarks Starts Here...</p>
            </div>
        
        </div>


<!-- FIRST PAGE ENDS HERE  FIRST PAGE ENDS HERE  FIRST PAGE ENDS HERE  FIRST PAGE ENDS HERE  FIRST PAGE ENDS HERE  FIRST PAGE ENDS HERE -->
  
<div id="SecondPage" >

    <!-- PARTICULARS -->
    <div id="AwardList" class="column" style="height:30px ;">
        <p style="margin-top:-1px;"></p>
        <h6 style="margin-top:-15px; text-align:left;">Particulars</h6>

    </div>
    <!-- Headers -->
    <div style="margin-bottom:0px; height:auto; padding: 0px;" class="columns">
        <div class="column2" style="height:auto;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-10px;"></p>
        </div>
        <div class="column2" style="height:auto;">
            <p style="margin-top:-1px;"></p>
            <h6 style="margin-top:-10px;">1st Area</h6>
        </div>
        <div class="column2" style="height:auto;">
            <p style="margin-top:-1px;"></p>
            <h6 style="margin-top:-10px;">2nd Area</h6>
        </div>
        <div class="column2" style="height:auto;">
            <p style="margin-top:-1px;"></p>
            <h6 style="margin-top:-10px;">3rd Area</h6>
        </div>

    </div>
    <!-- Contents -->

    {{-- Particulars --}}
    <!-- FARM ADDRESS -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Farm Address/Location:</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-FarmAddress" style="margin-top:-15px; text-align:center; "> </p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-FarmAddress2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-FarmAddress3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- SITIO/PUROK -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Sitio/Purok</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-purok" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-purok2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-purok3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- BARANGAY -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Barangay</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-brngy" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-brngy2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-brngy3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Geo-coordinates -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Geo-coordinates:</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-geographic_coordinates" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-geographic_coordinates2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-geographic_coordinates3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Title No. -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Title No.</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-title_no" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-title_no2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-title_no3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Declaration No. -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Declaration No.</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-tax_declarration_no" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-tax_declarration_no2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-tax_declarration_no3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Tenure Type -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Tenure Type:</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-tenure" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-tenure2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-tenure3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Existing Crop -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Existing Crop</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-existing_crop" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-existing_crop2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-existing_crop3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Previous Crop -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Previous Crop/s</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-previous_crop" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-previous_crop2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-previous_crop3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>

    <h6 style="margin-top:30px; text-align:left;">B.Topography</h6>
    <!-- Area(Hectares) -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Area(Hectares)</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-hectares" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-hectares2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-hectares3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Land Type -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Land Type</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-land_type" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-land_type2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-land_type3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Soil Type -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Soil Type</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-soil_type" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-soil_type2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-soil_type3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Water Source -->
    <div style="margin-top:0px; height:30px; padding: 0px;" class="columns">
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Water Source</p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-source" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-source2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:30px;">
            <p style="margin-top:-1px;"></p>
            <p id="view-source3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    <!-- Remarks -->
    <div style="margin-top:0px; margin-bottom: 20px; height:50px; padding: 0px;" class="columns">
        <div class="column2" style="height:50px;">
            <p style="margin-top:-1px;"></p>
            <p style="margin-top:-15px; text-align:left;">Remarks</p>
        </div>
        <div class="column2" style="height:50px;">
            <p style="margin-top:-1px;"></p>
            <p id="view_notes" style="margin-top:-15px; text-align:center; "></p>
        </div>
        <div class="column2" style="height:50px;">
            <p style="margin-top:-1px;"></p>
            <p id="view_notes2" style="margin-top:-15px; text-align:center;"></p>
        </div>
        <div class="column2" style="height:50px;">
            <p style="margin-top:-1px;"></p>
            <p id="view_notes3" style="margin-top:-15px; text-align:center;"></p>
        </div>
    </div>
    
    <p style="margin-top:30px; text-align:left;"><span style="font-weight: bold;">Note:</span> Please use another page if the area is more than 3 lots/areas.</p>
    <div style="margin-top:0px; margin-bottom: 20px; height:50px; padding: 0px;" class="columns">
    <div class="column2" style=" width:50px; height:50px;">
        <p style="margin-top:10px; text-align:left;">I certify to the correctness of the above stated information</p>
    </div>
    <div class="column2" style="height:50px;">
        <p id="hhm_ownerSig" style="margin-top:-1px; height:20px; text-align:center;"></p>
        <p style="margin-top:-15px; text-align:center; ">Name and Signature of Applicant</p>
    </div>
    </div>

    
    <div style="height:5px;"></div>
    <p style="padding-left:10px; margin-bottom:-5px; margin-top:-2px; text-align:center;">BARANGAY CERTIFICATION</p>
    <div style="margin-top:40px; height:30px; padding: 0px;" class="columns">
        <p style="text-indent: 100px; text-align:justify;">This certifies that _______<span id="hhm_owner" style="text-decoration:underline;"></span>______ whose signature appears above is a bonafide
            resident of barangay ______<span id="brgny_cert" style="text-decoration:underline;"></span>______, and is known of good moral character and reputation in the community with no derogatory record as per barangay records.
        </p>
    </div>
    <div style="height:120px;"></div>
        <p style="text-align:right;">Name and Signature of the Brgy. Captain</p>
    
        <div style="height:40px;"></div>
        <p style="padding-left:10px; margin-bottom:-5px; margin-top:-2px; text-align:center;">VALIDATION OF ENROLMENT AND ENTRY TO THE REGISTRY</p>
        
        <div style="margin-top:30px; height:90px; padding: 0px;" class="columns">
            <div class="column2" style="height:auto;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-15px; text-align:left;">Interviewed By:</p>
                <p style="margin-top:40px; text-align:left;">Date:</p>
            </div>
            <div class="column2" style="height:auto;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-15px; text-align:left;">Evaluated By (SBAT):</p>
                <p style="margin-top:40px; text-align:left;">Date:</p>
            </div>
            <div class="column2" style="height:auto;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-15px; text-align:left;">Reviewed By (Supervisor):</p>
                <p style="margin-top:40px; text-align:left;">Date:</p>
            </div>
            
            
        </div>
        <div style="margin-top:0px; margin-bottom: 20px; height:90px; padding: 0px;" class="columns">
            <div class="column2" style="height:auto;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-15px; text-align:left;">Encoded by:</p>
            </div>
            <div class="column2" style="height:auto;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-15px; text-align:left;">Date of Entry:</p>
            </div>
            <div class="column2" style="height:auto;">
                <p style="margin-top:-1px;"></p>
                <p style="margin-top:-15px; text-align:left;">Approved (Dept. Head):</p>
            </div>
            
        </div>  

</div>
  
</div>


</div>
</div>