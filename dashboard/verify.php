<?php
include_once('includes/header.php');
?>
<div class="row dashboard-landing">
  <div class="col-sm-2 dash-sidebar">
        <div class="logo-container">
            <img class="logo" src="./resources/imgs/icons/logo_white.png">
        </div>
        <div class="profile">
            <img src="./resources/imgs/icons/Profile.png">
        </div>
        <div class="dash-nav">
            <a href="#" class="active"><img src="./resources/imgs/icons/verify-tick.png"><strong>VERIFY</strong></a>
        </div>
  </div>
  <div class="col-sm-10 dash-content">
        <div class="dash-header">
            <div class="left-header">
                <img src="./resources/imgs/icons/notification.png">
                <img src="./resources/imgs/icons/message.png">
            </div>
            <div class="right-header">
                <a href="index.php">HOME</a>
                <a href="logout.php">LOG OUT</a>
                <img src="./resources/imgs/icons/burgermenu.png">
            </div>
        </div>
        <div class="dash-content-verify">
            <div class="container">
                <h1>VERIFY</h1>
                <hr class="content-divider">
                <p style="font-size: 16px;text-align: center;">Please select from the options below that you would like to verify:</p>
            <form action="result.php" method="post" novalidate>
            <div class="row select-check">
                    <div class="col-md-4">
                        <div class="login-field">
                        <label for="IDVcheck" class="cust-radio-btn"><input id="IDVcheck" type="checkbox" name="checktype" value="IDV"> IDV ( Identity Verification)
                        <span class="radio-check"></span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="login-field">
                        <label for="kycCheck" class="cust-radio-btn"><input id="kycCheck" type="checkbox" name="check" value="KYC"> Customer KYC / Address Verification
                        <span class="radio-check"></span></label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="login-field">                        
                        <label for="credScore" class="cust-radio-btn"><input id="credScore" type="checkbox" name="checktype" value="CRED"> Non CPA Credit Score
                        <span class="radio-check"></span></label>
                        </div>
                    </div>
                    </div>
            <div class="row select-check">
                    <div class="col-md-4">
                        <div class="login-field">
                        <label for="screening" class="cust-radio-btn"><input id="screening" type="checkbox" name="checktype" value="SCREEN"> Screening (Sanctions/Watchlists/Media)
                        <span class="radio-check"></span></label>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="login-field">
                        <input id="adv" type="checkbox" name="checktype" value="ADV">
                        <label for="adv">Adverse MEDIA </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="login-field">                        
                        <input id="other" type="checkbox" name="other">
                        <label for="other">OTHER </label>
                        </div>
                    </div> -->
            </div>

                <hr class="content-divider">

            <div class="idv-form" id="idv" style="display:none;">
            <p style="font-size: 16px;">Please provide us with the below information:</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Id.png" class="login-icon">
                        <input id="IDVIDNumber" type="text" name="idvidnumber" class="form-control" placeholder="ID Number" required >
                        </div>
                    </div>
                    <div class="col-md-6">  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="Reference" type="text" name="reference" class="form-control" placeholder="External Reference" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/world.png" class="login-icon">
                        <input id="CountryCode" type="text" name="countrycode" class="form-control" placeholder="CountryCode" value="ZAF" readonly>
                        </div>
                    </div>
                </div>      
            </div>

                <!-- End IDV Form -->

                <!-- KYC Form -->
            <div class="kyc-form" id="kyc" style="display:none;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/suburb.png" class="login-icon">
                        <input id="FullAddress" type="text" name="fulladdress" class="form-control" placeholder="Building Address" >
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/suburb.png" class="login-icon">
                        <input id="BuildingLine" type="text" name="buildingline" class="form-control" placeholder="Building/Complex Name" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/suburb.png" class="login-icon">
                        <input id="StreetLine" type="text" name="streetline" class="form-control" placeholder="Street No. &amp; Name" required >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/suburb.png" class="login-icon">
                        <input id="Suburb" type="text" name="suburb" class="form-control" placeholder="Suburb" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/province.png" class="login-icon">
                        <input id="Town" type="text" name="town" class="form-control" placeholder="Town" required >
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- End KYC Form -->

            <!-- Credit Check Form -->
            <div class="kyc-form" id="cpa" style="display:none;">
            <p style="font-size: 16px;">Please provide us with the below information:</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Id.png" class="login-icon">
                        <input id="CPAIDNumber" type="text" name="cpaidnumber" class="form-control" placeholder="ID Number" required >
                        </div>
                    </div>
                    <div class="col-md-6">  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="FirstName" type="text" name="firstname" class="form-control" placeholder="Name" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="Surname" type="text" name="surname" class="form-control" placeholder="Surname" required >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <select name="gender" class="form-control" required>
                        <option value="">Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/world.png" class="login-icon">
                        <input id="CountryCode" type="text" name="countrycode" class="form-control" placeholder="CountryCode" value="ZAF" readonly>
                        </div>
                    </div>
                </div>
          

                    <!-- Credit Enquirer Details -->
                  
                    <hr class="content-divider">
                <p style="font-size: 16px;">Please provide enquirer information below:</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/maile.png" class="login-icon">
                        <input id="EnquirerEmail" type="text" name="enquireremail" class="form-control" placeholder="Enquirer Email" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="EnquirerName" type="text" name="enquirername" class="form-control" placeholder="Enquirer Name" required >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/contactus.png" class="login-icon">
                        <input id="EnquirerContact" type="text" name="enquirercontact" class="form-control" placeholder="Enquirer Contact No." required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="ExternalReference" type="text" name="reference" class="form-control" placeholder="External Reference" >
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Credit CHeck Form -->

            <!-- Screening Check Form -->
            <div class="kyc-form" id="screen" style="display:none;">
            <p style="font-size: 16px;">Please provide us with the below information:</p>              
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="IDNumber" type="text" name="screenidnumber" class="form-control" placeholder="ID Number" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/world.png" class="login-icon">
                        <input id="CountryCode" type="text" name="screencountrycode" class="form-control" placeholder="CountryCode" value="ZAF" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="Term" type="text" name="term" class="form-control" placeholder="Name/Term" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="Refinement" type="text" name="refinement" class="form-control" placeholder="Refinement" >
                        </div> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/world.png" class="login-icon">
                        <select name="scope" class="form-control" required>
                        <option value="">Select Scope</option>
                        <option value="default">default</option>
                        <option value="narrow">narrow</option>
                        <option value="broad">broad</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/world.png" class="login-icon">
                        <select name="category" class="form-control" required>
                        <option value="">Screening Type</option>
                        <option value="PEP">PEP</option>
                        <option value="Watchlists">Watchlists</option>
                        <option value="Adverse Media">Adverse Media</option>
                        </select>
                        </div>
                    </div>
                </div>

                    <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="NotificationUrl" type="text" name="noturl" class="form-control" placeholder="URL" >
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    </div> -->

                     <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="StartDate" type="date" name="startdate" class="form-control" placeholder="Start Date" value="<?php echo date("m/j/Y"); ?>" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login-field">
                        <img src="resources/imgs/icons/Surname.png" class="login-icon">
                        <input id="EndDate" type="date" name="enddate" class="form-control" placeholder="End Date" value="<?php echo date("m/j/Y"); ?>">
                        </div>
                    </div>
                    </div> -->

                </div>
                <div class="row select-check">
                    <div class="col-md-12">
                        <div class="login-field" id="terms">
                        <label for="accept" class="cust-radio-btn"><input id="accept" type="checkbox">By checking the above box you consent to Truity accessing your information to perform a customer due diligence.
                        <span class="radio-check"></span></label>
                        </div>
                    </div>
                </div>   
                <div class="row">
                    <div class="col-md-6 form-footer">
                    <input class="btn btn-block" id="concent" type="submit" value="VERIFY">
                    </div>
                </div>
            <!-- End Screening Check Form -->
            </form>
            </div>
        </div>
    <div>
</div>
<script>
$(document).ready(function() {
//Preloader
$(window).on("load", function() {
preloaderFadeOutTime = 500;
function hidePreloader() {
var preloader = $('.spinner-wrapper');
preloader.fadeOut(preloaderFadeOutTime);
}
hidePreloader();
});
});
</script>
</body>
</html>