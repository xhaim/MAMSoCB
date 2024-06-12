
    <style>
        #body{
            padding: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }
        @media screen and (max-width: 1000px) {
            #body {
                zoom: 60%; /* Set the scale to 80% for widths less than or equal to 1000px */
            }
        }
        @media print {
           #body {
                zoom: 90%; /* Set the scale for printing to 50% */
            }
        }
        #top-fisheries {
            display: flex;
        }

        #top-fisheries > div {
            flex: 1;
        }

        #top-fisheries img {
            width: 90px;
            height: 90px;
        }

        #body-fisheries,
        #body-fisheries > div {
            max-width: 100%;
            box-sizing: border-box;
        }
        .fontsizer{
            font-size: 20px;
        }
    </style>

<div id="body">

    <!-- TOP OF FISHERIES -->
    <div id="top-fisheries">

        <div style="display: flex;">
            <div style="flex: 1; padding: 0px;">

            <div style="flex: 1;  text-align: right;">
                <!-- Content for the first div -->
                <img src="https://th.bing.com/th/id/R.2dafb4867d001762b32fee09536cef12?rik=R9QkPrxhMXRi0A&riu=http%3a%2f%2f
                www.pcaf.da.gov.ph%2fwp-content%2fuploads%2f2020%2f07%2fNew-logo-DA-PCAF_hi-res_10Feb2020-277x277.png&ehk=A
                JzAqv%2fvHjF%2fb48lhgQHjMcjPRgvXI0DavAYFmWM%2fhE%3d&risl=&pid=ImgRaw&r=0" alt="PCAF Logo" style="width: 90px; height: 90px;">
            </div>

            <div style="flex: 1;  text-align: center  ;">
                <!-- Content for the first div -->
                <h3 style="font-family:Arial, Helvetica, sans-serif;">APPLICATION FOR MUNICIPAL FISHERFOLK REGISTRATION</h3>
            </div>

            <div style="border: black solid 2px; padding-bottom:25px;">

                <div style="display: flex; height: 40px; padding-left: 10px;">
                    <div style="flex: 1; ">
                        <!-- Content for the first div -->
                        <p style="margin-top: 15px;">Registration No.: <span class="fontsizer" id="view_registration_no"></span></p>
                    </div>
                    <div style=" display:flex;  width: auto; align-items: center; padding-right: 10px; margin-top:20px;">
                        <!-- Content for the second div -->
                        <div id="newregis_cont" style="color:white; margin-top:-10px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="new_registration" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                        <label for="myCheckbox">New Registration</label>
                    </div>
                </div>
                <div style="display: flex; height: 40px; padding-left: 10px;">
                    <div style="flex: 1; ">
                        <!-- Content for the first div -->
                        <p style="margin-top: 15px;">Registration Date: <span class="fontsizer" id="view_registration_date"></span></p>
                    </div>
                    <div style=" display:flex; width: auto; align-items: center; padding-right: 10px;">
                        <!-- Content for the second div -->
                        <div id="renewal_cont" style="color:white; margin-top:-10px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="renewal" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                        <label for="myCheckbox">Renewal</label>
                    </div>
                </div>           
            
            </div>

            </div>

            <div style="  width: 250px; padding: 10px 0 10px 10px;">
                <!-- Photo Container -->
                <div style="  width: auto; height: 100%; text-align: center; padding-right: 10px; border: black solid 2px;">
                    <!-- Photo -->

                    <img src="https://woodfibreinsulation.co.uk/wp-content/uploads/2017/04/blank-profile-picture-973460-1-1-1080x1080.png" alt="User Photo" style="height: 100%; width: 100%;">
                        
                    <div style="margin-top: 60px; position:absolute; top: 0px; right: 15px;" >

                        
                            <h3>Attach Photo Here</h3>
                            <p style="margin-top: -10px;">1.5"X1.5"</p>
                            <p style="margin-top: -10px;">Photo should be taken</p>
                            <p style="margin-top: -10px;">within the last six (6)</p>
                            <p style="margin-top: -10px;">months</p>
                        
                        
                    </div>
                    
                </div>

            </div>



        </div>
        

    </div>
    <!-- END OF TOP OF FISHERIES -->

     <!-- BODY OF FISHERIES -->
    <div id="body-fisheries" style="border: black solid 2px; margin-top: 5px;">

        <div style="background-color: #008631; padding-left: 5px; color: white; font-weight: bold;  height: auto;">
            <!-- Personal Informtion -->
            <p>1. PERSONAL INFORMATION</p>
        </div>

        <div id="content1" style="padding: 0px 5px 0px 5px;">
            <div style="">
                <!-- Area Name -->
                <p>Complete Name:</p>
            </div>
            <div style=" display:flex; margin-top: -10px;">
                <!-- Mr,Ms,Mrs -->
                <div id="mister_cont" style="color:white; margin-top:5px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="mister" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                <label for="myCheckbox">Mr</label>
                <div id="miss_cont" style="color:white; margin-top:5px; margin-left:2px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="miss" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                <label for="myCheckbox">Ms</label>
                <div id="missis_cont" style="color:white; margin-top:5px; margin-left:2px; margin-right:2px; width:15px; height:15px; border:black solid 1px;"><h5  id="missis" style="margin-top:-5px;" hidden="hidden">✓</h5></div>
                <label for="myCheckbox">Mrs</label>
            </div>
            <div style=" margin-top: 5px; display: flex; font-size: 15px; text-align: center;" >
                <!-- Name-->
                <div style="flex: 1;  border-bottom: black solid 2px;"><p class="fontsizer" id="view_salutation">Salutation</p></div>
                <div style="flex: 1;  border-bottom: black solid 2px;"><p class="fontsizer" id="view_last_name">Last Name</p></div>
                <div style="flex: 1;  border-bottom: black solid 2px;"><p class="fontsizer" id="view_first_name">First Name</p></div>
                <div style="flex: 1;  border-bottom: black solid 2px;"><p class="fontsizer" id="view_middle_name">Middle Name</p></div>
                <div style="flex: 1;  border-bottom: black solid 2px;"><p class="fontsizer" id="view_appellation">Appellation(Sr.Jr.III)</p></div>
            </div>
            <div>
                <div style="">
                    <!-- Area Name -->
                    <p>Address:</p>
                </div>
                <div style=" margin-top: -10px; display: flex; font-size: 15px; text-align: center;" >
                    <!-- Address-->
                    
                    <div style="flex: 1;  border-bottom: black solid 2px;"><p class="fontsizer" id="view_barangay">Street/Barangay/Sitio</p></div>
                    <div style="flex: 1;  border-bottom: black solid 2px;"><p class="fontsizer" id="city">Carmen</p></div>
                    <div style="flex: 1;  border-bottom: black solid 2px;"><p class="fontsizer" id="province">Bohol</p></div>
                    <div style="flex: 1;  border-bottom: black solid 2px;"></div>
                    <div style="flex: 1;  border-bottom: black solid 2px;"></div>
                </div>
            </div>
            <div style="display: flex;">
                <div style="flex: 1;  border-right: black solid 2px; border-left: black solid 2px; padding-left: 5px;">
                    <!-- Contact No -->
                    <p style="margin-top: 3px;">Contact No.<span style="font-size: 10px;">(Cell Phone/Telephone)</span></p>
                    
                    <p class="fontsizer" id="view_contact_no"  style="padding: 2px; font-size:20px; min-width: 100px; text-align: center;">2000</p>
                </div>
                <div style="flex: 1;  border-right: black solid 2px; padding-left: 5px;" >
                    <!-- Address -->
                    <p style="margin-top: 3px;">Resident of the Municipality since:</p>
                    <p style="margin-top: -10px; font-size: 12px;">(Indicate the year)</p>
                    <p class="fontsizer" id="view_resident" style="padding: 2px; font-size:20px; border: black solid 2px; min-width: 100px; text-align: center;">2000</p>
                </div>
            </div>
            <div style="display: flex;" >
                <div style="  border-top: black solid 2px; border-right: black solid 2px; border-left: black solid 2px; width: 100px; padding-left: 5px;">
                    <!-- Age -->
                    <p style="margin-top: 3px;">Age: <span class="fontsizer" id="view_age" style="font-size: 20px;">00</span></p>
                </div>
                <div style="  border-top: black solid 2px; border-right: black solid 2px; width: 615px; max-width: 615px; padding-left: 5px;">
                    <!-- DOB -->
                    <p style="margin-top: 3px;">Date of Birth: <span class="fontsizer" id="view_date_of_birth" style="font-size: 20px;">00-00-0000</span></p>
                </div>
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; padding-left: 5px;">
                    <!-- birthplace -->
                    <p style="margin-top: 3px;">Place of Birth: <span class="fontsizer" id="view_place_of_birth" style="font-size: 20px;">Tagbilaran City</span></p>
                </div>
            </div>
            <div style="display: flex;" >
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; border-left: black solid 2px; width: 100px; padding-left: 5px;">
                    <!-- Gender -->
                    <p style="margin-top: 3px;">Gender: <span class="fontsizer" id="view_gender" style="font-size: 20px;">Male/Female</span></p>
                </div>
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; padding-left: 5px;">
                    <!-- Civil Stats -->
                    <p style="margin-top: 3px;">Civil Status: <span class="fontsizer" id="view_civil_status" style="font-size: 20px;">Single/Married/Widowed/Legally Separated</span></p>
                </div>
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; padding-left: 5px;">
                    <!-- No. of Children -->
                    <p style="margin-top: 3px;">No. of Children: <span class="fontsizer" id="view_no_of_children" style="font-size: 20px;">500</span></p>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 400px;  border-right: black solid 2px; border-left: black solid 2px; padding-left: 5px; border-top: black solid 2px;">
                    <!-- Nationality -->
                    <p style="margin-top: 3px;">Nationality: <span class="fontsizer" id="view_nationality" style="font-size: 20px;">Bisakol</span></p>
                </div>
                <div style="flex: 1;  border-right: black solid 2px; padding-left: 5px; border-top: black solid 2px;" >
                    <!-- Educ BG -->
                    <p style="margin-top: 3px;">Educational Background: <span class="fontsizer" id="view_education" style="font-size: 20px;">Bisakol</span></p>
                </div>
            </div>
            <div style="display: flex;">
                <div style="width: 400px;  border-right: black solid 2px; border-left: black solid 2px; padding-left: 5px; border-top: black solid 2px;">
                    <!-- Contact incase of Emergency -->
                    <p style="margin-top: 3px;">Person to notify in case of emergency:</p>
                    <p class="fontsizer" id="view_person_to_notify" style="font-size: 20px;">Juan Dela Cruz</p>
                </div>
                <div style="flex: 1;  border-right: black solid 2px; border-top: black solid 2px;" >
                    <div style="display: flex;">
                        <div style="width: 250px;  border-right: black solid 2px; padding-left: 5px; ">
                            <!-- Contact Relationship -->
                            <p style="margin-top: 3px;">Relationship: <span class="fontsizer" id="view_ptn_relationship" style="font-size: 20px;">Brother</span></p>
                        </div>
                        <div style="flex: 1;  padding-left: 5px; " >
                            <!-- Contact Contact No. -->
                            <p style="margin-top: 3px;">Contact No.: <span class="fontsizer" id="view_ptn_contact" style="font-size: 20px;">012345678910</span></p>
                        </div>
                    </div>
                    <div style="flex: 1;  padding-left: 5px; border-top: black solid 2px;" >
                        <!-- Contact Address -->
                        <p style="margin-top: 3px;">Address: <span class="fontsizer" id="view_ptn_address" style="font-size: 20px;">Bohol,Philippines</span></p>
                    </div>
                </div>
            </div>
            <div style="flex:1;  border-right: black solid 2px; border-left: black solid 2px; padding-left: 5px; padding-bottom: 2px; border-top: black solid 2px;">
                <!-- Religion -->
                <p style="margin-top: 3px;">Religion: <span class="fontsizer" id="view_religion" style="font-size: 20px;">Religion</span></p>
                
            </div>

        </div>

        <!-- START OF LIVELIHOOD -->

        <div style="background-color: #008631; padding-left: 5px; color: white; font-weight: bold; margin-top: -16px; height: auto;">
            <!-- Livelihood -->
            <p>2. LIVELIHOOD</p>
        </div>

        <div id="livelihood" style="padding: 0px 5px 0px 5px;">
            <div style="display: flex; margin-top: -16px;">
                <div style="flex: 1;  border-right: black solid 2px; border-left: black solid 2px; padding-left: 5px;">
                    <!-- Main Source of Income -->
                    <p style="margin-top: 3px;">Main Source of Income:</p>
                    <p class="fontsizer" id="view_incomeSource" style="font-size: 20px;">State it please</p>
                </div>
                <div style="flex: 1;  border-right: black solid 2px; padding-left: 5px;" >
                    <!-- Other Source of Income -->
                    <p style="margin-top: 3px;">Other Source of Income:</p>
                    <p class="fontsizer" id="view_OtherincomeSource" style="font-size: 20px;">State it please</p></div>
                </div>
        </div>
        
        <!-- END OF LIVELIHOOD -->

        <!-- START OF Organization -->

        <div style="background-color: #008631; padding-left: 5px; color: white; font-weight: bold; margin-top: 0px; height: auto;">
            <!-- Organization -->
            <p>3. ORGANIZATION</p>
        </div>

        <div id="organization" style="padding: 0px 5px 0px 5px; margin-top: -17px;">

            <div id="OrgHeader" style="display: flex;" >
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; border-left: black solid 2px; width: 100px; padding-left: 5px;">
                    <!-- Gender -->
                    <p style="margin-top: 3px;">Name of Organization</p>
                </div>
                <div style="width: 200px;  border-top: black solid 2px; border-right: black solid 2px; padding-left: 5px;">
                    <!-- Civil Stats -->
                    <p style="margin-top: 3px;">Member Since</p>
                </div>
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; padding-left: 5px;">
                    <!-- No. of Children -->
                    <p style="margin-top: 3px;">Position/Official Designation</p>
                </div>
            </div>

            <div id="Org1" style="display: flex; text-align: center;" >
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; border-left: black solid 2px; width: 100px; padding-left: 5px;">
                    <!-- Gender -->
                    <p class="fontsizer" id="view_membership" style="margin-top: 3px;"></p>
                </div>
                <div style="width: 200px;  border-top: black solid 2px; border-right: black solid 2px; padding-left: 5px;">
                    <!-- Civil Stats -->
                    <p class="fontsizer" id="view_membership_since" style="margin-top: 3px;"></p>
                </div>
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; padding-left: 5px;">
                    <!-- No. of Children -->
                    <p class="fontsizer" id="view_position" style="margin-top: 3px;"></p>
                </div>
            </div>
            

        </div>
        
        <!-- END OF Organization -->

        <!-- START OF Certification -->

        <div style="display: flex;">

            <div style="flex: 1;">
                <div style=" flex:1; background-color: #008631; padding-left: 5px; color: white; font-weight: bold; margin-top: -16px; height: auto;">
                    <!-- Certification -->
                    <p>4. CERTIFICATION</p>
                </div>
        
                <div id="certification" style=" display: flex;  padding: 0px 0px 0px 5px; margin-top: -17px;">
                    <div style="flex: 1;  height: 100%; border-top: black solid 2px; border-left: black solid 2px; width: 100px; padding: 10px 10px 13px 10px;">
                        <div style="flex: 1;  height: 150px; padding: 10px 10px 10px 10px;">
                            <p style="text-indent: 30px;"> I have personally reviewed the information on this application and I certify under penalty of
                                perjury that to the best of my knowledge and belief the information on this application is true
                                and correct, and that I understand this information is subject to public disclosure.
                            </p>

                            <div style="display: flex; text-align: center; margin-top: 0px; padding-bottom: -10px;">
                                <div style="flex: 1;  ">
                                    <p style="text-decoration: underline;">____________<span class="fontsizer" id="view_applicant_name"></span>____________</p>
                                    <p style="margin-top: -10px;">(Signature over printed name of Applicant)</p>
                                </div>
                                <div style="flex: 1;  " >
                                    <p style="text-decoration: underline;">_________<span class="fontsizer" id="date_accomplished"></span>________</p>
                                    <p style="margin-top: -10px;">Date Accomplished</p>
                                </div>
                            </div>
                        </div> 
                    </div>       
                </div>
            </div>

            <div style="width: 200px;">
                <div style=" flex:1; background-color: #008631;  border-left: black solid 2px; padding-left: 5px; color: white; font-weight: bold; margin-top: -16px; height: auto;">
                    <!-- Thumbmark -->
                    <p>THUMBMARK</p>
                </div>
        
                <div id="thumbmark" style="  display: flex; padding: 0px 5px 0px 0px; margin-top: -17px;">
                    <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; border-left: black solid 2px; padding: 10px 10px 10px 10px;">
                        <!-- Thumbmark -->
                        <div style="flex: 1;  border: black solid 2px; height: 150px; padding: 10px 10px 10px 10px;">
                        
                            
                        </div> 
                    </div> 
                </div>
            </div>

        </div>
        
        
        <!-- END OF Certification -->

        <!-- START OF Auth -->

        <div style="background-color: #008631; padding-left: 5px; color: white; font-weight: bold; height: auto;">
            <!-- Organization -->
            <p>5. FOR AUTHORIZED PERSONNEL ONLY</p>
        </div>

        <div id="organization" style="padding: 0px 5px 0px 5px; margin-top: -17px; height: 200px;">

            <div id="OrgHeader" style="display: flex; height: 100%;" >
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; border-left: black solid 2px; width: 100px; padding-left: 5px;">
                    <!-- Reviewed By -->
                    <p style="margin-top: 3px;">Reviewed by:</p>
                        <div style="flex: 1;  text-align: center; margin-top: 50px;">
                            <p style="text-decoration: underline;">______________<span id="rb_name"></span>______________</p>
                            <br>
                            <p style="margin-top: -5px;">(Signature over printed name)</p>
                        </div>
                </div>
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; padding-left: 5px;">
                    <!-- Civil Stats -->
                    <p style="margin-top: 3px;">Certified by:</p>
                        <div style="flex: 1;  text-align: center; margin-top: 50px;">
                            <p style="text-decoration: underline;">______________<span id="cb_name"></span>______________</p>
                            <br>
                            <p style="margin-top: -5px;">(Signature over printed name)</p>
                        </div>
                </div>
                <div style="flex: 1;  border-top: black solid 2px; border-right: black solid 2px; padding-left: 5px;">
                    <!-- No. of Children -->
                    <p style="margin-top: 3px;">Approved by:    </p>
                    <div style="flex: 1;  text-align: center; margin-top: 50px;">
                        <p style="text-decoration: underline;">______________<span id="ab_name"></span>______________</p>
                        <p style="margin-top: -10px;">Municipality Mayor</p>
                        <p style="margin-top: -10px;">(Signature over printed name)</p>
                    </div>
                </div>
            </div>            

        </div>
        
        <!-- END OF Auth -->

    </div>
     <!-- END OF BODY OF FISHERIES -->
    
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

</div>