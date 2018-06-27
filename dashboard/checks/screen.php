<?php 
 if($_POST['checktype'] == 'SCREEN'){
    // Post Values
     $IDNumber = $_POST["screenidnumber"];
     $CountryCode  = $_POST["screencountrycode"];
     $Term = $_POST["term"];
    // $Refinement = $_POST["refinement"];
     $Scope = $_POST["scope"];
    // $StartDate = $_POST["startdate"];
    // $EndDate = $_POST["enddate"];
     $Categories = $_POST["category"];
    // $NotificationUrl = $_POST["noturl"];

    // $IDNumber = '8601286129082';
    // $CountryCode  = 'ZAF';
    // $Term = 'Barack Obama';
    $Refinement = "";
    // $Scope = 'broad';
    $StartDate = '2014-12-31';
    $EndDate = '2019-12-31';
    // $Categories = 'Adverse Media';
    $NotificationUrl = "";
    
    
    //Params
    $idname = 'IDNumber';
    $country = 'CountryCode';
    $term = 'Term';
    $refinement = 'Refinement';
    $scope = 'Scope';
    $startdate = 'StartDate';
    $enddate = 'EndDate';
    $category = 'Categories';
    $notificationurl = 'NotificationUrl';
    // values expected: IDNumber,CountryCode,FullAddress,BuildingLine,StreetLine,Suburb,Town
    $data = array('Parameters' => array(['Name' => $idname,'Value' => $IDNumber],
                                        ['Name' => $country, 'Value' => $CountryCode],
                                        ['Name' => $term, 'Value' => $Term],
                                        ['Name' => $refinement, 'Value' => $Refinement],
                                        ['Name' => $scope, 'Value' => $Scope],
                                        ['Name' => $startdate, 'Value' => $StartDate],
                                        ['Name' => $enddate, 'Value' => $EndDate],
                                        ['Name' => $category, 'Value' => $Categories],
                                        ['Name' => $notificationurl, 'Value' => $NotificationUrl]),
                                        'ExternalReference' => $Categories); // data we want to post                                                                   
    $data_string = json_encode($data);                                                                                   
                                                                                          
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/Screening?sessionid={$usersession}");    
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POST, true);                                                                   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                       
    );             
                                                                                                                                                                                                              
    $resultscreen = curl_exec($ch);
    $returnscreen = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $results = json_decode($resultscreen, true);

    $tracking = $results['TrackingID'];
    // echo $returnCode;
    // var_dump($errors);
    
    //  print_r(json_decode($resultidv, true)); // Testing if I get a result back
    // $usersession = $results[SessionID];
    // }
    
    
    // header('Location:../dashboard/idv.php');
    //  echo $usersession.'<br>';
    //  echo $tracking;
    // Go to sleep and wait for data to be ready 

    $ResultType = 'DataOnly';
    $getresult = array('ResultType' => $ResultType);
    $getresult_string = json_encode($getresult);                                                                                  
                                                                                          
    $ch1 = curl_init(); 
    curl_setopt($ch1, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/{$tracking}?sessionid={$usersession}");    
    curl_setopt($ch1, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch1, CURLOPT_POST, true);                                                                   
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $getresult_string);  
    // curl_setopt($ch, CURLOPT_USERPWD, $password);                                                                
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch1, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch1, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             
     
    $result_out = curl_exec($ch1);
    $returnscreenresult = (int)curl_getinfo($ch1, CURLINFO_HTTP_CODE);
    // curl_close($ch1);
    $report = json_decode($result_out, true);
    while($report[State]['Request'][2] == 'Requested check is not completed yet!') {
            $result_out = curl_exec($ch1);
            $returnscreenresult = (int)curl_getinfo($ch1, CURLINFO_HTTP_CODE);    
            $report = json_decode($result_out, true);
            if($report[Check][Result] == 'Completed')break;
                // echo 'working';
                // curl_close($ch1);  
    }
    // }
     
    // echo $returnCode;
    // var_dump($errors);
    
    // print_r(json_decode($result_out, false)); // Testing if I get a result back
    // $CheckIDNumber = $report[DataFields][0]['Value'];
    // $Title = $report[DataFields][1]['Value'];
    // $Name = $report[DataFields][2]['Value'];
    // $CheckSurname = $report[DataFields][3]['Value'];
    // $Birthdate = $report[DataFields][6]['Value'];
    // $LivingStatus = $report[DataFields][5]['Value'];
    // $Report = $report[Report];
    //$pdfReport = base64_decode($Report);
   // file_put_contents('reports/IDV-report.pdf', $$pdfReport);
}

?>