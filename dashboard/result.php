<?php
include_once('includes/header.php');
     include('checks/idv.php');// IDV Curl
     include('checks/kyc.php');// KYC Curl
     include('checks/credit.php'); //Credit Curl
     include('checks/screen.php'); //Screen Curl
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
            <a href="verify.php" class="active"><img src="./resources/imgs/icons/verify-tick.png"><strong>VERIFY</strong></a>
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
        <div class="row result-header">
                    <div class="col-sm-2" style="border-right: 1px solid #696969;padding: 20px 0;">
                    <img src="./resources/imgs/result/idv-colour.png">
                    </div>
                    <div class="col-sm-2" style="border-right: 1px solid #696969;padding: 20px 0;">
                    <img src="./resources/imgs/result/credit-check-clour.png">
                    </div>
                    <div class="col-sm-2" style="border-right: 1px solid #696969;padding: 20px 0;">
                    <img src="./resources/imgs/result/screening.png">
                    </div>
                    <div class="col-sm-2" style="border-right: 1px solid #696969;padding: 20px 0;">
                    <img src="./resources/imgs/result/KYC-colour.png">
                    </div>
                    <div class="col-sm-2" style="border-right: 1px solid #696969;padding: 20px 0;">
                    <img src="./resources/imgs/result/adverse-media-colour.png">
                    </div>
                    <div class="col-sm-2" style="padding: 20px 0;">
                    <img src="./resources/imgs/result/other.png">
                    </div>
                </div>
            <div class="container">
            
            <!-- IDV Check Result -->
            <?php 
                if($_POST['checktype'] =='IDV') : ?>
                <div class="container">
                <div class="verified-name">
                <h1><?php echo $Name; ?> <?php echo $CheckSurname; ?></h1>
            </div>
                <span class="report-pending"><?php if($idvresults['Status'] == 'Pending') {
                            // return $this->curl($results,$recursive_attempt);
                         // Testing if I get a result back
                         echo $idvreport[State][Request][2];
                        } 
                    ?></span>
            </div>
            <div class="row details">
            
                <h1 class="idv-report">Identity Verification Check</h1>
                <!-- First Section -->
                <div class="col-sm-6">
                    <ul class="">
                    <li><strong>SessionID: </strong><?php echo $usersession; ?></li>
                    <li><strong>TrackingID: </strong><?php echo $idvtracking; ?></li>
                    <li><strong>Result Date: </strong><?php echo $ResultDate; ?>
                    <li><strong>Gender: </strong><?php echo $CheckGender; ?></li>
                    <li><strong>ID Number: </strong><?php echo $CheckIDNumber; ?></li>
                    <li><strong>Title: </strong><?php echo $Title; ?></li>
                    <li><strong>Name(s): </strong><?php echo $Name; ?></li> 
                    <li><strong>Surname: </strong><?php echo $CheckSurname; ?></li>
                    <li><strong>Birth Date: </strong><?php echo $Birthdate; ?></li> 
                    </ul>
                </div>
                    <!-- Second Section -->
                    <div class="col-sm-6">
                    <ul class=""><li><strong>ID Number Status: </strong><?php echo $LivingStatus; ?></li>
                    </ul>
                </div>
                
            <!--<div class="row footer-links">-->
            <!--    <div class="col-sm-6">-->
            <!--        <a href="reports/IDV-report.pdf" class="footer-dl" target="_blank" download><img src="./resources/imgs/icons/download-file.png"> | Download IDV Report Document</a>-->
            <!--    </div>-->
            <!--    <div class="col-sm-6">-->
            <!--        <a href="reports/IDV-report.pdf" class="footer-dl-right" target="_blank"><img src="./resources/imgs/icons/printer-icon.png"> | Download IDV Report Document</a>-->
            <!--    </div>-->
            <!--</div>-->
            </div>
            
                    <?php endif; ?>
            <!-- End IDV Check Result --> 

            <!-- KYC Check Result -->
             <?php 
                if($_POST['check'] =='KYC') : ?>
                <div class="containter">
                <div class="verified-name">
                <h1><?php echo $ResultIDNumber; ?></h1>
                </div>
                    <span class="report-pending"><?php if($results['Status'] == 'Pending') {
                            // return $this->curl($results,$recursive_attempt);
                         // Testing if I get a result back
                         echo $report[State][Request][2];
                        } 
                    ?></span>
                </div>
            <div class="row details">

                <h1 class="report-type">Customer KYC/Address Verification</h1>
                <!-- First Section -->
                <div class="col-sm-12">
                    <ul>
                    <li><strong>SessionID: </strong><?php echo $usersession; ?></li>
                    <li><strong>TrackingID: </strong><?php echo $tracking; ?></li>
                    <li><strong>Country Code: </strong><?php echo $ResultCountryCode; ?></li>
                    <li><strong>Full Address: </strong><?php echo $ResultFullAddress; ?></li>
                    <li><strong>ID Number: </strong><?php echo $ResultIDNumber; ?></li>
                    <li><strong>Average Score: </strong><?php echo $ResultAverageScore; ?></li>
                    <li><strong>Maximum Score: </strong><?php echo $ResultMaximumScore; ?></li>
                    <li><strong>Average Above Zero: </strong><?php echo $ResultAverageScoreNoZero; ?></li>
                    <li><strong>KYC Status: </strong><?php echo $ResultKYCStatus; ?></li>
                    </ul>
                <!-- <div class="kyc-results">
                
                    <h4>KYC Enquiry Sources: #1</h4>
                    <ul>
                    <li><strong>KYC Source: </strong><?php echo $ResultKYCSource; ?></li>
                    <li><strong>Average Score: </strong><?php echo $ResultKYCAverageScore; ?></li>
                    <li><strong>Maximum Score: </strong><?php echo $ResultKYCMaximumScore; ?></li>
                    <li><strong>Average Above Zero: </strong><?php echo $ResultKYCAverageScoreNoZero; ?></li>
                    </ul>

                    <h4>KYC Enquiry Sources: #2</h4>
                    <ul>
                    <li><strong>KYC Source: </strong><?php echo $ResultKYCEnqSource; ?></li>
                    <li><strong>Average Score: </strong><?php echo $ResultKYCEnqAverageScore; ?></li>
                    <li><strong>Maximum Score: </strong><?php echo $ResultKYCEnqMaximumScore; ?></li>
                    <li><strong>Average Above Zero: </strong><?php echo $ResultKYCEnqAverageScoreNoZero; ?></li>
                    </ul>

                    <h4>KYC Enquiry Sources: #3</h4>
                    <ul>
                    <li><strong>KYC Source: </strong><?php echo $ResultKYCResKYCSource; ?></li>
                    <li><strong>Average Score: </strong><?php echo $ResultKYCResAverageScore; ?></li>
                    <li><strong>Maximum Score: </strong><?php echo $ResultKYCResMaximumScore; ?></li>
                    <li><strong>Average Above Zero: </strong><?php echo $ResultKYCResAverageScoreNoZero; ?></li>
                    </ul>
                </div> -->
            </div>
            </div>
            </div>
            <!-- <div class="row footer-links">
                <div class="col-sm-6">
                    <a href="reports/KYC-Report.pdf" class="footer-dl" target="_blank" download><img src="./resources/imgs/icons/download-file.png"> | Download KYC Report Document</a>
                </div>
                <div class="col-sm-6">
                    <a href="reports/KYC-Report.pdf" class="footer-dl-right" target="_blank"><img src="./resources/imgs/icons/printer-icon.png"> | Download KYC Report Document</a>
                </div>
            </div> -->
                    <?php endif; ?>

            <!-- End KYC Check Result -->

            <!-- Credit Check Result -->
            <?php 
                if($_POST['checktype'] =='CRED'){ ?>
                <div class="containter">
                        <div class="verified-name">
                        <h1><?php echo $Name; ?> <?php echo $CheckSurname; ?></h1>
                        </div>
                        <span class="report-pending"><?php if($results['Status'] == 'Pending') {
                                // return $this->curl($results,$recursive_attempt);
                            // Testing if I get a result back
                            echo $report[State][Request][2];
                            } 
                        ?></span>
                </div>
            <div class="row details">
                
                <h1 class="report-type">Credit Check Non-CPA Report</h1>
                <!-- First Section -->
                <div class="col-sm-6">
                <ul class="">
                <li><strong>SessionID: </strong><?php echo $usersession; ?></li>
                <li><strong>TrackingID: </strong><?php echo $tracking; ?></li>
                <li><strong>Result Date: </strong><?php echo $ResultDate; ?></li>
                <li><strong>Reference Number: </strong><?php echo $RefNumber; ?></li>
                <li><strong>Gender: </strong><?php echo $CheckGender; ?></li>
                <li><strong>ID Number: </strong><?php echo $CheckIDNumber; ?></li>
                <li><strong>Title: </strong><?php echo $Title; ?></li>
                <li><strong>Name(s): </strong><?php echo $Name; ?></li>
                <li><strong>Surname: </strong><?php echo $CheckSurname; ?></li>
                <li><strong>Birth Date: </strong><?php echo $Birthdate; ?></li>
                </ul>
                </div>

                <!-- Second Section -->
                <div class="col-sm-6">
                <ul class="">
                <li><strong>Marital Status: </strong><?php echo $MaritalStatus; ?></li>
                <li><strong>Physical Address: </strong><?php echo $PhysicalAddress; ?></li>
                <li><strong>Postal Address: </strong><?php echo $PostalAddress; ?></li>
                <li><strong>Home Phone Number: </strong><?php echo $HomePhoneNumber; ?></li>
                <li><strong>Work Phone Number: </strong><?php echo $WorkPhoneNumber; ?></li>
                <li><strong>Mobile Phone Number: </strong><?php echo $MobileNumber; ?></li>
                <li><strong>ITC Status: </strong><?php echo $ITCStatus; ?></li>
                </ul>
                </div>
            </div>
            <!-- <div class="row footer-links">
                <div class="col-sm-6">
                    <a href="reports/Credit-report.pdf" class="footer-dl" target="_blank" download><img src="./resources/imgs/icons/download-file.png"> | Download Credit Report Document</a>
                    </div>
                <div class="col-sm-6">
                    <a href="reports/Credit-report.pdf" class="footer-dl-right" target="_blank"><img src="./resources/imgs/icons/printer-icon.png"> | Download Credit Report Document</a>
                    </div>
            </div> -->
            <?php } ?>
            <!-- End Credit Check Result -->

            <!-- KYC Check Result -->
            <?php 
                if($_POST['checktype'] =='SCREEN'){ ?>
                <div class="containter">
                
                    <span class="report-pending"><?php if($results['Status'] == 'Pending') {
                            // return $this->curl($results,$recursive_attempt);
                         // Testing if I get a result back
                         echo $report[State][Request][2];
                        } 
                    ?></span>
                </div>
            <div class="row details">

                <h1 class="report-type">Customer Screening</h1>
                <!-- First Section -->
                <div class="container">
                    <h4 style="text-align: center;font-size: 22px;font-weight: 300;">
                <?php if($report['Check']['ResultStatus'] == 'NotFound') {
                                // return $this->curl($results,$recursive_attempt);
                            // Testing if I get a result back
                            echo "No results were found with your search.";
                            } 
                    ?>
                    </h4>
                
                    </div>
                <div class="col-sm-12">
                <ul>
                <li><strong>SessionID: </strong><?php echo $usersession; ?></li>
                <li><strong>TrackingID: </strong><?php echo $tracking; ?></li>
                </ul>
                <?php if($report['DataFields'][1]['Name'] == 'Adverse Media: #0') : ?>
                <table class="table-striped">
                <thead>
                    <tr>
                        <th>Relevance</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Snippet</th>
                        <th>URL</th>
                    </tr>
                    </thead>
                <?php for($i = 0 ; $i < count($report['DataFields']); $i++) {
                    echo "<tr><td>".$report['DataFields'][$i]['ComplexValue'][0]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][1]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][2]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][3]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][4]['Value']."</td></tr>";
                } ?>
                 </table>

                 <?php endif; ?>

                <?php if($report['DataFields'][1]['Name'] == 'PEP: #0') : ?>
                <table class="table-striped">
                <thead>
                    <tr><th>Matched Entry</th>
                        <th>Master Entry</th>
                        <th>List Name</th>
                        <th>Score</th>
                        <th>Matched Entry Type</th>
                        <th>Master Entry Type</th>
                    </tr>
                    </thead>
                <?php for($i = 0 ; $i < count($report['DataFields']); $i++) {
                    echo "<tr><td>".$report['DataFields'][$i]['ComplexValue'][0]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][1]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][2]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][3]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][4]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][5]['Value']."</td>
                    <td>".$report['DataFields'][$i]['ComplexValue'][6]['Value']."</td> 
                  </tr>";
                } ?>
                </table>

                <table class="table-striped">
                <thead>
                        <?php
                        echo "<tr><th>".$report['DataFields'][1]['ChildrenValues'][0]['DisplayName']."</th>
                        <th>".$report['DataFields'][1]['ChildrenValues'][1]['DisplayName']."</th>
                        <th>".$report['DataFields'][1]['ChildrenValues'][2]['DisplayName']."</th>
                        <th>".$report['DataFields'][1]['ChildrenValues'][3]['DisplayName']."</th>   
                        <th>".$report['DataFields'][1]['ChildrenValues'][7]['DisplayName']."</th>
                        <th>".$report['DataFields'][1]['ChildrenValues'][5]['DisplayName']."</th>
                        <th>".$report['DataFields'][1]['ChildrenValues'][6]['DisplayName']."</th>
                        <th>".$report['DataFields'][1]['ChildrenValues'][4]['DisplayName']."</th>
                        <th>".$report['DataFields'][1]['ChildrenValues'][8]['DisplayName']."</th></tr>";
                        ?>
                    </thead>
                
                <?php //for($i = 0 ; $i < 1; $i++) 
                
                    echo "<tr><td>".$report['DataFields'][1]['ChildrenValues'][0]['Value']."</td>
                            <td>".$report['DataFields'][1]['ChildrenValues'][1]['Value']."</td>
                            <td>".$report['DataFields'][1]['ChildrenValues'][2]['Value']."</td>
                            <td>".$report['DataFields'][1]['ChildrenValues'][3]['Value']."</td>   
                            <td>".$report['DataFields'][1]['ChildrenValues'][7]['Value']."</td>
                            <td>".$report['DataFields'][1]['ChildrenValues'][5]['Value']."</td>
                            <td>".$report['DataFields'][1]['ChildrenValues'][6]['Value']."</td>
                            <td>".$report['DataFields'][1]['ChildrenValues'][4]['Value']."</td>
                            <td>".$report['DataFields'][1]['ChildrenValues'][8]['Value']."</td></tr>";
                    
                ?>
                </table>
               
            <?php endif; ?>

            
                    <!-- <ul>
                    <li><strong>Country Code: </strong><?php echo $ResultCountryCode; ?></li>
                    <li><strong>Full Address: </strong><?php echo $ResultFullAddress; ?></li>
                    <li><strong>ID Number: </strong><?php echo $ResultIDNumber; ?></li>
                    <li><strong>Average Score: </strong><?php echo $ResultAverageScore; ?></li>
                    <li><strong>Maximum Score: </strong><?php echo $ResultMaximumScore; ?></li>
                    <li><strong>Average Above Zero: </strong><?php echo $ResultAverageScoreNoZero; ?></li>
                    <li><strong>KYC Status: </strong><?php echo $ResultKYCStatus; ?></li>
                    </ul> -->
                
                 </div>
            </div>
            </div>
            
            <?php } ?>

            <!-- End Screening -->
            </div>
        </div>
    <div>
</div>
</body>
</html>