<!-- IDV Check -->
<!-- <?php 
// if(isset($_POST['IDNumber'])){
    $idnumber = '8601286129082';
    $countrycode  = 'ZAF';
    $reference = 'bytes';
    $idname = 'IDNumber';
    $country = 'CountryCode';
    $data = array('Parameters' => array(['Name' => $idname,'Value' => $idnumber],['Name' => $country, 'Value' => $countrycode]),'ExternalReference' => $reference); // data u want to post                                                                   
    $data_string = json_encode($data);                                                                                   
                                                                                          
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/IDV?sessionid={$usersession}");    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, true);                                                                   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
    // curl_setopt($ch, CURLOPT_USERPWD, $password);                                                                
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             

if(curl_exec($ch) === false){
    echo 'Curl error: ' . curl_error($ch);
    }                                                                                                      
    $errors = curl_error($ch);                                                                                                            
    $result = curl_exec($ch);
    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);  
    echo $returnCode;
    var_dump($errors);
    $results = json_decode($result, true);
     print_r(json_decode($result, true)); // Testing if I get a result back
    // $usersession = $results[SessionID];
    // }
    $tracking = $results[TrackingID];
    // header('Location:../dashboard/idv.php');

    // Go to sleep and wait for data to be ready 
    sleep(3);

// if(isset($_POST['IDNumber'])){
    // $idnumber = '8601286129082';
    // $countrycode  = 'ZAF';
    // $reference = 'bytes';
    // $idname = 'IDNumber';
    // $country = 'CountryCode';
    $ResultType = 'Both';
    $getresult = array('ResultType' => $ResultType);
    $getresult_string = json_encode($getresult);                                                                                  
                                                                                          
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/{$tracking}?sessionid={$usersession}");    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POST, true);                                                                   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $getresult_string);  
    // curl_setopt($ch, CURLOPT_USERPWD, $password);                                                                
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             

if(curl_exec($ch) === false){
    echo 'Curl error: ' . curl_error($ch);
    }                                                                                                      
    $errors = curl_error($ch);                                                                                                            
    $result_out = curl_exec($ch);
    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);  
    echo $returnCode;
    var_dump($errors);
    $report = json_decode($result_out, true);
     print_r(json_decode($result_out, true)); // Testing if I get a result back
    // $usersession = $results[SessionID];
    // }
 echo $track;

?> -->
<!-- END IDV Check -->


<!-- Credit Check --> 
<?php 
// if(isset($_POST['IDNumber'])){
    $idnumber = '8601286129082';
    $FirstName = 'Musa';
    $namefield = 'FirstName';
    $Surname = 'Madalane';
    $surnamefield = 'Surname';
    $Gender = 'Male';
    $genderfield = 'Gender';
    $countrycode  = 'ZAF';
    $reference = 'bytes';
    $idname = 'IDNumber';
    $country = 'CountryCode';
    $EnquirerEmail = 'musa.madalane@altron.com';
    $emailfield = 'EnquirerEmailAddress';
    $EnquirerContact = '0744566436';
    $contact = 'EnquirerContact';
    $EnquirerName = 'Bandile Nyathi';
    $name = 'EnquirerName';
    $data = array('Parameters' => array(
        ['Name' => $idname,'Value' => $idnumber],
        ['Name' => $country, 'Value' => $countrycode],
        ['Name' => $namefield, 'Value' => $FirstName],
        ['Name' => $surnamefield, 'Value' => $Surname],
        ['Name' => $genderfield, 'Value' => $Gender],
        ['Name' => $emailfield, 'Value' => $EnquirerEmail],
        ['Name' => $contact, 'Value' => $EnquirerContact],
        ['Name' => $name, 'Value' => $EnquirerName]
    ),'ExternalReference' => $reference); // data u want to post                                                                   
    $data_string = json_encode($data);                                                                                   
                                                                                          
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/CreditCheck?sessionid={$usersession}");    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, true);                                                                   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
    // curl_setopt($ch, CURLOPT_USERPWD, $password);                                                                
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             

if(curl_exec($ch) === false){
    echo 'Curl error: ' . curl_error($ch);
    }                                                                                                      
    $errors = curl_error($ch);                                                                                                            
    $result = curl_exec($ch);
    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);  
    echo $returnCode;
    var_dump($errors);
    $results = json_decode($result, true);
     print_r(json_decode($result, true)); // Testing if I get a result back
    // $usersession = $results[SessionID];
    // }
    $tracking = $results[TrackingID];
    // header('Location:../dashboard/idv.php');

    // Go to sleep and wait for data to be ready 
    sleep(10);

// if(isset($_POST['IDNumber'])){
    // $idnumber = '8601286129082';
    // $countrycode  = 'ZAF';
    // $reference = 'bytes';
    // $idname = 'IDNumber';
    // $country = 'CountryCode';
    $ResultType = 'Both';
    $getresult = array('ResultType' => $ResultType);
    $getresult_string = json_encode($getresult);                                                                                  
                                                                                          
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/{$tracking}?sessionid={$usersession}");    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POST, true);                                                                   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $getresult_string);  
    // curl_setopt($ch, CURLOPT_USERPWD, $password);                                                                
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             

if(curl_exec($ch) === false){
    echo 'Curl error: ' . curl_error($ch);
    }                                                                                                      
    $errors = curl_error($ch);                                                                                                            
    $result_out = curl_exec($ch);
    $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);  
    echo $returnCode;
    var_dump($errors);
    $report = json_decode($result_out, true);
     print_r(json_decode($result_out, true)); // Testing if I get a result back
    // $usersession = $results[SessionID];
    // }
 echo $track;

?>
<!-- END Credit Check -->

<!-- KYC Check -->

<!-- END KYC Check --> 