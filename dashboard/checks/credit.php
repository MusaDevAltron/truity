<!-- Credit Check --> 
<?php 
  if($_POST['checktype'] =='CRED'){
    // Post Values
    $idnumber = $_POST["cpaidnumber"];
    $FirstName = $_POST["firstname"];
    $Surname = $_POST["surname"]; 
    $Gender = $_POST["gender"];
    $countrycode  = $_POST["countrycode"];
    $reference = $_POST["reference"];
    $EnquirerEmail = $_POST["enquireremail"];
    $EnquirerContact = $_POST["enquirercontact"];
    $EnquirerName = $_POST["enquirername"];
    

    // Params
    $namefield = 'FirstName';
    $surnamefield = 'Surname';
    $genderfield = 'Gender';
    $idname = 'IDNumber';
    $country = 'CountryCode';
    $emailfield = 'EnquirerEmailAddress';
    $contact = 'EnquirerContact';
    $name = 'EnquirerName';

    // Generate JSON
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
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
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
                                                                                                               
    $result = curl_exec($ch);
    $returncred = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch); 
    $results = json_decode($result, true); 
    // echo $returnCode;
    // var_dump($errors);
    $tracking = $results[TrackingID];

    // $usersession = $results[SessionID];
    // }
    
    // header('Location:../dashboard/idv.php');
    // print_r(json_decode($result, true));

    // Go to sleep and wait for data to be ready 

        // return $this->curl($results,$recursive_attempt);
     // Testing if I get a result back
    //  echo $report[State][Request][2];

// if(isset($_POST['IDNumber'])){
    $ResultType = 'DataOnly';
    $getresult = array('ResultType' => $ResultType);
    $getresult_string = json_encode($getresult);                                                                                  
                                                                                          
    $ch1 = curl_init(); 
    curl_setopt($ch1, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/{$tracking}?sessionid={$usersession}");    
    curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, 200);
    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch1, CURLOPT_POST, true);                                                                   
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $getresult_string);  
    // curl_setopt($ch1, CURLOPT_USERPWD, $password);                                                                
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch1, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch1, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             
    
    // $maxTries = 10;
    $result_out = curl_exec($ch1);
    $returncredresult = (int)curl_getinfo($ch1, CURLINFO_HTTP_CODE);
    $report = json_decode($result_out, true); 
    while($report[State]['Request'][2] == 'Requested check is not completed yet!') {
        $result_out = curl_exec($ch1);
        $returncredresult = (int)curl_getinfo($ch1, CURLINFO_HTTP_CODE);
        $report = json_decode($result_out, true); 
        if($report[Check][Result] == 'Completed')break;
    }


    // for ($try=0; $try<=$maxTries; $try++) {
    //     if($report[State][Request][2] == 'Requested check is not completed yet!') {
    //     sleep(2);
    //     $result_out = curl_exec($ch1);
    //     $returncredresult = (int)curl_getinfo($ch1, CURLINFO_HTTP_CODE);
    //     $report = json_decode($result_out, true);
    //     $try++;
    //         }
    //     }
    //     if($report[Check][Result] = 'Completed') {
            
    //         $report = json_decode($result_out, true); 
    //         curl_close($ch1);
                    
    //     }
    // }elseif($report[Check]['Result'] = 'Completed') {
    //     $report = json_decode($result_out, true); 
    //     curl_close($ch2);
    //     break;
    //     // exit();
    //     // echo 'working';
    //  }   
    //     curl_close($ch1);
    // }
     
    // echo $returnCode;
    // var_dump($errors);
    
    // print_r(json_decode($result_out, false)); // Testing if I get a result back

     $ResultDate = $report[Check]['ResultDate'];
     $RefNumber = $report[DataFields][15]['Value'];
     $CheckGender = $report[DataFields][0]['Value'];
     $CheckIDNumber = $report[DataFields][1]['Value'];
     $CheckSurname = $report[DataFields][2]['Value'];
     $Title = $report[DataFields][3]['Value'];
     $Name = $report[DataFields][4]['Value'];
     $Birthdate = $report[DataFields][7]['Value'];
     $MaritalStatus = $report[DataFields][8]['Value'];
     $PhysicalAddress = $report[DataFields][10]['Value'];
     $PostalAddress = $report[DataFields][11]['Value'];
     $HomePhoneNumber = $report[DataFields][12]['Value'];
     $WorkPhoneNumber = $report[DataFields][13]['Value'];
     $MobileNumber = $report[DataFields][14]['Value'];
     $ITCStatus = $report[DataFields][16]['Value'];
     $Report = $report[Report];
     $pdfReport = base64_decode($Report);
    // file_put_contents('reports/Credit-report.pdf', $$pdfReport);
        
        
    // $usersession = $results[SessionID]; 
    //   echo $usersession.'<br>';

    //   echo $tracking;
 }

?>
<!-- END Credit Check -->