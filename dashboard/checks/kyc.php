<?php 
 if($_POST['check'] =='KYC'){
    // Post Values
    $idnumber = $_POST["idvidnumber"];
    $countrycode  = "ZAF";
    $FullAddress = $_POST["fulladdress"];
    $BuildingLine = $_POST["buildingline"];
    $StreetLine = $_POST["streetline"];
    $Suburb = $_POST["suburb"];
    $Town = $_POST["town"];

    //Params
    $idname = 'IDNumber';
    $country = 'CountryCode';
    $fulladdr = 'FullAddress';
    $building = 'BuildingLine';
    $street = 'StreetLine';
    $sub = 'Suburb';
    $twn = 'Town';
    // values expected: IDNumber,CountryCode,FullAddress,BuildingLine,StreetLine,Suburb,Town

    $kycdata = array('Parameters' => array(['Name' => $idname,'Value' => $idnumber],
                                        ['Name' => $country, 'Value' => $countrycode],
                                        ['Name' => $fulladdr, 'Value' => $FullAddress],
                                        ['Name' => $building, 'Value' => $BuildingLine],
                                        ['Name' => $street, 'Value' => $StreetLine],
                                        ['Name' => $sub, 'Value' => $Suburb],
                                        ['Name' => $twn, 'Value' => $Town])); // data u want to post                                                                   
    $kycdata_string = json_encode($kycdata);                                                                                   
                                                                                          
    $ch3 = curl_init(); 
    curl_setopt($ch3, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/KYC?sessionid={$usersession}");    
    curl_setopt($ch3, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch3, CURLOPT_POST, true);                                                                   
    curl_setopt($ch3, CURLOPT_POSTFIELDS, $kycdata_string);                                                                 
    curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch3, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch3, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch3, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             
                                                                                                    
    $errors = curl_error($ch3);
    $resultkyc = curl_exec($ch3);
    $returnkyc = (int)curl_getinfo($ch3, CURLINFO_HTTP_CODE);
    curl_close($ch3);  
    // echo $returnCode;
    // var_dump($errors);
    $results = json_decode($resultkyc, true);

    $tracking = $results[TrackingID];

    // Go to sleep and wait for data to be ready 
    // sleep(6);

    $ResultType = 'DataOnly';
    $getresult = array('ResultType' => $ResultType);
    $getresult_string = json_encode($getresult);                                                                                  
                                                                                          
    $ch4 = curl_init(); 
    curl_setopt($ch4, CURLOPT_URL, "http://dev.fidescloud.co.za/FidesREST/checks/{$tracking}?sessionid={$usersession}");    
    curl_setopt($ch4, CURLOPT_CONNECTTIMEOUT, 20);
    curl_setopt($ch4, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch4, CURLOPT_POST, true);                                                                   
    curl_setopt($ch4, CURLOPT_POSTFIELDS, $getresult_string);  
    // curl_setopt($ch1, CURLOPT_USERPWD, $password);                                                                
    curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);     
    curl_setopt($ch4, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch4, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
    curl_setopt($ch4, CURLOPT_HTTPHEADER, array(   
        'Accept: application/json',
        'Content-Type: application/json')                                                           
    );             
    
    $errors = curl_error($ch4);                                                                                                            
    $result_out = curl_exec($ch4);
    $returnkycresult = (int)curl_getinfo($ch4, CURLINFO_HTTP_CODE);
    // curl_close($ch1);  
    $report = json_decode($result_out, true);
    while($report[State]['Request'][2] == 'Requested check is not completed yet!') {
        $result_out = curl_exec($ch4);
        $returnkycresult = (int)curl_getinfo($ch4, CURLINFO_HTTP_CODE);
        // curl_close($ch1);  
        $report = json_decode($result_out, true);
        if($report[Check][Result] == 'Completed')break;
        // echo 'working';

}


    //     for ($try=1; $try<=$maxTries; $try++) {
    //         if( $report[State][Request][2] = 'Requested check is not completed yet!') {
    //         $result_out = curl_exec($ch4);
    //         $returnkycresult = (int)curl_getinfo($ch4, CURLINFO_HTTP_CODE);
    //         $report = json_decode($result_out, true);
    //         if($report[Check][Result] = 'Completed') {
    //             $report = json_decode($result_out, true);
    //             curl_close($ch4);
    //             break;
    //             exit;
    //         }
    //         //  echo 'Trying again';
    //         //  print_r(json_decode($result_out, false)); // Testing if I get a result back
    //     }
    //     curl_close($ch4);
    // }
      
    //  echo $usersession;

      $ResultCountryCode = $report[DataFields][0]['Value'];
      $ResultFullAddress = $report[DataFields][1]['Value'];
      $ResultIDNumber = $report[DataFields][2]['Value'];
      $ResultAverageScore = $report[DataFields][3]['Value'];
      $ResultMaximumScore = $report[DataFields][4]['Value'];
      $ResultAverageScoreNoZero = $report[DataFields][5]['Value'];
      $ResultKYCStatus = $report[DataFields][6]['Value'];
      $ResultKYCAverageScore = $report[DataFields][7][ComplexValue][0]['Value'];
      $ResultKYCSource = $report[DataFields][7][ComplexValue][1]['Value'];
      $ResultKYCMaximumScore = $report[DataFields][7][ComplexValue][2]['Value'];
      $ResultKYCAverageScoreNoZero = $report[DataFields][7][ComplexValue][3]['Value'];
      $ResultKYCEnqAverageScore = $report[DataFields][8][ComplexValue][0]['Value'];
      $ResultKYCEnqSource = $report[DataFields][8][ComplexValue][1]['Value'];
      $ResultKYCEnqMaximumScore = $report[DataFields][8][ComplexValue][2]['Value'];
      $ResultKYCEnqAverageScoreNoZero = $report[DataFields][8][ComplexValue][3]['Value'];
      $ResultKYCResAverageScore = $report[DataFields][9][ComplexValue][0]['Value'];
      $ResultKYCResKYCSource = $report[DataFields][9][ComplexValue][1]['Value'];
      $ResultKYCResMaximumScore = $report[DataFields][9][ComplexValue][2]['Value'];
      $ResultKYCResAverageScoreNoZero = $report[DataFields][9][ComplexValue][3]['Value'];

        // $Report = $report[Report];
        // $$pdfReport = base64_decode($Report);
        // file_put_contents('reports/KYC-report.pdf', $$pdfReport);
}

// echo $idvtracking.'<br>';
//     echo $tracking;
?>
<!-- KYC Check -->